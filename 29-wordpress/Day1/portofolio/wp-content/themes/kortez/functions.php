<?php

/**
 * Kortez works in WordPress 4.7 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.7-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
	return;
}

/**
 * Kortez functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Kortez
 */

/**
 * After theme setup functions.
 */
require get_template_directory() . '/inc/core/kortez-after-theme-setup.php';

/**
 * Enqueue scripts functions.
 */
require get_template_directory() . '/inc/core/kortez-enqueue-scripts.php';

/**
 * Common functions.
 */
require get_template_directory() . '/inc/core/common-functions.php';

/**
 * Excerpt.
 */
require get_template_directory() . '/inc/class-kortez-excerpt.php';

/**
 * Admin functions.
 */
require get_template_directory() . '/inc/admin-functions.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Functions for Woocommerce features
 */
require get_template_directory() . '/inc/woocommerce-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer/customizer.php';

/**
 * Dynamic CSS.
 */
require get_template_directory() . '/inc/customizer/loader.php';

/**
 * Widgets.
 */
require get_template_directory() . '/inc/widgets/loader.php';

/**
 * Getting Started Notification.
 */
require get_theme_file_path( '/inc/getting-started/getting-started.php' );

/**
 * Theme Info.
 */
require get_theme_file_path( '/inc/theme-info/theme-info.php' );

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
