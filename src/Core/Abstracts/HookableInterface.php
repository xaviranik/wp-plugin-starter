<?php

namespace Author\WpPluginStarter\Core\Abstracts;

/**
 * Interface HookableInterface
 *
 * Provides a hookable interface for classes.
 */
interface HookableInterface {

	/**
	 * Registers all hooks for the class.
	 *
	 * @return void
	 */
	public function register_hooks(): void;
}
