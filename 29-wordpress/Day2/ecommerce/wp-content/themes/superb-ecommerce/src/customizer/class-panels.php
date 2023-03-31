<?php

namespace superb_ecommerce_SuperbThemesCustomizer;

use superb_ecommerce_SuperbThemesCustomizer\Utils\CustomizerItem;
use superb_ecommerce_SuperbThemesCustomizer\Utils\CustomizerType;

class CustomizerPanels
{
     const LAYOUT = 'superbthemes_customizer_panel_LAYOUT';
     const COLORS = 'superbthemes_customizer_panel_COLORS';
     const WOOCOMMERCE = 'superbthemes_customizer_panel_WOOCOMMERCE';
     const NAVIGATION = 'superbthemes_customizer_panel_NAVIGATION';
     const HEADER = 'superbthemes_customizer_panel_HEADER';

     const SHOULD_REFOCUS_TO_PANEL = array();

    public function __construct()
    {
        new CustomizerItem(self::LAYOUT, array(
            "type" => CustomizerType::PANEL,
            "label" =>  __('Layout', 'superb-ecommerce'),
            "description" => __('Layout Customization', 'superb-ecommerce')
        ));
        new CustomizerItem(self::COLORS, array(
            "type" => CustomizerType::PANEL,
            "label" =>  __('Colors', 'superb-ecommerce'),
            "description" => __('Colors Customization', 'superb-ecommerce')
        ));
        new CustomizerItem(self::WOOCOMMERCE, array(
            "type" => CustomizerType::PANEL,
            "label" =>  __('WooCommerce', 'superb-ecommerce'),
            "description" => __('WooCommerce Customization', 'superb-ecommerce')
        ));
        new CustomizerItem(self::NAVIGATION, array(
            "type" => CustomizerType::PANEL,
            "label" =>  __('Navigation', 'superb-ecommerce'),
            "description" => __('Navigation Customization', 'superb-ecommerce')
        ));
        new CustomizerItem(self::HEADER, array(
            "type" => CustomizerType::PANEL,
            "label" =>  __('Header', 'superb-ecommerce'),
            "description" => __('Header Customization', 'superb-ecommerce')
        ));
    }
}
