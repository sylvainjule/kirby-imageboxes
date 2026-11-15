<?php

namespace SylvainJule;

use Kirby\Option\Options;

class ImageBoxesOptions extends Options {
    public static function factory(array $items = [], bool $resolve = true): static {
        $collection = new static();

        // We format the correct image url here ↓
        $baseUrl = option('sylvainjule.imageboxes.baseUrl') ?? kirby()->url('assets') . '/images';
        $baseUrl = kirby()->site()->toSafeString($baseUrl);
        $baseUrl = rtrim($baseUrl, '/');

        foreach($items as $key => $option) {
            if(is_array($option) === true && isset($option['image'])) {
                $image = $option['image'];

                if(str_starts_with($image, 'http') === false) {
                    $option['image'] = $baseUrl . '/' . $image;
                }
            }

            if(is_array($option) === false || array_key_exists('value', $option) === false) {
                if(is_string($key)) {
                    if(is_array($option) === true) {
                        $option['value'] = $key;
                    } else {
                        $option = ['value' => $key, 'text' => $option];
                    }
                } else {
                    $option = ['value' => $option];
                }
            }

            $option = ImageBoxesOption::factory($option, $resolve);
            $collection->__set($option->id(), $option);
        }

        return $collection;
    }
}
