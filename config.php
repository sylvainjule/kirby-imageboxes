<?php

Kirby::plugin('sylvainjule/imageboxes', [
	'fields' => array(
		'imageboxes' => require_once __DIR__ . '/lib/fields/imageboxes.php',
	),
    'methods' => array(
        'getImageBoxesOptions' => function () {
            return Options::factory(
                $this->options(),
                $this->props,
                $this->model()
            );
        },
    )
]);