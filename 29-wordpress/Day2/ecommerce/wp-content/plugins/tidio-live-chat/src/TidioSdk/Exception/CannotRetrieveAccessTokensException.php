<?php

namespace TidioLiveChat\TidioSdk\Exception;

if (!defined('WPINC')) {
    die('File loaded directly. Exiting.');
}

class CannotRetrieveAccessTokensException extends \Exception
{
    const ACCESS_TOKENS_NOT_SET_ERROR_CODE = 'access_tokens_not_set';
    const DECRYPTION_FAILED_ERROR_CODE = 'decryption_failed';
    const INVALID_ACCESS_TOKENS_ERROR_CODE = 'invalid_access_tokens';
    const INVALID_RESPONSE_ERROR_CODE = 'invalid_response_code';
    const UNKNOWN_ERROR_CODE = 'access_tokens_unknown_error';

    /**
     * @var string
     */
    private $errorCode;

    /**
     * @param string $errorCode
     */
    public function __construct($errorCode)
    {
        $this->errorCode = $errorCode;
        parent::__construct('Cannot retrieve access tokens.');
    }

    /**
     * @return string
     */
    public function getErrorCode()
    {
        return $this->errorCode;
    }

    /**
     * @return self
     */
    public static function withAccessTokensNotSetErrorCode()
    {
        return new self(self::ACCESS_TOKENS_NOT_SET_ERROR_CODE);
    }

    /**
     * @return self
     */
    public static function withDecryptionFailedErrorCode()
    {
        return new self(self::DECRYPTION_FAILED_ERROR_CODE);
    }

    /**
     * @return self
     */
    public static function withInvalidAccessTokensErrorCode()
    {
        return new self(self::INVALID_ACCESS_TOKENS_ERROR_CODE);
    }

    /**
     * @param int $statusCode
     * @return self
     */
    public static function withInvalidResponseErrorCode($statusCode)
    {
        $errorCode = sprintf('%s_%d', self::INVALID_RESPONSE_ERROR_CODE, $statusCode);
        return new self($errorCode);
    }

    /**
     * @return self
     */
    public static function withUnknownErrorCode()
    {
        return new self(self::UNKNOWN_ERROR_CODE);
    }
}
