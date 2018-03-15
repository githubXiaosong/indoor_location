<?php

/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/3/15
 * Time: 11:52
 */

namespace App\Utils;

class Helper
{

    public static function post($url, $post_data = '', $timeout = 5)
    {

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);

        curl_setopt($ch, CURLOPT_POST, 1);

        if ($post_data != '') {

            curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);

        }

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);

        curl_setopt($ch, CURLOPT_HEADER, false);

        $file_contents = curl_exec($ch);

        curl_close($ch);

        return $file_contents;

    }
}