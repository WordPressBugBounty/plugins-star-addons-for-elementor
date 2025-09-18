<?php

/**
 *
 * @link              https://mhrtheme.com
 * @since             1.1
 * @package           Star_Addons_For_Elementor
 *
 * @wordpress-plugin
 * Plugin Name:       Star Addons for Elementor
 * Plugin URI:        https://wordpress.org/plugins/star-addons-for-elementor
 * Description:       A collection of multiple addons for elementor website builder plugin. It also helps you to create template kits for elementor.
 * Version:           1.1
 * Author:            MhrTheme
 * Author URI:        https://mhrtheme.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       star-addons-for-elementor
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.1 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'STAR_ADDONS_FOR_ELEMENTOR_VERSION', '1.1' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-star-addons-for-elementor-activator.php
 */
function activate_star_addons_for_elementor() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-star-addons-activator.php';
	Star_Addons_For_Elementor_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-star-addons-for-elementor-deactivator.php
 */
function deactivate_star_addons_for_elementor() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-star-addons-deactivator.php';
	Star_Addons_For_Elementor_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_star_addons_for_elementor' );
register_deactivation_hook( __FILE__, 'deactivate_star_addons_for_elementor' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-star-addons.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.1
 */
function run_star_addons_for_elementor() {

	$plugin = new Star_Addons_For_Elementor();
	$plugin->run();

}
run_star_addons_for_elementor();
