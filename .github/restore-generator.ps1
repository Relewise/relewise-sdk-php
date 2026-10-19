#requires -Version 7.0

# Ubuntu CI: restore the release package exactly, never a floating fallback.
# Run from the repository root. This only restores dependencies; the workflow
# builds and generates separately without another restore.

param(
    [string] $Version,

    # 0 = one attempt before generation; 3600 = retry while NuGet publishes.
    # Keep the input as text so fractional values are rejected instead of rounded.
    [string] $WaitSeconds = '0'
)

Set-StrictMode -Version Latest
$ErrorActionPreference = 'Stop'

# Restore failures are retried below, including when the caller enables this preference.
$PSNativeCommandUseErrorActionPreference = $false

if ($Version -cnotmatch '\A(?:0|[1-9][0-9]*)\.(?:0|[1-9][0-9]*)\.(?:0|[1-9][0-9]*)\z') {
    throw 'api-version must be a stable NuGet version such as 1.320.0'
}

if ($WaitSeconds -cnotmatch '\A(?:0|[1-9][0-9]{0,3})\z' -or [int]$WaitSeconds -gt 3600) {
    throw 'Wait must be between 0 and 3600 whole seconds'
}

# One budget covers restore attempts AND retry delays. Stopwatch is monotonic,
# so changes to the system clock cannot extend the wait.
$wait = [int]$WaitSeconds
$budget = if ($wait) { $wait } else { 120 }
$clock = [System.Diagnostics.Stopwatch]::StartNew()

while ($true) {
    $remaining = $budget - $clock.Elapsed.TotalSeconds

    if ($remaining -le 0) {
        throw "Relewise.Client $Version was not restored before the deadline. Rerun this workflow to retry the same version."
    }

    # Cap each attempt at 120 seconds and the remaining budget. Never round to 0:
    # GNU timeout treats 0 as unlimited. Use a decimal point regardless of locale.
    $attemptSeconds = [Math]::Max(0.001, [Math]::Min(120, $remaining)).ToString(
        '0.###',
        [Globalization.CultureInfo]::InvariantCulture
    )

    # GNU timeout bounds the process group; forced termination may add five seconds.
    # [version] is an exact NuGet constraint. Bypass HTTP cache while publication
    # propagates; already-downloaded packages may still be reused.
    & timeout --kill-after=5s "${attemptSeconds}s" dotnet restore Generator/Generator.csproj --no-http-cache "-p:RelewiseClientVersion=[$Version]"

    if ($LASTEXITCODE -eq 0) {
        # Verify what NuGet actually resolved, not merely that restore succeeded.
        # Invalid assets fail immediately; waiting cannot repair a version mismatch.
        $assets = Get-Content 'Generator/obj/project.assets.json' -Raw |
            ConvertFrom-Json -AsHashtable

        # Keys look like Relewise.Client/1.320.0. Require one matching package entry;
        # the hashtable preserves case-distinct keys so duplicates are not hidden.
        $actual = @(
            $assets.libraries.Keys |
                Where-Object { ($_ -split '/', 2)[0] -ieq 'Relewise.Client' } |
                ForEach-Object { ($_ -split '/', 2)[1] }
        )

        if ($actual.Count -ne 1 -or $actual[0] -cne $Version) {
            throw "Expected Relewise.Client $Version, resolved [$($actual -join ', ')]. Refusing generation."
        }

        Write-Host "Verified Relewise.Client $Version."
        return
    }

    # Retry any restore failure (including a timeout) only in readiness mode.
    # The generation job uses one attempt and must stop rather than use stale assets.
    if (-not $wait) {
        throw "Could not restore Relewise.Client $Version. Refusing generation."
    }

    $remaining = $budget - $clock.Elapsed.TotalSeconds

    if ($remaining -gt 0) {
        Write-Host "Waiting for Relewise.Client $Version; $([int][Math]::Floor($remaining)) seconds remaining."
        Start-Sleep -Seconds ([Math]::Min(30, $remaining))
    }
}
