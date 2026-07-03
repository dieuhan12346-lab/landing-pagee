"""Tao Ed25519 SSH key cho Delia deploy"""
import sys
sys.stdout.reconfigure(encoding='utf-8', errors='replace')
from pathlib import Path
from cryptography.hazmat.primitives.asymmetric.ed25519 import Ed25519PrivateKey
from cryptography.hazmat.primitives.serialization import (
    Encoding, PrivateFormat, PublicFormat, NoEncryption
)

out = Path(__file__).parent
priv_path = out / 'hostinger_key_delia'
pub_path  = out / 'hostinger_key_delia.pub'

key = Ed25519PrivateKey.generate()
priv_path.write_bytes(key.private_bytes(Encoding.PEM, PrivateFormat.OpenSSH, NoEncryption()))
pub_bytes = key.public_key().public_bytes(Encoding.OpenSSH, PublicFormat.OpenSSH)
pub_path.write_bytes(pub_bytes + b'\n')

print("Key created!")
print(f"  Private: {priv_path}")
print(f"  Public:  {pub_path}")
print()
print("=== PUBLIC KEY (copy vao Hostinger SSH Keys) ===")
print(pub_bytes.decode())
