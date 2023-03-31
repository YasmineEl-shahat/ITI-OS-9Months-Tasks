<?php

namespace TidioLiveChat\WooCommerceSdk\Dto;

if (!defined('WPINC')) {
    die('File loaded directly. Exiting.');
}

class WooCommerceIntegrationDto
{
    const WOOCOMMERCE_INTEGRATION_STATUS_INACTIVE = 'inactive';
    const WOOCOMMERCE_INTEGRATION_STATUS_DISABLED = 'disabled';
    const WOOCOMMERCE_INTEGRATION_STATUS_ACTIVE = 'active';
    const WOOCOMMERCE_INTEGRATION_STATUS_INTEGRATED = 'integrated';

    /**
     * @var string
     */
    private $status;
    /**
     * @var string[]
     */
    private $notMetConditions;
    /**
     * @var string|null
     */
    private $authUrl;

    /**
     * @param string $status
     * @param string[] $notMetConditions
     * @param string|null $authUrl
     */
    private function __construct($status, $notMetConditions = [], $authUrl = null)
    {
        $this->status = $status;
        $this->notMetConditions = $notMetConditions;
        $this->authUrl = $authUrl;
    }

    /**
     * @return self
     */
    public static function createInactive()
    {
        return new self(self::WOOCOMMERCE_INTEGRATION_STATUS_INACTIVE);
    }

    /**
     * @param string[] $notMetConditions
     * @return self
     */
    public static function createDisabled($notMetConditions)
    {
        return new self(self::WOOCOMMERCE_INTEGRATION_STATUS_DISABLED, $notMetConditions);
    }

    /**
     * @param string $authUrl
     * @return self
     */
    public static function createActive($authUrl)
    {
        return new self(self::WOOCOMMERCE_INTEGRATION_STATUS_ACTIVE, [], $authUrl);
    }

    /**
     * @param string $authUrl
     * @return self
     */
    public static function createIntegrated($authUrl)
    {
        return new self(self::WOOCOMMERCE_INTEGRATION_STATUS_INTEGRATED, [], $authUrl);
    }

    /**
     * @return array<string, string>
     */
    public function toIframeData()
    {
        $iframeData = ['wooCommerceIntegrationStatus' => $this->status];

        if ($this->status === self::WOOCOMMERCE_INTEGRATION_STATUS_INACTIVE) {
            return $iframeData;
        }

        if ($this->status === self::WOOCOMMERCE_INTEGRATION_STATUS_DISABLED) {
            $iframeData['wooCommerceNotMetConditions'] = implode(',', $this->notMetConditions);
            return $iframeData;
        }

        $iframeData['wooCommerceAuthUrl'] = $this->authUrl;
        return $iframeData;
    }
}
