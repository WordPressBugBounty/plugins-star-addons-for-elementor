<?php

/* ----------------------------------------------------------------------------- */
/* Option 1 */
/* ----------------------------------------------------------------------------- */

add_settings_field ( 'star_addons_general_template', '', 'star_addons_template_general_callback', 'star-addons-menu-slug-1', 'page_1_section', array( '' ) );

register_setting( 'setting-group-1', 'new_settings1' );
    