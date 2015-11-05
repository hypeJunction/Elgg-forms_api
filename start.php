<?php

/**
 * Forms API
 *
 * @author Ismayil Khayredinov <info@hypejunction.com>
 * @copyright Copyright (c) 2015, Ismayil Khayredinov
 */
require_once __DIR__ . '/autoloader.php';

elgg_register_event_handler('init', 'system', 'forms_init');

/**
 * Initialize the plugin
 * @return void
 */
function forms_init() {

	elgg_extend_view('elgg.css', 'elements/forms/field.css');
	elgg_extend_view('admin.css', 'elements/forms/field.css');
}

/**
 * Renders a form field
 *
 * @param string $input_type Input type, used to generate an input view ("input/$input_type")
 * @param array  $vars       Fields and input vars.
 *                           Field vars contain both field and input params. 'label', 'help',
 *                           and 'field_class' params will not be passed on to the input view.
 *                           Others, including 'required' and 'id', will be available to the
 *                           input view. Both 'label' and 'help' params accept HTML, and
 *                           will be printed unescaped within their wrapper element.
 * @return string
 */
function elgg_view_input($input_type, array $vars = array()) {

	static $id_num;

	if (!elgg_view_exists("input/$input_type")) {
		return '';
	}

	if ($input_type == 'hidden') {
		return elgg_view("input/$input_type", $vars);
	}

	$id = elgg_extract('id', $vars);
	if (!$id) {
		$id_num++;
		$id = "elgg-field-$id_num";
		$vars['id'] = $id;
	}

	$vars['input_type'] = $input_type;

	$label = elgg_view('elements/forms/label', $vars);
	unset($vars['label']);

	$help = elgg_view('elements/forms/help', $vars);
	unset($vars['help']);

	$required = elgg_extract('required', $vars);
	$field_class = (array) elgg_extract('field_class', $vars, array());
	unset($vars['field_class']);

	$input = elgg_view("elements/forms/input", $vars);

	return elgg_view('elements/forms/field', array(
		'label' => $label,
		'help' => $help,
		'required' => $required,
		'id' => $id,
		'input' => $input,
		'class' => $field_class,
		'input_type' => $input_type,
	));
}
