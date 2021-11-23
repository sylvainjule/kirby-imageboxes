<template>
    <ul class="k-checkboxes-input" :style="'--columns:' + columns">
        <li v-for="(option, index) in options" :key="index">
            <k-imagebox-input
                :id="id + '-' + index"
                :value="selected.indexOf(option.value) > -1"
                :label="option.text"
                :image="option.image"
                :fit="fit"
                :ratio="ratio"
                :mobile="mobile"
                :padding="padding"
                @input="onInput(option.value, $event)"
            />
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
    },
    computed: {
        padding() {
            return 'padding-top:'+ this.$helper.ratio(this.ratio, 'auto', true)
        }
    }
}
</script>
