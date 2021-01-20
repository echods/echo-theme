# Echo Wordpress Template

## Author:

Isaac Castillo ( @ icemancast / echods.com )

## Summary

Echo Wordpress Template for use as a starting template for building custom themes. It uses laravel-mix and compiles with postCss and AutoPrefixr, HTML5 Bootstrap 4 , and Webpack for all processing tasks.

## Usage

The theme is setup to use Webpack to compile with postCss (with source maps), run it through AutoPrefixr, concatenate and minify JavaScript and have a support for ES6, optimize images, optimize fonts.

First; download/clone the template

```sh
$ git clone https://github.com/echods/echo-theme.git echo
```

```sh
$ cd echo-theme
$ npm install
```

## Change your resources

echo-theme/resources/assets/
echo-theme/resources/assets/css/ (Your SCSS files)
  echo-theme/resources/assets/js (Javascript files and vendors)
  echo-theme/resources/assets/img (Images)
  echo-theme/resources/assets/fonts (Fonts)
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
