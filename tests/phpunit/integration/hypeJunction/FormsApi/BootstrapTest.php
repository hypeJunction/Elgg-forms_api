<?php

namespace hypeJunction\FormsApi;

use Elgg\IntegrationTestCase;

class BootstrapTest extends IntegrationTestCase {

	public function getPluginID(): string {
		return 'forms_api';
	}

	public function up(): void {}

	public function down(): void {}

	public function testPluginIsActive(): void {
		$plugin = elgg_get_plugin_from_id('forms_api');
		$this->assertInstanceOf(\ElggPlugin::class, $plugin);
		$this->assertTrue($plugin->isActive());
	}

	public function testFieldCssViewExists(): void {
		$this->assertTrue(elgg_view_exists('elements/forms/field.css'));
	}

	public function testFieldCssRendersStyleRules(): void {
		$css = elgg_view('elements/forms/field.css');
		$this->assertIsString($css);
		$this->assertStringContainsString('elgg-field', $css);
	}

	public function testBootstrapInitRunsWithoutError(): void {
		$plugin = elgg_get_plugin_from_id('forms_api');
		$bootstrap = $plugin->getBootstrap();
		$bootstrap->init();
		$this->assertTrue(true);
	}
}
