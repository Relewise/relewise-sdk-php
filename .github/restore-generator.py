"""Restore the exact release package before SDK generation (no floating fallback)."""
import argparse
import json
from pathlib import Path
import re
import subprocess
import time


def restore(version, wait_seconds=0):
    if not re.fullmatch(r"(?:0|[1-9][0-9]*)\.(?:0|[1-9][0-9]*)\.(?:0|[1-9][0-9]*)", version):
        raise ValueError("api-version must be a stable NuGet version such as 1.320.0")
    if not 0 <= wait_seconds <= 3600:
        raise ValueError("Wait must be between 0 and 3600 seconds")
    deadline = time.monotonic() + (wait_seconds or 120)
    command = ["dotnet", "restore", "Generator/Generator.csproj", "--no-http-cache",
               f"-p:RelewiseClientVersion=[{version}]"]
    while True:
        remaining = deadline - time.monotonic()
        if remaining <= 0:
            raise TimeoutError(f"Relewise.Client {version} was not restored before the deadline. Rerun this workflow to retry the same version.")
        try:
            result = subprocess.run(command, timeout=min(120, remaining), check=False)
        except subprocess.TimeoutExpired:
            print("Restore attempt timed out.", flush=True)
        else:
            if result.returncode == 0:
                assets = json.loads(Path("Generator/obj/project.assets.json").read_text(encoding="utf-8"))
                actual = [name.split("/", 1)[1] for name in assets["libraries"]
                          if name.split("/", 1)[0].lower() == "relewise.client"]
                if actual != [version]:
                    raise RuntimeError(f"Expected Relewise.Client {version}, resolved {actual}. Refusing generation.")
                print(f"Verified Relewise.Client {version}.", flush=True)
                return
        if not wait_seconds:
            raise RuntimeError(f"Could not restore Relewise.Client {version}. Refusing generation.")
        remaining = deadline - time.monotonic()
        if remaining > 0:
            print(f"Waiting for Relewise.Client {version}; {int(remaining)} seconds remaining.", flush=True)
            time.sleep(min(30, remaining))


if __name__ == "__main__":
    parser = argparse.ArgumentParser(description=__doc__)
    parser.add_argument("--version", required=True)
    parser.add_argument("--wait-seconds", type=int, default=0)
    args = parser.parse_args()
    restore(args.version, args.wait_seconds)
