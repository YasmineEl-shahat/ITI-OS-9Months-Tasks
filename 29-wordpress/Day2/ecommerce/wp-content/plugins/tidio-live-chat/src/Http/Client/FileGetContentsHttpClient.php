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

class FileGetContentsHttpClient implements HttpClient
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
                'Accept: application/json',
                'User-Agent: Tidio WordPress plugin'
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
        $content = http_build_query($data);
        $headers = array_merge([
            'Content-Type: application/x-www-form-urlencoded',
            'Content-Length: ' . strlen($content)
        ], $this->headers);
        $options = [
            'http' => [
                'method' => 'POST',
                'header' => $this->prepareRequestHeaders($headers),
                'content' => http_build_query($data),
                'ignore_errors' => true
            ]
        ];

        $context = stream_context_create($options);
        $response = @file_get_contents($url, false, $context);

        $responseData = $this->parseResponseData($response);
        $this->validateResponse($responseData, $http_response_header);

        return $responseData;
    }

    /**
     * @inerhitDoc
     */
    public function sendGetRequest($path)
    {
        $url = Url::build($this->apiUrl, $path);
        $options = [
            'http' => [
                'method' => 'GET',
                'header' => $this->prepareRequestHeaders($this->headers),
                'ignore_errors' => true
            ]
        ];

        $context = stream_context_create($options);
        $response = @file_get_contents($url, false, $context);

        $responseData = $this->parseResponseData($response);
        $this->validateResponse($responseData, $http_response_header);

        return $responseData;
    }

    /**
     * @param string[] $headers
     * @return string
     */
    private function prepareRequestHeaders($headers)
    {
        $headerString = '';
        foreach ($headers as $header) {
            $headerString .= $header . "\r\n";
        }

        return $headerString;
    }

    /**
     * @param string|false $response
     * @return array<string, mixed>
     */
    private function parseResponseData($response)
    {
        if (false === $response) {
            return [];
        }

        return json_decode($response, true);
    }

    /**
     * @param array<string, mixed> $responseData
     * @param string[] $responseHeaders
     * @throws HttpClientException
     */
    private function validateResponse($responseData, $responseHeaders)
    {
        $statusCode = $this->parseStatusCodeFromHeaders($responseHeaders);
        if ($statusCode === 401) {
            throw new UnauthorizedResponseException();
        }

        if ($statusCode < 200 || $statusCode >= 300) {
            throw ErrorResponseException::withResponse($statusCode, $responseData);
        }
    }

    /**
     * @param string[] $responseHeaders
     * @return int
     */
    private function parseStatusCodeFromHeaders($responseHeaders)
    {
        $statusCodeFallback = 500;
        if (!isset($responseHeaders[0])) {
            // cannot retrieve status code from headers, return 500 as fallback
            return $statusCodeFallback;
        }

        $responseStatusHeader = $responseHeaders[0];
        preg_match('/^HTTP\/\S*\s(\d{3})\s.+$/', $responseStatusHeader, $statusCodeResult);

        $statusCode = end($statusCodeResult);
        return $statusCode ? (int) $statusCode : $statusCodeFallback;
    }
}
