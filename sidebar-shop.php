<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package 99fy
 */

if ( ! is_active_sidebar( 'sidebar-shop' ) ) {
	return;
}

?>

<div class="shop-sidebar">
	<?php dynamic_sidebar( 'sidebar-shop' ); ?>
</div>