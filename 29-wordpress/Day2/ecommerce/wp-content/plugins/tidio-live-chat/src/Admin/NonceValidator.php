<?php

namespace TidioLiveChat\Admin;

if (!defined('WPINC')) {
    die('File loaded directly. Exiting.');
}

use TidioLiveChat\Utils\QueryParameters;

class NonceValidator
{
    /**
     * @param string $nonce
     * @return bool
     */
    public function isRequestNonceValid($nonce)
    {
        if (!QueryParameters::has('_wpnonce')) {
            return false;
        }

        return (bool) wp_verify_nonce(QueryParameters::get('_wpnonce'), $nonce);
    }
}
