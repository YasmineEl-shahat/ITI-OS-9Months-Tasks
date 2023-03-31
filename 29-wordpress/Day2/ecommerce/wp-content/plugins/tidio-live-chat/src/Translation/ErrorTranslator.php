<?php

namespace TidioLiveChat\Translation;

if (!defined('WPINC')) {
    die('File loaded directly. Exiting.');
}

class ErrorTranslator
{
    const ERROR_CODE_FALLBACK_MESSAGE = 'The integration process has been interrupted. An error has occurred (%s). Please try again later or contact our support team.';

    /**
     * @param string $errorCode
     * @return string
     */
    public function translate($errorCode)
    {
        return sprintf(I18n::_t(self::ERROR_CODE_FALLBACK_MESSAGE), $errorCode);
    }
}
