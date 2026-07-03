<#
.SYNOPSIS
    Luxora Theme Deploy - calls deploy.py via uv (SFTP, fast, single connection)
.PARAMETER DryRun
    Preview only - no upload.
.PARAMETER Yes
    Auto-confirm without prompting.
.PARAMETER File
    Deploy a single file, e.g. assets/css/woocommerce.css
.EXAMPLE
    .\deploy.ps1 -DryRun
    .\deploy.ps1
    .\deploy.ps1 -Yes
    .\deploy.ps1 -File "assets/css/woocommerce.css"
#>
[CmdletBinding()]
param(
    [switch]$DryRun,
    [switch]$Yes,
    [string]$File
)

$ScriptDir = $PSScriptRoot
$args_ = @()
if ($DryRun) { $args_ += '--dry-run' }
if ($Yes)    { $args_ += '--yes' }
if ($File)   { $args_ += '--file'; $args_ += $File }

uv run --with paramiko (Join-Path $ScriptDir 'deploy.py') @args_
