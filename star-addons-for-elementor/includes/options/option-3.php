<?php

/* ----------------------------------------------------------------------------- */
/* Option 3 */
/* ----------------------------------------------------------------------------- */
    
add_settings_field ( 'star_addons_features_template', '', 'star_addons_template_features_callback', 'star-addons-menu-slug-3', 'page_3_section', array( '' ) );

register_setting( 'setting-group-3', 'new_settings3' );
    