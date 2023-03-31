<?php

namespace TidioLiveChat\Admin;

if (!defined('WPINC')) {
    die('File loaded directly. Exiting.');
}

use TidioLiveChat\IntegrationState;
use TidioLiveChat\TidioLiveChat;
use TidioLiveChat\Translation\I18n;

class AdminActionLink
{
    /**
     * @var IntegrationState
     */
    private $integrationState;

    /**
     * @param IntegrationState $integrationsState
     */
    public function __construct($integrationsState)
    {
        $this->integrationState = $integrationsState;
    }

    public function load()
    {
        add_filter('plugin_action_links', [$this, 'addPluginActionLinks'], 10, 2);
    }

    /**
     * @param string[] $links
     * @param string $file
     * @return string[]
     */
    public function addPluginActionLinks($links, $file)
    {
        if (!$this->isPluginConfigurationFile($file) ||
            !$this->integrationState->isPluginIntegrated()
        ) {
            return $links;
        }

        $links[] = $this->prepareClearAccountDataActionLink();
        $links[] = $this->prepareToggleAsyncLoadingActionLink();

        return $links;
    }

    /**
     * @param string $file
     * @return bool
     */
    private function isPluginConfigurationFile($file)
    {
        return strpos($file, TidioLiveChat::TIDIO_PLUGIN_TECHNICAL_NAME) !== false;
    }

    /**
     * @return string
     */
    private function prepareClearAccountDataActionLink()
    {
        return sprintf(
            '<a href="%s">%s</a>',
            AdminRouting::getEndpointForClearAccountDataAction(),
            esc_html(I18n::_t('Clear Account Data'))
        );
    }

    /**
     * @return string
     */
    private function prepareToggleAsyncLoadingActionLink()
    {
        $toggleAsyncLabel = '✘';
        $onclickPart = '';
        if ($this->integrationState->isAsyncLoadingTurnedOn()) {
            $toggleAsyncLabel = '✓';
            $onclickPart = sprintf(
                'onclick="return confirm(\'%s\');"',
                I18n::_t('Disabling asynchronous loading of the chat widget may affect the page loading time of your website. Are you sure you want to disable the asynchronous loading?')
            );
        }

        return sprintf(
            '<a href="%s" %s>%s</a>',
            AdminRouting::getEndpointForToggleAsyncLoadingAction(),
            $onclickPart,
            esc_html(
                sprintf('%s %s', $toggleAsyncLabel, I18n::_t('Asynchronous loading'))
            )
        );
    }
}
