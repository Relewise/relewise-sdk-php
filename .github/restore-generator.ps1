#requires -Version 7.0
# Restore the exact release package before SDK generation (no floating fallback).
[CmdletBinding()]
param(
    [string] $Version,
    [int] $WaitSeconds = 0
)

Set-StrictMode -Version Latest
$ErrorActionPreference = 'Stop'

function Invoke-BoundedProcess {
    param([string] $FilePath, [string[]] $Arguments, [double] $TimeoutSeconds)

    $process = [System.Diagnostics.Process]::new()
    $process.StartInfo.FileName = $FilePath
    $process.StartInfo.UseShellExecute = $false
    $process.StartInfo.WorkingDirectory = (Get-Location).Path
    foreach ($argument in $Arguments) {
        $process.StartInfo.ArgumentList.Add($argument)
    }
    try {
        if (-not $process.Start()) { throw "Could not start $FilePath." }
        if (-not $process.WaitForExit([int][Math]::Ceiling($TimeoutSeconds * 1000))) {
            # Kill descendants too: dotnet restore may start child processes.
            $process.Kill($true)
            if (-not $process.WaitForExit(5000)) {
                throw "Could not terminate timed-out $FilePath within five seconds."
            }
            return [pscustomobject]@{ ExitCode = $null; TimedOut = $true }
        }
        return [pscustomobject]@{ ExitCode = $process.ExitCode; TimedOut = $false }
    }
    finally {
        $process.Dispose()
    }
}

function Get-RestoreElapsedSeconds {
    param([System.Diagnostics.Stopwatch] $Clock)
    return $Clock.Elapsed.TotalSeconds
}

function Restore-Generator {
    param([string] $Version, [int] $WaitSeconds = 0)

    if ($Version -cnotmatch '\A(?:0|[1-9][0-9]*)\.(?:0|[1-9][0-9]*)\.(?:0|[1-9][0-9]*)\z') {
        throw 'api-version must be a stable NuGet version such as 1.320.0'
    }
    if ($WaitSeconds -lt 0 -or $WaitSeconds -gt 3600) {
        throw 'Wait must be between 0 and 3600 seconds'
    }
    $budget = if ($WaitSeconds) { $WaitSeconds } else { 120 }
    $clock = [System.Diagnostics.Stopwatch]::StartNew()
    $arguments = @('restore', 'Generator/Generator.csproj', '--no-http-cache', "-p:RelewiseClientVersion=[$Version]")
    while ($true) {
        $remaining = $budget - (Get-RestoreElapsedSeconds $clock)
        if ($remaining -le 0) {
            throw "Relewise.Client $Version was not restored before the deadline. Rerun this workflow to retry the same version."
        }
        $result = Invoke-BoundedProcess -FilePath 'dotnet' -Arguments $arguments -TimeoutSeconds ([Math]::Min(120, $remaining))
        if ($result.TimedOut) {
            Write-Host 'Restore attempt timed out.'
        }
        elseif ($result.ExitCode -eq 0) {
            $assets = Get-Content 'Generator/obj/project.assets.json' -Raw | ConvertFrom-Json -AsHashtable
            $actual = @($assets.libraries.Keys | Where-Object { ($_ -split '/', 2)[0] -ieq 'Relewise.Client' } | ForEach-Object { ($_ -split '/', 2)[1] })
            if ($actual.Count -ne 1 -or $actual[0] -cne $Version) {
                throw "Expected Relewise.Client $Version, resolved [$($actual -join ', ')]. Refusing generation."
            }
            Write-Host "Verified Relewise.Client $Version."
            return
        }
        if (-not $WaitSeconds) {
            throw "Could not restore Relewise.Client $Version. Refusing generation."
        }
        $remaining = $budget - (Get-RestoreElapsedSeconds $clock)
        if ($remaining -gt 0) {
            Write-Host "Waiting for Relewise.Client $Version; $([int][Math]::Floor($remaining)) seconds remaining."
            Start-Sleep -Milliseconds ([int][Math]::Ceiling([Math]::Min(30, $remaining) * 1000))
        }
    }
}

if ($MyInvocation.InvocationName -ne '.') {
    Restore-Generator -Version $Version -WaitSeconds $WaitSeconds
}
