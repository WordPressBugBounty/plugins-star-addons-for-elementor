<?php

/* ----------------------------------------------------------------------------- */
/* Option 4 */
/* ----------------------------------------------------------------------------- */
    
add_settings_field ( 'star_addons_template_settings_main_color', 'Widget Main Color:', 'star_addons_template_settings_main_color_callback', 'star-addons-menu-slug-4', 'page_4_section', array( '' ) );

add_settings_field ( 'star_addons_template_settings_secondary_color', 'Widget Secondary Color:', 'star_addons_template_settings_secondary_color_callback', 'star-addons-menu-slug-4', 'page_4_section', array( '' ) );

add_settings_field ( 'star_addons_template_settings_font_size', 'Widget Font Size:', 'star_addons_template_settings_font_size_callback', 'star-addons-menu-slug-4', 'page_4_section', array( '' ) );

add_settings_field ( 'star_addons_template_settings_font_weight', 'Widget Font Weight:', 'star_addons_template_settings_font_weight_callback', 'star-addons-menu-slug-4', 'page_4_section', array( '' ) );

register_setting( 'setting-group-4', 'new_settings4' );
    