<?php

namespace Author\WpPluginStarter;

class WpPluginStarter {

	/**
	 * Plugin version.
	 *
	 * @var string
	 */
	public static $version;

	/**
	 * Plugin file.
	 *
	 * @var string
	 */
	public static $plugin_file;

	/**
	 * Plugin directory.
	 *
	 * @var string
	 */
	public static $plugin_directory;

	/**
	 * Plugin base name.
	 *
	 * @var string
	 */
	public static $basename;

	/**
	 * Plugin text directory path.
	 *
	 * @var string
	 */
	public static $text_domain_directory;

	/**
	 * Plugin text directory path.
	 *
	 * @var string
	 */
	public static $template_directory;

	/**
	 * Plugin assets directory path.
	 *
	 * @var string
	 */
	public static $assets_directory;

	/**
	 * Plugin url.
	 *
	 * @var string
	 */
	public static $plugin_url;

	/**
	 * WpPluginStarter Constructor.
	 */
	public function __construct() {
		$this->init();
		$this->register_lifecycle();
	}

	/**
	 * Initialize the plugin.
	 *
	 * @return void
	 */
	protected function init(): void {
		self::$version               = '1.0.0';
		self::$plugin_file           = WP_PLUGIN_STARTER_PLUGIN_FILE;
		self::$plugin_directory      = WP_PLUGIN_STARTER_PLUGIN_DIR;
		self::$basename              = plugin_basename( self::$plugin_file );
		self::$text_domain_directory = self::$plugin_directory . '/languages';
		self::$template_directory    = self::$plugin_directory . '/templates';
		self::$plugin_url            = plugins_url( '', self::$plugin_file );
		self::$assets_directory      = self::$plugin_url . '/assets';
	}

	/**
	 * Registers life-cycle hooks.
	 *
	 * @return void
	 */
	protected function register_lifecycle(): void {
		register_activation_hook( self::$plugin_file, [ Activate::class, 'handle' ] );
		register_deactivation_hook( self::$plugin_file, [ Deactivate::class, 'handle' ] );
	}

	/**
	 * Initializes the WpPluginStarter class.
	 *
	 * Checks for an existing Boostimer instance
	 * and if it doesn't find one, creates it.
	 *
	 * @return WpPluginStarter
	 */
	public static function instance(): WpPluginStarter {
		static $instance = false;

		if ( ! $instance ) {
			$instance = new self();
		}

		return $instance;
	}
}
