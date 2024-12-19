<?php

namespace Mailjet\Utility;

final class StringUtility
{
    /**
     * This method is used to encode a string to UTF-8 notations for using in Subject.
     *
     * @param  string $string
     * @return string
     */
    public static function utfStringNotation(string $string): string
    {
        return sprintf('=?UTF-8?B?%s?=', base64_encode($string));
    }
}
