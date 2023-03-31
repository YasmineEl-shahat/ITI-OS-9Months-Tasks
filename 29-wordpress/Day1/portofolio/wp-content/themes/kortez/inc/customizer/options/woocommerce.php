<?php
/**
 * Woocommerce Customizer options
 *
 * @package Kortez
 */

/**
 * Woocommerce
 */

Kirki::add_field( 'kortez', array(
    'label'       => esc_html__( 'General / Style', 'kortez' ),
    'type'        => 'radio-buttonset',
    'settings'    => 'woocommerce_product_catalog_tabs',
    'section'     => 'woocommerce_product_catalog',
    'default'     => 'product_catalog_general_tab',
    'choices'  => array(
        'product_catalog_general_tab'     => esc_html__( 'General', 'kortez' ),
        'product_catalog_style_tab'     => esc_html__( 'Style', 'kortez' ),
    ),
) );

Kirki::add_field( 'kortez', array(
    'label'        => esc_html__( 'Disable Shop Page Title', 'kortez' ),
    'type'         => 'checkbox',
    'settings'     => 'disable_shop_page_title',
    'section'      => 'woocommerce_product_catalog',
    'default'      => false,
    'priority'     => 10,
    'active_callback' => array(
        array(
            'setting'  => 'woocommerce_product_catalog_tabs',
            'operator' => '==',
            'value'    => 'product_catalog_general_tab',
        ),
    ),
) );

Kirki::add_field( 'kortez', array(
    'type'        => 'custom',
    'settings'    => 'product_card_separator',
    'section'     => 'woocommerce_product_catalog',
    'default'     => esc_html__( 'Product Wrapper Options', 'kortez' ),
    'priority'    => 20,
    'active_callback' => array(
        array(
            'setting'  => 'woocommerce_product_catalog_tabs',
            'operator' => '==',
            'value'    => 'product_catalog_general_tab',
        ),
    ),
) );

Kirki::add_field( 'kortez', array(
    'label'         => esc_html__( 'Product Layout Type', 'kortez' ),
    'type'          => 'radio-image',
    'settings'      => 'woocommerce_product_layout_type',
    'section'       => 'woocommerce_product_catalog',
    'default'       => 'product_layout_grid',
    'choices'       => array(
        'product_layout_grid'       => get_template_directory_uri() . '/assets/images/product-layout-type-one.png',
        'product_layout_list'       => get_template_directory_uri() . '/assets/images/product-layout-type-two.png',
    ),
    'priority'      => 30,
    'active_callback' => array(
        array(
            'setting'  => 'woocommerce_product_catalog_tabs',
            'operator' => '==',
            'value'    => 'product_catalog_general_tab',
        ),
    ),
) );

Kirki::add_field( 'kortez', array(
    'label'         => esc_html__( 'Product Card Layout', 'kortez' ),
    'type'          => 'radio-image',
    'settings'      => 'woocommerce_product_card_layout',
    'section'       => 'woocommerce_product_catalog',
    'default'       => 'product_layout_one',
    'choices'       => array(
        'product_layout_one'        => get_template_directory_uri() . '/assets/images/product-card-layout-one.png',
        'product_layout_two'        => get_template_directory_uri() . '/assets/images/product-card-layout-two.png',
    ),
    'priority'      => 40,
    'active_callback' => array(
        array(
            'setting'  => 'woocommerce_product_catalog_tabs',
            'operator' => '==',
            'value'    => 'product_catalog_general_tab',
        ),
    ),
) );

Kirki::add_field( 'kortez', array(
    'label'         => esc_html__( 'Text Alignment', 'kortez' ),
    'type'          => 'select',
    'settings'      => 'woocommerce_product_card_text_alignment',
    'section'       => 'woocommerce_product_catalog',
    'default'       => 'text-center',
    'choices'       => array(
        'text-left'     => esc_html__( 'Left', 'kortez' ),
        'text-center'   => esc_html__( 'Center', 'kortez' ),
        'text-right'    => esc_html__( 'Right', 'kortez' ),
    ),
    'priority'       => 50,
    'active_callback' => array(
        array(
            'setting'  => 'woocommerce_product_catalog_tabs',
            'operator' => '==',
            'value'    => 'product_catalog_general_tab',
        ),
    ),
) );

Kirki::add_field( 'kortez', array(
    'label'        => esc_html__( 'Products Per Row', 'kortez' ),
    'description'  => esc_html__( 'How many products should be shown per row?', 'kortez' ),
    'type'         => 'number',
    'settings'     => 'woocommerce_shop_product_column',
    'section'      => 'woocommerce_product_catalog',
    'default'      => 3,
    'choices' => array(
        'min' => '1',
        'max' => '4',
        'step'=> '1',
    ),
    'priority'     => 60,
    'active_callback' => array(
        array(
            'setting'  => 'woocommerce_product_catalog_tabs',
            'operator' => '==',
            'value'    => 'product_catalog_general_tab',
        ),
        array(
            'setting'  => 'woocommerce_product_layout_type',
            'operator' => '==',
            'value'    => 'product_layout_grid',
        ),
    ),
) );

Kirki::add_field( 'kortez', array(
    'label'        => esc_html__( 'Products Per Row', 'kortez' ),
    'description'  => esc_html__( 'How many products should be shown per row?', 'kortez' ),
    'type'         => 'number',
    'settings'     => 'woocommerce_shop_list_column',
    'section'      => 'woocommerce_product_catalog',
    'default'      => 2,
    'choices' => array(
        'min' => '1',
        'max' => '3',
        'step'=> '1',
    ),
    'priority'     => 70,
    'active_callback' => array(
        array(
            'setting'  => 'woocommerce_product_catalog_tabs',
            'operator' => '==',
            'value'    => 'product_catalog_general_tab',
        ),
        array(
            'setting'  => 'woocommerce_product_layout_type',
            'operator' => '==',
            'value'    => 'product_layout_list',
        ),
    ),
) );

Kirki::add_field( 'kortez', array(
    'label'        => esc_html__( 'Product Display Per Page', 'kortez' ),
    'type'         => 'number',
    'settings'     => 'woocommerce_product_per_page',
    'section'      => 'woocommerce_product_catalog',
    'default'      => 9,
    'choices' => array(
        'min' => '1',
        'max' => '60',
        'step'=> '1',
    ),
    'priority'    => 80,
    'active_callback' => array(
        array(
            'setting'  => 'woocommerce_product_catalog_tabs',
            'operator' => '==',
            'value'    => 'product_catalog_general_tab',
        ),
    ),
) );

Kirki::add_field( 'kortez', array(
    'type'        => 'custom',
    'settings'    => 'add_to_cart_separator',
    'section'     => 'woocommerce_product_catalog',
    'default'     => esc_html__( 'Add To Cart Button Options', 'kortez' ),
    'priority'    => 90,
    'active_callback' => array(
        array(
            'setting'  => 'woocommerce_product_catalog_tabs',
            'operator' => '==',
            'value'    => 'product_catalog_general_tab',
        ),
    ),
) );

Kirki::add_field( 'kortez', array(
    'label'         => esc_html__( 'Add To Cart Button Layout', 'kortez' ),
    'type'          => 'radio-image',
    'settings'      => 'woocommerce_add_to_cart_button',
    'section'       => 'woocommerce_product_catalog',
    'default'       => 'cart_button_two',
    'choices'       => array(
        'cart_button_one'       => get_template_directory_uri() . '/assets/images/cart-button-one.png',
        'cart_button_two'       => get_template_directory_uri() . '/assets/images/cart-button-two.png',
        'cart_button_three'     => get_template_directory_uri() . '/assets/images/cart-button-three.png',
        'cart_button_four'      => get_template_directory_uri() . '/assets/images/cart-button-four.png',
    ),
    'priority'      => 100,
    'active_callback' => array(
        array(
            'setting'  => 'woocommerce_product_catalog_tabs',
            'operator' => '==',
            'value'    => 'product_catalog_general_tab',
        ),
    ),
) );

Kirki::add_field( 'kortez', array(
    'type'        => 'custom',
    'settings'    => 'icon_group_separator',
    'section'     => 'woocommerce_product_catalog',
    'default'     => esc_html__( 'Icon Group Options', 'kortez' ),
    'priority'    => 110,
    'active_callback' => array(
        array(
            'setting'  => 'woocommerce_product_catalog_tabs',
            'operator' => '==',
            'value'    => 'product_catalog_general_tab',
        ),
    ),
) );

Kirki::add_field( 'kortez', array(
    'label'         => esc_html__( 'Icon Group Layout', 'kortez' ),
    'description'   => esc_html__( 'Yith WooCommerce Compare, Wishlist and Quick View are grouped together. Install these plugins to use this option.', 'kortez' ),
    'type'          => 'radio-image',
    'settings'      => 'icon_group_layout',
    'section'       => 'woocommerce_product_catalog',
    'default'       => 'group_layout_one',
    'choices'       => array(
        'group_layout_one'      => get_template_directory_uri() . '/assets/images/iconbox-layout-one.png',
        'group_layout_two'      => get_template_directory_uri() . '/assets/images/iconbox-layout-two.png',
        'group_layout_three'    => get_template_directory_uri() . '/assets/images/iconbox-layout-three.png',
        'group_layout_four'     => get_template_directory_uri() . '/assets/images/iconbox-layout-four.png',
    ),
    'priority'      => 120,
    'active_callback' => array(
        array(
            'setting'  => 'woocommerce_product_catalog_tabs',
            'operator' => '==',
            'value'    => 'product_catalog_general_tab',
        ),
    ),
) );

Kirki::add_field( 'kortez', array(
    'type'        => 'custom',
    'settings'    => 'sale_tag_separator',
    'section'     => 'woocommerce_product_catalog',
    'default'     => esc_html__( 'Sale Tag Options', 'kortez' ),
    'priority'    => 130,
    'active_callback' => array(
        array(
            'setting'  => 'woocommerce_product_catalog_tabs',
            'operator' => '==',
            'value'    => 'product_catalog_general_tab',
        ),
    ),
) );

Kirki::add_field( 'kortez', array(
    'label'         => esc_html__( 'Sale Tag Layout', 'kortez' ),
    'type'          => 'radio-image',
    'settings'      => 'woocommerce_sale_tag_layout',
    'section'       => 'woocommerce_product_catalog',
    'default'       => 'sale_tag_layout_one',
    'choices'       => array(
        'sale_tag_layout_one'       => get_template_directory_uri() . '/assets/images/product-badge-style-one.png',
        'sale_tag_layout_two'       => get_template_directory_uri() . '/assets/images/product-badge-style-two.png',
    ),
    'priority'      => 140,
    'active_callback' => array(
        array(
            'setting'  => 'woocommerce_product_catalog_tabs',
            'operator' => '==',
            'value'    => 'product_catalog_general_tab',
        ),
        array(
            'setting'  => 'icon_group_layout',
            'operator' => '!=',
            'value'    => 'group_layout_four',
        ),
    ),
) );

Kirki::add_field( 'kortez', array(
    'label'       => esc_html__( 'Sale Badge Text', 'kortez' ),
    'type'        => 'text',
    'settings'    => 'woocommerce_sale_badge_text',
    'section'     => 'woocommerce_product_catalog',
    'default'     => '',
    'priority'    => 150,
    'active_callback' => array(
        array(
            'setting'  => 'woocommerce_product_catalog_tabs',
            'operator' => '==',
            'value'    => 'product_catalog_general_tab',
        ),
    ),
) );

Kirki::add_field( 'kortez', array(
    'label'        => esc_html__( 'Enable Sale Badge Percentage', 'kortez' ),
    'description' => esc_html__( 'Replaces sale badge text with sale percent.', 'kortez' ),
    'type'         => 'checkbox',
    'settings'     => 'enable_sale_badge_percent',
    'section'      => 'woocommerce_product_catalog',
    'default'      => false,
    'priority'     => 160,
    'active_callback' => array(
        array(
            'setting'  => 'woocommerce_product_catalog_tabs',
            'operator' => '==',
            'value'    => 'product_catalog_general_tab',
        ),
    ),
) );

Kirki::add_field( 'kortez', array(
    'label'       => esc_html__( 'Sale Badge Percentage Text', 'kortez' ),
    'description' => esc_html__( 'Input text to accompany with percentage {value} tag. Example: {value}% OFF!', 'kortez' ),
    'type'        => 'text',
    'settings'    => 'woocommerce_sale_badge_percent',
    'section'     => 'woocommerce_product_catalog',
    'default'     => '',
    'priority'    => 170,
    'active_callback' => array(
        array(
            'setting'  => 'woocommerce_product_catalog_tabs',
            'operator' => '==',
            'value'    => 'product_catalog_general_tab',
        ),
        array(
            'setting'  => 'enable_sale_badge_percent',
            'operator' => '==',
            'value'    => true,
        ),
    ),
) );

Kirki::add_field( 'kortez', array(
    'type'        => 'custom',
    'settings'    => 'product_card_style_separator',
    'section'     => 'woocommerce_product_catalog',
    'default'     => esc_html__( 'Product Wrapper Options', 'kortez' ),
    'priority'    => 210,
    'active_callback' => array(
        array(
            'setting'  => 'woocommerce_product_catalog_tabs',
            'operator' => '==',
            'value'    => 'product_catalog_style_tab',
        ),
    ),
) );

Kirki::add_field( 'kortez', array(
    'label'         => esc_html__( 'Product Card Style', 'kortez' ),
    'type'          => 'radio-image',
    'settings'      => 'woocommerce_product_card_style',
    'section'       => 'woocommerce_product_catalog',
    'default'       => 'card_style_one',
    'choices'       => array(
        'card_style_one'        => get_template_directory_uri() . '/assets/images/product-card-style-one.png',
        'card_style_two'        => get_template_directory_uri() . '/assets/images/product-card-style-two.png',
        'card_style_three'      => get_template_directory_uri() . '/assets/images/product-card-style-three.png',
    ),
    'priority'    => 220,
    'active_callback' => array(
        array(
            'setting'  => 'woocommerce_product_catalog_tabs',
            'operator' => '==',
            'value'    => 'product_catalog_style_tab',
        ),
    ),
) );

Kirki::add_field( 'kortez', array(
    'label'        => esc_html__( 'Product Image Radius', 'kortez' ),
    'type'         => 'slider',
    'settings'     => 'shop_product_image_radius',
    'section'      => 'woocommerce_product_catalog',
    'transport'    => 'postMessage',
    'default'      => 0,
    'choices'      => array(
        'min'  => 0,
        'max'  => 200,
        'step' => 1,
    ),
    'priority'    => 230,
    'active_callback' => array(
        array(
            'setting'  => 'woocommerce_product_catalog_tabs',
            'operator' => '==',
            'value'    => 'product_catalog_style_tab',
        ),
    ),
) );

Kirki::add_field( 'kortez', array(
    'label'        => esc_html__( 'Product Card Border Radius', 'kortez' ),
    'type'         => 'slider',
    'settings'     => 'shop_product_card_radius',
    'section'      => 'woocommerce_product_catalog',
    'transport'    => 'postMessage',
    'default'      => 0,
    'choices'      => array(
        'min'  => 0,
        'max'  => 200,
        'step' => 1,
    ),
    'priority'    => 240,
    'active_callback' => array(
        array(
            'setting'  => 'woocommerce_product_catalog_tabs',
            'operator' => '==',
            'value'    => 'product_catalog_style_tab',
        ),
        array(
            'setting'  => 'woocommerce_product_card_style',
            'operator' => 'contains',
            'value'    => array( 'card_style_two', 'card_style_three' ),
        ),
    ),
) );

Kirki::add_field( 'kortez', array(
    'type'        => 'custom',
    'settings'    => 'add_to_cart_style_separator',
    'section'     => 'woocommerce_product_catalog',
    'default'     => esc_html__( 'Add To Cart Button Options', 'kortez' ),
    'priority'    => 250,
    'active_callback' => array(
        array(
            'setting'  => 'woocommerce_product_catalog_tabs',
            'operator' => '==',
            'value'    => 'product_catalog_style_tab',
        ),
    ),
) );

Kirki::add_field( 'kortez', array(
    'label'        => esc_html__( 'Add to Cart Button Background Color', 'kortez' ),
    'type'         => 'color',
    'settings'     => 'add_to_cart_bg_color',
    'section'      => 'woocommerce_product_catalog',
    'default'      => '#333333',
    'priority'    => 260,
    'active_callback' => array(
        array(
            'setting'  => 'skin_select',
            'operator' => 'contains',
            'value'    => array( 'default', 'blackwhite' ),
        ),
        array(
            'setting'  => 'woocommerce_product_catalog_tabs',
            'operator' => '==',
            'value'    => 'product_catalog_style_tab',
        ),
        array(
            'setting'  => 'woocommerce_add_to_cart_button',
            'operator' => 'contains',
            'value'    => array( 'cart_button_two' ),
        ),
    ),
) );

Kirki::add_field( 'kortez', array(
    'label'        => esc_html__( 'Add to Cart Button Background Color', 'kortez' ),
    'type'         => 'color',
    'settings'     => 'add_to_cart_white_bg_color',
    'section'      => 'woocommerce_product_catalog',
    'default'      => '#ffffff',
    'priority'    => 260,
    'active_callback' => array(
        array(
            'setting'  => 'skin_select',
            'operator' => 'contains',
            'value'    => array( 'default', 'blackwhite' ),
        ),
        array(
            'setting'  => 'woocommerce_product_catalog_tabs',
            'operator' => '==',
            'value'    => 'product_catalog_style_tab',
        ),
        array(
            'setting'  => 'woocommerce_add_to_cart_button',
            'operator' => 'contains',
            'value'    => array( 'cart_button_four' ),
        ),
    ),
) );

Kirki::add_field( 'kortez', array(
    'label'        => esc_html__( 'Add to Cart Button Text Color', 'kortez' ),
    'type'         => 'color',
    'settings'     => 'add_to_cart_text_color',
    'section'      => 'woocommerce_product_catalog',
    'default'      => '#ffffff',
    'priority'    => 270,
    'active_callback' => array(
        array(
            'setting'  => 'skin_select',
            'operator' => 'contains',
            'value'    => array( 'default', 'blackwhite' ),
        ),
        array(
            'setting'  => 'woocommerce_product_catalog_tabs',
            'operator' => '==',
            'value'    => 'product_catalog_style_tab',
        ),
        array(
            'setting'  => 'woocommerce_add_to_cart_button',
            'operator' => 'contains',
            'value'    => array( 'cart_button_two' ),
        ),
    ),
) );

Kirki::add_field( 'kortez', array(
    'label'        => esc_html__( 'Add to Cart Button Text Color', 'kortez' ),
    'type'         => 'color',
    'settings'     => 'add_to_cart_black_text_color',
    'section'      => 'woocommerce_product_catalog',
    'default'      => '#333333',
    'priority'    => 270,
    'active_callback' => array(
        array(
            'setting'  => 'skin_select',
            'operator' => 'contains',
            'value'    => array( 'default', 'blackwhite' ),
        ),
        array(
            'setting'  => 'woocommerce_product_catalog_tabs',
            'operator' => '==',
            'value'    => 'product_catalog_style_tab',
        ),
        array(
            'setting'  => 'woocommerce_add_to_cart_button',
            'operator' => 'contains',
            'value'    => array( 'cart_button_three' ),
        ),
    ),
) );

Kirki::add_field( 'kortez', array(
    'label'        => esc_html__( 'Add to Cart Button Text Color', 'kortez' ),
    'type'         => 'color',
    'settings'     => 'cart_four_black_text_color',
    'section'      => 'woocommerce_product_catalog',
    'default'      => '#333333',
    'priority'     => 270,
    'active_callback' => array(
        array(
            'setting'  => 'skin_select',
            'operator' => 'contains',
            'value'    => array( 'default', 'blackwhite' ),
        ),
        array(
            'setting'  => 'woocommerce_product_catalog_tabs',
            'operator' => '==',
            'value'    => 'product_catalog_style_tab',
        ),
        array(
            'setting'  => 'woocommerce_add_to_cart_button',
            'operator' => 'contains',
            'value'    => array( 'cart_button_four' ),
        ),
    ),
) );

Kirki::add_field( 'kortez', array(
    'label'        => esc_html__( 'Add to Cart Button Radius', 'kortez' ),
    'type'         => 'slider',
    'settings'     => 'add_cart_button_radius',
    'section'      => 'woocommerce_product_catalog',
    'transport'    => 'postMessage',
    'default'      => 0,
    'choices'      => array(
        'min'  => 0,
        'max'  => 50,
        'step' => 1,
    ),
    'priority'    => 280,
    'active_callback' => array(
        array(
            'setting'  => 'woocommerce_product_catalog_tabs',
            'operator' => '==',
            'value'    => 'product_catalog_style_tab',
        ),
        array(
            'setting'  => 'woocommerce_add_to_cart_button',
            'operator' => 'contains',
            'value'    => array( 'cart_button_two', 'cart_button_four' ),
        ),
    ),
) );

Kirki::add_field( 'kortez', array(
    'label'        => esc_html__( 'Add to Cart Button Spacing', 'kortez' ),
    'type'         => 'slider',
    'settings'     => 'cart_four_diagonal_spacing',
    'section'      => 'woocommerce_product_catalog',
    'transport'    => 'postMessage',
    'default'      => 10,
    'choices'      => array(
        'min'  => 0,
        'max'  => 50,
        'step' => 1,
    ),
    'priority'    => 290,
    'active_callback' => array(
        array(
            'setting'  => 'woocommerce_product_catalog_tabs',
            'operator' => '==',
            'value'    => 'product_catalog_style_tab',
        ),
        array(
            'setting'  => 'woocommerce_add_to_cart_button',
            'operator' => 'contains',
            'value'    => array( 'cart_button_four' ),
        ),
    ),
) );

Kirki::add_field( 'kortez', array(
    'type'        => 'custom',
    'settings'    => 'icon_group_style_separator',
    'section'     => 'woocommerce_product_catalog',
    'default'     => esc_html__( 'Icon Group Options', 'kortez' ),
    'priority'    => 300,
    'active_callback' => array(
        array(
            'setting'  => 'woocommerce_product_catalog_tabs',
            'operator' => '==',
            'value'    => 'product_catalog_style_tab',
        ),
    ),
) );

Kirki::add_field( 'kortez', array(
    'label'        => esc_html__( 'Icon Group Background Color', 'kortez' ),
    'type'         => 'color',
    'settings'     => 'icon_group_bg_color',
    'section'      => 'woocommerce_product_catalog',
    'default'      => '#ffffff',
    'priority'    => 303,
    'active_callback' => array(
        array(
            'setting'  => 'woocommerce_product_catalog_tabs',
            'operator' => '==',
            'value'    => 'product_catalog_style_tab',
        ),
        array(
            'setting'  => 'skin_select',
            'operator' => 'contains',
            'value'    => array( 'default', 'blackwhite' ),
        ),
    ),
) );

Kirki::add_field( 'kortez', array(
    'label'        => esc_html__( 'Icon Color', 'kortez' ),
    'type'         => 'color',
    'settings'     => 'icon_group_text_color',
    'section'      => 'woocommerce_product_catalog',
    'default'      => '#383838',
    'priority'    => 305,
    'active_callback' => array(
        array(
            'setting'  => 'woocommerce_product_catalog_tabs',
            'operator' => '==',
            'value'    => 'product_catalog_style_tab',
        ),
        array(
            'setting'  => 'skin_select',
            'operator' => 'contains',
            'value'    => array( 'default', 'blackwhite' ),
        ),
    ),
) );

Kirki::add_field( 'kortez', array(
    'label'        => esc_html__( 'Icon Group Border Radius', 'kortez' ),
    'type'         => 'slider',
    'settings'     => 'icon_group_one_border_radius',
    'section'      => 'woocommerce_product_catalog',
    'transport'    => 'postMessage',
    'default'      => 100,
    'choices'      => array(
        'min'  => 0,
        'max'  => 100,
        'step' => 1,
    ),
    'priority'    => 310,
    'active_callback' => array(
        array(
            'setting'  => 'woocommerce_product_catalog_tabs',
            'operator' => '==',
            'value'    => 'product_catalog_style_tab',
        ),
        array(
            'setting'  => 'icon_group_layout',
            'operator' => '==',
            'value'    => 'group_layout_one',
        ),
    ),
) );

Kirki::add_field( 'kortez', array(
    'label'        => esc_html__( 'Icon Group Border Radius', 'kortez' ),
    'type'         => 'slider',
    'settings'     => 'icon_group_two_border_radius',
    'section'      => 'woocommerce_product_catalog',
    'transport'    => 'postMessage',
    'default'      => 0,
    'choices'      => array(
        'min'  => 0,
        'max'  => 50,
        'step' => 1,
    ),
    'priority'    => 310,
    'active_callback' => array(
        array(
            'setting'  => 'woocommerce_product_catalog_tabs',
            'operator' => '==',
            'value'    => 'product_catalog_style_tab',
        ),
        array(
            'setting'  => 'icon_group_layout',
            'operator' => '==',
            'value'    => 'group_layout_two',
        ),
    ),
) );

Kirki::add_field( 'kortez', array(
    'label'        => esc_html__( 'Icon Group Border Radius', 'kortez' ),
    'type'         => 'slider',
    'settings'     => 'icon_group_three_border_radius',
    'section'      => 'woocommerce_product_catalog',
    'transport'    => 'postMessage',
    'default'      => 0,
    'choices'      => array(
        'min'  => 0,
        'max'  => 50,
        'step' => 1,
    ),
    'priority'    => 310,
    'active_callback' => array(
        array(
            'setting'  => 'woocommerce_product_catalog_tabs',
            'operator' => '==',
            'value'    => 'product_catalog_style_tab',
        ),
        array(
            'setting'  => 'icon_group_layout',
            'operator' => '==',
            'value'    => 'group_layout_three',
        ),
    ),
) );

Kirki::add_field( 'kortez', array(
    'label'        => esc_html__( 'Icon Group Border Radius', 'kortez' ),
    'type'         => 'slider',
    'settings'     => 'icon_group_four_border_radius',
    'section'      => 'woocommerce_product_catalog',
    'transport'    => 'postMessage',
    'default'      => 100,
    'choices'      => array(
        'min'  => 0,
        'max'  => 100,
        'step' => 1,
    ),
    'priority'    => 310,
    'active_callback' => array(
        array(
            'setting'  => 'woocommerce_product_catalog_tabs',
            'operator' => '==',
            'value'    => 'product_catalog_style_tab',
        ),
        array(
            'setting'  => 'icon_group_layout',
            'operator' => '==',
            'value'    => 'group_layout_four',
        ),
    ),
) );

Kirki::add_field( 'kortez', array(
    'label'        => esc_html__( 'Icon Group Spacing', 'kortez' ),
    'type'         => 'slider',
    'settings'     => 'icon_group_diagonal_spacing',
    'section'      => 'woocommerce_product_catalog',
    'transport'    => 'postMessage',
    'default'      => 10,
    'choices'      => array(
        'min'  => 0,
        'max'  => 50,
        'step' => 1,
    ),
    'priority'    => 320,
    'active_callback' => array(
        array(
            'setting'  => 'woocommerce_product_catalog_tabs',
            'operator' => '==',
            'value'    => 'product_catalog_style_tab',
        ),
        array(
            'setting'  => 'icon_group_layout',
            'operator' => 'contains',
            'value'    => array( 'group_layout_three', 'group_layout_four' ),
        ),
    ),
) );

Kirki::add_field( 'kortez', array(
    'type'        => 'custom',
    'settings'    => 'sale_tag_style_separator',
    'section'     => 'woocommerce_product_catalog',
    'default'     => esc_html__( 'Sale Tag Options', 'kortez' ),
    'priority'    => 330,
    'active_callback' => array(
        array(
            'setting'  => 'woocommerce_product_catalog_tabs',
            'operator' => '==',
            'value'    => 'product_catalog_style_tab',
        ),
    ),
) );

Kirki::add_field( 'kortez', array(
    'label'        => esc_html__( 'Sale Tag Background Color', 'kortez' ),
    'type'         => 'color',
    'settings'     => 'sale_tag_bg_color',
    'section'      => 'woocommerce_product_catalog',
    'default'      => '#DB5362',
    'priority'    => 340,
    'active_callback' => array(
        array(
            'setting'  => 'woocommerce_product_catalog_tabs',
            'operator' => '==',
            'value'    => 'product_catalog_style_tab',
        ),
    ),
) );

Kirki::add_field( 'kortez', array(
    'label'        => esc_html__( 'Sale Tag Text Color', 'kortez' ),
    'type'         => 'color',
    'settings'     => 'sale_tag_text_color',
    'section'      => 'woocommerce_product_catalog',
    'default'      => '#ffffff',
    'priority'    => 350,
    'active_callback' => array(
        array(
            'setting'  => 'skin_select',
            'operator' => 'contains',
            'value'    => array( 'default', 'blackwhite' ),
        ),
        array(
            'setting'  => 'woocommerce_product_catalog_tabs',
            'operator' => '==',
            'value'    => 'product_catalog_style_tab',
        ),
    ),
) );

Kirki::add_field( 'kortez', array(
    'label'        => esc_html__( 'Sale Button Border Radius', 'kortez' ),
    'type'         => 'slider',
    'settings'     => 'sale_button_border_radius',
    'section'      => 'woocommerce_product_catalog',
    'transport'    => 'postMessage',
    'default'      => 0,
    'choices'      => array(
        'min'  => 0,
        'max'  => 50,
        'step' => 1,
    ),
    'priority'    => 360,
    'active_callback' => array(
        array(
            'setting'  => 'woocommerce_product_catalog_tabs',
            'operator' => '==',
            'value'    => 'product_catalog_style_tab',
        ),
    ),
) );

Kirki::add_field( 'kortez', array(
    'label'        => esc_html__( 'Sale Button Spacing', 'kortez' ),
    'type'         => 'slider',
    'settings'     => 'sale_button_diagonal_spacing',
    'section'      => 'woocommerce_product_catalog',
    'transport'    => 'postMessage',
    'default'      => 8,
    'choices'      => array(
        'min'  => 0,
        'max'  => 50,
        'step' => 1,
    ),
    'priority'    => 370,
    'active_callback' => array(
        array(
            'setting'  => 'woocommerce_product_catalog_tabs',
            'operator' => '==',
            'value'    => 'product_catalog_style_tab',
        ),
    ),
) );

Kirki::add_field( 'kortez', array(
    'label'        => esc_html__( 'Product Title Typography', 'kortez' ),
    'type'         => 'typography',
    'settings'     => 'shop_product_title_font_control',
    'section'      => 'woocommerce_product_catalog',
    'default'  => array(
        'font-family'     => 'Poppins',
        'variant'         => '600',
        'font-style'      => 'normal',
        'font-size'       => '20px',
        'text-transform'  => 'none',
        'line-height'     => '1.4',
        'letter-spacing'  => '0',
        'text-decoration' => 'none',
        'color'           => '',
    ),
    'transport'   => 'auto',
    'output'      => array(
        array(
            'element' => '.woocommerce ul.products li.product .woocommerce-loop-product__title',
        ),
    ),
    'priority'    => 380,
    'active_callback' => array(
        array(
            'setting'  => 'woocommerce_product_catalog_tabs',
            'operator' => '==',
            'value'    => 'product_catalog_style_tab',
        ),
    ),
) );

Kirki::add_field( 'kortez', array(
    'label'        => esc_html__( 'Product Price Typography', 'kortez' ),
    'type'         => 'typography',
    'settings'     => 'shop_product_price_font_control',
    'section'      => 'woocommerce_product_catalog',
    'default'  => array(
        'font-family'     => 'Open Sans',
        'variant'         => '500',
        'font-style'      => 'normal',
        'font-size'       => '16px',
        'text-transform'  => 'none',
        'line-height'     => '1.3',
        'letter-spacing'  => '0',
        'text-decoration' => 'none',
        'color'           => '',
    ),
    'transport'   => 'auto',
    'output'      => array(
        array(
            'element' => '.woocommerce ul.products li.product .price .amount',
        ),
    ),
    'priority'    => 390,
    'active_callback' => array(
        array(
            'setting'  => 'woocommerce_product_catalog_tabs',
            'operator' => '==',
            'value'    => 'product_catalog_style_tab',
        ),
    ),
) );

Kirki::add_field( 'kortez', array(
    'label'        => esc_html__( 'Add to Cart Button Typography', 'kortez' ),
    'type'         => 'typography',
    'settings'     => 'shop_cart_button_font_control',
    'section'      => 'woocommerce_product_catalog',
    'default'  => array(
        'font-family'     => 'Poppins',
        'variant'         => 'regular',
        'font-style'      => 'normal',
        'font-size'       => '15px',
        'text-transform'  => 'none',
        'line-height'     => '1.5',
        'letter-spacing'  => '0',
    ),
    'transport'   => 'auto',
    'output'      => array(
        array(
            'element' => '.woocommerce .product-inner .button, .woocommerce .product-inner .added_to_cart',
        ),
    ),
    'priority'    => 400,
    'active_callback' => array(
        array(
            'setting'  => 'woocommerce_product_catalog_tabs',
            'operator' => '==',
            'value'    => 'product_catalog_style_tab',
        ),
        array(
            'setting'  => 'woocommerce_add_to_cart_button',
            'operator' => '!=',
            'value'    => array( 'cart_button_four' ),
        ),
    ),
) );

/**
 * Woocommerce single product
 */
Kirki::add_section( 'woocommerce_single_product', array(
    'title'      => esc_html__( 'Single Products', 'kortez' ),
    'panel'      => 'woocommerce',     
    'capability' => 'edit_theme_options',
) );

Kirki::add_field( 'kortez', array(
    'label'        => esc_html__( 'Image Zoom / Magnification', 'kortez' ),
    'description'  => esc_html__( 'Every slider step changes 10% zoom to the previous zoom level. For example: 1.1 zoom level is now 110% zoom.', 'kortez' ),
    'type'         => 'slider',
    'settings'     => 'single_product_iamge_magnify',
    'section'      => 'woocommerce_single_product',
    'default'      => 1,
    'choices'      => array(
        'min'  => 0,
        'max'  => 3,
        'step' => 0.1,
    ),
    'priority'     => 10,
) );

Kirki::add_field( 'kortez', array(
    'label'        => esc_html__( 'Disable Single Product Page Title', 'kortez' ),
    'type'         => 'checkbox',
    'settings'     => 'disable_single_product_title',
    'section'      => 'woocommerce_single_product',
    'default'      => true,
    'priority'     => 20,
) );

Kirki::add_field( 'kortez', array(
    'label'        => esc_html__( 'Disable Breadcrumbs', 'kortez' ),
    'type'         => 'checkbox',
    'settings'     => 'disable_single_product_breadcrumbs',
    'section'      => 'woocommerce_single_product',
    'default'      => false,
    'priority'     => 30,
) );

Kirki::add_field( 'kortez', array(
    'label'        => esc_html__( 'Disable SKU', 'kortez' ),
    'type'         => 'checkbox',
    'settings'     => 'disable_single_product_sku',
    'section'      => 'woocommerce_single_product',
    'default'      => false,
    'priority'     => 40,
) );

Kirki::add_field( 'kortez', array(
    'label'        => esc_html__( 'Disable Category', 'kortez' ),
    'type'         => 'checkbox',
    'settings'     => 'disable_single_product_category',
    'section'      => 'woocommerce_single_product',
    'default'      => false,
    'priority'     => 50,
) );

Kirki::add_field( 'kortez', array(
    'label'        => esc_html__( 'Disable Tags', 'kortez' ),
    'type'         => 'checkbox',
    'settings'     => 'disable_single_product_tags',
    'section'      => 'woocommerce_single_product',
    'default'      => false,
    'priority'     => 60,
) );

Kirki::add_field( 'kortez', array(
    'label'        => esc_html__( 'Disable Product Tabs', 'kortez' ),
    'type'         => 'checkbox',
    'settings'     => 'disable_single_product_tabs',
    'section'      => 'woocommerce_single_product',
    'default'      => false,
    'priority'     => 70,
) );

Kirki::add_field( 'kortez', array(
    'label'        => esc_html__( 'Disable Related Products', 'kortez' ),
    'type'         => 'checkbox',
    'settings'     => 'disable_single_product_related_products',
    'section'      => 'woocommerce_single_product',
    'default'      => false,
    'priority'     => 80,
) );