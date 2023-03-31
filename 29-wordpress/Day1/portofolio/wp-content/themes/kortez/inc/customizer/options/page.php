<?php
/**
 * Pages Customizer options
 *
 * @package Kortez
 */

/**
 * Pages
 */
Kirki::add_section( 'pages_options', array(
    'title'          => esc_html__( 'Pages', 'kortez' ),
    'capability'     => 'edit_theme_options',
    'priority'       => '150',
) );

Kirki::add_field( 'kortez',  array(
    'label'       => esc_html__( 'Page Title', 'kortez' ),
    'type'        => 'select',
    'settings'    => 'disable_page_title',
    'section'     => 'pages_options',
    'default'     => 'disable_front_page',
    'choices'     => array(
        'disable_all_pages'   => esc_html__( 'Disable from all', 'kortez' ),
        'enable_all_pages'    => esc_html__( 'Enable in all', 'kortez' ),
        'disable_front_page'  => esc_html__( 'Disable from frontpage only', 'kortez' ),
    ),
    'priority'    => 10,
) );

Kirki::add_field( 'kortez',  array(
    'label'       => esc_html__( 'Page Title Position', 'kortez' ),
    'type'        => 'select',
    'settings'    => 'page_title_position',
    'section'     => 'pages_options',
    'default'     => 'above_feature_image',
    'choices'     => array(
        'below_feature_image' => esc_html__( 'Below Feature Image', 'kortez' ),
        'above_feature_image' => esc_html__( 'Top of the Page', 'kortez' ),
    ),
    'priority'    => 20,
    'active_callback' => array(
        array(
            array(
                'setting'  => 'disable_transparent_header_page',
                'operator' => '==',
                'value'    => true,
            ),
            array(
                'setting'  => 'header_layout',
                'operator' => '!=',
                'value'    => 'header_two',
            ),
        ),
    ),
) );

Kirki::add_field( 'kortez', array(
    'label'       => esc_html__( 'Feature Image', 'kortez' ),
    'type'        => 'select',
    'settings'    => 'page_feature_image',
    'section'     => 'pages_options',
    'default'     => 'show_in_all_pages',
    'choices' => array(
        'show_in_all_pages'    => esc_html__( 'Show in all Pages', 'kortez' ),
        'disable_in_all_pages' => esc_html__( 'Disable in all Pages', 'kortez' ),
        'disable_in_frontpage' => esc_html__( 'Disable in Frontpage only', 'kortez' ),
        'show_in_frontpage'    => esc_html__( 'Show in Frontpage only', 'kortez' ),
    ),
    'priority'    => 30,
    'active_callback' => array(
        array(
            array(
                'setting'  => 'disable_transparent_header_page',
                'operator' => '==',
                'value'    => true,
            ),
            array(
                'setting'  => 'header_layout',
                'operator' => '!=',
                'value'    => 'header_two',
            ),
        ),
    ),
) );

Kirki::add_field( 'kortez', array(
    'label'       => esc_html__( 'Choose Image Size', 'kortez' ),
    'type'        => 'select',
    'settings'    => 'render_pages_image_size',
    'section'     => 'pages_options',
    'default'     => 'kortez-1370-550',
    'placeholder' => esc_html__( 'Select Image Size', 'kortez' ),
    'choices'     => kortez_get_intermediate_image_sizes(),
    'priority'    => 40,
    'active_callback' => array(
        array(
            array(
                'setting'  => 'page_feature_image',
                'operator' => 'contains',
                'value'    => array( 'show_in_all_pages', 'show_in_frontpage', 'disable_in_frontpage' ),
            ),
            array(
                'setting'  => 'disable_transparent_header_page',
                'operator' => '==',
                'value'    => false,
            ),
        ),
    ),
) );

Kirki::add_field( 'kortez', array(
    'label'       => esc_html__( 'Disable Transparent Header', 'kortez' ),
    'type'        => 'checkbox',
    'settings'    => 'disable_transparent_header_page',
    'section'     => 'pages_options',
    'default'     => true,
    'priority'    => 50,
    'active_callback' => array(
        array(
            'setting'  => 'header_layout',
            'operator' => '==',
            'value'    => 'header_two',
        ),
    ),
) );

Kirki::add_field( 'kortez', array(
    'label'       => esc_html__( 'Transparent Header Banner Height (in px)', 'kortez' ),
    'type'        => 'slider',
    'settings'    => 'transparent_header_banner_page_height',
    'section'     => 'pages_options',
    'transport'   => 'postMessage',
    'default'     => 400,
    'choices'     => array(
        'min'  => 50,
        'max'  => 1500,
        'step' => 10,
    ),
    'priority'    => 60,
    'active_callback' => array(
        array(
            'setting'  => 'header_layout',
            'operator' => '==',
            'value'    => 'header_two',
        ),
        array(
            'setting'  => 'disable_transparent_header_page',
            'operator' => '==',
            'value'    => false,
        ),
    ),
) );

Kirki::add_field( 'kortez', array(
    'label'        => esc_html__( 'Transparent Header Banner Image Size', 'kortez' ),
    'type'         => 'radio',
    'settings'     => 'transparent_header_banner_page_size',
    'section'      => 'pages_options',
    'default'      => 'cover',
    'choices'      => array(
        'cover'    => esc_html__( 'Cover', 'kortez' ),
        'pattern'  => esc_html__( 'Pattern / Repeat', 'kortez' ),
        'norepeat' => esc_html__( 'No Repeat', 'kortez' ),
    ),
    'priority'    => 70,
    'active_callback' => array(
        array(
            'setting'  => 'header_layout',
            'operator' => '==',
            'value'    => 'header_two',
        ),
        array(
            'setting'  => 'disable_transparent_header_page',
            'operator' => '==',
            'value'    => false,
        ),
    ),
) );

Kirki::add_field( 'kortez', array(
    'label'       => esc_html__( 'Transparent Header Banner Overlay Opacity', 'kortez' ),
    'type'        => 'number',
    'settings'    => 'transparent_header_banner_page_opacity',
    'section'     => 'pages_options',
    'default'     => 4,
    'choices' => array(
        'min' => '0',
        'max' => '9',
        'step' => '1',
    ),
    'priority'    => 80,
    'active_callback' => array(
        array(
            'setting'  => 'header_layout',
            'operator' => '==',
            'value'    => 'header_two',
        ),
        array(
            'setting'  => 'disable_transparent_header_page',
            'operator' => '==',
            'value'    => false,
        ),
    ),
) );

/**
 * 404 Error Page
 */
Kirki::add_section( 'error404_options', array(
    'title'          => esc_html__( '404 Page', 'kortez' ),
    'capability'     => 'edit_theme_options',
    'priority'       => '160',
) );

Kirki::add_field( 'kortez', array(
    'label'       => esc_html__( 'Image', 'kortez' ),
    'description' => esc_html__( 'Recommended image size 360x200 pixel.', 'kortez' ),
    'type'        => 'image',
    'settings'    => 'error404_image',
    'section'     => 'error404_options',
    'default'     => '',
    'choices'     => array(
        'save_as' => 'id',
    ),
    'priority'    => 10,
) );
Kirki::add_field( 'kortez', array(
    'label'       => esc_html__( 'Choose Image Size', 'kortez' ),
    'type'        => 'select',
    'settings'    => 'render_error404_image_size',
    'section'     => 'error404_options',
    'default'     => 'full',
    'placeholder' => esc_html__( 'Select Image Size', 'kortez' ),
    'choices'     => kortez_get_intermediate_image_sizes(),
    'priority'    => 20,
) );