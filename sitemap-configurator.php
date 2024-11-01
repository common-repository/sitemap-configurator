<?php

/**
 * Plugin Name:			Sitemap Configurator
 * Description:			A tiny plugin to configure the WordPress core sitemap.
 * Version:				0.9
 * Requires at least:	5.5
 * Requires PHP:		5.6
 * Author:				Optimocha
 * Author URI:			https://optimocha.com/
 * License:				GPL v2 or later
 * License URI:			https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:			sitemap-configurator
 */

use OSC\OSC_Activator;
use OSC\OSC_Admin;
use OSC\OSC_Configurator;
use OSC\OSC_Options;

define( 'OSC_PATH', realpath( dirname( __FILE__ ) ) . '/' );

define( 'OSC_URL', plugin_dir_url( __FILE__ ) );

/**
 * Autoload classes which has SC namespace
 *
 * @param $class_name
 *
 * @since 0.9.0
 *
 */
spl_autoload_register( 'osc_autoloader' );
function osc_autoloader( $class_name ) {
	if ( false === strpos( $class_name, 'OSC\\' ) ) {
		return;
	}

	$class_name = str_replace( 'OSC\\', '', $class_name );

	// Make filename lower case, it's not necessary but do it just in "case" :P (Did you get the joke?)
	$filename = strtolower( str_replace( '_', '-', $class_name ) );
	$path     = OSC_PATH . 'classes/class-' . $filename . '.php';
	if ( file_exists( $path ) ) {
		require_once( $path );
	}
}

// Activator
register_activation_hook( __FILE__, 'activate_sitemap_configurator' );

if ( ! function_exists( 'activate_sitemap_configurator' ) ) {
	/**
	 * Activation hook
	 */
	function activate_sitemap_configurator() {
		$activate = new OSC_Activator();
	}
}

if ( ! function_exists( 'osc_init_plugin' ) ) {
	$osc_options = null;

	function osc_init_plugin() {
		global $osc_options;
		$osc_options = new OSC_Options();
		$osc_admin   = new OSC_Admin();
		$osc_configurator = new OSC_Configurator();
	}

	osc_init_plugin();
}
