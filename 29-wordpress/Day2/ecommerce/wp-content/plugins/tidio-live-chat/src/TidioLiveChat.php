<?php

namespace TidioLiveChat;

if (!defined('WPINC')) {
    die('File loaded directly. Exiting.');
}

use TidioLiveChat\Admin\AdminActionLink;
use TidioLiveChat\Admin\AdminDashboard;
use TidioLiveChat\Admin\AdminNotice;
use TidioLiveChat\Admin\AdminRouting;
use TidioLiveChat\Translation\TranslationLoader;
use TidioLiveChat\Widget\WidgetLoader;

class TidioLiveChat
{
    const TIDIO_PLUGIN_TECHNICAL_NAME = 'tidio-live-chat';
    const TIDIO_PLUGIN_NAME = 'Tidio Live Chat & Chatbots';

    /**
     * @var Container
     */
    private $container;

    /**
     * @param Container $container
     */
    public function __construct($container)
    {
        $this->container = $container;
    }

    public function load()
    {
        if (!is_admin()) {
            $widgetLoader = $this->container->get(WidgetLoader::class);
            $widgetLoader->load();
            return;
        }

        if (current_user_can('activate_plugins')) {
            $translationLoader = $this->container->get(TranslationLoader::class);
            $translationLoader->load();

            $adminRouting = $this->container->get(AdminRouting::class);
            $adminRouting->load();

            $adminActionLink = $this->container->get(AdminActionLink::class);
            $adminActionLink->load();

            $adminDashboard = $this->container->get(AdminDashboard::class);
            $adminDashboard->load();

            $adminNotice = $this->container->get(AdminNotice::class);
            $adminNotice->load();
        }
    }
}
