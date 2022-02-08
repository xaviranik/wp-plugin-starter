<?php

namespace Author\WpPluginStarter\Admin;

use Author\WpPluginStarter\Core\Interfaces\HookableInterface;

/**
 * Admin menu class.
 *
 * @since 1.0.0
 */
class Menu implements HookableInterface {

	/**
	 * Registers all hooks for the class.
	 *
	 * @return void
	 */
	public function register_hooks(): void {
		add_action( 'admin_menu', [ $this, 'register_menu' ] );
	}

	/**
	 * Register admin menu.
	 *
	 * @since  1.0.0
	 *
	 * @return void
	 */
	public function register_menu(): void {
		$icon = 'dashicons-welcome-widgets-menus';

		add_menu_page(
			__( 'WP Plugin Starter', 'PLUGIN_TEXT_DOMAIN' ),
			__( 'WP Plugin Starter', 'PLUGIN_TEXT_DOMAIN' ),
			'manage_options',
			'wp-plugin-starter',
			[ $this, 'render_menu_page' ],
			$icon,
			57
		);
	}

	/**
	 * Renders the admin page.
	 *
	 * @since  1.0.0
	 *
	 * @return void
	 */
	public function render_menu_page(): void {
		echo '<div>Hello World</div>';
	}
}

