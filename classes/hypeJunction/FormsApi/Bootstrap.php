<?php

namespace hypeJunction\FormsApi;

use Elgg\PluginBootstrap;

/**
 * Plugin bootstrap for forms_api.
 */
class Bootstrap extends PluginBootstrap {

	/**
	 * {@inheritdoc}
	 */
	public function load() {
	}

	/**
	 * {@inheritdoc}
	 */
	public function boot() {
	}

	/**
	 * {@inheritdoc}
	 */
	public function init() {
		elgg_extend_view('css/elgg', 'elements/forms/field.css');
		elgg_extend_view('css/admin', 'elements/forms/field.css');

		if (!function_exists('elgg_view_input')) {
			// Backwards compat for plugins written against forms_api 1.x / Elgg 2.x.
			// Function must be declared in the global namespace, so it lives in
			// functions.php (no namespace declaration) and is loaded on demand.
			require_once dirname(__DIR__, 3) . '/functions.php';
		}
	}

	/**
	 * {@inheritdoc}
	 */
	public function ready() {
	}

	/**
	 * {@inheritdoc}
	 */
	public function shutdown() {
	}

	/**
	 * {@inheritdoc}
	 */
	public function activate() {
	}

	/**
	 * {@inheritdoc}
	 */
	public function deactivate() {
	}

	/**
	 * {@inheritdoc}
	 */
	public function upgrade() {
	}
}
