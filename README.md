Cross platform 128bit AES encryption / decryption.
========
This project contains the implementation of 128 bit AES encryption which works on all the platforms (C#, iOS(Swift), Java Android, PHP and Java backend). 

<b>Platforms Supported:</b>

1. iOS Swift4)

2. Java Android

3. Dot Net (C#) [Also works with .Net Core]

4. Java Backend

5. PHP

<b>Features:</b>

Cross platform support. Encryption-Decryption works across C#, Swift, Java and PHP. 


<b>How to encrypt/decrypt a string:</b>

See code samples for more details. You'll have to perform following steps:

1. Use a common secret key across all platform.
2. Call the CryptoHelper.encrypt(String) for encryption.
3. Call the CryptoHelper.decrypt(String) for decryption.

#PHP Uses
<pre>
<?php
include_once "./Helper/CryptoHelper.php";

$input = "Text to encrypt";
echo "input:". $input."</br>";
$cipher = CryptoHelper::encrypt($input);
echo "cipher:". $cipher."</br>";
$output = CryptoHelper::decrypt($cipher);
echo "output:".$output;

?>
</pre>
