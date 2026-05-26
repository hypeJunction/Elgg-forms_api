<?php

namespace hypeJunction\FormsApi\Views;

use Elgg\IntegrationTestCase;

class FieldViewTest extends IntegrationTestCase {

	public function getPluginID(): string {
		return 'forms_api';
	}

	public function up(): void {}

	public function down(): void {}

	public function testReturnsEmptyWhenInputMissing(): void {
		$output = \elgg_view('elements/forms/field', [
			'label' => 'Name',
			'help' => 'Your full name',
		]);
		$this->assertSame('', $output);
	}

	public function testRendersFieldWrapperWithInput(): void {
		$output = \elgg_view('elements/forms/field', [
			'input' => '<input type="text" name="x"/>',
		]);
		$this->assertStringContainsString('<div', $output);
		$this->assertStringContainsString('elgg-field', $output);
		$this->assertStringContainsString('<input type="text" name="x"/>', $output);
	}

	public function testIncludesLabelAndHelp(): void {
		$output = \elgg_view('elements/forms/field', [
			'input' => '<input/>',
			'label' => '<label>Name</label>',
			'help' => '<div>helper</div>',
		]);
		$this->assertStringContainsString('<label>Name</label>', $output);
		$this->assertStringContainsString('<div>helper</div>', $output);
	}

	public function testRequiredFieldGetsRequiredClass(): void {
		$output = \elgg_view('elements/forms/field', [
			'input' => '<input/>',
			'required' => true,
		]);
		$this->assertStringContainsString('elgg-field-required', $output);
	}

	public function testNonRequiredFieldHasNoRequiredClass(): void {
		$output = \elgg_view('elements/forms/field', [
			'input' => '<input/>',
			'required' => false,
		]);
		$this->assertStringNotContainsString('elgg-field-required', $output);
	}

	public function testCustomClassMergedWithFieldClass(): void {
		$output = \elgg_view('elements/forms/field', [
			'input' => '<input/>',
			'class' => ['my-custom-class'],
		]);
		$this->assertStringContainsString('my-custom-class', $output);
		$this->assertStringContainsString('elgg-field', $output);
	}
}
