<?php

namespace Author\WpPluginStarter\Core;

use Author\WpPluginStarter\WpPluginStarter;
use Author\WpPluginStarter\Core\Abstracts\HookableInterface;

/**
 * Handles instantiation of services.
 *
 * @package Author\WpPluginStarter
 */
class Provider {

	/**
	 * Holds classes that should be instantiated.
	 *
	 * @var array
	 */
	protected $services = [];

	/**
	 * Service provider.
	 */
	public function __construct( $services ) {
		$this->services = $services;
	}

	/**
	 * Registers services with the container.
	 *
	 * @throws \ReflectionException
	 */
	public function register(): void {
		foreach ( $this->services as $service ) {
			$service = WpPluginStarter::$container->get( $service );

			if ( $service instanceof HookableInterface ) {
				$service->register_hooks();
			}
		}
	}
}
