# Standalone offline regression tests. Run with pwsh -File .github/test_restore_generator.ps1.
Set-StrictMode -Version Latest
$ErrorActionPreference = 'Stop'
. "$PSScriptRoot/restore-generator.ps1"

function Assert-True($Condition, [string] $Message) {
    if (-not $Condition) { throw "Assertion failed: $Message" }
}
function Assert-Throws([scriptblock] $Action, [string] $MessagePattern) {
    try { & $Action }
    catch {
        Assert-True ($_.Exception.Message -match $MessagePattern) "Unexpected error: $_"
        return
    }
    throw "Expected an error matching: $MessagePattern"
}

# Exercise the real process timeout before replacing external operations below.
$timer = [System.Diagnostics.Stopwatch]::StartNew()
$result = Invoke-BoundedProcess -FilePath (Get-Process -Id $PID).Path -Arguments @('-NoProfile', '-Command', 'Start-Sleep -Seconds 30') -TimeoutSeconds 0.25
Assert-True $result.TimedOut 'A hanging process must time out'
Assert-True ($timer.Elapsed.TotalSeconds -lt 10) 'Process termination must be bounded'
Write-Host 'PASS: real hanging process is terminated'

function Get-RestoreElapsedSeconds { param($Clock) return $script:Now }
function Start-Sleep {
    param([int] $Milliseconds)
    $script:Now += $Milliseconds / 1000.0
    $script:Sleeps++
}
function Get-Content { param($Path, [switch] $Raw) return $script:Assets }
function Invoke-BoundedProcess {
    param($FilePath, $Arguments, $TimeoutSeconds)
    $script:Calls.Add([pscustomobject]@{ FilePath = $FilePath; Arguments = $Arguments; Timeout = $TimeoutSeconds })
    if ($script:Hang) {
        $script:Now += $TimeoutSeconds
        return [pscustomobject]@{ ExitCode = $null; TimedOut = $true }
    }
    $code = $script:Codes[[Math]::Min($script:Calls.Count - 1, $script:Codes.Count - 1)]
    return [pscustomobject]@{ ExitCode = $code; TimedOut = $false }
}
function Test-Case([string] $Name, [scriptblock] $Action) {
    $script:Now = 0.0
    $script:Sleeps = 0
    $script:Hang = $false
    $script:Calls = [System.Collections.Generic.List[object]]::new()
    $script:Codes = @(0)
    $script:Assets = '{"libraries":{"Relewise.Client/1.320.0":{}}}'
    & $Action
    Write-Host "PASS: $Name"
}

Test-Case 'Exact restore succeeds' {
    Restore-Generator '1.320.0' 3600
    Assert-True ($script:Calls.Count -eq 1) 'Exactly one attempt'
    Assert-True ($script:Calls[0].FilePath -eq 'dotnet') 'Use dotnet'
    Assert-True (($script:Calls[0].Arguments -join '|') -eq 'restore|Generator/Generator.csproj|--no-http-cache|-p:RelewiseClientVersion=[1.320.0]') 'Exact restore arguments'
    Assert-True ($script:Calls[0].Timeout -eq 120) 'Attempt capped at 120 seconds'
    Assert-True ($script:Sleeps -eq 0) 'No sleep after success'
}
Test-Case 'Retries then succeeds' {
    $script:Codes = @(1, 0)
    Restore-Generator '1.320.0' 3600
    Assert-True ($script:Calls.Count -eq 2 -and $script:Now -eq 30) 'Retry after 30 seconds'
}
Test-Case 'Deadline stops polling' {
    $script:Codes = @(1)
    Assert-Throws { Restore-Generator '1.320.0' 35 } 'before the deadline'
    Assert-True ($script:Now -eq 35 -and $script:Calls.Count -eq 2) 'Stop at deadline'
    Assert-True ($script:Calls[1].Timeout -eq 5) 'Final attempt uses remaining budget'
}
Test-Case 'Hanging attempt consumes only remaining budget' {
    $script:Hang = $true
    Assert-Throws { Restore-Generator '1.320.0' 35 } 'before the deadline'
    Assert-True ($script:Now -eq 35 -and $script:Calls.Count -eq 1) 'No retry past deadline'
}
Test-Case 'Version mismatch fails without retry' {
    $script:Assets = '{"libraries":{"Relewise.Client/1.308.0":{}}}'
    Assert-Throws { Restore-Generator '1.320.0' 3600 } 'Refusing generation'
    Assert-True ($script:Calls.Count -eq 1 -and $script:Sleeps -eq 0) 'Mismatch must fail immediately'
}
Test-Case 'Missing package fails' {
    $script:Assets = '{"libraries":{}}'
    Assert-Throws { Restore-Generator '1.320.0' } 'Refusing generation'
}
Test-Case 'Generation restore does not retry' {
    $script:Codes = @(1)
    Assert-Throws { Restore-Generator '1.320.0' } 'Refusing generation'
    Assert-True ($script:Calls.Count -eq 1 -and $script:Sleeps -eq 0) 'Default is a single attempt'
}
Test-Case 'Invalid version and unbounded wait rejected' {
    foreach ($value in @('*', '', '1.320.0;Other=evil', '01.320.0', "1.320.0`n", '1.320.0-beta')) {
        Assert-Throws { Restore-Generator $value 3600 } 'stable NuGet version'
    }
    foreach ($wait in @(-1, 3601)) {
        Assert-Throws { Restore-Generator '1.320.0' $wait } 'between 0 and 3600'
    }
    Assert-True ($script:Calls.Count -eq 0) 'Invalid input must not start restore'
}
Write-Host 'All 9 restore tests passed.'
