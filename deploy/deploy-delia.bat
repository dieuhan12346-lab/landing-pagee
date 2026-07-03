@echo off
cd /d "%~dp0"
uv run --with paramiko deploy-delia.py %*
