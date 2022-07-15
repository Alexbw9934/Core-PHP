<?php
    /*$encrypted;
    $keySize = 128;
    $iterationCount = 1000;*/
    
    function encyrpt($salt, $iv, $password, $text) {
        $keySize = 128;
        $iterationCount = 1000;
        $salt1 = hex2bin($salt);
        $IVbytes = hex2bin($iv);
        $hash = openssl_pbkdf2($password, $salt1, $keySize, $iterationCount, 'sha1');
        $encrypted = openssl_encrypt($text, 'AES-128-CBC', $hash, OPENSSL_RAW_DATA, substr($IVbytes, 0, ($keySize / 8)));
        return base64_encode($encrypted);
    }

    function decrypt($salt, $iv, $password, $text) {
        
        $keySize = 128;
        $iterationCount = 1000;
        $salt1 = hex2bin($salt);
        $IVbytes = hex2bin($iv);
        $hash = openssl_pbkdf2($password, $salt1, $keySize, $iterationCount, 'sha1');
        $decrypted = openssl_decrypt(base64_decode($text), 'AES-128-CBC', $hash, OPENSSL_RAW_DATA, substr($IVbytes, 0, ($keySize / 8)));
        return $decrypted;
    }
    
    function generateKey16Bit() {
        return bin2hex(openssl_random_pseudo_bytes(16));
    }
    
    function generateKey32Bit() {
        return bin2hex(openssl_random_pseudo_bytes(32));
    }
    
    function generatePasswordKey($key) {
        return bin2hex($key);
    }
?>