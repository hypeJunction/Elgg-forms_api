<?php
/**
 * Backwards-compat shim: elgg_view_input() was provided by forms_api 1.x and
 * was never added to Elgg core. Plugins written against Elgg 2.x era depend on
 * it. In Elgg 4.x+, elgg_view_field() is the canonical replacement but uses a
 * different call signature, so this shim bridges the gap.
 *
 * @param string $input_type  Input type (select, text, hidden, submit, …)
 * @param array  $vars        Field variables (label, id, name, value, …)
 * @return string
 */
function elgg_view_input(string $input_type, array $vars = []): string {
	static $id_num = 0;

	if (!elgg_view_exists("input/$input_type")) {
		return '';
	}

	$hidden_types = ['hidden', 'securitytoken'];
	if (in_array($input_type, $hidden_types)) {
		return elgg_view("input/$input_type", $vars);
	}

	if (empty($vars['id'])) {
		$id_num++;
		$vars['id'] = "elgg-field-$id_num";
	}

	$vars['input_type'] = $input_type;

	$label = elgg_view('elements/forms/label', $vars);
	unset($vars['label']);

	$help = elgg_view('elements/forms/help', $vars);
	unset($vars['help']);

	$required = elgg_extract('required', $vars);
	$field_class = (array) elgg_extract('field_class', $vars, []);
	unset($vars['field_class']);

	$input = elgg_view('elements/forms/input', $vars);

	return elgg_view('elements/forms/field', [
		'label'      => $label,
		'help'       => $help,
		'required'   => $required,
		'id'         => $vars['id'],
		'input'      => $input,
		'class'      => $field_class,
		'input_type' => $input_type,
	]);
}
