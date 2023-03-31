<?php

namespace TidioLiveChat\TidioSdk\Dto;

if (!defined('WPINC')) {
    die('File loaded directly. Exiting.');
}

class ApiCredentialsDto
{
    /**
     * @var string
     */
    private $accessToken;
    /**
     * @var string
     */
    private $refreshToken;

    /**
     * @param string $accessToken
     * @param string $refreshToken
     */
    public function __construct($accessToken, $refreshToken)
    {
        $this->accessToken = $accessToken;
        $this->refreshToken = $refreshToken;
    }

    /**
     * @return string
     */
    public function getAccessToken()
    {
        return $this->accessToken;
    }

    /**
     * @return string
     */
    public function getRefreshToken()
    {
        return $this->refreshToken;
    }
}
