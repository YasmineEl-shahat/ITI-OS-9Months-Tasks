<?php

namespace TidioLiveChat\Encryption\Exception;

if (!defined('WPINC')) {
    die('File loaded directly. Exiting.');
}

class DecryptionFailedException extends \Exception
{
    const INVALID_HASH_ERROR_CODE = 'invalid_hash';

    /**
     * @return DecryptionFailedException
     */
    public static function withInvalidHashErrorCode()
    {
        return new self(self::INVALID_HASH_ERROR_CODE);
    }
}
