<?php

namespace hypeJunction\FormsApi\Views;

use Elgg\IntegrationTestCase;

class InputViewTest extends IntegrationTestCase {

	public function getPluginID(): string {
		return 'forms_api';
	}

	public function up(): void {}

	public function down(): void {}

	public function testDispatchesToTextInputView(): void {
		$output = elgg_view('elements/forms/input', [
			'input_type' => 'text',
			'name' => 'fa_test_text',
			'value' => 'hello',
		]);
		$this->assertStringContainsString('name="fa_test_text"', $output);
		$this->assertStringContainsString('hello', $output);
	}

	public function testDispatchesToCheckboxesInputView(): void {
		$output = elgg_view('elements/forms/input', [
			'input_type' => 'checkboxes',
			'name' => 'fa_test_chx',
			'options' => ['a' => 'A', 'b' => 'B'],
		]);
		$this->assertStringContainsString('name="fa_test_chx', $output);
		$this->assertStringContainsString('type="checkbox"', $output);
	}

	public function testInputTypeNotPassedThroughAsAttribute(): void {
		$output = elgg_view('elements/forms/input', [
			'input_type' => 'text',
			'name' => 'fa_test_strip',
		]);
		$this->assertStringNotContainsString('input_type="text"', $output);
	}
}
