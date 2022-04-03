<?php
declare(strict_types=1);

namespace App\Core;


class Helper
{
    use SingletonTrait;

    public static function upFirstLetter(string $string, string $encoding = 'utf-8')
    {
        return mb_strtoupper(mb_substr($string, 0, 1, $encoding), $encoding)
            . mb_substr($string, 1, null, $encoding);
    }
}
