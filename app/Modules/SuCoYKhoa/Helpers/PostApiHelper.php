<?php

namespace App\Modules\SuCoYKhoa\Helpers;

class PostApiHelper
{
    const END_POINT = "https://dieuhanh1.tthgroup.vn:81/api/createSCYK";
    public static function postDataToHDH($params)
    {
        try {
            $ch = curl_init(self::END_POINT);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 15);
            curl_setopt($ch, CURLOPT_TIMEOUT, 15);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

            $response = curl_exec($ch);
            curl_close($ch);

            if ($response === false) {
                throw new \Exception(curl_error($ch), curl_errno($ch));
            }
            return json_decode($response, true);
        } catch (\Exception $e) {
            dd($e);
        }
    }
}
