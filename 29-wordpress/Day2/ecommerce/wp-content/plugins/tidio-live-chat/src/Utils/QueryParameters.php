<?php

namespace TidioLiveChat\Utils;

if (!defined('WPINC')) {
    die('File loaded directly. Exiting.');
}

class QueryParameters
{
    /**
     * @param string $key
     * @return bool
     */
    public static function has($key)
    {
        return isset($_GET[$key]);
    }

    /**
     * @param string $key
     * @return string|null
     */
    public static function get($key)
    {
        if (!self::has($key)) {
            return null;
        }

        return sanitize_text_field($_GET[$key]);
    }
}
