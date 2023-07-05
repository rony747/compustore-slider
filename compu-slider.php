<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://tirony.me
 * @since             1.0.0
 * @package           Compu_Slider
 *
 * @wordpress-plugin
 * Plugin Name:       Compustore Slider
 * Plugin URI:        https://tirony.me
 * Description:       This is a plugin for the custom slider of Compustore
 * Version:           1.0.1
 * Author:            t.i.rony
 * Author URI:        https://tirony.me
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       compu-slider
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */

defined( 'COMPU_SLIDER_VERSION' ) or define( 'COMPU_SLIDER_VERSION', '1.0.1' );

defined( 'COMPU_SLIDER_NAME' ) or define( 'COMPU_SLIDER_NAME', 'compu-slider' );

defined( 'COMPU_SLIDER_BASE_DIR' ) or define( 'COMPU_SLIDER_BASE_DIR', plugin_dir_path( __FILE__ ) );
/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-compu-slider-activator.php
 */
function activate_compu_slider() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-compu-slider-activator.php';
	Compu_Slider_Activator::activate();

}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-compu-slider-deactivator.php
 */
function deactivate_compu_slider() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-compu-slider-deactivator.php';
	Compu_Slider_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_compu_slider' );
register_deactivation_hook( __FILE__, 'deactivate_compu_slider' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-compu-slider.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_compu_slider() {

	$plugin = new Compu_Slider();
	$plugin->run();

}
run_compu_slider();
