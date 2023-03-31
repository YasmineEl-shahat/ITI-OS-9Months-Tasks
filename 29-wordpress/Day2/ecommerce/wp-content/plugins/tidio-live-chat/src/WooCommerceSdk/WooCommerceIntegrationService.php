<?php

namespace TidioLiveChat\WooCommerceSdk;

if (!defined('WPINC')) {
    die('File loaded directly. Exiting.');
}

use TidioLiveChat\Admin\AdminRouting;
use TidioLiveChat\Config;
use TidioLiveChat\Http\Exception\HttpClientException;
use TidioLiveChat\IntegrationState;
use TidioLiveChat\TidioSdk\Exception\CannotRetrieveAccessTokensException;
use TidioLiveChat\TidioSdk\TidioIntegrationService;
use TidioLiveChat\TidioLiveChat;
use TidioLiveChat\WooCommerceSdk\Dto\WooCommerceIntegrationDto;

class WooCommerceIntegrationService
{
    const MINIMUM_REQUIRED_WOOCOMMERCE_VERSION = '3.4';

    /**
     * @var IntegrationState
     */
    private $integrationState;
    /**
     * @var WooCommerceApiV3ClientFactory
     */
    private $wooCommerceApiClientFactory;
    /**
     * @var TidioIntegrationService
     */
    private $tidioIntegrationService;

    /**
     * @param IntegrationState $integrationState
     * @param WooCommerceApiV3ClientFactory $wooCommerceApiClientFactory
     * @param TidioIntegrationService $tidioIntegrationService
     */
    public function __construct($integrationState, $wooCommerceApiClientFactory, $tidioIntegrationService)
    {
        $this->integrationState = $integrationState;
        $this->wooCommerceApiClientFactory = $wooCommerceApiClientFactory;
        $this->tidioIntegrationService = $tidioIntegrationService;
    }

    /**
     * @return string
     * @throws CannotRetrieveAccessTokensException
     */
    public function getAuthUrl()
    {
        $apiCredentials = $this->tidioIntegrationService->retrieveAccessTokens();
        $callbackUrl = sprintf(
            '%s/platforms/woocommerce/callback?api_url=%s&platformAuthorizationToken=%s',
            Config::getApiUrl(),
            get_rest_url(),
            $apiCredentials->getAccessToken()
        );

        return sprintf(
            '%s/wc-auth/v1/authorize?%s',
            get_home_url(),
            http_build_query([
                'app_name' => TidioLiveChat::TIDIO_PLUGIN_NAME,
                'scope' => 'read',
                'user_id' => $this->integrationState->getProjectPublicKey(),
                'return_url' => AdminRouting::getEndpointForIntegrateWooCommerceAction(),
                'callback_url' => $callbackUrl
            ])
        );
    }

    /**
     * @return WooCommerceIntegrationDto
     */
    public function getIntegrationData()
    {
        if (!$this->isWooCommerceActivated()) {
            return WooCommerceIntegrationDto::createInactive();
        }

        $notMetConditions = $this->getNotMetConditions();
        if (!empty($notMetConditions)) {
            return WooCommerceIntegrationDto::createDisabled($notMetConditions);
        }

        $authUrl = AdminRouting::getEndpointForAuthorizeWooCommerceAction();
        if ($this->integrationState->isWooCommerceIntegrated()) {
            return WooCommerceIntegrationDto::createIntegrated($authUrl);
        }

        return WooCommerceIntegrationDto::createActive($authUrl);
    }

    /**
     * @return bool
     */
    public function isWooCommerceActivated()
    {
        return class_exists('woocommerce');
    }

    /**
     * @return string[]
     */
    private function getNotMetConditions()
    {
        $conditionsNotMet = [];
        if (!$this->integrationState->hasValidAccessTokens()) {
            $conditionsNotMet[] = 'token';
        }

        if (!$this->hasEnabledPermalink()) {
            $conditionsNotMet[] = 'permalinks';
        }

        if (!$this->isWooCommerceMinimumVersionInstalled()) {
            $conditionsNotMet[] = 'version';
        }

        if (!$this->isRestApiEnabled()) {
            $conditionsNotMet[] = 'rest';
        }

        return $conditionsNotMet;
    }

    /**
     * @return bool
     */
    private function hasEnabledPermalink()
    {
        return !empty(get_option('permalink_structure'));
    }

    /**
     * @return bool
     */
    private function isWooCommerceMinimumVersionInstalled()
    {
        return (bool) version_compare($this->getWooCommerceVersion(), self::MINIMUM_REQUIRED_WOOCOMMERCE_VERSION, '>=');
    }

    /**
     * @return string
     */
    private function getWooCommerceVersion()
    {
        if (defined('WC_VERSION')) {
            return WC_VERSION;
        }

        return '0';
    }

    /**
     * @return bool
     */
    private function isRestApiEnabled()
    {
        $apiClient = $this->wooCommerceApiClientFactory->create();
        try {
            $response = $apiClient->sendGetRequest('/');
        } catch (HttpClientException $exception) {
            return false;
        }

        return isset($response['namespace']) &&
            $response['namespace'] === 'wc/v3';
    }
}
