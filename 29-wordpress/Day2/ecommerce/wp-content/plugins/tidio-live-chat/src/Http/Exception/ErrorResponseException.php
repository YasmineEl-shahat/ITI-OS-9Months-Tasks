<?php

namespace TidioLiveChat\Http\Exception;

if (!defined('WPINC')) {
    die('File loaded directly. Exiting.');
}

class ErrorResponseException extends HttpClientException
{
    /**
     * @var int
     */
    private $statusCode;
    /**
     * @var array $responseData
     */
    private $responseData;

    /**
     * @param int $statusCode
     * @param array $responseData
     */
    public function __construct($statusCode, $responseData = [])
    {
        $this->statusCode = $statusCode;
        $this->responseData = $responseData;
        parent::__construct('Http client exception');
    }

    /**
     * @return int
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * @return array
     */
    public function getResponseData()
    {
        return $this->responseData;
    }

    /**
     * @param int $statusCode
     * @param array $responseData
     * @return self
     */
    public static function withResponse($statusCode, $responseData)
    {
        return new self($statusCode, $responseData);
    }
}
