<?php

namespace TidioLiveChat\Http\Client;

if (!defined('WPINC')) {
    die('File loaded directly. Exiting.');
}

use TidioLiveChat\Http\Exception\ErrorResponseException;
use TidioLiveChat\Http\Exception\HttpClientException;
use TidioLiveChat\Http\Exception\UnauthorizedResponseException;
use TidioLiveChat\Http\HttpClient;
use TidioLiveChat\Utils\Url;

class CurlHttpClient implements HttpClient
{
    /**
     * @var string
     */
    private $apiUrl;
    /**
     * @var string[]
     */
    private $headers;

    /**
     * @param string $apiUrl
     * @param string[] $additionalHeaders
     */
    public function __construct($apiUrl, $additionalHeaders = [])
    {
        $this->apiUrl = $apiUrl;
        $this->headers = array_merge(
            [
                'Content-Type: application/json',
                'Accept: application/json'
            ],
            $additionalHeaders
        );
    }

    /**
     * @inerhitDoc
     */
    public function sendPostRequest($path, $data = [])
    {
        $url = Url::build($this->apiUrl, $path);
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $this->headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Tidio WordPress plugin');

        $response = curl_exec($ch);
        $responseInfo = curl_getinfo($ch);
        curl_close($ch);

        $responseData = $this->parseResponseData($response, $responseInfo);
        $this->validateResponse($responseData, $responseInfo);

        return $responseData;
    }

    /**
     * @inerhitDoc
     */
    public function sendGetRequest($path)
    {
        $url = Url::build($this->apiUrl, $path);
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $this->headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Tidio WordPress plugin');

        $response = curl_exec($ch);
        $responseInfo = curl_getinfo($ch);
        curl_close($ch);

        $responseData = $this->parseResponseData($response, $responseInfo);
        $this->validateResponse($responseData, $responseInfo);

        return $responseData;
    }

    /**
     * @param string|false $response
     * @param array<string, mixed> $responseInfo
     * @return array<string, mixed>
     */
    private function parseResponseData($response, $responseInfo)
    {
        $headerSize = $responseInfo['header_size'];
        $responseBody = substr($response, $headerSize);
        $responseData = json_decode($responseBody, true);

        if (false === $responseData) {
            return [];
        }

        return $responseData;
    }

    /**
     * @param array<string, mixed> $responseData
     * @param array<string, mixed> $responseInfo
     * @throws HttpClientException
     */
    private function validateResponse($responseData, $responseInfo)
    {
        $statusCode = $responseInfo['http_code'];
        if ($statusCode === 401) {
            throw new UnauthorizedResponseException();
        }

        if ($statusCode < 200 || $statusCode >= 300) {
            throw ErrorResponseException::withResponse($statusCode, $responseData);
        }
    }
}
