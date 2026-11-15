<?php

namespace SylvainJule;

use Kirby\Form\FieldOptions;

class ImageBoxes extends FieldOptions {
    public static function factory(array $props, bool $safeMode = true): static {
        $options = match ($props['type']) {
            'api'   => ImageBoxesOptionsApi::factory($props),
            'query' => ImageBoxesOptionsQuery::factory($props),
            default => ImageBoxesOptions::factory($props['options'] ?? []),
        };

        return new static($options, $safeMode);
    }
}
