# Echo Wordpress Template

## Author:

Isaac Castillo ( @ icemancast / echods.com )

## Summary
Echo Wordpress Template for use as a starting template for building custom themes. Uses SCSS and AutoPrefixr, HTML5 Bootstrap 4 , and Webpack for all processing tasks.Tested up to WordPress 4.0

## Usage
The theme is setup to use Webpack to compile SCSS (with source maps), run it through AutoPrefixr, concatenate and minify JavaScript and have a support for ES6, optimize images, optimize fonts.

**Echo Wordpress Template requires [Node.js](https://nodejs.org/) to run.**

First; download the template

```
git clone https://github.com/echods/echo-theme.git
```

```sh
$ cd echo-theme
$ npm install
```

Then change your resources

```
echo-theme/resources/assets/
echo-theme/resources/assets/sass/ (Your SCSS files)
echo-theme/resources/assets/js (Javascript files and vendors)
echo-theme/resources/assets/img (Images)
echo-theme/resources/assets/fonts (Fonts)
```

## Combine js files

To combine files that are not es6+ exports use the vendor array key on the webpack config to list out all the files in order to combine.

```js
vendor: [
    './resources/assets/js/vendor/jsFileName1.js', // Use to combine js files that are not export
    './resources/assets/js/vendor/jsFileName2.js',
],
```

For development environments your need to run this command

```
npm run watch
```

For production environments you need to run

```
npm run production
```

### Features
* Normalized stylesheet for cross-browser compatibility using Normalize.css version 3 (IE8+)
* Easy to customize
* Bootstrap 4 included and you can add or remove any bootstrap components
* Media Queries can be nested in each selector using SASS
* SCSS with plenty of mixins ready to go (also bootstrap mixins included)
* Example div written in _styles.scss for Bootstrap 4 syntax reference
* Webpack for processing all SASS, JavaScript and images.
* Webpack to support the modern JavaScript ES6 (Classes , Modules .....)
* Webpack generates **new files** for Styles and Javascript :
  * Files With **different names** and the theme has a capability **to detect and load** the correct files each time.
  * No more browser cache problem
  * **This is a really cool feature**
* & Much much more

### Contributing:
Anyone and everyone is welcome to contribute! Check out the [Contributing Guidelines](https://github.com/mattbanks/WordPress-Starter-Theme/blob/master/CONTRIBUTING.md) .


