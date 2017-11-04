<?php

class CryptoHelper
{
    private static $SECRET_KEY = "1234567890abcder";//16 char secret key

    /**
     * @param string $str
     * @param bool $isBinary whether to encrypt as binary or not. Default is: false
     * @return string Encrypted data
     */
    public static function encrypt($str1, $isBinary = false)
    {
        $size = 32;//mcrypt_get_block_size('aes', 'cbc'); 
        $str = CryptoHelper::pkcs5_pad($str1); 

        $iv = CryptoHelper::$SECRET_KEY;
        $str = $isBinary ? $str : utf8_decode($str);

        $td = mcrypt_module_open('rijndael-128', ' ', 'cbc', $iv);

        mcrypt_generic_init($td, CryptoHelper::$SECRET_KEY, $iv);
        $encrypted = mcrypt_generic($td, $str);

        mcrypt_generic_deinit($td);
        mcrypt_module_close($td);

        return $isBinary ? $encrypted : base64_encode($encrypted);
    }

    /**
     * @param string $code
     * @param bool $isBinary whether to decrypt as binary or not. Default is: false
     * @return string Decrypted data
     */
    public static function decrypt($code, $isBinary = false)
    {
        $code = $isBinary ? $code : base64_decode($code);
        $iv = CryptoHelper::$SECRET_KEY;

        $td = mcrypt_module_open('rijndael-128', ' ', 'cbc', $iv);

        mcrypt_generic_init($td, CryptoHelper::$SECRET_KEY, $iv);
        $decrypted = mdecrypt_generic($td, $code);

        mcrypt_generic_deinit($td);
        mcrypt_module_close($td);

        return $isBinary ? trim($decrypted) : utf8_encode(trim(CryptoHelper::pkcs5_unpad($decrypted)));
    }

    private static function pkcs5_pad ($text) 
    { 
        $size = mcrypt_get_block_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);
        $pad = $size - (strlen($text) % $size);
        return $text . str_repeat(chr($pad), $pad);
    } 
    
    private static function pkcs5_unpad($text) 
    { 
        $pad = ord($text{strlen($text)-1}); 
        if ($pad > strlen($text)) return false; 
        if (strspn($text, chr($pad), strlen($text) - $pad) != $pad) return false; 
        return substr($text, 0, -1 * $pad); 
    }

}