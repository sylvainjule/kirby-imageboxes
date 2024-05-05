<template>
    <ul :style="{ '--columns': columns }"
        class="k-checkboxes-input k-imageboxes-input k-grid"
        data-variant="choices">
        <li v-for="(choice, index) in choices" :key="index">
            <k-imagebox-input v-bind="choice" @input="input(choice.value, $event)" />
        </li>
    </ul>
</template>

<script>
export default {
    extends: 'k-checkboxes-input',
    props: {
        fit: String,
        ratio: Number,
        mobile: Boolean,
        back: [Boolean, String],
    },
    computed: {
        choices() {
            return this.options.map((option, index) => {
                return {
                    autofocus: this.autofocus && index === 0,
                    checked: this.selected.includes(option.value),
                    disabled: this.disabled || option.disabled,
                    id: `${this.id}-${index}`,
                    info: option.info,
                    label: option.text,
                    name: this.name ?? this.id,
                    type: "checkbox",
                    value: option.value,
                    image: option.image,
                    fit: this.fit,
                    ratio: this.ratio,
                    mobile: this.mobile,
                    back: this.back
                };
            });
        }
    },
    methods: {
    }
}
</script>
