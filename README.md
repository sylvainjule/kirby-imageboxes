# Imageboxes - Kirby illustrated checkboxes

This field allows you to add illustrations to checkboxes. Suggestions welcome.

![illustrated-checkboxes](https://user-images.githubusercontent.com/14079751/28174761-b75dc5fa-67f2-11e7-9395-c24a43205d70.jpg)

## Installation
Put this field in the `site/fields` directory.  
The field folder must be named `imageboxes` :

```
|-- site/fields/
    |-- imageboxes/
        |-- assets/
        |-- imageboxes.php
```

## Usage

Basic usage in blueprint:

```yaml
  fieldname:
    label: Field label
    type: imageboxes
    columns: 4
    options: 
      hyperactive:
        label: Hyperactive
        image: hyperactive.jpg
      sleepy:
        label: Sleepy
        image: sleepy.jpg
      facetious:
        label: Facetious
        image: facetious.jpg
      adventurous:
        label: Adventurous
        image: adventurous.jpg
```

By default, images must be put in the main `assets/images` folder of your website.

## Options

Other options are not required. 

### Custom ratio

If `ratio` is specified, images will be displayed as background images and the ratio set for its container. You can then set the background position with a CSS syntax (not mandatory, default position is : `center center`).

```yaml
  fieldname:
    label: Field label
    type: imageboxes
    columns: 4
    display:
      ratio: 3/2
      position: top left
    options:
      (...)
```

### Enable for mobiles

By default, images are not displayed when the panel switches to its mobile view. If you want to override this, set :
```yaml
    display:
      mobile: true
```

### Fetch images

You can query images from existing pages to populate the buttons.

Please note that `fetch` **must** be set to `images` in order for this to work properly.

The appropriate syntax is then :

```yaml
  fieldname:
    label: Field label
    type: imageboxes
    columns: 3
    options: query
    query:
      page: path/to/page
      fetch: images
      value: '{{filename}}'
      text: 
        label: '{{filename}}'
        image: '{{filename}}'
```

### Use color instead of image

You can choose to use a background-color instead of an image. In this case, `ratio` should be specified (fallback is 4/1).

```yaml
fieldname:
    label: Field label
    type: imageboxes
    columns: 4
    display:
      ratio: 1/1
    options:
      yellow:
        label: Yellow
        color: '#e6a726'
      green:
        label: Green
        color: '#558f59'
      lightblue:
        label: Light blue
        color: '#bfcad5'
      darkblue:
        label: Dark blue
        color: '#2f4663'
```

## License

MIT