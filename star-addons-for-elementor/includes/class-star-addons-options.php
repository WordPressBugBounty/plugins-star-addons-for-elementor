<?php 

/* ----------------------------------------------------------------------------- */
/* Setting Sections And Fields */
/* ----------------------------------------------------------------------------- */ 

function star_addons_initialize_global_options() {  
    add_settings_section( 'page_1_section', '', '', 'star-addons-menu-slug-1' );
    add_settings_section( 'page_2_section', '', '', 'star-addons-menu-slug-2' );
    add_settings_section( 'page_3_section', '', '', 'star-addons-menu-slug-3' );
    add_settings_section( 'page_4_section', '', '', 'star-addons-menu-slug-4' );
    add_settings_section( 'page_5_section', '', '', 'star-addons-menu-slug-5' );
    add_settings_section( 'page_6_section', '', '', 'star-addons-menu-slug-6' );

    require plugin_dir_path( __FILE__ ) . 'options/option-1.php';
    require plugin_dir_path( __FILE__ ) . 'options/option-2.php';
    require plugin_dir_path( __FILE__ ) . 'options/option-3.php';
    require plugin_dir_path( __FILE__ ) . 'options/option-4.php';
    require plugin_dir_path( __FILE__ ) . 'options/option-5.php';
    require plugin_dir_path( __FILE__ ) . 'options/option-6.php';    

}
add_action('admin_init', 'star_addons_initialize_global_options');

    require plugin_dir_path( __FILE__ ) . 'fields/field-1.php';
    require plugin_dir_path( __FILE__ ) . 'fields/field-2.php';
    require plugin_dir_path( __FILE__ ) . 'fields/field-3.php';
    require plugin_dir_path( __FILE__ ) . 'fields/field-4.php';
    require plugin_dir_path( __FILE__ ) . 'fields/field-5.php';
    require plugin_dir_path( __FILE__ ) . 'fields/field-6.php';

/* ----------------------------------------------------------------------------- */
/* Add Menu Page */
/* ----------------------------------------------------------------------------- */ 

function star_addons_menu() {
    add_menu_page( __('Star Addons', 'star-addons-for-elementor'), __('Star Addons', 'star-addons-for-elementor'), 'manage_options', 'star-addons-plugin-options', 'star_addons_plugin_menu_page', 'dashicons-star-filled', '58' );
}
add_action('admin_menu', 'star_addons_menu');

function star_addons_plugin_menu_page() {
        ?>
        <?php  
        if( isset( $_GET[ 'tab' ] ) ) {  
            $active_tab = $_GET[ 'tab' ];  
        } else {
            $active_tab = 'tab_general';
        }
        ?>  
        <div class="starad-wrap">
            <div class="starad-top-header">
                <div class="starad-top-header-left">
                    <div class="starad-top-header-logo">
                        <img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'admin/img/logo.png'; ?>" alt="Logo" />
                    </div>
                </div>
                <div class="starad-top-header-right">
                    <a href="https://star-addons.mhrtheme.com" target="_blank" rel="nofollow" class="starad-btn">
                        <?php echo esc_html__('Check Demos', 'star-addons-for-elementor'); ?>
                    </a>
                </div>
            </div>
            <?php settings_errors(); ?> 
            <div class="starad-nav-tab-wrapper">
                <ul class="starad-nav-tab">  

                    <li><a href="?page=star-addons-plugin-options&tab=tab_general" class="starad-nav-tab <?php echo $active_tab == 'tab_general' ? 'starad-nav-tab-active' : ''; ?>"><?php echo esc_html__('General', 'star-addons-for-elementor'); ?></a></li>  

                    <li><a href="?page=star-addons-plugin-options&tab=tab_widgets" class="starad-nav-tab <?php echo $active_tab == 'tab_widgets' ? 'starad-nav-tab-active' : ''; ?>"><?php echo esc_html__('Widgets', 'star-addons-for-elementor'); ?></a></li> 

                    <li><a href="?page=star-addons-plugin-options&tab=tab_features" class="starad-nav-tab <?php echo $active_tab == 'tab_features' ? 'starad-nav-tab-active' : ''; ?>"><?php echo esc_html__('Features', 'star-addons-for-elementor'); ?></a></li>

                    <li><a href="?page=star-addons-plugin-options&tab=tab_settings" class="starad-nav-tab <?php echo $active_tab == 'tab_settings' ? 'starad-nav-tab-active' : ''; ?>"><?php echo esc_html__('Settings', 'star-addons-for-elementor'); ?></a></li>  

                    <li><a href="?page=star-addons-plugin-options&tab=tab_premium" class="starad-nav-tab <?php echo $active_tab == 'tab_premium' ? 'starad-nav-tab-active' : ''; ?>"><?php echo esc_html__('Premium', 'star-addons-for-elementor'); ?></a></li> 
                </ul>   
                <form method="post" class="starad-nav-tab-content" action="options.php"> 
                <?php
                    if( $active_tab == 'tab_general' ) { ?>
                        <div class="starad-nav-tab-general"> 
                        <?php settings_fields( 'setting-group-1' );
                        do_settings_sections( 'star-addons-menu-slug-1' ); ?>
                        </div>
                    <?php } 
                    else if( $active_tab == 'tab_widgets' )  { ?>
                        <div class="starad-nav-tab-widgets">
                            <h2><?php echo esc_html__('Enable/Disable Star Addons Widgets', 'star-addons-for-elementor'); ?></h2>
                            <div class="starad-nav-tab-btn-group">
                                <button type="button" class="btn-show-all-widget"><?php echo esc_html__('Enable All', 'star-addons-for-elementor'); ?></button>
                                <button type="button" class="btn-hide-all-widget"><?php echo esc_html__('Disable All', 'star-addons-for-elementor'); ?></button>
                            </div>
                            <?php submit_button('', 'primary', 'star-submit-btn'); ?>
                            <?php settings_fields( 'setting-group-2' );
                            do_settings_sections( 'star-addons-menu-slug-2' );
                            submit_button('', 'primary', 'star-submit-btn'); ?>
                        </div>
                    <?php }
                    else if( $active_tab == 'tab_features' )  { ?>
                        <div class="starad-nav-tab-features">
                            <?php settings_fields( 'setting-group-3' );
                            do_settings_sections( 'star-addons-menu-slug-3' ); ?>
                        </div>
                    <?php }
                    else if( $active_tab == 'tab_settings' )  { ?>
                        <div class="starad-nav-tab-settings">
                            <?php settings_fields( 'setting-group-4' );
                            do_settings_sections( 'star-addons-menu-slug-4' );
                            submit_button('', 'primary', 'star-submit-btn'); ?>
                        </div>
                    <?php }
                    else if( $active_tab == 'tab_premium' )  { ?>
                        <div class="starad-nav-tab-premium">
                        <?php 
                            settings_fields( 'setting-group-6' );
                            do_settings_sections( 'star-addons-menu-slug-6' );
                        ?>
                        </div> 
                    <?php } ?>
                </form> 
            </div>
        </div>
    <?php
}
