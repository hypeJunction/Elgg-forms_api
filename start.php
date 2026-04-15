<?php

/**
 * Forms API
 *
 * @author Ismayil Khayredinov <info@hypejunction.com>
 * @copyright Copyright (c) 2015, Ismayil Khayredinov
 */

return function () {
	elgg_register_event_handler('init', 'system', function () {
		elgg_extend_view('css/elgg', 'elements/forms/field.css');
		elgg_extend_view('css/admin', 'elements/forms/field.css');
	});
};
