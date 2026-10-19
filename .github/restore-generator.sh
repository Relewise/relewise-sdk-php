#!/usr/bin/env bash
# Ubuntu CI: restore the release package exactly, never a floating fallback.
set -euo pipefail

version=${1:-}
wait_seconds=${2:-0}
if [[ ! $version =~ ^(0|[1-9][0-9]*)\.(0|[1-9][0-9]*)\.(0|[1-9][0-9]*)$ ]]; then
  echo 'api-version must be a stable NuGet version such as 1.320.0' >&2
  exit 1
fi
if [[ ! $wait_seconds =~ ^(0|[1-9][0-9]{0,3})$ ]] || (( wait_seconds > 3600 )); then
  echo 'Wait must be between 0 and 3600 seconds' >&2
  exit 1
fi

budget=$wait_seconds
if (( budget == 0 )); then budget=120; fi
deadline=$((SECONDS + budget))
while true; do
  remaining=$((deadline - SECONDS))
  if (( remaining <= 0 )); then break; fi
  attempt_seconds=$remaining
  if (( attempt_seconds > 120 )); then attempt_seconds=120; fi

  # GNU timeout bounds the whole process group; force termination if needed.
  if timeout --kill-after=5s "${attempt_seconds}s" dotnet restore Generator/Generator.csproj --no-http-cache "-p:RelewiseClientVersion=[$version]"; then
    python3 - "$version" <<'PY'
import json
import sys

with open("Generator/obj/project.assets.json", encoding="utf-8-sig") as assets_file:
    assets = json.load(assets_file)
actual = [key.split("/", 1)[1] for key in assets["libraries"]
          if key.split("/", 1)[0].lower() == "relewise.client"]
if actual != [sys.argv[1]]:
    sys.exit(f"Expected Relewise.Client {sys.argv[1]}, resolved {actual}. Refusing generation.")
print(f"Verified Relewise.Client {sys.argv[1]}.")
PY
    exit 0
  fi

  if (( wait_seconds == 0 )); then
    echo "Could not restore Relewise.Client $version. Refusing generation." >&2
    exit 1
  fi
  remaining=$((deadline - SECONDS))
  if (( remaining > 0 )); then
    echo "Waiting for Relewise.Client $version; $remaining seconds remaining."
    if (( remaining > 30 )); then remaining=30; fi
    sleep "$remaining"
  fi
done

echo "Relewise.Client $version was not restored before the deadline. Rerun this workflow to retry the same version." >&2
exit 1
