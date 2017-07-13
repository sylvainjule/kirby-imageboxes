# Imageboxes - Kirby Illustrated Checkboxes

This field allows you to add illustrations to checkboxes. Suggestions welcome.

![illustrated-checkboxes](https://user-images.githubusercontent.com/14079751/28165472-2ed0c9e4-67d4-11e7-9cde-535561ad4725.jpg)

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
      first:
        label: Char. 01
        image: first.jpg
      second:
        label: Char. 02
        image: second.jpg
      third:
        label: Char. 03
        image: third.jpg
      fourth:
        label: Char. 04
        image: fourth.jpg
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

## License

MIT