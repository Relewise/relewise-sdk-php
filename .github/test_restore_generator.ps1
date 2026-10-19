#requires -Version 7.0
# Offline behavior tests; native timeout is also exercised on the Ubuntu CI runner.
Set-StrictMode -Version Latest
$ErrorActionPreference = 'Stop'
$restoreScript = Join-Path $PSScriptRoot 'restore-generator.ps1'
$testRoot = Join-Path ([IO.Path]::GetTempPath()) "relewise-restore-$([guid]::NewGuid().ToString('N'))"
$null = New-Item -ItemType Directory -Path "$testRoot/Generator/obj" -Force

function Assert-True($Condition, [string] $Message) {
    if (-not $Condition) { throw "Assertion failed: $Message" }
}

function Test-Restore([string] $Scenario, [string] $Version = '1.2.3', [string] $WaitSeconds = '0', [string] $ErrorPattern = '', [int] $ExpectedCalls = 1) {
    $PSNativeCommandUseErrorActionPreference = $true
    $script:state = [pscustomobject]@{ Calls = [Collections.Generic.List[object]]::new(); Sleeps = [Collections.Generic.List[double]]::new() }
    $assetsPath = 'Generator/obj/project.assets.json'
    Set-Content $assetsPath '{"libraries":{"rElEwIsE.ClIeNt/1.2.3":{}}}'
    function timeout {
        Assert-True (-not $PSNativeCommandUseErrorActionPreference) 'Restore handles native failures itself'
        $state.Calls.Add(@($args))
        $global:LASTEXITCODE = 0
        switch ($Scenario) {
            'retry' { if ($state.Calls.Count -eq 1) { $global:LASTEXITCODE = 7 } }
            'failure' { $global:LASTEXITCODE = 7 }
            'hang' {
                Microsoft.PowerShell.Utility\Start-Sleep -Seconds ([double]::Parse($args[1].TrimEnd('s'), [Globalization.CultureInfo]::InvariantCulture))
                $global:LASTEXITCODE = 124
            }
            'mismatch' { Set-Content $assetsPath '{"libraries":{"Relewise.Client/1.2.2":{}}}' }
            'missing' { Set-Content $assetsPath '{"libraries":{}}' }
            'malformed' { Set-Content $assetsPath 'not JSON' }
            'absent' { Remove-Item $assetsPath }
            'duplicate' { Set-Content $assetsPath '{"libraries":{"Relewise.Client/1.2.3":{},"relewise.client/1.2.3":{}}}' }
        }
    }
    function Start-Sleep {
        param([double] $Seconds)
        $state.Sleeps.Add($Seconds)
        if ($Scenario -eq 'failure') { Microsoft.PowerShell.Utility\Start-Sleep -Seconds $Seconds }
    }
    $failure = $null
    try { & $restoreScript -Version $Version -WaitSeconds $WaitSeconds }
    catch { $failure = $_ }
    if ($ErrorPattern) {
        Assert-True ($null -ne $failure -and $failure.Exception.Message -match $ErrorPattern) "Unexpected failure for ${Scenario}: $failure"
    } else {
        Assert-True ($null -eq $failure) "Unexpected failure for ${Scenario}: $failure"
    }
    Assert-True ($state.Calls.Count -eq $ExpectedCalls) "Unexpected restore count for $Scenario"
    Write-Host "PASS: $Scenario ($Version, wait=$WaitSeconds)"
}

Push-Location $testRoot
try {
    Test-Restore 'exact'
    $arguments = $state.Calls[0]
    Assert-True (($arguments | Select-Object -Skip 2) -join '|' -eq 'dotnet|restore|Generator/Generator.csproj|--no-http-cache|-p:RelewiseClientVersion=[1.2.3]') 'Exact restore arguments'
    Assert-True ($arguments[0] -eq '--kill-after=5s') 'Forced termination grace'
    $duration = [double]::Parse($arguments[1].TrimEnd('s'), [Globalization.CultureInfo]::InvariantCulture)
    Assert-True ($duration -gt 0 -and $duration -le 120) 'Attempt bounded by 120 seconds'
    $originalCulture = [Globalization.CultureInfo]::CurrentCulture
    try {
        [Globalization.CultureInfo]::CurrentCulture = [Globalization.CultureInfo]::GetCultureInfo('da-DK')
        Test-Restore 'exact' -WaitSeconds 1
        Assert-True ($state.Calls[0][1] -match '\A[0-9]+(?:\.[0-9]+)?s\z') 'Timeout duration uses invariant decimal format'
    } finally {
        [Globalization.CultureInfo]::CurrentCulture = $originalCulture
    }
    Test-Restore 'retry' -WaitSeconds 60 -ExpectedCalls 2
    Assert-True ($state.Sleeps.Count -eq 1 -and $state.Sleeps[0] -eq 30) 'Retry delay'
    foreach ($scenario in @('mismatch', 'missing', 'malformed', 'absent', 'duplicate')) {
        Test-Restore $scenario -WaitSeconds 60 -ErrorPattern '.'
        Assert-True ($state.Sleeps.Count -eq 0) 'Invalid assets must fail without retry'
    }
    Test-Restore 'failure' -ErrorPattern 'Refusing generation'
    $timer = [Diagnostics.Stopwatch]::StartNew()
    Test-Restore 'failure' -WaitSeconds 1 -ErrorPattern 'before the deadline'
    Test-Restore 'hang' -WaitSeconds 1 -ErrorPattern 'before the deadline'
    Assert-True ($timer.Elapsed.TotalSeconds -lt 8) 'Deadline bounds retries and hanging attempts'
    foreach ($version in @('', '*', '01.2.3', '1.02.3', '1.2.03', '1.2', '1.2.3-preview', 'v1.2.3', '1.2.3;true', "1.2.3`n")) {
        Test-Restore 'invalid version' -Version $version -ErrorPattern 'stable NuGet version' -ExpectedCalls 0
    }
    foreach ($wait in @('-1', '3601', '1.5', 'nope', '01', '')) {
        Test-Restore 'invalid wait' -WaitSeconds $wait -ErrorPattern 'whole seconds' -ExpectedCalls 0
    }
    if ($IsLinux) {
        # Exercise the complete helper -> GNU timeout -> dotnet process boundary.
        $null = New-Item -ItemType Directory -Path 'bin'
        $originalPath = $env:PATH
        try {
            $env:PATH = "${testRoot}/bin:$originalPath"
            @'
#!/usr/bin/env pwsh
Set-Content 'Generator/obj/project.assets.json' '{"libraries":{"Relewise.Client/1.2.3":{}}}'
exit 0
'@ | Set-Content 'bin/dotnet'
            & chmod +x bin/dotnet
            Assert-True ($LASTEXITCODE -eq 0) 'Make fake dotnet executable'
            & $restoreScript -Version '1.2.3'
            Assert-True ($LASTEXITCODE -eq 0) 'Real process restore succeeds'
            "#!/usr/bin/env pwsh`nStart-Sleep -Seconds 30" | Set-Content 'bin/dotnet'
            $timer = [Diagnostics.Stopwatch]::StartNew()
            $failure = $null
            try { & $restoreScript -Version '1.2.3' -WaitSeconds 1 }
            catch { $failure = $_ }
            Assert-True ($null -ne $failure -and $failure.Exception.Message -match 'before the deadline') 'Hanging restore fails at deadline'
            Assert-True ($timer.Elapsed.TotalSeconds -lt 8) 'Native timeout is bounded'
            Write-Host 'PASS: helper restores through GNU timeout and terminates a hanging restore'
        } finally {
            $env:PATH = $originalPath
        }
    } else {
        Write-Host 'SKIP: real GNU timeout check requires the Ubuntu CI runner'
    }
    Write-Host 'All restore regression tests passed.'
} finally {
    Pop-Location
    Remove-Item -LiteralPath $testRoot -Recurse -Force
}
# Expected native failures must not become the GitHub Actions step exit code.
exit 0
