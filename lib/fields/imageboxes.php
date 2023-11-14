<?php

require_once dirname(__DIR__) . '/options/imageboxes-optionsapi.php';
require_once dirname(__DIR__) . '/options/imageboxes-optionsquery.php';
require_once dirname(__DIR__) . '/options/imageboxes-options.php';


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
        'gap' => function($gap = false) {
            return $gap;
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
    'computed' => array(
    	'options' => function() {
    		return ImageBoxesOptions::factory($this->options(), $this->props, $this->model());
        },
    ),
));


return $base;
