<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Kortez
 */

/**
 * Validation functions
 *
 * @package Kortez
 */

if ( ! function_exists( 'kortez_validate_excerpt_count' ) ) :
	/**
	 * Check if the input value is valid integer.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return string Whether the value is valid to the current preview.
	 */
	function kortez_validate_excerpt_count( $validity, $value ){
		$value = intval( $value );
		if ( empty( $value ) || ! is_numeric( $value ) ) {
			$validity->add( 'required', esc_html__( 'You must supply a valid number.', 'kortez' ) );
		} elseif ( $value < 1 ) {
			$validity->add( 'min_slider', esc_html__( 'Minimum no of Excerpt Lenght is 1', 'kortez' ) );
		} elseif ( $value > 50 ) {
			$validity->add( 'max_slider', esc_html__( 'Maximum no of Excerpt Lenght is 50', 'kortez' ) );
		}
		return $validity;
	}
endif;

/**
* Add excerpt length
* @since Kortez 1.0.0
*/
function kortez_excerpt_length( $length ) {
	if ( is_admin() ) return $length;
	$excerpt_length = get_theme_mod( 'excerpt_length' , 60 );
	return $excerpt_length;	
}
add_filter( 'excerpt_length', 'kortez_excerpt_length', 999 );

/**
* Call to Kortez_Excerpt
*
* @since  1.0.0
* @uses   Kortez_Excerpt:::get_instance()->excerpt()
* @param  int $length
* @return void
*/
if( ! function_exists( 'kortez_excerpt' ) ):

    function kortez_excerpt( $length = 15, $echo = true, $more = '' ) {
        $length  = apply_filters( 'post_excerpt_length', $length );
        $excerpt = Kortez_Excerpt::get_instance()->excerpt( $length, false, $more );
        
        the_excerpt();
    }
endif;

if ( ! function_exists( 'kortez_entry_header' ) ) :
	/**
	 * Prints HTML with meta information for the categories.
	 */
	function kortez_entry_header() {
		if ( 'post' === get_post_type() ) {
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( ' ' );
				if ( !is_single() && $categories_list ) {
					/* translators: 1: list of categories. */
					printf( '<span class="cat-links">' . '%1$s' . '</span>', $categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				}
		}
	}
endif;

if ( ! function_exists( 'kortez_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the tags and comments.
	 */
	function kortez_entry_footer() {

		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date( 'M j, Y' ) ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date( 'M j, Y' ) )
		);
		$year = get_the_date( 'Y' );
		$month = get_the_date( 'm' );
		$link = ( is_single() ) ? get_month_link( $year, $month ) : get_permalink();

		$posted_on = '<a href="' . esc_url( $link ) . '" rel="bookmark">' . $time_string . '</a>';

		if ( !is_single() && !get_theme_mod( 'hide_date', false ) ){
			echo '<span class="posted-on">' . $posted_on . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		}else if ( is_single() && !get_theme_mod( 'hide_single_post_date', false ) ){
			echo '<span class="posted-on">' . $posted_on . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		}

		$byline = '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>';

		if ( !is_single() && !get_theme_mod( 'hide_author', false ) ){
			echo '<span class="byline"> ' . $byline . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		}

		if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			if( !is_single() && !get_theme_mod( 'hide_comment', false ) ){ 
				echo '<span class="comments-link">';
				comments_popup_link(
					sprintf(
						wp_kses(
							/* translators: %s: post title */
							__( 'Comment<span class="screen-reader-text"> on %s</span>', 'kortez' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						get_the_title()
					)
				);
				echo '</span>';
			}else if ( is_single() && !get_theme_mod( 'hide_single_post_comment', false ) ){
				echo '<span class="comments-link">';
				comments_popup_link(
					sprintf(
						wp_kses(
							/* translators: %s: post title */
							__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'kortez' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						get_the_title()
					)
				);
				echo '</span>';
			}
		}

		if ( 'post' === get_post_type() ) {
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( esc_html__( ', ', 'kortez' ) );
				
				if( is_single() && $categories_list && !get_theme_mod( 'hide_single_post_category', false ) ){
					/* translators: 1: list of categories. */
					printf( '<span class="cat-links">' . '%1$s' . '</span>', $categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				}
		}

		if ( is_single() && !get_theme_mod( 'hide_single_post_tag_links', false ) ){ 
			if( get_the_tag_list() ): ?>
				<div class="tag-links">
					<span class="screen-reader-text">
						<?php echo esc_html__( 'Tags', 'kortez' ); ?>
					</span>
					<?php
					echo get_the_tag_list( '', esc_html__( ', ', 'kortez' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					?>
				</div>
			<?php endif; 
		} 
	}
endif;

if( !function_exists( 'kortez_get_day_link' ) ):
/**
* Returns the permalink of Post day
*
* @since Kortez 1.0.0
* @return url
*/
function kortez_get_day_link(){
	return get_day_link( get_the_time('Y'), get_the_time('m'), get_the_time('d') );
}
endif;

/**
 * Gets a nicely formatted string for the published date.
 *
 * @since Kortez 1.0.0
 * @return string
 */
if ( ! function_exists( 'kortez_time_link' ) ) :

function kortez_time_link() {

	$time_string = '<span class="entry-date published" datetime="%1$s">%2$s</span>';
	
	$time_string = sprintf( $time_string,
		get_the_date( DATE_W3C ),
		get_the_date()
	);
?>
	<span class="screen-reader-text"><?php echo esc_html__( 'Posted on', 'kortez' ); ?></span>
	<span class="posted-on">
		<a href="<?php echo esc_url( kortez_get_day_link() ); ?>" rel="bookmark">
			<?php echo wp_kses_post( $time_string ); ?>
		</a>
	</span>
	<?php		
}
endif;

if ( ! function_exists( 'kortez_edit_link' ) ) :

function kortez_edit_link( $echo = true ) {

	if( ! $echo ){
		ob_start();
	}

	edit_post_link(
		sprintf(
			/* translators: %s - Name of current post*/
			__( 'EDIT<span class="screen-reader-text"> "%s"</span>', 'kortez' ),
			get_the_title()
		),
		'<span class="edit-link">',
		'</span>'
	);

	if( ! $echo ){
		$output = ob_get_contents();
		ob_end_clean();
		return $output;
	}
}
endif;