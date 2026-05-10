<?php

namespace hypeJunction\FormsApi\Views;

use Elgg\IntegrationTestCase;

class LabelViewTest extends IntegrationTestCase {

	public function getPluginID(): string {
		return 'forms_api';
	}

	public function up(): void {}

	public function down(): void {}

	public function testEmptyLabelRendersEmptyString(): void {
		$output = elgg_view('elements/forms/label', []);
		$this->assertSame('', $output);
	}

	public function testFalsyLabelStringRendersEmptyString(): void {
		$output = elgg_view('elements/forms/label', ['label' => '']);
		$this->assertSame('', $output);
	}

	public function testLabelRendersInLabelElement(): void {
		$output = elgg_view('elements/forms/label', [
			'label' => 'Display name',
			'id' => 'fa_test_id',
		]);
		$this->assertStringContainsString('<label', $output);
		$this->assertStringContainsString('elgg-field-label', $output);
		$this->assertStringContainsString('for="fa_test_id"', $output);
		$this->assertStringContainsString('Display name', $output);
	}

	public function testNonRequiredLabelHasNoIndicator(): void {
		$output = elgg_view('elements/forms/label', [
			'label' => 'Optional',
			'required' => false,
		]);
		$this->assertStringNotContainsString('elgg-required-indicator', $output);
	}

	public function testRequiredLabelGetsDefaultIndicator(): void {
		$output = elgg_view('elements/forms/label', [
			'label' => 'Required',
			'required' => true,
		]);
		$this->assertStringContainsString('elgg-required-indicator', $output);
		$this->assertStringContainsString('&ast;', $output);
	}

	public function testCustomRequiredIndicatorOverridesDefault(): void {
		$output = elgg_view('elements/forms/label', [
			'label' => 'Required',
			'required' => true,
			'required_indicator' => '<sup class="custom-mark">!</sup>',
		]);
		$this->assertStringContainsString('<sup class="custom-mark">!</sup>', $output);
		$this->assertStringNotContainsString('elgg-required-indicator', $output);
	}

	public function testFalsyRequiredIndicatorSuppressesIt(): void {
		$output = elgg_view('elements/forms/label', [
			'label' => 'Required',
			'required' => true,
			'required_indicator' => '',
		]);
		$this->assertStringNotContainsString('elgg-required-indicator', $output);
		$this->assertStringNotContainsString('&ast;', $output);
	}
}
