<?php

namespace TidioLiveChat;

if (!defined('WPINC')) {
    die('File loaded directly. Exiting.');
}

use TidioLiveChat\Encryption\Exception\DecryptionFailedException;
use TidioLiveChat\Encryption\Service\OpenSslEncryptionService;

class IntegrationState
{
    const PUBLIC_KEY_OPTION = 'tidio-one-public-key';
    const PRIVATE_KEY_OPTION = 'tidio-one-private-key';
    const ASYNC_LOAD_OPTION = 'tidio-async-load';
    const TIDIO_OAUTH_ACCESS_TOKEN_KEY = 'tidio-access-token';
    const TIDIO_OAUTH_REFRESH_TOKEN_KEY = 'tidio-refresh-token';
    const TIDIO_ACCESS_TOKENS_VALID_KEY = 'tidio-access-tokens-valid-token';
    const TIDIO_WOOCOMMERCE_INTEGRATED = 'tidio-woocommerce-integrated';

    /**
     * @var OpenSslEncryptionService
     */
    private $encryptionService;

    /**
     * @param OpenSslEncryptionService $encryptionService
     */
    public function __construct($encryptionService)
    {
        $this->encryptionService = $encryptionService;
    }

    /**
     * @return string|null
     */
    public function getProjectPublicKey()
    {
        return get_option(self::PUBLIC_KEY_OPTION, null);
    }

    /**
     * @return string|null
     */
    public function getProjectPrivateKey()
    {
        return get_option(self::PRIVATE_KEY_OPTION, null);
    }

    /**
     * @return bool
     */
    public function hasProjectPrivateKey()
    {
        return !empty(get_option(self::PRIVATE_KEY_OPTION, null));
    }

    /**
     * @return bool
     */
    private function hasAccessTokens()
    {
        return !empty(get_option(self::TIDIO_OAUTH_ACCESS_TOKEN_KEY, null))
            && !empty(get_option(self::TIDIO_OAUTH_REFRESH_TOKEN_KEY, null));
    }

    /**
     * @return bool
     */
    public function hasValidAccessTokens()
    {
        if (!$this->hasAccessTokens()) {
            return false;
        }

        return (bool) get_option(self::TIDIO_ACCESS_TOKENS_VALID_KEY, true);
    }

    /**
     * @return string
     * @throws DecryptionFailedException
     */
    public function getRefreshToken()
    {
        $encryptedRefreshToken = get_option(self::TIDIO_OAUTH_REFRESH_TOKEN_KEY, '');
        return $this->encryptionService->decrypt($encryptedRefreshToken);
    }

    /**
     * @return bool
     */
    public function isPluginIntegrated()
    {
        return !empty(get_option(self::PUBLIC_KEY_OPTION, null));
    }

    /**
     * @return bool
     */
    public function isWooCommerceIntegrated()
    {
        return (bool) get_option(self::TIDIO_WOOCOMMERCE_INTEGRATED, false);
    }

    /**
     * @return bool
     */
    public function isAsyncLoadingTurnedOn()
    {
        return (bool) get_option(self::ASYNC_LOAD_OPTION, true);
    }

    public function integrate($projectPublicKey, $accessToken, $refreshToken)
    {
        $this->updateAccessTokens($accessToken, $refreshToken);

        update_option(self::PUBLIC_KEY_OPTION, $projectPublicKey);
        update_option(self::ASYNC_LOAD_OPTION, true);
    }

    public function updateAccessTokens($accessToken, $refreshToken)
    {
        $encryptedRefreshToken = $this->encryptionService->encrypt($refreshToken);

        update_option(self::TIDIO_OAUTH_ACCESS_TOKEN_KEY, $accessToken);
        update_option(self::TIDIO_OAUTH_REFRESH_TOKEN_KEY, $encryptedRefreshToken);

        $this->markAccessTokensAsValid();
    }

    public function integrateWooCommerce()
    {
        update_option(self::TIDIO_WOOCOMMERCE_INTEGRATED, true);
    }

    public function removeIntegration()
    {
        delete_option(self::PUBLIC_KEY_OPTION);
        delete_option(self::TIDIO_OAUTH_ACCESS_TOKEN_KEY);
        delete_option(self::TIDIO_OAUTH_REFRESH_TOKEN_KEY);
        delete_option(self::TIDIO_ACCESS_TOKENS_VALID_KEY);
        delete_option(self::ASYNC_LOAD_OPTION);
        delete_option(self::PRIVATE_KEY_OPTION);
        delete_option(self::TIDIO_WOOCOMMERCE_INTEGRATED);
    }

    private function markAccessTokensAsValid()
    {
        update_option(self::TIDIO_ACCESS_TOKENS_VALID_KEY, true);
    }

    public function markAccessTokensAsInvalid()
    {
        update_option(self::TIDIO_ACCESS_TOKENS_VALID_KEY, false);
    }

    public function turnOnAsyncLoading()
    {
        update_option(self::ASYNC_LOAD_OPTION, true);
    }

    public function toggleAsyncLoading()
    {
        update_option(self::ASYNC_LOAD_OPTION, !$this->isAsyncLoadingTurnedOn());
    }
}
