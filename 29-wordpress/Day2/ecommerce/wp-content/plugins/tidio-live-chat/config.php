<?php

if (!defined('WPINC')) {
    die('File loaded directly. Exiting.');
}

require_once __DIR__ . '/TidioDotEnv.php';

(new TidioDotEnv(__DIR__))->load();

return [
    'tidio_api_url' => getenv('TIDIO_API_URL') ?: 'https://api-v2.tidio.co',
    'tidio_panel_url' => getenv('TIDIO_PANEL_URL') ?: 'https://www.tidio.com/panel',
    'tidio_widget_url' => getenv('TIDIO_WIDGET_URL') ?: '//code.tidio.co',
];
