<?php

namespace Author\WpPluginStarter\Core\Abstracts;

use Author\WpPluginStarter\WpPluginStarter;
use Author\WpPluginStarter\Core\Interfaces\HookableInterface;

/**
 * Handles instantiation of services.
 *
 * @package Author\WpPluginStarter
 */
abstract class Provider {

	/**
	 * Holds classes that should be instantiated.
	 *
	 * @var array
	 */
	protected $services = [];

	/**
	 * Service provider.
	 *
	 * @param array $services
	 *
	 * @throws \ReflectionException
	 */
	public function __construct( array $services = [] ) {
		if ( ! empty( $services ) ) {
			$this->services = $services;
		}

		$this->register();
	}

	/**
	 * Checks if a providers' service should be registered.
	 *
	 * @return bool
	 */
	abstract protected function can_be_registered(): bool;

	/**
	 * Registers services with the container.
	 *
	 * @throws \ReflectionException
	 */
	public function register(): void {
		foreach ( $this->services as $service ) {
			if ( ! class_exists( $service ) || ! $this->can_be_registered() ) {
				continue;
			}

			$service = WpPluginStarter::$container->get( $service );

			if ( $service instanceof HookableInterface ) {
				$service->register_hooks();
			}
		}
	}
}
