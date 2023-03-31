<?php

namespace TidioLiveChat\Http\Exception;

if (!defined('WPINC')) {
    die('File loaded directly. Exiting.');
}

class UnauthorizedResponseException extends HttpClientException
{
}
