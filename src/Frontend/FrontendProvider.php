<?php

namespace Author\WpPluginStarter\Frontend;

use Author\WpPluginStarter\Core\Provider;

/**
 * Class FrontendProvider.
 *
 * Provides the frontend functionality of the plugin.
 *
 * @package Author\WpPluginStarter\Frontend
 */
class FrontendProvider extends Provider {

	/**
	 * Register all the necessary services for the frontend.
	 * Dependencies are automatically resolved.
	 *
	 * @var string[]
	 */
	protected $services = [];

	/**
	 * Checks if a service should be registered.
	 *
	 * @return bool
	 */
	protected function can_be_registered(): bool {
		return ! is_admin() || ( defined( 'DOING_AJAX' ) && DOING_AJAX );
	}
}
