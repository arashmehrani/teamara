<?php

namespace App\Helpers;

class Helpers
{
    public static function makeSlug($string)
    {
        $LNSH = '/[^\-\s\pN\pL]+/u';
        $SADH = '/[\-\s]+/';

        $string = preg_replace($LNSH, '', mb_strtolower($string, 'UTF-8'));
        $string = preg_replace($SADH, '-', $string);
        $string = trim($string, '-');

        return $string;
    }

    public static function changeEnvironmentVariable($key, $value)
    {
        $path = base_path('.env');

        if (is_bool(env($key))) {
            $old = env($key) ? 'true' : 'false';
        } elseif (env($key) === null) {
            $old = 'null';
        } else {
            $old = env($key);
        }

        if (file_exists($path)) {
            file_put_contents($path, str_replace(
                "$key=" . $old, "$key=" . $value, file_get_contents($path)
            ));
        }
    }
}
