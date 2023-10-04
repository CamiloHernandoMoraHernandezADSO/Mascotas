<?php

namespace adso\Mascotas\libs;

class  Helper
{
    function __construct()
    {
    }

    public static function encrypt($data)
    {
        $key = base64_decode(KEY);
        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length("aes-256-cbc"));
        $string = openssl_encrypt($data, "aes-256-cbc", $key, 0, $iv);
        return base64_encode($string . "::" . base64_encode($iv));
    }

    public static function decrypt($data)
    {
        $key = base64_decode(KEY);
        list($string, $iv) = array_pad(explode("::", base64_decode($data), 2), 2, null);
        return openssl_decrypt($string, "aes-256-cbc", $key, 0, base64_decode($iv));
    }
}