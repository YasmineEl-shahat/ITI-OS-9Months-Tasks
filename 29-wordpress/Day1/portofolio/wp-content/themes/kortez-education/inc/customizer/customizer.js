/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {

	// Feature Pages height
	wp.customize( 'featured_pages_height', function( value ) {
	    value.bind( function( to ) {
	        $( ".feature-pages-layout-one .feature-pages-image" ).css( "height", to + 'px' );
	    } );
	} );

	// Feature Pages radius
	wp.customize( 'featured_pages_radius', function( value ) {
	    value.bind( function( to ) {
	        $( ".feature-pages-content-wrap .feature-pages-image" ).css( "borderRadius", to + 'px' );
	    } );
	} );

	// Feature Posts Two radius
	wp.customize( 'feature_posts_two_radius', function( value ) {
	    value.bind( function( to ) {
	        $( ".section-feature-posts-two-area .feature-posts-image" ).css( "borderRadius", to + 'px' );
	    } );
	} );


} )( jQuery );