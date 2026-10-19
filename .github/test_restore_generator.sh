#!/usr/bin/env bash
# Offline behavior tests; only the bounded-hang case waits for real time.
set -euo pipefail

script_dir=$(cd -- "$(dirname -- "${BASH_SOURCE[0]}")" && pwd)
restore_script="$script_dir/restore-generator.sh"
test_root=$(mktemp -d)
trap 'rm -rf -- "$test_root"' EXIT
real_sleep=$(command -v sleep)
export real_sleep
mkdir -p "$test_root/bin"
cat > "$test_root/bin/dotnet" <<'FAKE'
#!/usr/bin/env bash
set -eu
count=0
[[ ! -f calls ]] || read -r count < calls
printf '%s\n' "$((count + 1))" > calls
printf '%s\n' "$@" > arguments
case "$SCENARIO" in
  fail|deadline)
    # A stale assets file must never turn a failed restore into success.
    mkdir -p Generator/obj
    printf '%s' '{"libraries":{"Relewise.Client/1.2.3":{}}}' > Generator/obj/project.assets.json
    exit 7 ;;
  hang) exec "$real_sleep" 20 ;;
  retry) [[ $count -gt 0 ]] || exit 7 ;;
esac
mkdir -p Generator/obj
case "$SCENARIO" in
  mismatch) printf '%s' '{"libraries":{"Relewise.Client/1.2.2":{}}}' ;;
  missing) printf '%s' '{"libraries":{}}' ;;
  malformed) printf '%s' 'not JSON' ;;
  absent) exit 0 ;;
  duplicate) printf '%s' '{"libraries":{"Relewise.Client/1.2.3":{},"relewise.client/1.2.3":{}}}' ;;
  *) printf '%s' '{"libraries":{"rElEwIsE.ClIeNt/1.2.3":{}}}' ;;
esac > Generator/obj/project.assets.json
FAKE
# A retry succeeds on its next attempt without imposing a 30-second test delay.
cat > "$test_root/bin/sleep" <<'FAKE'
#!/usr/bin/env bash
printf '%s\n' "$@" >> sleeps
if [[ $SCENARIO == deadline ]]; then exec "$real_sleep" "$@"; fi
FAKE
chmod +x "$test_root/bin/dotnet" "$test_root/bin/sleep"
export PATH="$test_root/bin:$PATH"
tests=0

run_case() {
  local name=$1 scenario=$2 expected=$3 expected_calls=$4
  shift 4
  mkdir "$test_root/$name"
  local status=0
  (cd "$test_root/$name" && SCENARIO="$scenario" bash "$restore_script" "$@") > "$test_root/$name/output" 2>&1 || status=$?
  local calls=0
  [[ ! -f "$test_root/$name/calls" ]] || read -r calls < "$test_root/$name/calls"
  if { [[ $expected == success ]] && [[ $status -ne 0 ]]; } ||
     { [[ $expected == failure ]] && [[ $status -eq 0 ]]; } ||
     [[ $calls -ne $expected_calls ]]; then
    printf 'FAIL %s: exit=%s calls=%s (expected %s, %s calls)\n' "$name" "$status" "$calls" "$expected" "$expected_calls" >&2
    cat "$test_root/$name/output" >&2
    exit 1
  fi
  tests=$((tests + 1))
}

run_case exact success success 1 1.2.3
printf '%s\n' restore Generator/Generator.csproj --no-http-cache '-p:RelewiseClientVersion=[1.2.3]' > "$test_root/expected-arguments"
diff -u "$test_root/expected-arguments" "$test_root/exact/arguments"
run_case retry retry success 2 1.2.3 60
[[ $(cat "$test_root/retry/sleeps") == 30 ]]
for scenario in mismatch missing malformed absent duplicate; do
  # Verification errors must fail immediately even when retry time remains.
  run_case "$scenario" "$scenario" failure 1 1.2.3 60
done
run_case single-failure fail failure 1 1.2.3 0
run_case deadline deadline failure 1 1.2.3 1
[[ $(cat "$test_root/deadline/sleeps") == 1 ]]
run_case no-version success failure 0
for version in 01.2.3 1.02.3 1.2.03 1.2 1.2.3-preview v1.2.3 '1.2.3;true'; do
  run_case "invalid-version-$tests" success failure 0 "$version"
done
for wait in -1 3601 1.5 nope; do
  run_case "invalid-wait-$tests" success failure 0 1.2.3 "$wait"
done
started=$SECONDS
run_case bounded-hang hang failure 1 1.2.3 1
elapsed=$((SECONDS - started))
if (( elapsed > 8 )); then
  printf 'FAIL bounded-hang: took %s seconds for a 1-second budget\n' "$elapsed" >&2
  exit 1
fi
printf 'Passed %s restore tests.\n' "$tests"
