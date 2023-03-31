<?php

namespace TidioLiveChat;

if (!defined('WPINC')) {
    die('File loaded directly. Exiting.');
}

use TidioLiveChat\Admin\AdminActionLink;
use TidioLiveChat\Admin\AdminController;
use TidioLiveChat\Admin\AdminDashboard;
use TidioLiveChat\Admin\AdminNotice;
use TidioLiveChat\Admin\AdminRouting;
use TidioLiveChat\Admin\IframeSetup;
use TidioLiveChat\Admin\NonceValidator;
use TidioLiveChat\Admin\Notice\DismissibleNoticeController;
use TidioLiveChat\Admin\Notice\DismissibleNoticeService;
use TidioLiveChat\Encryption\EncryptionService;
use TidioLiveChat\Encryption\Service\EncryptionServiceFactory;
use TidioLiveChat\TidioSdk\TidioApiClientFactory;
use TidioLiveChat\TidioSdk\TidioIntegrationService;
use TidioLiveChat\Translation\ErrorTranslator;
use TidioLiveChat\Translation\TranslationLoader;
use TidioLiveChat\Widget\WidgetLoader;
use TidioLiveChat\WooCommerceSdk\WooCommerceApiV3ClientFactory;
use TidioLiveChat\WooCommerceSdk\WooCommerceIntegrationService;

class Container
{
    /**
     * @var array<string, mixed>
     */
    private $serviceStore = [];

    /**
     * @param string $id
     * @return mixed
     */
    public function get($id)
    {
        if (array_key_exists($id, $this->serviceStore)) {
            return $this->serviceStore[$id];
        }

        switch ($id) {
            case TranslationLoader::class:
                $service = new TranslationLoader();
                break;

            case ErrorTranslator::class:
                $service = new ErrorTranslator();
                break;

            case EncryptionServiceFactory::class:
                $service = new EncryptionServiceFactory();
                break;

            case TidioApiClientFactory::class:
                $service = new TidioApiClientFactory();
                break;

            case WooCommerceApiV3ClientFactory::class:
                $service = new WooCommerceApiV3ClientFactory();
                break;

            case NonceValidator::class:
                $service = new NonceValidator();
                break;

            case DismissibleNoticeService::class:
                $service = new DismissibleNoticeService();
                break;

            case EncryptionService::class:
                $service = $this->buildEncryptionService();
                break;

            case IntegrationState::class:
                $service = $this->buildIntegrationState();
                break;

            case WidgetLoader::class:
                $service = $this->buildWidgetLoader();
                break;

            case AdminNotice::class:
                $service = $this->buildAdminNotice();
                break;

            case AdminActionLink::class:
                $service = $this->buildAdminActionLink();
                break;

            case TidioIntegrationService::class:
                $service = $this->buildTidioIntegrationService();
                break;

            case WooCommerceIntegrationService::class:
                $service = $this->buildWooCommerceIntegrationService();
                break;

            case AdminController::class:
                $service = $this->buildAdminController();
                break;

            case IframeSetup::class:
                $service = $this->buildIframeSetup();
                break;

            case AdminRouting::class:
                $service = $this->buildAdminRouting();
                break;

            case AdminDashboard::class:
                $service = $this->buildAdminDashboard();
                break;

            case DismissibleNoticeController::class:
                $service = $this->buildDismissibleNoticeController();
                break;

            default:
                throw new \RuntimeException('Cannot resolve service from container: ' . $id);
        }

        $this->serviceStore[$id] = $service;

        return $service;
    }

    /**
     * @param string $id
     * @return bool void
     */
    public function has($id)
    {
        try {
            $this->get($id);
        } catch (\RuntimeException $exception) {
            return false;
        }

        return true;
    }

    /**
     * @return EncryptionService
     */
    private function buildEncryptionService()
    {
        $encryptionServiceFactory = $this->get(EncryptionServiceFactory::class);
        return $encryptionServiceFactory->create();
    }

    /**
     * @return IntegrationState
     */
    private function buildIntegrationState()
    {
        return new IntegrationState(
            $this->get(EncryptionService::class)
        );
    }

    /**
     * @return WidgetLoader
     */
    private function buildWidgetLoader()
    {
        return new WidgetLoader(
            $this->get(IntegrationState::class)
        );
    }

    /**
     * @return AdminNotice
     */
    private function buildAdminNotice()
    {
        return new AdminNotice(
            $this->get(ErrorTranslator::class),
            $this->get(DismissibleNoticeService::class),
            $this->get(WooCommerceIntegrationService::class),
            $this->get(IntegrationState::class)
        );
    }

    /**
     * @return AdminActionLink
     */
    private function buildAdminActionLink()
    {
        return new AdminActionLink(
            $this->get(IntegrationState::class)
        );
    }

    /**
     * @return TidioIntegrationService
     */
    private function buildTidioIntegrationService()
    {
        return new TidioIntegrationService(
            $this->get(IntegrationState::class),
            $this->get(TidioApiClientFactory::class)
        );
    }

    /**
     * @return WooCommerceIntegrationService
     */
    private function buildWooCommerceIntegrationService()
    {
        return new WooCommerceIntegrationService(
            $this->get(IntegrationState::class),
            $this->get(WooCommerceApiV3ClientFactory::class),
            $this->get(TidioIntegrationService::class)
        );
    }

    /**
     * @return AdminController
     */
    private function buildAdminController()
    {
        return new AdminController(
            $this->get(TidioIntegrationService::class),
            $this->get(IntegrationState::class),
            $this->get(WooCommerceIntegrationService::class),
            $this->get(NonceValidator::class),
            $this->get(DismissibleNoticeService::class)
        );
    }

    /**
     * @return IframeSetup
     */
    private function buildIframeSetup()
    {
        return new IframeSetup(
            $this->get(IntegrationState::class),
            $this->get(WooCommerceIntegrationService::class)
        );
    }

    /**
     * @return AdminRouting
     */
    private function buildAdminRouting()
    {
        return new AdminRouting(
            $this->get(AdminController::class),
            $this->get(DismissibleNoticeController::class)
        );
    }

    /**
     * @return AdminDashboard
     */
    private function buildAdminDashboard()
    {
        return new AdminDashboard(
            $this->get(IntegrationState::class),
            $this->get(IframeSetup::class)
        );
    }

    private function buildDismissibleNoticeController()
    {
        return new DismissibleNoticeController(
            $this->get(DismissibleNoticeService::class),
            $this->get(NonceValidator::class)
        );
    }
}
