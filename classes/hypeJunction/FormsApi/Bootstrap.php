<?php

namespace hypeJunction\FormsApi;

use Elgg\PluginBootstrap;

class Bootstrap extends PluginBootstrap {

	/**
	 * {@inheritdoc}
	 */
	public function load() {}

	/**
	 * {@inheritdoc}
	 */
	public function boot() {}

	/**
	 * {@inheritdoc}
	 */
	public function init() {
		\elgg_extend_view('css/elgg', 'elements/forms/field.css');
		\elgg_extend_view('css/admin', 'elements/forms/field.css');
	}

	/**
	 * {@inheritdoc}
	 */
	public function ready() {}

	/**
	 * {@inheritdoc}
	 */
	public function shutdown() {}

	/**
	 * {@inheritdoc}
	 */
	public function activate() {}

	/**
	 * {@inheritdoc}
	 */
	public function deactivate() {}

	/**
	 * {@inheritdoc}
	 */
	public function upgrade() {}
}
