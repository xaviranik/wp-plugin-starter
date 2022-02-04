<?php

namespace Author\WpPluginStarter;

class WpPluginStarter {

	/**
	 * Plugin version.
	 *
	 * @var string
	 */
	public static $VERSION;

	/**
	 * Plugin file.
	 *
	 * @var string
	 */
	public static $PLUGIN_FILE;

	/**
	 * Plugin directory.
	 *
	 * @var string
	 */
	public static $PLUGIN_DIR;

	/**
	 * Plugin base name.
	 *
	 * @var string
	 */
	public static $BASENAME;

	/**
	 * Plugin text directory path.
	 *
	 * @var string
	 */
	public static $TEXT_DOMAIN_DIR;

	/**
	 * Plugin text directory path.
	 *
	 * @var string
	 */
	public static $TEMPLATES_DIR;

	/**
	 * Plugin assets directory path.
	 *
	 * @var string
	 */
	public static $ASSETS_DIR;

	/**
	 * Plugin url.
	 *
	 * @var string
	 */
	public static $PLUGIN_URL;

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
		self::$VERSION         = '1.0.0';
		self::$PLUGIN_FILE     = WP_PLUGIN_STARTER_PLUGIN_FILE;
		self::$PLUGIN_DIR      = WP_PLUGIN_STARTER_PLUGIN_DIR;
		self::$BASENAME        = plugin_basename( self::$PLUGIN_FILE );
		self::$TEXT_DOMAIN_DIR = self::$PLUGIN_DIR  . '/languages';
		self::$TEMPLATES_DIR   = self::$PLUGIN_DIR  . '/templates';
		self::$PLUGIN_URL      = plugins_url( '', self::$PLUGIN_FILE );
		self::$ASSETS_DIR      = self::$PLUGIN_URL . '/assets';
	}

	/**
	 * Registers life-cycle hooks.
	 *
	 * @return void
	 */
	protected function register_lifecycle(): void {
		register_activation_hook( self::$PLUGIN_FILE , [ Activate::class, 'handle' ] );
		register_deactivation_hook( self::$PLUGIN_FILE , [ Deactivate::class, 'handle' ] );
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