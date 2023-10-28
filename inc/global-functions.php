<?php 
 /**
 * 99fy Global Function
 *
 * @package 99fy
 */

/**
* Register Post Excerpt Function
*/
function nnfy_post_excerpt() {
	$excerpt_length = get_theme_mod('nnfy_blog_excerpt_length', 20);

	echo wp_trim_words( get_the_excerpt(), $excerpt_length, '' );
}

/**
* Blog Pagination 
*/
if(!function_exists('nnfy_blog_pagination')){
	function nnfy_blog_pagination(){
		?>
		<div class="paginations ht-text-center pt-20"> <?php
			the_posts_pagination(array(
				'prev_text'          => '<i class="ion-ios-arrow-back"></i>',
				'next_text'          => '<i class="ion-ios-arrow-forward"></i>',
				'type'               => 'list'
			)); ?>
		</div>
		<?php
	}
}

/**
* Create Menu
*/
if( !function_exists('nnfy_fallback')){
function nnfy_fallback( ) { 
	if(is_user_logged_in()):
?>

	<ul>
		<li><a href="<?php echo admin_url('nav-menus.php'); ?>"><?php echo esc_html__('Create Menu','99fy'); ?></a></li>
	</ul>
<?php endif; } }