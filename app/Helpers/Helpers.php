<?php
namespace App\Helpers;

class Helpers
{
    public static function makeSlug($string)
    {
        $LNSH = '/[^\-\s\pN\pL]+/u';
        $SADH   = '/[\-\s]+/';

        $string = preg_replace($LNSH, '', mb_strtolower($string, 'UTF-8'));
        $string = preg_replace($SADH, '-', $string);
        $string = trim($string, '-');

        return $string;
    }
}
