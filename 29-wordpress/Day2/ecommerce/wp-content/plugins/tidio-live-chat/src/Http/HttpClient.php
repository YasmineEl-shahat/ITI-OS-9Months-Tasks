<?php

namespace TidioLiveChat\Http;

if (!defined('WPINC')) {
    die('File loaded directly. Exiting.');
}

use TidioLiveChat\Http\Exception\ErrorResponseException;
use TidioLiveChat\Http\Exception\UnauthorizedResponseException;

interface HttpClient
{
    /**
     * @param string $path
     * @param array<string, mixed> $data
     * @return array<string, mixed>
     * @throws UnauthorizedResponseException
     * @throws ErrorResponseException
     */
    public function sendPostRequest($path, $data = []);

    /**
     * @param string $path
     * @return array<string, mixed>
     * @throws UnauthorizedResponseException
     * @throws ErrorResponseException
     */
    public function sendGetRequest($path);
}
