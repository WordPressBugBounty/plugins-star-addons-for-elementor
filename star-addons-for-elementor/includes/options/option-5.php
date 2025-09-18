<?php

/* ----------------------------------------------------------------------------- */
/* Option 5 */
/* ----------------------------------------------------------------------------- */
    
add_settings_field ( 'star_addons_support_template', '', 'star_addons_template_support_callback', 'star-addons-menu-slug-5', 'page_5_section', array( '' ) );

register_setting( 'setting-group-5', 'new_settings5' );
    