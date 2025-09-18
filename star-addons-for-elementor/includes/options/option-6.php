<?php

/* ----------------------------------------------------------------------------- */
/* Option 6 */
/* ----------------------------------------------------------------------------- */
    
add_settings_field ( 'star_addons_premium_template', '', 'star_addons_template_premium_callback', 'star-addons-menu-slug-6', 'page_6_section', array( '' ) );

register_setting( 'setting-group-6', 'new_settings6' );
    