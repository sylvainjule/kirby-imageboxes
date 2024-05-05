<template>
    <k-field class="k-checkboxes-field k-imageboxes-field"
             v-bind="$props" :input="id + '-0'" :counter="counterOptions">

        <k-empty v-if="!options?.length" :text="$t('options.none')" icon="checklist" />
        <k-imageboxes-input v-else ref="input" v-bind="$props" v-on="$listeners" />

    </k-field>
</template>
</template>

<script>
export default {
    extends: 'k-checkboxes-field',
    props: {
        fit: String,
        mobile: Boolean,
        ratio: Number,
        back: [Boolean, String]
    }
};
</script>

<style lang="scss">
    @import '../../assets/css/styles.scss'
</style>
