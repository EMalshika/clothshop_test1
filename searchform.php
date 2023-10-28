<?php 
/**
 * The template for displaying Search form.
 *
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package 99fy
 */

?>
<form id="search" action="<?php echo esc_url(home_url( '/' )); ?>" method="GET">
	<input type="text"  name="s"  placeholder="<?php echo esc_attr_x( 'Search Here', 'placeholder', '99fy' ); ?>" />
	<button type="submit"><i class="ion-ios-search-strong"></i></button>
</form>