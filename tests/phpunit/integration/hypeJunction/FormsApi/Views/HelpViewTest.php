<?php

namespace hypeJunction\FormsApi\Views;

use Elgg\IntegrationTestCase;

class HelpViewTest extends IntegrationTestCase {

	public function getPluginID(): string {
		return 'forms_api';
	}

	public function up(): void {}

	public function down(): void {}

	public function testEmptyHelpRendersEmptyString(): void {
		$output = \elgg_view('elements/forms/help', []);
		$this->assertSame('', $output);
	}

	public function testFalsyHelpStringRendersEmptyString(): void {
		$output = \elgg_view('elements/forms/help', ['help' => '']);
		$this->assertSame('', $output);
	}

	public function testHelpRendersInDivWithExpectedClasses(): void {
		$output = \elgg_view('elements/forms/help', ['help' => 'Be concise.']);
		$this->assertStringContainsString('<div', $output);
		$this->assertStringContainsString('elgg-field-help', $output);
		$this->assertStringContainsString('elgg-text-help', $output);
		$this->assertStringContainsString('Be concise.', $output);
	}

	public function testHelpHtmlPassedThroughVerbatim(): void {
		$output = \elgg_view('elements/forms/help', [
			'help' => '<em>important</em>',
		]);
		$this->assertStringContainsString('<em>important</em>', $output);
	}
}
