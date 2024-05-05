<?php

namespace SylvainJule;

require_once dirname(__DIR__) . '/options/imageboxes-optionsapi.php';
require_once dirname(__DIR__) . '/options/imageboxes-optionsquery.php';
require_once dirname(__DIR__) . '/options/imageboxes-factory.php';
require_once dirname(__DIR__) . '/options/imageboxes-option.php';
require_once dirname(__DIR__) . '/options/imageboxes-options.php';
require_once dirname(__DIR__) . '/options/imageboxes.php';

$base = require kirby()->root('kirby') . '/config/fields/checkboxes.php';


/* Merge new properties
--------------------------------*/

$base = array_merge_recursive($base, array(
    'options' => array(
        'baseUrl' => false,
    ),
    'props' => array(
        'fit' => function($fit = 'cover') {
            return $fit;
        },
        'back' => function($back = false) {
            return $back;
        },
        'mobile' => function($mobile = false) {
            return $mobile;
        },
        'ratio' => function($ratio = '1/1') {
        	return $ratio;
        },
    ),
));


/* Replace existing properties
--------------------------------*/

$base = array_replace_recursive($base, array(
    'methods' => array(
    	'getOptions' => function() {
            $props   = \Kirby\Field\FieldOptions::polyfill($this->props);
            $options = ImageBoxes::factory($props['options']);

            return $options->render($this->model());
        },
    ),
));


return $base;
