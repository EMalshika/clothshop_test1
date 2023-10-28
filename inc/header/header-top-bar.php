<?php 
/*
 * NNfy Header top bar
 */
?>

<?php

if(get_theme_mod('nnfy_topbar_status', 'off')  == 'on'):
    $search = get_theme_mod('nnfy_topbar_search', 'on');
    $myaccount = get_theme_mod('nnfy_topbar_myaccount', 'off');
    $wishlist = get_theme_mod('nnfy_topbar_wishlist', 'off');
    $cart = get_theme_mod('nnfy_topbar_cart', 'off');
?>

<div class="header-top-area theme-bg ptb-15">
    <div class="ht-container">
        <div class="ht-row">
            <div class="ht-col-lg-12">
                <div class="header-top">
                    <div class="header-info">
                        <ul>
                            <li><?php echo esc_html( get_theme_mod('nnfy_topbar_left') ); ?></li>
                        </ul>
                    </div>
                    <div class="header-search-cart">

                        <?php if($search): ?>
                        <div class="header-search common-btn">
                            <button class="toggle-active">
                                <i class="ion-ios-search"></i>
                            </button>
                            <div class="toogle-content" style="display: none;">
                                <?php get_search_form( ); ?>
                            </div>
                        </div>
                        <?php endif; ?>
                        
                        <?php if($myaccount && class_exists('WooCommerce')):
                            $icon = is_user_logged_in() ? 'ion-log-out' : 'ion-ios-person-outline';
                        ?>
                        <div class="header-login common-btn">
                            <button class="toggle-active">
                                <i class="<?php echo esc_html( $icon ); ?>"></i>
                            </button>
                            <div class="login-content">
                                <ul>
                                    <?php if(!is_user_logged_in()): ?>
                                        <li><a href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>" target="_blank"><?php echo esc_html__( 'login', '99fy' ); ?></a></li>
                                        <li><a href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>" target="_blank"><?php echo esc_html__( 'register', '99fy' ); ?></a></li>
                                    <?php else:  ?>
                                        <li><a href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>"><?php echo esc_html__( 'Myaccount', '99fy' ); ?></a></li>
                                        <li><a href="<?php echo esc_url( wp_logout_url() ); ?>"><?php echo esc_html__( 'Logout', '99fy' ); ?></a></li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                        <?php endif; ?>

                        <?php
                            $wishlist_page_url = get_permalink( get_option( 'yith_wcwl_wishlist_page_id' ) );
                            if(class_exists('WooCommerce') && $wishlist && $wishlist_page_url):
                        ?>
                        <div class="header-wishlist common-btn">
                            <a class="toggle-active" href="<?php echo esc_url($wishlist_page_url);?>">
                                <i class="ion-ios-heart-outline"></i>
                            </a>
                        </div>
                         <?php endif; ?>

                        <?php if(class_exists('WooCommerce') && $cart ): ?>
                        <div class="header-cart common-btn">
                            <button class="toggle-active">
                                <i class="ion-bag"></i>
                            </button>
                            

                            <div class="cart-content">
                                <div class="widget_shopping_cart_content">
                                    <?php wc_get_template('cart/mini-cart.php'); ?>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php endif; ?>