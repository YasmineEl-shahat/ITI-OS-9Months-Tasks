<?php

namespace TidioLiveChat\TidioSdk;

if (!defined('WPINC')) {
    die('File loaded directly. Exiting.');
}

use TidioLiveChat\Config;
use TidioLiveChat\Http\Client\CurlHttpClient;
use TidioLiveChat\Http\Client\FileGetContentsHttpClient;
use TidioLiveChat\Http\HttpClient;

class TidioApiClientFactory
{
    /**
     * @return HttpClient
     */
    public function create()
    {
        $apiUrl = Config::getApiUrl();
        if (function_exists('curl_version')) {
            return new CurlHttpClient($apiUrl);
        }

        return new FileGetContentsHttpClient($apiUrl);
    }

    /**
     * @param string $token
     * @return HttpClient
     */
    public function createAuthenticated($token)
    {
        $apiUrl = Config::getApiUrl();
        $authorizationHeader = ['Authorization: Bearer ' . $token];
        if (function_exists('curl_version')) {
            return new CurlHttpClient($apiUrl, $authorizationHeader);
        }

        return new FileGetContentsHttpClient($apiUrl, $authorizationHeader);
    }
}
