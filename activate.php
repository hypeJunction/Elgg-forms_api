<?php

if (version_compare(elgg_get_version(true), '2.1', '>=')) {
	register_error('Forms API plugin implements features that have already been integrated in core.');
	return false;
}