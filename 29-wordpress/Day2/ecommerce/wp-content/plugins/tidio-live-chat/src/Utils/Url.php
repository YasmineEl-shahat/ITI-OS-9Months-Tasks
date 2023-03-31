<?php

namespace TidioLiveChat\Utils;

if (!defined('WPINC')) {
    die('File loaded directly. Exiting.');
}

class Url
{
    /**
     * @param string $url
     * @param string $path
     * @return string
     */
    public static function build($url, $path)
    {
        return sprintf(
            '%s/%s',
            rtrim($url, '/'),
            ltrim($path, '/')
        );
    }
}
