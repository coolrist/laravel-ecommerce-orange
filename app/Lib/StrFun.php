<?php

namespace App\Lib;

use Str;

/**
 * Summary of StrFun
 */
class StrFun {

    public static function sanitize(string $strIn): string {
        $tags = ['<p>', '<br>', '<ol>', '<ul>', '<li>', '<table>', '<tbody>', '<td>', '<tr>', '<th>'];
        $strIn = str_replace("{", "", str_replace("}", "", $strIn));
        $strIn = str_replace("--", "", strip_tags($strIn, $tags));
        return trim($strIn);
    }

    public static function backgroundImage(string $url) {
        return Str::of('style="background-image: url(' . asset($url) . ');"')->toHtmlString();
    }

}
