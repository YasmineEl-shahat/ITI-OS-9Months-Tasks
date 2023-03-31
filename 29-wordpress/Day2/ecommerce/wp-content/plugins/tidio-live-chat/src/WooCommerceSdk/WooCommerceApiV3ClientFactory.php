<?php

namespace TidioLiveChat\WooCommerceSdk;

if (!defined('WPINC')) {
    die('File loaded directly. Exiting.');
}

use TidioLiveChat\Http\Client\CurlHttpClient;
use TidioLiveChat\Http\Client\FileGetContentsHttpClient;
use TidioLiveChat\Http\HttpClient;

class WooCommerceApiV3ClientFactory
{
    /**
     * @return HttpClient
     */
    public function create()
    {
        $apiUrl = get_rest_url(null, 'wc/v3');
        if (function_exists('curl_version')) {
            return new CurlHttpClient($apiUrl);
        }

        return new FileGetContentsHttpClient($apiUrl);
    }
}
