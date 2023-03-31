<?php

namespace TidioLiveChat\Http\Exception;

if (!defined('WPINC')) {
    die('File loaded directly. Exiting.');
}

abstract class HttpClientException extends \Exception
{
}
