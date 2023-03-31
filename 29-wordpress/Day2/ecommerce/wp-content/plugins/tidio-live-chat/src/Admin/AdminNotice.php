<?php

namespace TidioLiveChat\Admin;

if (!defined('WPINC')) {
    die('File loaded directly. Exiting.');
}

use TidioLiveChat\Admin\Notice\DismissibleNoticeService;
use TidioLiveChat\Admin\Notice\Exception\NoticeNameIsNotAllowedException;
use TidioLiveChat\IntegrationState;
use TidioLiveChat\Translation\ErrorTranslator;
use TidioLiveChat\Translation\I18n;
use TidioLiveChat\Utils\QueryParameters;
use TidioLiveChat\WooCommerceSdk\WooCommerceIntegrationService;

class AdminNotice
{
    /**
     * @var ErrorTranslator
     */
    private $errorTranslator;

    /**
     * @var DismissibleNoticeService
     */
    private $dismissibleNoticeService;

    /**
     * @var WooCommerceIntegrationService
     */
    private $wooCommerceIntegrationService;

    /**
     * @var IntegrationState
     */
    private $integrationState;

    /**
     * @param ErrorTranslator $errorTranslator
     * @param DismissibleNoticeService $dismissibleNoticeService
     * @param WooCommerceIntegrationService $wooCommerceIntegrationService
     * @param IntegrationState $integrationState
     */
    public function __construct($errorTranslator, $dismissibleNoticeService, $wooCommerceIntegrationService, $integrationState)
    {
        $this->errorTranslator = $errorTranslator;
        $this->dismissibleNoticeService = $dismissibleNoticeService;
        $this->wooCommerceIntegrationService = $wooCommerceIntegrationService;
        $this->integrationState = $integrationState;
    }

    public function load()
    {
        add_action('admin_notices', [$this, 'addAdminErrorNotice']);
        add_action('admin_notices', [$this, 'addNewWoocommerceFeaturesNotice']);
    }

    public function addAdminErrorNotice()
    {
        if (!QueryParameters::has('error')) {
            return;
        }

        $errorCode = QueryParameters::get('error');
        $errorMessage = $this->errorTranslator->translate($errorCode);
        echo sprintf('<div class="notice notice-error is-dismissible"><p>%s</p></div>', $errorMessage);
    }

    public function addNewWoocommerceFeaturesNotice()
    {
        if ($this->wooCommerceIntegrationService->isWooCommerceActivated() === false
            || $this->integrationState->isWooCommerceIntegrated()
        ) {
            return;
        }

        $this->displayDismissibleNotice(
            __DIR__ . '/Notice/Views/NewWoocommerceFeaturesNotice.php',
            DismissibleNoticeService::NEW_WOOCOMMERCE_FEATURES_NOTICE
        );
    }

    /**
     * @param string $templatePath
     * @param string $noticeName
     * @return void
     */
    private function displayDismissibleNotice($templatePath, $noticeName)
    {
        try {
            $this->dismissibleNoticeService->displayNotice($templatePath, $noticeName);
        } catch (NoticeNameIsNotAllowedException $exception) {
            // do not display notice if notice name is invalid
        }
    }
}
