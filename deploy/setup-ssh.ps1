<#
.SYNOPSIS
    Tạo SSH key và hướng dẫn thêm vào Hostinger (chạy 1 lần duy nhất)
#>

$ScriptDir = $PSScriptRoot
$KeyFile   = Join-Path $ScriptDir 'hostinger_key'
$PubFile   = "$KeyFile.pub"

Write-Host ""
Write-Host "=== Thiết lập SSH Key cho Hostinger ===" -ForegroundColor Cyan
Write-Host ""

# Tạo key nếu chưa có
if (Test-Path $KeyFile) {
    Write-Host "✓ SSH key đã tồn tại: $KeyFile" -ForegroundColor Green
} else {
    Write-Host "Tạo SSH key ed25519..." -NoNewline
    ssh-keygen -t ed25519 -f $KeyFile -N "" -q 2>&1 | Out-Null
    if ($LASTEXITCODE -eq 0) {
        Write-Host " OK" -ForegroundColor Green
    } else {
        Write-Host " THẤT BẠI" -ForegroundColor Red
        exit 1
    }
}

# Hiện public key
Write-Host ""
Write-Host "─── PUBLIC KEY (copy nội dung này) ─────────────────────────────" -ForegroundColor Yellow
Get-Content $PubFile
Write-Host "─────────────────────────────────────────────────────────────────" -ForegroundColor Yellow
Write-Host ""

# Hướng dẫn
Write-Host "BƯỚC TIẾP THEO:" -ForegroundColor White
Write-Host ""
Write-Host "1. Vào hPanel → Hosting → Manage → SSH Access"
Write-Host "   (hoặc Advanced → SSH Keys)"
Write-Host ""
Write-Host "2. Click 'Add SSH Key'"
Write-Host "   Dán toàn bộ nội dung public key ở trên vào ô Key"
Write-Host "   Đặt tên tuỳ ý (vd: claude-code-deploy)"
Write-Host "   Click Save"
Write-Host ""
Write-Host "3. Kiểm tra kết nối (điền đúng user/host/port vào .env trước):"
Write-Host "   .\deploy.ps1 -DryRun" -ForegroundColor Cyan
Write-Host ""
Write-Host "Lưu ý: File private key ($KeyFile) KHÔNG được commit lên Git." -ForegroundColor DarkGray
Write-Host ""
