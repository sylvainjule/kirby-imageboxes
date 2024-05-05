# Kirby illustrated checkboxes

Add illustrations to checkboxes.

![cover](https://user-images.githubusercontent.com/14079751/48333924-58238200-e659-11e8-938d-311f7bec31a6.jpg)

<br/>

## Overview

> This plugin is completely free and published under the MIT license. However, if you are using it in a commercial project and want to help me keep up with maintenance, please consider [making a donation of your choice](https://www.paypal.me/sylvainjl).

- [1. Installation](#1-installation)
- [2. Setup](#2-setup)
  * [2.1. Hardcoded options](#21-hardcoded-options)
  * [2.2. Dynamic options](#22-dynamic-options)
- [3. Global options](#3-global-options)
- [4. Per-field options](#4-per-field-options)
- [5. License](#5-license)

<br/>

## 1. Installation

> Kirby 3: Up to 1.0.6. Kirby 4: 2.0.0+

Download and copy this repository to ```/site/plugins/imageboxes```

Alternatively, you can install it with composer: ```composer require sylvainjule/imageboxes```

<br/>

## 2. Setup

The field is best used with the `columns` option set.

#### 2.1. Hardcoded options

If the field's options are hardcoded, images need to be placed in the `assets/images` folder of your installation.

The `image` value must be a filename, the field will automatically prefix it with the correct path.

```yaml
myimageboxes:
  label: Categories
  type: imageboxes
  columns: 3
  options:
    bears:
      text: Brown bears
      image: bears.jpg
    bisons:
      text: Bisons
      image: bisons.jpg
    marmots:
      text: Marmots
      image: marmots.jpg
```

#### 2.2. Dynamic options

The field is compatible with both `query` and `api` fetch. You need to explicitely set the result text, stored value and image url.

The `image` value must return **an absolute url**.

```yaml
myimageboxes:
  label: Categories
  type: imageboxes
  columns: 3
  options: query
  query:
    fetch: page.images
    text: "{{ file.filename }}"
    value: "{{ file.id }}"
    image: "{{ file.resize(512).url }}"
```

Notice the `{{ file.resize(512).url }}` instead of `{{ file.url }}`. Two reasons for this:

- Using a thumb url will prevent loading unnecessarily large images.
- `512` is the default value of the Files field's thumbs. Therefore it is likely that the thumb will have already been created. 

I recommend using a `resize` number [already used](https://github.com/k-next/kirby/blob/a709a5728671c0b85a1f37db1d6b2a028151f013/config/api/models/File.php#L86) by the panel (128, 256, 512, 768, 1024).

<br/>

## 3. Global options

#### 3.1. `baseUrl`

If you want the images to be queried from a different location than the `assets/images` folder, you can set the `baseUrl` option in your `config.php` file to whatever folder you'd like. For example:

```php
'sylvainjule.imageboxes.baseUrl' => '{{ kirby.url("assets") }}/my-custom-folder',
```

<br/>

## 4. Per-field options

#### 4.1. `ratio`

![ratio](https://user-images.githubusercontent.com/14079751/48333927-58bc1880-e659-11e8-8ef2-d239985877ae.jpg)

The ratio of the image container, to be adjusted depending on your images. Default is `1/1`.

```yaml
myimageboxes:
  type: imageboxes
  ratio: 1/1
```

#### 4.2. `fit`

![fit](https://user-images.githubusercontent.com/14079751/48333925-58238200-e659-11e8-811c-074e43b43f2d.jpg)

Defines how the image should fit within its container, either `contain` or `cover`. Default is `cover`.

```yaml
myimageboxes:
  type: imageboxes
  fit: cover
```

#### 4.3. `back`

Defines the background behind transparent / contained images. Accepts any CSS-valid property for the `background` property. Default is `false`.

```yaml
myimageboxes:
  type: imageboxes
  back: white # or '#fefefe', or 'rgb(255, 0, 255)', etc.
```

#### 4.4. `mobile`

By default, images are not displayed when the panel switches to its mobile view. Not recommended, but if you want to override this, set the option to `true`.

```yaml
myimageboxes:
  type: imageboxes
  mobile: false
```

<br/>

## 5. License

MIT
