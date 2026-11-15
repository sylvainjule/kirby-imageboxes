<template>
    <k-field v-bind="$props" :class="['k-checkboxes-field', 'k-imageboxes-field', $attrs.class]" :counter="counterOptions" :input="id + '-0'" :style="$attrs.style" >
        <template #counter>
            <k-counter v-if="counterOptions" v-bind="counterOptions" :required="required" class="k-field-counter" />
            <k-button-group v-if="batch" layout="collapsed">
                <k-button :disabled="value.length === 0" :responsive="true" icon="deselect-all" size="xs" variant="filled" @click="deselectAll">
                    {{ $t('deselect.all') }}
                </k-button>
                <k-button :disabled="value.length >= options.length" :responsive="true" icon="select-all" size="xs" variant="filled" @click="selectAll">
                    {{ $t('select.all') }}
                </k-button>
            </k-button-group>
        </template>

        <k-empty v-if="!options?.length" :text="$t('options.none')" icon="checklist" />
        <k-imageboxes-input v-else ref="input" v-bind="$props" :options="$helper.field.options(options, value)"  @input="$emit('input', $event)" />
    </k-field>
</template>

<script>
export default {
    extends: 'k-checkboxes-field',
    inheritAttrs: false,
    emits: ['input'],
    props: {
        fit: String,
        mobile: Boolean,
        ratio: [String, Number],
        back: [Boolean, String],
    },
};
</script>

<style lang="scss">
    @import '../../assets/css/styles.scss';
</style>
