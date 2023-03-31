<?php

namespace TidioLiveChat\Widget;

if (!defined('WPINC')) {
    die('File loaded directly. Exiting.');
}

use TidioLiveChat\IntegrationState;
use TidioLiveChat\TidioLiveChat;
use TidioLiveChat\Config;

class WidgetLoader
{
    /**
     * @var IntegrationState
     */
    private $integrationState;

    /**
     * @param IntegrationState $integrationState
     */
    public function __construct($integrationState)
    {
        $this->integrationState = $integrationState;
    }

    public function load()
    {
        if (!$this->integrationState->isPluginIntegrated()) {
            return;
        }

        add_action('wp_head', [$this,'addPreconnectLink']);
        if ($this->integrationState->isAsyncLoadingTurnedOn()) {
            add_action('wp_footer', [$this, 'enqueueScriptsAsync'], PHP_INT_MAX);
            return;
        }

        add_action('wp_enqueue_scripts', [$this, 'enqueueScriptsSync'], 1000);
    }

    public function addPreconnectLink()
    {
        echo '<link rel="preconnect" href="//code.tidio.co">';
    }

    public function enqueueScriptsAsync()
    {
        $publicKey = $this->integrationState->getProjectPublicKey();
        $widgetUrl = sprintf('%s/%s.js', Config::getWidgetUrl(), $publicKey);
        $asyncScript = <<<SRC
<script type='text/javascript'>
document.tidioChatCode = "$publicKey";
(function() {
  function asyncLoad() {
    var tidioScript = document.createElement("script");
    tidioScript.type = "text/javascript";
    tidioScript.async = true;
    tidioScript.src = "{$widgetUrl}";
    document.body.appendChild(tidioScript);
  }
  if (window.attachEvent) {
    window.attachEvent("onload", asyncLoad);
  } else {
    window.addEventListener("load", asyncLoad, false);
  }
})();
</script>
SRC;
        echo $asyncScript;
    }

    public function enqueueScriptsSync()
    {
        $projectPublicKey = $this->integrationState->getProjectPublicKey();

        $widgetUrl = sprintf('%s/%s.js', Config::getWidgetUrl(), $projectPublicKey);
        wp_enqueue_script(TidioLiveChat::TIDIO_PLUGIN_TECHNICAL_NAME, $widgetUrl, [], TIDIOCHAT_VERSION, true);

        $inlineScriptWithProjectPublicKeyVariable = sprintf('document.tidioChatCode = "%s";', $projectPublicKey);
        wp_add_inline_script(TidioLiveChat::TIDIO_PLUGIN_TECHNICAL_NAME, $inlineScriptWithProjectPublicKeyVariable, 'before');
    }
}
