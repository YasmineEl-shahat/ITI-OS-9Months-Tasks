<?php

namespace TidioLiveChat\Encryption\Service;

if (!defined('WPINC')) {
    die('File loaded directly. Exiting.');
}

use TidioLiveChat\Encryption\EncryptionService;

class PlainTextEncryptionService implements EncryptionService
{
    /**
     * @inerhitDoc
     */
    public function encrypt($value)
    {
        return $value;
    }

    /**
     * @inerhitDoc
     */
    public function decrypt($encryptedString)
    {
        return $encryptedString;
    }
}
