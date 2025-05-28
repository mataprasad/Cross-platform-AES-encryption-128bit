import { createCipheriv, createDecipheriv, randomBytes } from 'crypto';

export class CryptoHelperJs {
  static SECRET_KEY = '12356trewqasd45'; // 16-character key
  static ALGORITHM = 'aes-128-cbc';
  static BLOCK_SIZE = 16;

  static encrypt(text, isBinary = false) {
    if (!text) return null;

    const iv = Buffer.from(CryptoHelperJs.SECRET_KEY, 'utf8');
    const key = Buffer.from(CryptoHelperJs.SECRET_KEY, 'utf8');
    const padded = CryptoHelperJs.pkcs5Pad(text);

    const cipher = createCipheriv(CryptoHelperJs.ALGORITHM, key, iv);
    let encrypted = cipher.update(padded, 'utf8', isBinary ? 'binary' : 'base64');
    encrypted += cipher.final(isBinary ? 'binary' : 'base64');

    return encrypted;
  }

  static decrypt(encrypted, isBinary = false) {
    if (!encrypted) return null;

    const iv = Buffer.from(CryptoHelperJs.SECRET_KEY, 'utf8');
    const key = Buffer.from(CryptoHelperJs.SECRET_KEY, 'utf8');

    const decipher = createDecipheriv(CryptoHelperJs.ALGORITHM, key, iv);
    let decrypted = decipher.update(encrypted, isBinary ? 'binary' : 'base64', 'utf8');
    decrypted += decipher.final('utf8');

    return isBinary ? decrypted.trim() : CryptoHelperJs.pkcs5Unpad(decrypted.trim());
  }

  static pkcs5Pad(text) {
    const pad = CryptoHelperJs.BLOCK_SIZE - (Buffer.byteLength(text) % CryptoHelperJs.BLOCK_SIZE);
    return text + String.fromCharCode(pad).repeat(pad);
  }

  static pkcs5Unpad(text) {
    const pad = text.charCodeAt(text.length - 1);
    if (pad > text.length) return text;
    if (!text.endsWith(String.fromCharCode(pad).repeat(pad))) return text;
    return text.slice(0, -pad);
  }
}
