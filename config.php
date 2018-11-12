<?php

Kirby::plugin('sylvainjule/imageboxes', [
	'fields' => array(
		'imageboxes' => require_once __DIR__ . '/lib/fields/imageboxes.php',
	),
]);