<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://mhrtheme.com
 * @since      1.1
 *
 * @package    Star_Addons_For_Elementor
 * @subpackage Star_Addons_For_Elementor/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.1
 * @package    Star_Addons_For_Elementor
 * @subpackage Star_Addons_For_Elementor/includes
 * @author     MhrTheme <hello@mhrtheme.com>
 */
class Star_Addons_For_Elementor_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.1
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'star-addons-for-elementor',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
