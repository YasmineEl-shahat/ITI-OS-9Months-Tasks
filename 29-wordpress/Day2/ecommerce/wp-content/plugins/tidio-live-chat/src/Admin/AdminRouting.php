<?php

namespace TidioLiveChat\Admin;

if (!defined('WPINC')) {
    die('File loaded directly. Exiting.');
}

use TidioLiveChat\Admin\Notice\DismissibleNoticeController;

class AdminRouting
{
    const CLEAR_ACCOUNT_DATA_ACTION = 'tidio-live-chat-clear-account-data';
    const INTEGRATE_PROJECT_ACTION = 'tidio-live-chat-integrate-project';
    const TOGGLE_ASYNC_LOADING_ACTION = 'tidio-live-chat-toggle-async-loading';
    const AUTHORIZE_WOOCOMMERCE_ACTION = 'tidio-live-chat-authorize-woocommerce';
    const INTEGRATE_WOOCOMMERCE_ACTION = 'tidio-live-chat-integrate-woocommerce';
    const DISMISS_NOTICE_ACTION = 'tidio-live-chat-dismiss-notice';

    /**
     * @var AdminController
     */
    private $adminController;

    /**
     * @var DismissibleNoticeController
     */
    private $dismissibleNoticeController;

    /**
     * @param AdminController $adminController
     * @param DismissibleNoticeController $dismissibleNoticeController
     */
    public function __construct($adminController, $dismissibleNoticeController)
    {
        $this->adminController = $adminController;
        $this->dismissibleNoticeController = $dismissibleNoticeController;
    }

    public function load()
    {
        add_action('admin_post_' . self::INTEGRATE_PROJECT_ACTION, [$this->adminController, 'handleIntegrateProjectAction']);
        add_action('admin_post_' . self::TOGGLE_ASYNC_LOADING_ACTION, [$this->adminController, 'handleToggleAsyncLoadingAction']);
        add_action('admin_post_' . self::CLEAR_ACCOUNT_DATA_ACTION, [$this->adminController, 'handleClearAccountDataAction']);
        add_action('admin_post_' . self::AUTHORIZE_WOOCOMMERCE_ACTION, [$this->adminController, 'handleAuthorizeWooCommerceAction']);
        add_action('admin_post_' . self::INTEGRATE_WOOCOMMERCE_ACTION, [$this->adminController, 'handleIntegrateWooCommerceAction']);
        add_action('admin_post_' . self::DISMISS_NOTICE_ACTION, [$this->dismissibleNoticeController, 'handleDismissNotice']);
    }

    /**
     * @return string
     */
    public static function getEndpointForIntegrateProjectAction()
    {
        return self::getEndpointForAction(self::INTEGRATE_PROJECT_ACTION);
    }

    /**
     * @return string
     */
    public static function getEndpointForToggleAsyncLoadingAction()
    {
        return self::getEndpointForAction(self::TOGGLE_ASYNC_LOADING_ACTION);
    }

    /**
     * @return string
     */
    public static function getEndpointForClearAccountDataAction()
    {
        return self::getEndpointForAction(self::CLEAR_ACCOUNT_DATA_ACTION);
    }

    /**
     * @return string
     */
    public static function getEndpointForAuthorizeWooCommerceAction()
    {
        return self::getEndpointForAction(self::AUTHORIZE_WOOCOMMERCE_ACTION);
    }

    /**
     * @return string
     */
    public static function getEndpointForIntegrateWooCommerceAction()
    {
        return self::getEndpointForAction(self::INTEGRATE_WOOCOMMERCE_ACTION);
    }

    /**
     * @param string $noticeOptionName
     * @return string
     */
    public static function getEndpointForHandleDismissNotice($noticeOptionName)
    {
        return self::getEndpointForAction(
            self::DISMISS_NOTICE_ACTION,
            [DismissibleNoticeController::TIDIO_NOTICE_QUERY_PARAM_NAME => $noticeOptionName]
        );
    }

    /**
     * @param string $action
     * @return string
     */
    private static function getEndpointForAction($action, array $params = [])
    {
        $params['action'] = $action;
        $params['_wpnonce'] = wp_create_nonce($action);

        $queryString = http_build_query($params);

        return admin_url('admin-post.php?' . $queryString);
    }
}
