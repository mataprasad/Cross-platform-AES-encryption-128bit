// tested with nodejs22

import { CryptoHelperJs } from './crypto-helper.js';

const encrypted = CryptoHelperJs.encrypt('Hello World!');
console.log('Encrypted:', encrypted);

const decrypted = CryptoHelperJs.decrypt(encrypted);
console.log('Decrypted:', decrypted);
