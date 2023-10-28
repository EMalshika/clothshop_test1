<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package 99fy
 */

/**
 * Flush out the transients used in nnfy_categorized_blog.
 */
function nnfy_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'nnfy_categories' );
}
add_action( 'edit_category', 'nnfy_category_transient_flusher' );
add_action( 'save_post',     'nnfy_category_transient_flusher' );


/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function nnfy_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'nnfy_pingback_header' );