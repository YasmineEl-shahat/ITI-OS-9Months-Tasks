<?php
/**
 * Template part for displaying site info
 *
 * @package Kortez
 */

?>

<div class="site-info">
	<?php echo wp_kses_post( html_entity_decode( esc_html__( 'Copyright &copy; ' , 'kortez' ) ) );
		echo esc_html( date( 'Y' ) . ' ' . get_bloginfo( 'name' ) );
		printf( esc_html__( '. Powered by', 'kortez' ) );
	?>
	<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'kortez' ) ); ?>" target="_blank">
		<?php
			printf( esc_html__( 'WordPress', 'kortez' ) );
		?>
	</a>
</div><!-- .site-info -->