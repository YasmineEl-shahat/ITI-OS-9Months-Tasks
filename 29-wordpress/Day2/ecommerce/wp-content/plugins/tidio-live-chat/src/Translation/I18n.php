<?php

namespace TidioLiveChat\Translation;

if (!defined('WPINC')) {
    die('File loaded directly. Exiting.');
}

use TidioLiveChat\TidioLiveChat;

class I18n
{
    /**
     * echo translation
     */
    public static function _e($message)
    {
        _e($message, TidioLiveChat::TIDIO_PLUGIN_TECHNICAL_NAME);
    }

    /**
     * returns translation
     */
    public static function _t($message)
    {
        return __($message, TidioLiveChat::TIDIO_PLUGIN_TECHNICAL_NAME);
    }
}
