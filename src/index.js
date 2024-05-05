import ImageBoxes        from './components/field/ImageBoxes.vue'
import ImageBoxesInput   from './components/input/ImageBoxesInput.vue'
import ImageBoxInput     from './components/input/ImageBoxInput.vue'
import ImageBoxesPreview from './components/previews/ImageBoxesPreview.vue'

panel.plugin('sylvainjule/imageboxes', {
    fields: {
        imageboxes: ImageBoxes,
    },
    components: {
    	'k-imageboxes-input': ImageBoxesInput,
        'k-imagebox-input': ImageBoxInput,
        'k-imageboxes-field-preview': ImageBoxesPreview,
    }
});