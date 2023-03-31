<?php

namespace TidioLiveChat;

if (!defined('WPINC')) {
    die('File loaded directly. Exiting.');
}

final class Config
{
    /**
     * @var array|null
     */
    private static $config = null;

    /**
     * @return string
     */
    public static function getApiUrl()
    {
        return self::getConfig()['tidio_api_url'];
    }

    /**
     * @return string
     */
    public static function getPanelUrl()
    {
        return self::getConfig()['tidio_panel_url'];
    }

    /**
     * @return string
     */
    public static function getWidgetUrl()
    {
        return self::getConfig()['tidio_widget_url'];
    }

    /**
     * @return array<string, string>
     */
    private static function getConfig()
    {
        if (self::$config === null) {
            self::$config = require __DIR__ . '/../config.php';
        }

        return self::$config;
    }
}
