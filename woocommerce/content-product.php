<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}

if(is_cart()){
	$classes = 'ht-col-lg-6 ht-col-xs-12';
} else {
	$classes = 'ht-col-lg-4 ht-col-sm-6 ht-col-xs-12';
}

?>

<div <?php post_class( $classes ); ?>>
	
	<?php
		/**
		 * woocommerce_before_shop_loop_item hook.
		 *
		 * @hooked woocommerce_template_loop_product_link_open - 10
		 */
		do_action( 'woocommerce_before_shop_loop_item' );
	?>

	<div class="product-wrapper mb-35">

		<?php
			/**
			 * woocommerce_before_shop_loop_item_title hook.
			 *
			 * @hooked woocommerce_show_product_loop_sale_flash - 10 #removed
			 * @hooked woocommerce_template_loop_product_thumbnail - 10 #removed
			 * @hooked nnfy_woocommerce_template_loop_product_thumbnail - 10
			 * @hooked nnfy_woocommerce_template_loop_product_content_list - 15
			 */
			do_action( 'woocommerce_before_shop_loop_item_title' );
		?>

		<div class="product-content">
			<?php
				/**
				 * woocommerce_shop_loop_item_title hook.
				 *
				 * @hooked woocommerce_template_loop_product_title - 10
				 */
				do_action( 'woocommerce_shop_loop_item_title' );
			?>

			<?php
				/**
				 * woocommerce_after_shop_loop_item_title hook.
				 *
				 * @hooked woocommerce_template_loop_rating - 5 #removed
				 * @hooked woocommerce_template_loop_price - 10
				 */
				do_action( 'woocommerce_after_shop_loop_item_title' );
			?>
		</div>
	</div>

	<?php
		/**
		 * woocommerce_after_shop_loop_item hook.
		 *
		 * @hooked woocommerce_template_loop_product_link_close - 5 #removed
		 * @hooked woocommerce_template_loop_add_to_cart - 10 #removed
		 */
		do_action( 'woocommerce_after_shop_loop_item' );
	?>

</div>
