<template>
    <label :class="['k-checkbox-input', {'is-focus': isFocused}]">
        <figure :class="['k-checkbox-image-ctn', {'mobile-show': mobile}]">
            <figure class="k-checkbox-image" :style="padding">
                <img :src="image" :class="fit" alt="">
                <div class="background"></div>
            </figure>
        </figure>
        <div>
            <input ref="input" :checked="value" :disabled="disabled" :id="id" class="k-checkbox-input-native" type="checkbox" v-on="listeners" @focus="isFocused = true" @blur="isFocused = false">
            <span class="k-checkbox-input-icon" aria-hidden="true">
                <svg width="12" height="10" viewBox="0 0 12 10" xmlns="http://www.w3.org/2000/svg" >
                    <path d="M1 5l3.3 3L11 1" stroke-width="2" fill="none" fill-rule="evenodd" />
                </svg>
            </span>
            <span class="k-checkbox-input-label" v-html="label" />
        </div>
    </label>
</template>

<script>
export default {
    extends: 'k-checkbox-input',
    data() {
        return {
            isFocused: false
        }
    },
    props: {
        fit: String,
        ratio: Number,
        mobile: Boolean,
        padding: String,
        image: String,
    },
}
</script>