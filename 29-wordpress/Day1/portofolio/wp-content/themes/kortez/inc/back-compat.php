<?php
/**
 * Kortez back compat functionality
 *
 * Prevents Kortez from running on WordPress versions prior to 4.7,
 * since this theme is not meant to be backward compatible beyond that and
 * relies on many newer functions and markup changes introduced in 4.7.
 *
 * @since Kortez 1.0.0
 */

/**
 * Prevent switching to Kortez on old versions of WordPress.
 *
 * Switches to the default theme.
 *
 * @since Kortez 1.0.0
 */
function kortez_switch_theme() {
	switch_theme( WP_DEFAULT_THEME );
	unset( $_GET['activated'] );
	add_action( 'admin_notices', 'kortez_upgrade_notice' );
}
add_action( 'after_switch_theme', 'kortez_switch_theme' );

/**
 * Adds a message for unsuccessful theme switch.
 *
 * Prints an update nag after an unsuccessful attempt to switch to
 * Kortez on WordPress versions prior to 4.7.
 *
 * @since Kortez 1.0.0
 * @global string $wp_version WordPress version.
 */
function kortez_upgrade_notice() {
    /* translators: %s - WordPress version*/
	$message = sprintf( esc_html__( 'Kortez requires at least WordPress version 4.7. You are running version %s. Please upgrade and try again.', 'kortez' ), $GLOBALS['wp_version'] );
	printf( '<div class="error"><p>%s</p></div>', esc_html( $message ) );
}

/**
 * Prevents the Customizer from being loaded on WordPress versions prior to 4.7.
 *
 * @since Kortez 1.0.0
 *
 * @global string $wp_version WordPress version.
 */
function kortez_customize() {
    /* translators: %s - WordPress version*/
	wp_die( sprintf( esc_html__( 'Kortez requires at least WordPress version 4.7. You are running version %s. Please upgrade and try again.', 'kortez' ), esc_html( $GLOBALS['wp_version'] ) ), '', array(
		'back_link' => true,
	) );
}
add_action( 'load-customize.php', 'kortez_customize' );

/**
 * Prevents the Theme Preview from being loaded on WordPress versions prior to 4.7.
 *
 * @since Kortez 1.0.0
 * @global string $wp_version WordPress version.
 */
function kortez_preview() {
	if ( isset( $_GET['preview'] ) ) {
        /* translators: %s - WordPress version*/
		wp_die( sprintf( esc_html__( 'Kortez requires at least WordPress version 4.7. You are running version %s. Please upgrade and try again.', 'kortez' ), esc_html( $GLOBALS['wp_version'] ) ) );
	}
}
add_action( 'template_redirect', 'kortez_preview' );
