@echo off
:: Luxora Theme Deploy Launcher
:: Wrapper ngắn — dùng PowerShell để chạy deploy.ps1
powershell -ExecutionPolicy Bypass -File "%~dp0deploy.ps1" %*
