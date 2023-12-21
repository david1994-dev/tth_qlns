<?php
use \Illuminate\Encryption\Encrypter;
use Illuminate\Support\Facades\Config;

const KEY_CRYPT_DATA = 'TTH@HDHw7VrpznNnga9LEGQoGvtL3H3m';

function encryptData($data): string
{
    $crypt = new Encrypter(KEY_CRYPT_DATA, Config::get('app.cipher' ));
    return $crypt->encrypt($data);
}

function decryptData($data): string
{
    $crypt = new Encrypter(KEY_CRYPT_DATA, Config::get('app.cipher' ));
    return $crypt->decrypt($data);
}
