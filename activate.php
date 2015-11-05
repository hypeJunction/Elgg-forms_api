<?php

if (is_callable('elgg_view_input')) {
	register_error('Forms API plugin implements features that have already been integrated in core.');
	return false;
}