<?php

/**
 * Enqueue admin scripts and styles.
*/

if( ! function_exists( 'star_addons_admin_scripts' ) ) :
function star_addons_admin_scripts(){
    wp_enqueue_style( 'star-addons-admin', plugins_url() . '/star-addons-for-elementor/includes/css/admin.css', '', '1.2' );
    wp_enqueue_script( 'star-addons-jquery-cookie', plugins_url() . '/star-addons-for-elementor/includes/js/jquery.cookie.js', array( 'jquery' ), '1.2', true );
    wp_enqueue_script( 'star-addons-admin', plugins_url() . '/star-addons-for-elementor/includes/js/admin.js', array( 'jquery' ), '1.2', true );
}
endif; 
add_action( 'admin_enqueue_scripts', 'star_addons_admin_scripts' );

function star_addons_admin_notice_review() {
    global $pagenow;
    if ( $pagenow == 'index.php' ) { ?>
    <div class="notice star-addons-theme-notice notice-success second-notice is-dismissible">
        <p class="review"><?php _e( 'Pro Version Available! You will get extra features and addons by using premium version.', 'star-addons-for-elementor' ); ?>
        </p>
        <p>
        	<a class="button button-primary" href="https://templatemonster.com/wordpress-plugins/321762.html" target="_blank"><?php _e( 'View Pro Plugin', 'star-addons-for-elementor' ); ?></a>
        	<button class="button button-secondary" target="_blank"><?php _e( "Don't Show Again", 'star-addons-for-elementor' ); ?></button>
        </p>
    </div>
    <?php  }
} 

if (isset($_COOKIE['StarAddonsSecondNotice'])) {
}
else {
   add_action( 'admin_notices', 'star_addons_admin_notice_review' );
}
