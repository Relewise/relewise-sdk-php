#requires -Version 7.0
# Ubuntu CI: restore the release package exactly, never a floating fallback.
param(
    [string] $Version,
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

$wait = [int]$WaitSeconds
$budget = if ($wait) { $wait } else { 120 }
$clock = [System.Diagnostics.Stopwatch]::StartNew()
while ($true) {
    $remaining = $budget - $clock.Elapsed.TotalSeconds
    if ($remaining -le 0) {
        throw "Relewise.Client $Version was not restored before the deadline. Rerun this workflow to retry the same version."
    }
    $attemptSeconds = [Math]::Max(0.001, [Math]::Min(120, $remaining)).ToString('0.###', [Globalization.CultureInfo]::InvariantCulture)
    # GNU timeout bounds the process group, with five seconds to force termination.
    & timeout --kill-after=5s "${attemptSeconds}s" dotnet restore Generator/Generator.csproj --no-http-cache "-p:RelewiseClientVersion=[$Version]"
    if ($LASTEXITCODE -eq 0) {
        $assets = Get-Content 'Generator/obj/project.assets.json' -Raw | ConvertFrom-Json -AsHashtable
        $actual = @($assets.libraries.Keys | Where-Object { ($_ -split '/', 2)[0] -ieq 'Relewise.Client' } | ForEach-Object { ($_ -split '/', 2)[1] })
        if ($actual.Count -ne 1 -or $actual[0] -cne $Version) {
            throw "Expected Relewise.Client $Version, resolved [$($actual -join ', ')]. Refusing generation."
        }
        Write-Host "Verified Relewise.Client $Version."
        return
    }
    if (-not $wait) {
        throw "Could not restore Relewise.Client $Version. Refusing generation."
    }
    $remaining = $budget - $clock.Elapsed.TotalSeconds
    if ($remaining -gt 0) {
        Write-Host "Waiting for Relewise.Client $Version; $([int][Math]::Floor($remaining)) seconds remaining."
        Start-Sleep -Seconds ([Math]::Min(30, $remaining))
    }
}
