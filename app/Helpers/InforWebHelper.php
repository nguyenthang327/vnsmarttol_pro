<?php

namespace App\Helpers;

class InforWebHelper
{
    public static function getAgent(){
        $agent = '';
        if (isset($_SERVER['HTTP_USER_AGENT'])) {
            $agent = $_SERVER['HTTP_USER_AGENT'];
        }

        return $agent;
    }

    public static function getDomain(){
        $domain = $_SERVER['HTTP_HOST'];
        $pos = strpos($domain, 'www.');
        if ($pos !== false) {
            $domain = str_replace("www.", "", $domain);
        }

        return $domain;
    }
}