<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Superb eCommerce
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="featured-sidebar blog-sidebar-wrapper widget-area">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside>
