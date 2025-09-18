<?php

/* ----------------------------------------------------------------------------- */
/* Field Callbacks 4 */
/* ----------------------------------------------------------------------------- */ 

// Star Addons Settings Main Color
function star_addons_template_settings_main_color_callback() {
    $star_addons_widget_main_color = (array)get_option('new_settings4');
    if( isset( $star_addons_widget_main_color['star_addons_widget_main_color'] ) ) :
        $star_addons_widget_main_color_new = $star_addons_widget_main_color['star_addons_widget_main_color'];
    else:
        $star_addons_widget_main_color_new = '';
    endif; ?>    
    <?php echo __('<input type="color" class="regular-text" name="new_settings4[star_addons_widget_main_color]" value="'.esc_html($star_addons_widget_main_color_new).'"', 'star-addons-for-elementor'); ?>

<?php }

// Star Addons Settings Secondary Color
function star_addons_template_settings_secondary_color_callback() {
    $star_addons_widget_secondary_color = (array)get_option('new_settings4');
    if( isset( $star_addons_widget_secondary_color['star_addons_widget_secondary_color'] ) ) :
        $star_addons_widget_secondary_color_new = $star_addons_widget_secondary_color['star_addons_widget_secondary_color'];
    else:
        $star_addons_widget_secondary_color_new = '';
    endif; ?>    
    <?php echo __('<input type="color" class="regular-text" name="new_settings4[star_addons_widget_secondary_color]" value="'.esc_html($star_addons_widget_secondary_color_new).'"', 'star-addons-for-elementor'); ?>

<?php }

// Star Addons Settings Font Size
function star_addons_template_settings_font_size_callback() {
    $star_addons_widget_font_size = (array)get_option('new_settings4');
    if( isset( $star_addons_widget_font_size['star_addons_widget_font_size'] ) ) :
        $star_addons_widget_font_size_new = $star_addons_widget_font_size['star_addons_widget_font_size'];
    else:
        $star_addons_widget_font_size_new = '';
    endif; ?>    
    <?php echo __('<input type="text" placeholder="16px" class="regular-text" name="new_settings4[star_addons_widget_font_size]" value="'.esc_html($star_addons_widget_font_size_new).'"', 'star-addons-for-elementor'); ?>

<?php }

// Star Addons Settings Font Weight
function star_addons_template_settings_font_weight_callback() {
    $star_addons_widget_font_weight = (array)get_option('new_settings4');
    if( isset( $star_addons_widget_font_weight['star_addons_widget_font_weight'] ) ) :
        $star_addons_widget_font_weight_new = $star_addons_widget_font_weight['star_addons_widget_font_weight'];
    else:
        $star_addons_widget_font_weight_new = '';
    endif; ?>    
    <?php echo __('<input type="text" placeholder="500" class="regular-text" name="new_settings4[star_addons_widget_font_weight]" value="'.esc_html($star_addons_widget_font_weight_new).'"', 'star-addons-for-elementor'); ?>

<?php }

function star_addons_settings_custom_css() { ?>

<style type="text/css">

:root {
    <?php $star_addons_widget_main_color = (array)get_option('new_settings4');
    if( isset( $star_addons_widget_main_color['star_addons_widget_main_color'] ) ) :
        $star_addons_widget_main_color_new = $star_addons_widget_main_color['star_addons_widget_main_color'];
    else:
        $star_addons_widget_main_color_new = '';
    endif;
    if( $star_addons_widget_main_color_new ) : ?>
        --mainColor: <?php echo $star_addons_widget_main_color['star_addons_widget_main_color']; ?>;
    <?php endif;
    $star_addons_widget_secondary_color = (array)get_option('new_settings4');
    if( isset( $star_addons_widget_secondary_color['star_addons_widget_secondary_color'] ) ) :
        $star_addons_widget_secondary_color_new = $star_addons_widget_secondary_color['star_addons_widget_secondary_color'];
    else:
        $star_addons_widget_secondary_color_new = '';
    endif;
    if( $star_addons_widget_secondary_color_new ) : ?>
        --secondaryColor: <?php echo $star_addons_widget_secondary_color['star_addons_widget_secondary_color']; ?>;
    <?php endif;
    $star_addons_widget_font_size = (array)get_option('new_settings4');
    if( isset( $star_addons_widget_font_size['star_addons_widget_font_size'] ) ) :
        $star_addons_widget_font_size_new = $star_addons_widget_font_size['star_addons_widget_font_size'];
    else:
        $star_addons_widget_font_size_new = '';
    endif;
    if( $star_addons_widget_font_size_new ) : ?>
        --fontSize: <?php echo $star_addons_widget_font_size['star_addons_widget_font_size']; ?>;
    <?php endif;
    $star_addons_widget_font_weight = (array)get_option('new_settings4');
    if( isset( $star_addons_widget_font_weight['star_addons_widget_font_weight'] ) ) :
        $star_addons_widget_font_weight_new = $star_addons_widget_font_weight['star_addons_widget_font_weight'];
    else:
        $star_addons_widget_font_weight_new = '';
    endif;
    if( $star_addons_widget_font_weight_new ) : ?>
        --fontWeight: <?php echo $star_addons_widget_font_weight['star_addons_widget_font_weight']; ?>;
    <?php endif; ?>
}

body {
    <?php $star_addons_widget_font_size = (array)get_option('new_settings4');
    if( isset( $star_addons_widget_font_size['star_addons_widget_font_size'] ) ) :
        $star_addons_widget_font_size_new = $star_addons_widget_font_size['star_addons_widget_font_size'];
    else:
        $star_addons_widget_font_size_new = '';
    endif;
    if( $star_addons_widget_font_size_new ) : ?>
        font-size: <?php echo $star_addons_widget_font_size['star_addons_widget_font_size']; ?>;
    <?php endif;
    $star_addons_widget_font_weight = (array)get_option('new_settings4');
    if( isset( $star_addons_widget_font_weight['star_addons_widget_font_weight'] ) ) :
        $star_addons_widget_font_weight_new = $star_addons_widget_font_weight['star_addons_widget_font_weight'];
    else:
        $star_addons_widget_font_weight_new = '';
    endif;
    if( $star_addons_widget_font_weight_new ) : ?>
        font-weight: <?php echo $star_addons_widget_font_weight['star_addons_widget_font_weight']; ?>;
    <?php endif; ?>
}

</style>

<?php }

add_action('wp_head', 'star_addons_settings_custom_css');
