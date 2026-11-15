<?php

use SylvainJule\ImageBoxesField;

load([
    'SylvainJule\\ImageBoxesField'        => 'lib/fields/ImageBoxesField.php',
    'SylvainJule\\ImageBoxes'             => 'lib/options/imageboxes.php',
    'SylvainJule\\ImageBoxesOption'       => 'lib/options/imageboxes-option.php',
    'SylvainJule\\ImageBoxesOptions'      => 'lib/options/imageboxes-options.php',
    'SylvainJule\\ImageBoxesOptionsApi'   => 'lib/options/imageboxes-optionsapi.php',
    'SylvainJule\\ImageBoxesOptionsQuery' => 'lib/options/imageboxes-optionsquery.php',
], __DIR__);

Kirby::plugin('sylvainjule/imageboxes', [
    'fields' => [
        'imageboxes' => ImageBoxesField::class,
    ],
]);
