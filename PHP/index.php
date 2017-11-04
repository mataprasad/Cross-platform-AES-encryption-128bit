<?php
include_once "./Helper/CryptoHelper.php";

$input = "Text to encrypt";
echo "input:". $input."</br>";
$cipher = CryptoHelper::encrypt($input);
echo "cipher:". $cipher."</br>";
$output = CryptoHelper::decrypt($cipher);
echo "output:".$output;

?>