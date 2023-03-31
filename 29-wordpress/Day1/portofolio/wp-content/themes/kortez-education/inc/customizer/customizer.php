<?php

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
add_action( 'customize_preview_init', 'kortez_education_customize_preview_js', 999, 1 );
function kortez_education_customize_preview_js() {
	wp_enqueue_script( 'kortez-education-customizer-js', get_stylesheet_directory_uri() . '/inc/customizer/customizer.js', array( 'customize-preview' ) );
}

/**
 * Enqueues styles to the customizer preview.
 */
function kortez_education_customizer_style() {
	wp_enqueue_style( 'kortez-education-customizer-style', get_stylesheet_directory_uri() . '/inc/customizer/customizer.css' );
}
add_action( 'customize_controls_enqueue_scripts', 'kortez_education_customizer_style', 99 );

/**
 * Kirki Customizer
 *
 * @return void
 */
add_action( 'init' , 'kortez_education_kirki_fields', 999, 1 );

function kortez_education_kirki_fields(){

	/**
	* If kirki is not installed do not run the kirki fields
	*/

	if ( !class_exists( 'Kirki' ) ) {
		return;
	}


	Kirki::add_field( 'kortez', array(
		'label'       => esc_html__( 'Footer Layouts', 'kortez-education' ),
		'type'        => 'radio-image',
		'settings'    => 'footer_layout',
		'section'     => 'footer_style_options',
		'default'     => 'footer_five',
		'choices'     => apply_filters( 'kortez_footer_layout_filter', array(
			'footer_one'   => get_template_directory_uri() . '/assets/images/footer-layout-1.png',
			'footer_two'   => get_template_directory_uri() . '/assets/images/footer-layout-2.png',
			'footer_three' => get_template_directory_uri() . '/assets/images/footer-layout-3.png',
		) ),
		'priority'	  =>  20,
	) );

	Kirki::add_field( 'kortez', array(
		'label'        => esc_html__( 'Disable Section Border', 'kortez-education' ),
		'type'         => 'checkbox',
		'settings'     => 'disable_footer_border',
		'section'      => 'footer_style_options',
		'default'      => false,
		'priority'	   => 150,
		'active_callback' => array(
			array(
				'setting'  => 'footer_layout',
				'operator' => 'contains',
				'value'    => array( 'footer_five' ),
			),
		),
	) );

	// Featured Pages Section
	Kirki::add_section( 'featured_pages_options', array(
	    'title'      => esc_html__( 'Featured Pages', 'kortez-education' ),
	    'panel'      => 'blog_homepage_options',	   
	    'capability' => 'edit_theme_options',
	    'priority'   => 6,
	) );

	Kirki::add_field( 'kortez', array(
		'label'        => esc_html__( 'Disable Featured Pages Section', 'kortez-education' ),
		'type'         => 'checkbox',
		'settings'     => 'disable_featured_pages_section',
		'section'      => 'featured_pages_options',
		'default'      => false,
		'priority'	   => 10,
	) );

	Kirki::add_field( 'kortez', array(
		'label'        => esc_html__( 'Disable Section Title', 'kortez-education' ),
		'type'         => 'checkbox',
		'settings'     => 'disable_featured_pages_section_title',
		'section'      => 'featured_pages_options',
		'default'      => true,
		'priority'	   => 20,
	) );

	Kirki::add_field( 'kortez', array(
		'label'       => esc_html__( 'Section Title', 'kortez-education' ),
		'type'        => 'text',
		'settings'    => 'featured_pages_section_title',
		'section'     => 'featured_pages_options',
		'default'     => '',
		'priority'	  => 30,
		'active_callback' => array(
			array(
				'setting'  => 'disable_featured_pages_section_title',
				'operator' => '==',
				'value'    => false,
			),
		),
	) );

	Kirki::add_field( 'kortez', array(
		'label'        => esc_html__( 'Section Title Typography', 'kortez-education' ),
		'type'         => 'typography',
		'settings'     => 'featured_pages_section_title_font_control',
		'section'      => 'featured_pages_options',
		'default'  => array(
			'font-family'    => 'Poppins',
			'variant'        => '600',
			'font-size'      => '24px',
			'text-transform' => 'none',
			'line-height'    => '1.2',
		),
		'priority'	  => 40,
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element' => '.section-feature-pages-area .section-title',
			),
		),
		'active_callback' => array(
			array(
				'setting'  => 'disable_featured_pages_section_title',
				'operator' => '==',
				'value'    => false,
			),
		),
	) );

	Kirki::add_field( 'kortez', array(
		'label'        => esc_html__( 'Disable Section Description', 'kortez-education' ),
		'type'         => 'checkbox',
		'settings'     => 'disable_featured_pages_section_description',
		'section'      => 'featured_pages_options',
		'default'      => true,
		'priority'	   => 50,
	) );

	Kirki::add_field( 'kortez', array(
		'label'       => esc_html__( 'Section Description', 'kortez-education' ),
		'type'        => 'text',
		'settings'    => 'featured_pages_section_description',
		'section'     => 'featured_pages_options',
		'default'     => '',
		'priority'	  => 60,
		'active_callback' => array(
			array(
				'setting'  => 'disable_featured_pages_section_description',
				'operator' => '==',
				'value'    => false,
			),
		),
	) );

	Kirki::add_field( 'kortez', array(
		'label'        => esc_html__( 'Section Description Typography', 'kortez-education' ),
		'type'         => 'typography',
		'settings'     => 'featured_pages_section_description_font_control',
		'section'      => 'featured_pages_options',
		'default'  => array(
			'font-family'    => 'Open Sans',
			'variant'        => 'regular',
			'font-size'      => '16px',
			'text-transform' => 'none',
			'line-height'    => '1.8',
		),
		'priority'	  => 70,
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element' => '.section-feature-pages-area .section-title-wrap p',
			),
		),
		'active_callback' => array(
			array(
				'setting'  => 'disable_featured_pages_section_description',
				'operator' => '==',
				'value'    => false,
			),
		),
	) );

	Kirki::add_field( 'kortez', array(
		'label'       => esc_html__( 'Section Title and Description Alignment', 'kortez-education' ),
		'type'        => 'select',
		'settings'    => 'featured_pages_section_title_desc_alignment',
		'section'     => 'featured_pages_options',
		'default'     => 'text-left',
		'choices'     => array(
			'text-left'	 	=> esc_html__( 'Left', 'kortez-education' ),
			'text-center'  	=> esc_html__( 'Center', 'kortez-education' ),   
			'text-right'		=> esc_html__( 'Right', 'kortez-education' ),
		),
		'priority'	   => 80,
		'active_callback' => array(
			array(
				array(
					'setting'  => 'disable_featured_pages_section_title',
					'operator' => '==',
					'value'    => false,
				),
				array(
					'setting'  => 'disable_featured_pages_section_description',
					'operator' => '==',
					'value'    => false,
				),
			),
		),
	) );

	Kirki::add_field( 'kortez', array(
		'label'       => esc_html__( 'Section Layout', 'kortez-education' ),
		'description' => esc_html__( 'Select layout & scroll below to change its options', 'kortez-education' ),
		'type'        => 'radio-image',
		'settings'    => 'featured_pages_section_layouts',
		'section'     => 'featured_pages_options',
		'default'     => 'featured_pages_layout_one',
		'choices'     => apply_filters( 'kortez_education_feature_pages_section_layouts_filter', array(
			'featured_pages_layout_one'    => get_stylesheet_directory_uri() . '/assets/images/feature-page-layout-one.png',
		) ),
		'priority'	   => 90,
	) );

	Kirki::add_field( 'kortez', array(
		'label'       => esc_html__( 'Columns', 'kortez-education' ),
		'type'        => 'select',
		'settings'    => 'featured_pages_columns',
		'section'     => 'featured_pages_options',
		'default'     => 'four_columns',
		'placeholder' => esc_attr__( 'Select category', 'kortez-education' ),
		'choices'  => array(
			'one_column'    => esc_html__( '1 Column', 'kortez-education' ),
			'two_columns'   => esc_html__( '2 Columns', 'kortez-education' ),
			'three_columns' => esc_html__( '3 Columns', 'kortez-education' ),
			'four_columns'  => esc_html__( '4 Columns', 'kortez-education' ),
		),
		'priority'	   => 100,
	) );

	Kirki::add_field( 'kortez', array(
		'label'       => esc_html__( 'Page 1', 'kortez-education' ),
		'type'        => 'select',
		'settings'    => 'featured_pages_one',
		'section'     => 'featured_pages_options',
		'default'     => '',
		'placeholder' => esc_html__( 'Select Page 1', 'kortez-education' ),
		'choices'     => kortez_education_get_pages(),
		'priority'	  => 110,
		'active_callback' => array(
			array(
				'setting'  => 'featured_pages_columns',
				'operator' => 'contains',
				'value'    => array( 'one_column', 'two_columns', 'three_columns', 'four_columns' ),
			),
		),
	) );

	Kirki::add_field( 'kortez', array(
		'label'       => esc_html__( 'Page 2', 'kortez-education' ),
		'type'        => 'select',
		'settings'    => 'featured_pages_two',
		'section'     => 'featured_pages_options',
		'default'     => '',
		'placeholder' => esc_html__( 'Select Page 2', 'kortez-education' ),
		'choices'     => kortez_education_get_pages(),
		'priority'	  => 120,
		'active_callback' => array(
			array(
				'setting'  => 'featured_pages_columns',
				'operator' => 'contains',
				'value'    => array( 'two_columns', 'three_columns', 'four_columns' ),
			),
		),
	) );

	Kirki::add_field( 'kortez', array(
		'label'       => esc_html__( 'Page 3', 'kortez-education' ),
		'type'        => 'select',
		'settings'    => 'featured_pages_three',
		'section'     => 'featured_pages_options',
		'default'     => '',
		'choices'     => kortez_education_get_pages(),
		'placeholder' => esc_html__( 'Select Page 3', 'kortez-education' ),
		'priority'	  => 130,
		'active_callback' => array(
			array(
				'setting'  => 'featured_pages_columns',
				'operator' => 'contains',
				'value'    => array( 'three_columns', 'four_columns' ),
			),
		),
	) );

	Kirki::add_field( 'kortez', array(
		'label'       => esc_html__( 'Page 4', 'kortez-education' ),
		'type'        => 'select',
		'settings'    => 'featured_pages_four',
		'section'     => 'featured_pages_options',
		'default'     => '',
		'choices'     => kortez_education_get_pages(),
		'placeholder' => esc_html__( 'Select Page 4', 'kortez-education' ),
		'priority'	  => 140,
		'active_callback' => array(
			array(
				'setting'  => 'featured_pages_columns',
				'operator' => 'contains',
				'value'    => array( 'four_columns' ),
			),
		),
	) );

	Kirki::add_field( 'kortez', array(
		'label'       => esc_html__( 'Featured Page Overlay Opacity', 'kortez-education' ),
		'type'        => 'number',
		'settings'    => 'featured_pages_overlay_opacity',
		'section'     => 'featured_pages_options',
		'default'     => 2,
		'choices' => array(
			'min' => '0',
			'max' => '9',
			'step' => '1',
		),
		'priority'	   => 150,
	) );

	Kirki::add_field( 'kortez', array(
		'label'        => esc_html__( 'Height (in px)', 'kortez-education' ),
		'description'  => esc_html__( 'This option will only apply to Desktop. Please click on below Desktop Icon to see changes. Automatically adjust by theme default in the responsive devices.
		', 'kortez-education' ),
		'type'         => 'slider',
		'settings'     => 'featured_pages_height',
		'section'      => 'featured_pages_options',
		'transport'    => 'postMessage',
		'default'      => 250,
		'choices' => array(
			'min' => '100',
			'max' => '1200',
			'step' => '10',
		),
		'priority'	   => 160,
	) );

	Kirki::add_field( 'kortez', array(
		'label'       => esc_html__( 'Choose Image Size', 'kortez-education' ),
		'type'        => 'select',
		'settings'    => 'render_feature_pages_image_size',
		'section'     => 'featured_pages_options',
		'default'     => 'kortez-420-300',
		'placeholder' => esc_html__( 'Select Image Size', 'kortez-education' ),
		'choices'     => kortez_get_intermediate_image_sizes(),
		'priority'	  => 170,
	) );

	Kirki::add_field( 'kortez', array(
		'label'        => esc_html__( 'Background Image Size', 'kortez-education' ),
		'type'         => 'radio',
		'settings'     => 'featured_pages_image_size',
		'section'      => 'featured_pages_options',
		'default'      => 'cover',
		'choices'      => array(
			'cover'    => esc_html__( 'Cover', 'kortez-education' ),
			'pattern'  => esc_html__( 'Pattern / Repeat', 'kortez-education' ),
			'norepeat' => esc_html__( 'No Repeat', 'kortez-education' ),
		),
		'priority'	   => 180,
	) );

	Kirki::add_field( 'kortez', array(
		'label'       => esc_html__( 'Page Border Radius (px)', 'kortez-education' ),
		'type'        => 'slider',
		'settings'    => 'featured_pages_radius',
		'section'     => 'featured_pages_options',
		'transport'	  => 'postMessage', 
		'default'     =>  0,
		'choices'     => array(
			'min'  => 0,
			'max'  => 50,
			'step' => 1,
		),
		'priority'	   => 190,
	) );

	Kirki::add_field( 'kortez', array(
		'label'       => esc_html__( 'Disable Page Title', 'kortez-education' ),
		'type'        => 'checkbox',
		'settings'    => 'disable_featured_pages_title',
		'section'     => 'featured_pages_options',
		'default'     => false,
		'priority'	  => 200,
	) );

	Kirki::add_field( 'kortez', array(
		'label'        => esc_html__( 'Page Title Color', 'kortez-education' ),
		'type'         => 'color',
		'settings'     => 'featured_pages_title_color',
		'section'      => 'featured_pages_options',
		'default'      => '#1a1a1a',
		'priority'	   => 210,
		'active_callback' => array(
			array(
				'setting'  => 'skin_select',
				'operator' => 'contains',
				'value'    => array( 'default', 'blackwhite' ),
			),
			array(
				'setting'  => 'disable_featured_pages_title',
				'operator' => '==',
				'value'    => false,
			),
		),
	) );

	Kirki::add_field( 'kortez', array(
		'label'        => esc_html__( 'Page Hover Color', 'kortez-education' ),
		'type'         => 'color',
		'settings'     => 'featured_pages_hover_color',
		'section'      => 'featured_pages_options',
		'default'      => '#086abd',
		'priority'	   => 220,
		'active_callback' => array(
			array(
				'setting'  => 'disable_featured_pages_title',
				'operator' => '==',
				'value'    => false,
			),
		),
	) );

	Kirki::add_field( 'kortez', array(
		'label'       => esc_html__( 'Page Title Horizontal Alignment', 'kortez-education' ),
		'type'        => 'select',
		'settings'    => 'featured_pages_text_alignment',
		'section'     => 'featured_pages_options',
		'default'     => 'text-center',
		'choices'     => array(
			'text-left'	 	=> esc_html__( 'Left', 'kortez-education' ),
			'text-center'  	=> esc_html__( 'Center', 'kortez-education' ),   
			'text-right'	=> esc_html__( 'Right', 'kortez-education' ),
		),
		'priority'	   => 230,
		'active_callback' => array(
			array(
				'setting'  => 'disable_featured_pages_title',
				'operator' => '==',
				'value'    => false,
			),
		),
	) );

	Kirki::add_field( 'kortez', array(
		'label'       => esc_html__( 'Page Title Vertical Alignment', 'kortez-education' ),
		'type'        => 'select',
		'settings'    => 'featured_pages_title_alignment',
		'section'     => 'featured_pages_options',
		'default'     => 'align-center',
		'choices'     => array(
			'align-top'	 	=> esc_html__( 'Top', 'kortez-education' ),
			'align-center'  => esc_html__( 'Center', 'kortez-education' ),   
			'align-bottom'  => esc_html__( 'Bottom', 'kortez-education' ),
		),
		'priority'	   => 240,
		'active_callback' => array(
			array(
				'setting'  => 'disable_featured_pages_title',
				'operator' => '==',
				'value'    => false,
			),
		),
	) ); 

	Kirki::add_field( 'kortez', array(
		'label'        => esc_html__( 'Page Title Typography', 'kortez-education' ),
		'type'         => 'typography',
		'settings'     => 'featured_pages_font_control',
		'section'      => 'featured_pages_options',
		'default'  => array(
			'font-family'    => 'Poppins',
			'variant'        => '500',
			'font-size'      => '18px',
			'text-transform' => 'uppercase',
			'line-height'    => '1.4',
		),
		'priority'	  => 250,
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element' => '.feature-pages-content-wrap .feature-pages-content .feature-pages-title',
			),
		),
		'active_callback' => array(
			array(
				'setting'  => 'disable_featured_pages_title',
				'operator' => '==',
				'value'    => false,
			),
		),
	) );

	Kirki::add_field( 'kortez', array(
		'label'        => esc_html__( 'Disable Featured Pages', 'kortez-education' ),
		'type'         => 'checkbox',
		'settings'     => 'disable_mobile_featured_pages',
		'section'      => 'blog_page_responsive',
		'default'      => false,
		'priority'	   => 10,
		'active_callback' => array(
			array(
				'setting'  => 'disable_featured_pages_section',
				'operator' => '=',
				'value'    => false,
			),
		),
	) );

	// Blog advertisement banner
	Kirki::add_section( 'blog_advert_banner_options', array(
	    'title'          => esc_html__( 'Blog Advertisement Banner', 'kortez-education' ),
	    'panel'          => 'blog_homepage_options',
	    'capability'     => 'edit_theme_options',
	    'priority'       => 8,
	) );

	Kirki::add_field( 'kortez', array(
		'label'        => esc_html__( 'Advertisement Banner', 'kortez-education' ),
		'description'  => esc_html__( 'Image dimensions 1230 by 100 pixels is recommended.', 'kortez-education' ),
		'type'         => 'image',
		'settings'     => 'blog_advertisement_banner',
		'section'      => 'blog_advert_banner_options',
		'default'      => '',
		'priority'	   => '10',
		'choices'     => array(
			'save_as' => 'id',
		),
	) );

	Kirki::add_field( 'kortez', array(
		'label'       => esc_html__( 'Choose Image Size', 'kortez-education' ),
		'type'        => 'select',
		'settings'    => 'render_blog_ad_image_size',
		'section'     => 'blog_advert_banner_options',
		'default'     => 'full',
		'placeholder' => esc_html__( 'Select Image Size', 'kortez-education' ),
		'choices'     => kortez_get_intermediate_image_sizes(),
		'priority'	  => 15,
	) );

	Kirki::add_field( 'kortez', array(
		'label'    => esc_html__( 'Advertisement Banner Link', 'kortez-education' ),
		'type'     => 'link',
		'settings' => 'blog_advertisement_banner_link',
		'section'  => 'blog_advert_banner_options',
		'default'  => '',
		'priority' => '20',
	) );

	Kirki::add_field( 'kortez', array(
		'label'    		=> esc_html__( 'Advertisement Banner Target', 'kortez-education' ),
		'description' 	=> esc_html__( 'If enabled, the page will be open in an another browser tab.', 'kortez-education' ),
		'type'     		=> 'checkbox',
		'settings' 		=> 'blog_advertisement_banner_target',
		'section'  		=> 'blog_advert_banner_options',
		'default'  		=> true,
		'priority' 		=> '30',
	) );

	Kirki::add_field( 'kortez', array(
		'label'        => esc_html__( 'Disable Advertisement Banner', 'kortez-education' ),
		'type'         => 'checkbox',
		'settings'     => 'disable_mobile_blog_advertisement_banner',
		'section'      => 'blog_page_responsive',
		'default'      => false,
		'priority'	   => 15,
		'active_callback' => array(
			array(
		        'setting'  => 'blog_advertisement_banner',
		        'operator' => '!==',
		        'value'    => '',
		    ),
		    array(
		        'setting'  => 'blog_advertisement_banner',
		        'operator' => '!==',
		        'value'    => false,
		    ),
		    array(
		        'setting'  => 'blog_advertisement_banner',
		        'operator' => '!==',
		        'value'    => 0,
		    ),
		    array(
		        'setting'  => 'blog_advertisement_banner',
		        'operator' => '!==',
		        'value'    => null,
		    ),
		),
	) );

	// featured posts two
	Kirki::add_section( 'feature_posts_two_options', array(
	    'title'          => esc_html__( 'Featured Posts Two', 'kortez-education' ),
	    'panel'          => 'blog_homepage_options',
	    'capability'     => 'edit_theme_options',
	    'priority'       => 9,
	) );

	Kirki::add_field( 'kortez', array(
		'label'        => esc_html__( 'Disable Featured Posts Two Section', 'kortez-education' ),
		'type'         => 'checkbox',
		'settings'     => 'disable_feature_posts_two_section',
		'section'      => 'feature_posts_two_options',
		'default'      => true,
		'priority'	   => 10,
	) );

	Kirki::add_field( 'kortez', array(
		'label'        => esc_html__( 'Disable Section Title', 'kortez-education' ),
		'type'         => 'checkbox',
		'settings'     => 'disable_feature_posts_two_section_title',
		'section'      => 'feature_posts_two_options',
		'default'      => true,
		'priority'	   => 20,
	) );

	Kirki::add_field( 'kortez', array(
		'label'       => esc_html__( 'Section Title', 'kortez-education' ),
		'type'        => 'text',
		'settings'    => 'feature_posts_two_section_title',
		'section'     => 'feature_posts_two_options',
		'default'     => '',
		'priority'	   => 30,
		'active_callback' => array(
			array(
				'setting'  => 'disable_feature_posts_two_section_title',
				'operator' => '==',
				'value'    => false,
			),
		),
	) );

	Kirki::add_field( 'kortez', array(
		'label'        => esc_html__( 'Section Title Typography', 'kortez-education' ),
		'type'         => 'typography',
		'settings'     => 'feature_posts_two_section_title_font_control',
		'section'      => 'feature_posts_two_options',
		'default'  => array(
			'font-family'    => 'Poppins',
			'variant'        => '600',
			'font-size'      => '24px',
			'text-transform' => 'none',
			'line-height'    => '1.2',
		),
		'priority'	   => 40,
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element' => '.section-feature-posts-two-area .section-title',
			),
		),
		'active_callback' => array(
			array(
				'setting'  => 'disable_feature_posts_two_section_title',
				'operator' => '==',
				'value'    => false,
			),
		),
	) );

	Kirki::add_field( 'kortez', array(
		'label'        => esc_html__( 'Disable Section Description', 'kortez-education' ),
		'type'         => 'checkbox',
		'settings'     => 'disable_feature_posts_two_section_description',
		'section'      => 'feature_posts_two_options',
		'default'      => true,
		'priority'	   => 50,
	) );

	Kirki::add_field( 'kortez', array(
		'label'       => esc_html__( 'Section Description', 'kortez-education' ),
		'type'        => 'text',
		'settings'    => 'feature_posts_two_section_description',
		'section'     => 'feature_posts_two_options',
		'default'     => '',
		'priority'	   => 60,
		'active_callback' => array(
			array(
				'setting'  => 'disable_feature_posts_two_section_description',
				'operator' => '==',
				'value'    => false,
			),
		),
	) );

	Kirki::add_field( 'kortez', array(
		'label'        => esc_html__( 'Section Description Typography', 'kortez-education' ),
		'type'         => 'typography',
		'settings'     => 'feature_posts_two_section_description_font_control',
		'section'      => 'feature_posts_two_options',
		'default'  => array(
			'font-family'    => 'Open Sans',
			'variant'        => 'regular',
			'font-size'      => '16px',
			'text-transform' => 'none',
			'line-height'    => '1.8',
		),
		'priority'	   => 70,
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element' => '.section-feature-posts-two-area .section-title-wrap p',
			),
		),
		'active_callback' => array(
			array(
				'setting'  => 'disable_feature_posts_two_section_description',
				'operator' => '==',
				'value'    => false,
			),
		),
	) );

	Kirki::add_field( 'kortez', array(
		'label'       => esc_html__( 'Section Title and Description Alignment', 'kortez-education' ),
		'type'        => 'select',
		'settings'    => 'feature_posts_two_section_title_desc_alignment',
		'section'     => 'feature_posts_two_options',
		'default'     => 'text-left',
		'choices'     => array(
			'text-left'	 	=> esc_html__( 'Left', 'kortez-education' ),
			'text-center'  	=> esc_html__( 'Center', 'kortez-education' ),   
			'text-right'	=> esc_html__( 'Right', 'kortez-education' ),
		),
		'priority'	   => 80,
		'active_callback' => array(
			array(
				array(
					'setting'  => 'disable_feature_posts_two_section_title',
					'operator' => '==',
					'value'    => false,
				),
				array(
					'setting'  => 'disable_feature_posts_two_section_description',
					'operator' => '==',
					'value'    => false,
				),
			),
		),
	) );

	Kirki::add_field( 'kortez', array(
		'label'       => esc_html__( 'Choose Category', 'kortez-education' ),
		'description' => esc_html__( 'Recent posts will show if any category is not chosen.', 'kortez-education' ),
		'type'        => 'select',
		'settings'    => 'feature_posts_two_category',
		'section'     => 'feature_posts_two_options',
		'default'     => '',
		'placeholder' => esc_html__( 'Select category', 'kortez-education' ), 
		'choices'     => kortez_get_post_categories(),
		'priority'	  =>  90,
	) );

	Kirki::add_field( 'kortez', array(
		'label'        => esc_html__( 'Post Title Color', 'kortez-education' ),
		'type'         => 'color',
		'settings'     => 'feature_posts_two_title_color',
		'section'      => 'feature_posts_two_options',
		'default'      => '#FFFFFF',
		'priority'	   =>  100,
		'active_callback' => array(
			array(
				'setting'  => 'skin_select',
				'operator' => 'contains',
				'value'    => array( 'default', 'blackwhite' ),
			),
			array(
				'setting'  => 'disable_feature_posts_two_title',
				'operator' => '==',
				'value'    => false,
			),
		),
	) );

	Kirki::add_field( 'kortez', array(
		'label'        => esc_html__( 'Post Category Background Color', 'kortez-education' ),
		'type'         => 'color',
		'settings'     => 'feature_posts_two_category_bgcolor',
		'section'      => 'feature_posts_two_options',
		'default'      => '#EB5A3E',
		'priority'	   =>  110,
		'active_callback' => array(
			array(
				'setting'  => 'hide_feature_posts_two_category',
				'operator' => '==',
				'value'    => false,
			),
		),
	) );

	Kirki::add_field( 'kortez', array(
		'label'        => esc_html__( 'Post Category Color', 'kortez-education' ),
		'type'         => 'color',
		'settings'     => 'feature_posts_two_category_color',
		'section'      => 'feature_posts_two_options',
		'default'      => '#FFFFFF',
		'priority'	   =>  120,
		'active_callback' => array(
			array(
				'setting'  => 'skin_select',
				'operator' => 'contains',
				'value'    => array( 'default', 'blackwhite' ),
			),
			array(
				'setting'  => 'hide_feature_posts_two_category',
				'operator' => '==',
				'value'    => false,
			),
		),
	) );

	Kirki::add_field( 'kortez', array(
		'label'        => esc_html__( 'Post Meta Text Color', 'kortez-education' ),
		'type'         => 'color',
		'settings'     => 'feature_posts_two_meta_color',
		'section'      => 'feature_posts_two_options',
		'default'      => '#FFFFFF',
		'priority'	   =>  130,
		'active_callback' => array(
			array(
				'setting'  => 'skin_select',
				'operator' => 'contains',
				'value'    => array( 'default', 'blackwhite' ),
			),
			array(
				array(
					'setting'  => 'hide_feature_posts_two_date',
					'operator' => '==',
					'value'    => false,
				),
				array(
					'setting'  => 'hide_feature_posts_two_author',
					'operator' => '==',
					'value'    => false,
				),
				array(
					'setting'  => 'hide_feature_posts_two_comment',
					'operator' => '==',
					'value'    => false,
				),
			),
		),
	) );

	Kirki::add_field( 'kortez', array(
		'label'        => esc_html__( 'Post Meta Icon Color', 'kortez-education' ),
		'type'         => 'color',
		'settings'     => 'feature_posts_two_meta_icon_color',
		'section'      => 'feature_posts_two_options',
		'default'      => '#FFFFFF',
		'priority'	   =>  140,
		'active_callback' => array(
			array(
				'setting'  => 'skin_select',
				'operator' => 'contains',
				'value'    => array( 'default', 'blackwhite' ),
			),
			array(
				array(
					'setting'  => 'hide_feature_posts_two_date',
					'operator' => '==',
					'value'    => false,
				),
				array(
					'setting'  => 'hide_feature_posts_two_author',
					'operator' => '==',
					'value'    => false,
				),
				array(
					'setting'  => 'hide_feature_posts_two_comment',
					'operator' => '==',
					'value'    => false,
				),
			),
		),
	) );

	Kirki::add_field( 'kortez', array(
		'label'        => esc_html__( 'Post Hover Color', 'kortez-education' ),
		'type'         => 'color',
		'settings'     => 'feature_posts_two_hover_color',
		'section'      => 'feature_posts_two_options',
		'default'      => '#a8d8ff',
		'priority'	   =>  150,
	) );

	Kirki::add_field( 'kortez', array(
		'label'       => esc_html__( 'Posts Overlay Opacity', 'kortez-education' ),
		'type'        => 'number',
		'settings'    => 'feature_posts_two_overlay_opacity',
		'section'     => 'feature_posts_two_options',
		'default'     => 4,
		'choices' => array(
			'min' => '0',
			'max' => '9',
			'step' => '1',
		),
		'priority'	  =>  160,
	) );

	Kirki::add_field( 'kortez', array(
		'label'       => esc_html__( 'Choose Image Size', 'kortez-education' ),
		'type'        => 'select',
		'settings'    => 'render_feature_posts_two_image_size',
		'section'     => 'feature_posts_two_options',
		'default'     => 'kortez-420-300',
		'placeholder' => esc_html__( 'Select Image Size', 'kortez-education' ),
		'choices'     => kortez_get_intermediate_image_sizes(),
		'priority'	  => 170,
	) );

	Kirki::add_field( 'kortez', array(
		'label'        => esc_html__( 'Background Image Size', 'kortez-education' ),
		'type'         => 'radio',
		'settings'     => 'feature_posts_two_image_size',
		'section'      => 'feature_posts_two_options',
		'default'      => 'cover',
		'choices'      => array(
			'cover'    => esc_html__( 'Cover', 'kortez-education' ),
			'pattern'  => esc_html__( 'Pattern / Repeat', 'kortez-education' ),
			'norepeat' => esc_html__( 'No Repeat', 'kortez-education' ),
		),
		'priority'	   => 180,
	) );

	Kirki::add_field( 'kortez', array(
		'label'       => esc_html__( 'Posts Border Radius (px)', 'kortez-education' ),
		'type'        => 'slider',
		'settings'    => 'feature_posts_two_radius',
		'section'     => 'feature_posts_two_options',
		'transport'	  => 'postMessage', 
		'default'     =>  0,
		'choices'     => array(
			'min'  => 0,
			'max'  => 50,
			'step' => 1,
		),
		'priority'	  =>  190,
	) );

	Kirki::add_field( 'kortez', array(
		'label'       => esc_html__( 'Post Content Horizontal Alignment', 'kortez-education' ),
		'type'        => 'select',
		'settings'    => 'feature_posts_two_horizontal_alignment',
		'section'     => 'feature_posts_two_options',
		'default'     => 'text-left',
		'choices'     => array(
			'text-left'	 	=> esc_html__( 'Left', 'kortez-education' ),
			'text-center'  	=> esc_html__( 'Center', 'kortez-education' ),   
			'text-right'	=> esc_html__( 'Right', 'kortez-education' ),
		),
		'priority'	   => 200,
	) );

	Kirki::add_field( 'kortez', array(
		'label'       => esc_html__( 'Post Content Vertical Alignment', 'kortez-education' ),
		'type'        => 'select',
		'settings'    => 'feature_posts_two_vertical_title_alignment',
		'section'     => 'feature_posts_two_options',
		'default'     => 'align-bottom',
		'choices'     => array(
			'align-top'	 	=> esc_html__( 'Top', 'kortez-education' ),
			'align-center'  => esc_html__( 'Center', 'kortez-education' ),   
			'align-bottom'  => esc_html__( 'Bottom', 'kortez-education' ),
		),
		'priority'	   => 210,
	) );

	Kirki::add_field( 'kortez', array(
		'label'       => esc_html__( 'Disable Post Title', 'kortez-education' ),
		'type'        => 'checkbox',
		'settings'    => 'disable_feature_posts_two_title',
		'section'     => 'feature_posts_two_options',
		'default'     => false,
		'priority'	  =>  220,
	) );

	Kirki::add_field( 'kortez', array(
		'label'        => esc_html__( 'Post Title Typography', 'kortez-education' ),
		'type'         => 'typography',
		'settings'     => 'feature_posts_two_font_control',
		'section'      => 'feature_posts_two_options',
		'default'  => array(
			'font-family'    => 'Poppins',
			'variant'        => '500',
			'font-size'      => '22px',
			'text-transform' => 'capitalize',
			'line-height'    => '1.4',
		),
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element' => '.section-feature-posts-two-area .feature-posts-content .feature-posts-title',
			),
		),
		'priority'	  =>  230,
		'active_callback' => array(
			array(
				'setting'  => 'disable_feature_posts_two_title',
				'operator' => '==',
				'value'    => false,
			),
		),
	) );

	Kirki::add_field( 'kortez', array(
		'label'       => esc_html__( 'Disable Posts category', 'kortez-education' ),
		'type'        => 'checkbox',
		'settings'    => 'hide_feature_posts_two_category',
		'section'     => 'feature_posts_two_options',
		'default'     => false,
		'priority'	  =>  250,
	) );

	Kirki::add_field( 'kortez', array(
		'label'        => esc_html__( 'Post Category Typography', 'kortez-education' ),
		'type'         => 'typography',
		'settings'     => 'feature_posts_two_cat_font_control',
		'section'      => 'feature_posts_two_options',
		'default'  => array(
			'font-family'    => 'Poppins',
			'variant'        => '400',
			'font-size'      => '13px',
			'text-transform' => 'uppercase',
			'line-height'    => '1',
		),
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element' => '.section-feature-posts-two-area .feature-posts-content .cat-links a',
			),
		),
		'priority'	  =>  260,
		'active_callback' => array(
			array(
				'setting'  => 'hide_feature_posts_two_category',
				'operator' => '==',
				'value'    => false,
			),
		),
	) );

	Kirki::add_field( 'kortez', array(
		'label'       => esc_html__( 'Disable Post Date', 'kortez-education' ),
		'type'        => 'checkbox',
		'settings'    => 'hide_feature_posts_two_date',
		'section'     => 'feature_posts_two_options',
		'default'     => false,
		'priority'	  =>  270,
	) );

	Kirki::add_field( 'kortez', array(
		'label'       => esc_html__( 'Disable Post Author', 'kortez-education' ),
		'type'        => 'checkbox',
		'settings'    => 'hide_feature_posts_two_author',
		'section'     => 'feature_posts_two_options',
		'default'     => false,
		'priority'	  =>  280,
	) );

	Kirki::add_field( 'kortez', array(
		'label'       => esc_html__( 'Disable Post Comment', 'kortez-education' ),
		'type'        => 'checkbox',
		'settings'    => 'hide_feature_posts_two_comment',
		'section'     => 'feature_posts_two_options',
		'default'     => false,
		'priority'	  =>  290,
	) );

	Kirki::add_field( 'kortez', array(
		'label'        => esc_html__( 'Post Meta Typography', 'kortez-education' ),
		'type'         => 'typography',
		'settings'     => 'feature_posts_two_meta_font_control',
		'section'      => 'feature_posts_two_options',
		'default'  => array(
			'font-family'    => 'Poppins',
			'variant'        => '400',
			'font-size'      => '13px',
			'text-transform' => 'capitalize',
			'line-height'    => '1.6',
		),
		'priority'	  =>  300,
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element' => '.section-feature-posts-two-area .feature-posts-content .entry-meta a',
			),
		),
		'active_callback' => array(
			array(
				array(
				'setting'  => 'hide_feature_posts_two_date',
				'operator' => '==',
				'value'    => false,
				),
				array(
				'setting'  => 'hide_feature_posts_two_author',
				'operator' => '==',
				'value'    => false,
				),
				array(
				'setting'  => 'hide_feature_posts_two_comment',
				'operator' => '==',
				'value'    => false,
				),
			),
		),
	) );

	Kirki::add_field( 'kortez', array(
		'label'        => esc_html__( 'Disable Featured Posts Two', 'kortez-education' ),
		'type'         => 'checkbox',
		'settings'     => 'disable_mobile_feature_posts_two',
		'section'      => 'blog_page_responsive',
		'default'      => false,
		'priority'	   => 16,
		'active_callback' => array(
			array(
				'setting'  => 'disable_feature_posts_two_section',
				'operator' => '==',
				'value'    => false,
			),
		),
	) );

}