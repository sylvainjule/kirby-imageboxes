<?php

namespace SylvainJule;

class ImageBoxesOptions extends \Kirby\Option\Options {
    public static function factory(array $items = []): static {
        $collection = new static();

        // We format the correct image url here ↓
        $baseUrl = option('sylvainjule.imageboxes.baseUrl') ?? kirby()->url('assets') . '/images';
        $baseUrl = rtrim($baseUrl, '/');

        foreach($items as $key => $option) {
            $image = $items[$key]['image'];
            if(!str_starts_with($image, 'http')) {
                $items[$key]['image'] = $baseUrl .'/'. $items[$key]['image'];
            }
        }

        foreach ($items as $key => $option) {
            if (is_array($option) === false || array_key_exists('value', $option) === false) {
                if(is_string($key)) {
                    $option['value'] = $key;
                }
                else {
                    $option['value'] = $option;
                }
            }
            $option = ImageBoxesOption::factory($option);
            $collection->__set($option->id(), $option);
        }

        return $collection;
    }
}
