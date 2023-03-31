<?php

namespace TidioLiveChat\TidioSdk\Exception;

if (!defined('WPINC')) {
    die('File loaded directly. Exiting.');
}

class CannotIntegrateWithProjectException extends \Exception
{
    const UNAUTHORIZED_ERROR_CODE = 'unauthorized';
    const UNKNOWN_ERROR_CODE = 'unknown_error';

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
        parent::__construct('Cannot integrate with project.');
    }

    /**
     * @return string
     */
    public function getErrorCode()
    {
        return $this->errorCode;
    }

    /**
     * @param string $errorCode
     * @return self
     */
    public static function withErrorCode($errorCode)
    {
        return new self($errorCode);
    }

    /**
     * @return self
     */
    public static function withUnknownErrorCode()
    {
        return new self(self::UNKNOWN_ERROR_CODE);
    }

    /**
     * @return self
     */
    public static function withUnauthorizedErrorCode()
    {
        return new self(self::UNAUTHORIZED_ERROR_CODE);
    }
}
