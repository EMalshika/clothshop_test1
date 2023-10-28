<?php
	$bg_image = get_theme_mod('nnfy_pt_section_bg_image');
	$bg_color = get_theme_mod('nnfy_pt_section_bg_color','#ddd');
	$bg_size = get_theme_mod('nnfy_pt_section_bg_size','cover');

	$css = "background:url(". esc_url($bg_image) .") no-repeat center/$bg_size $bg_color";
?>
<div class="breadcrumb-area pt-150 pb-150" style="<?php echo esc_html($css); ?>">
    <div class="ht-container">
        <div class="breadcrumb-content ht-text-center">
        	<?php if($page_title_status): ?>
            <h2>
        	<?php
        		if(function_exists('is_woocommerce')){
        			if(is_woocommerce()){
        				woocommerce_page_title();
        			} else {
        				wp_title('');
        			}
        		} else {
        			wp_title('');
        		}
        	?>
            </h2>
        	<?php endif; ?>

            <?php
	            if($breadcrumb_status){
					if(function_exists('is_woocommerce')){
			          if(is_woocommerce()){
			           woocommerce_breadcrumb();
			          } else {
                       nnfy_breadcrumbs();
			          }
			         } else {
                      nnfy_breadcrumbs();
			         }
	            }
            ?>
        </div>
    </div>
</div>