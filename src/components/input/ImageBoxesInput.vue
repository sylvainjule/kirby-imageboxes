<template>
    <fieldset :class="['k-checkboxes-input', 'k-imageboxes-input', $attrs.class]" :disabled="disabled" :style="$attrs.style">
        <legend class="sr-only">{{ $t('options') }}</legend>
        <k-input-validator v-bind="{ min, max, required }" :value="JSON.stringify(selected)">
            <ul :style="{ '--columns': columns }" class="k-grid" data-variant="choices">
                <li v-for="(choice, index) in choices" :key="index">
                    <k-imagebox-input v-bind="choice" @input="input(choice.value, $event)" />
                </li>
            </ul>
        </k-input-validator>
    </fieldset>
</template>

<script>
export default {
    extends: 'k-checkboxes-input',
    inheritAttrs: false,
    emits: ['input'],
    props: {
        fit: String,
        ratio: [String, Number],
        mobile: Boolean,
        back: [Boolean, String],
    },
    computed: {
        choices() {
            return this.options.map((option, index) => {
                const checked = this.selected.includes(option.value);

                return {
                    autofocus: this.autofocus && index === 0,
                    checked,
                    disabled: this.disabled || option.disabled || (!checked && this.isFull),
                    id: `${this.id}-${index}`,
                    info: option.info,
                    label: option.text,
                    name: this.name ?? this.id,
                    type: 'checkbox',
                    value: option.value,
                    image: option.image,
                    fit: this.fit,
                    ratio: this.ratio,
                    mobile: this.mobile,
                    back: this.back,
                };
            });
        },
    },
};
</script>