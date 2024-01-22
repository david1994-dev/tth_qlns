<?php

namespace App\Modules\SuCoYKhoa\Helpers;

class PostApiHelper
{
    private static function callPostApi($path, $params)
    {
        $ch = curl_init($path);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 15);
        curl_setopt($ch, CURLOPT_TIMEOUT, 15);
        $response = curl_exec($ch);
        curl_close($ch);

        return json_decode($response, true);
    }

    public static function postDataToHDH($path, $params)
    {
        self::callPostApi($path, $params);
    }
}
