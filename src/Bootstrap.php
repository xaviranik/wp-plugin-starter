<?php

namespace Author\WpPluginStarter;

use Author\WpPluginStarter\Core\Provider;
use Author\WpPluginStarter\Admin\AdminProvider;
use Author\WpPluginStarter\Frontend\FrontendProvider;

/**
 * Class Bootstrap
 *
 * Handles the plugin's bootstrap process.
 *
 * @package Author\WpPluginStarter
 */
class Bootstrap {

	/**
	 * Holds plugin's provider classes.
	 *
	 * @var string[]
	 */
	protected static $providers = [
		AdminProvider::class,
		FrontendProvider::class,
	];

	/**
	 * Bootstraps the plugin.
	 *
	 * @return void
	 */
	public static function bootstrap_plugin() {
		self::install();
		self::register_providers();
	}

	/**
	 * Installs the plugin.
	 *
	 * @return void
	 */
	protected static function install() {
		// todo: implement installer logic
	}

	/**
	 * Registers providers.
	 *
	 * @return void
	 */
	protected static function register_providers(): void {
		foreach ( self::$providers as $provider ) {
			if ( class_exists( $provider ) && is_subclass_of( $provider, Provider::class ) ) {
				new $provider();
			}
		}
	}
}
