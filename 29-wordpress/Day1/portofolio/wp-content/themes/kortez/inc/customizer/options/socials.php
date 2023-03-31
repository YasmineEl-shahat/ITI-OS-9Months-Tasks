<?php
/**
 * Social Media Customizer options
 *
 * @package Kortez
 */

/**
 * Social Media
 */
Kirki::add_panel( 'social_media_options', array(
    'title'          => esc_html__( 'Social Media', 'kortez' ),
    'priority'       => '96',
) );

Kirki::add_section( 'social_media_elements_options', array(
    'title'          => esc_html__( 'Elements', 'kortez' ),
    'capability'     => 'edit_theme_options',
    'priority'       => '10',
    'panel'          => 'social_media_options',     
) );

Kirki::add_field( 'kortez', array(
    'label'        => esc_html__( 'Disable from Header', 'kortez' ),
    'type'         => 'checkbox',
    'settings'     => 'disable_header_social_links',
    'section'      => 'social_media_elements_options',
    'default'      => false,
    'priority'     =>  10,
) );

Kirki::add_field( 'kortez', array(
    'label'        => esc_html__( 'Disable from Footer', 'kortez' ),
    'type'         => 'checkbox',
    'settings'     => 'disable_footer_social_links',
    'section'      => 'social_media_elements_options',
    'default'      => false,
    'priority'     =>  20,
) );

Kirki::add_field( 'kortez', array(
    'label'       => esc_html__( 'Footer Social Icons Size', 'kortez' ),
    'description' => esc_html__( 'Only applicable to the footer social icons.', 'kortez' ),
    'type'        => 'number',
    'settings'    => 'social_icons_size',
    'section'     => 'social_media_elements_options',
    'transport'   => 'postMessage',
    'default'     => 15,
    'choices'     => array(
        'min'  => 10,
        'max'  => 100,
        'step' => 1,
    ),
    'priority'    =>  30,
    'active_callback' => array(
        array(
            'setting'  => 'disable_footer_social_links',
            'operator' => '==',
            'value'    => false,
        ),
    ),
) );

Kirki::add_field( 'kortez', array(
    'label'       => esc_html__( 'Social Links', 'kortez' ),
    'type'        => 'repeater',
    'description' => esc_html__( 'By default, Social Icons will appear in both header and footer section.', 'kortez' ),
    'section'     => 'social_media_elements_options',
    'row_label' => array(
        'type'  => 'text',
        'value' => esc_html__( 'Social Link', 'kortez' ),
    ),
    'settings' => 'social_media_links',
    'default' => array(
        array(
            'icon'      => '',
            'link'      => '',
            'target'    => true,
            ),      
    ),
    'fields' => array(
        'icon' => array(
            'label'       => esc_html__( 'Fontawesome Icon', 'kortez' ),
            'type'        => 'text',
            'description' => esc_html__( 'Input Icon name. For Example:- fab fa-facebook For more icons https://fontawesome.com/icons?d=gallery&m=free', 'kortez' ),
        ),
        'link' => array(
            'label'       => esc_html__( 'Link', 'kortez' ),
            'type'        => 'text',
        ),
        'target' => array(
            'label'       => esc_html__( 'Open Link in New Window', 'kortez' ),
            'type'        => 'checkbox',
            'default'     => true,
        ),          
    ),
    'choices' => array(
        'limit' => 20,
    ),
    'priority' =>  40,
) );

/**
 * Social Media Responsive
 */
Kirki::add_section( 'social_responsive', array(
    'title'          => esc_html__( 'Responsive', 'kortez' ),
    'description'    => esc_html__( 'These options will only apply to Tablet and Mobile devices. Please
        click on below Tablet or Mobile Icons to see changes.', 'kortez' ),
    'capability'     => 'edit_theme_options',
    'priority'       => '20',
    'panel'          => 'social_media_options',     
) );

Kirki::add_field( 'kortez', array(
    'label'       => esc_html__( 'Disable Social Icons from Header', 'kortez' ),
    'type'        => 'checkbox',
    'settings'    => 'disable_mobile_social_icons_header',
    'section'     => 'social_responsive',
    'default'     => false,
    'priority'    =>  10,
    'active_callback' => array(
        array(
            'setting'  => 'disable_header_social_links',
            'operator' => '==',
            'value'    => false,
        ),
    ),
) );

Kirki::add_field( 'kortez', array(
    'label'       => esc_html__( 'Disable Social Icons from Footer', 'kortez' ),
    'type'        => 'checkbox',
    'settings'    => 'disable_mobile_social_icons_footer',
    'section'     => 'social_responsive',
    'default'     => false,
    'priority'    =>  20,
    'active_callback' => array(
        array(
            'setting'  => 'disable_footer_social_links',
            'operator' => '==',
            'value'    => false,
        ),
    ),
) );