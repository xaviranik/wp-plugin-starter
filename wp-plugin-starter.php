<?php
/**
 * Plugin Name: WP Plugin Starter
 * Description: PLUGIN_DESCRIPTION
 * URI: PLUGIN_URI
 * Author: PLUGIN_AUTHOR
 * Author URI: PLUGIN_AUTHOR_URI
 * Version: 0.0.1
 * License: GPL2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: PLUGIN_TEXT_DOMAIN
 */

namespace Author\WpPluginStarter;

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( WpPluginStarter::class ) && is_readable( __DIR__ . '/vendor/autoload.php' ) ) {
	require_once __DIR__ . '/vendor/autoload.php';
}

if ( ! defined( 'WP_PLUGIN_STARTER_PLUGIN_FILE' ) ) {
	define( 'WP_PLUGIN_STARTER_PLUGIN_FILE', __FILE__ );
}

if ( ! defined( 'WP_PLUGIN_STARTER_DIR' ) ) {
	define( 'WP_PLUGIN_STARTER_PLUGIN_DIR', __DIR__ );
}

class_exists( WpPluginStarter::class ) && WpPluginStarter::instance();