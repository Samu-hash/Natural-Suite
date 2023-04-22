<?php

namespace App\Libraries;

use CodeIgniter\Config\Services;
use Config\Encryption;

class Encripter {

    protected static function config(): Encryption
    {
        $config = new Encryption();
        $config->key = getenv('encryption.key');
        $config->driver = getenv('encryption.driver');
        return $config;
    }

    public static function encrypter(String $value)
    {
        $e = Services::encrypter(self::config());
        return bin2hex($e->encrypt($value));
    }

    public static function decrypt(String $hash)
    {
        $e = Services::encrypter(self::config());
        return $e->decrypt(hex2bin($hash));
    }
}