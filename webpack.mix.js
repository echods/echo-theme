const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.autoload({jquery: ['$', 'window.jQuery']})
    .js('resources/js/app.js', 'assets/js')
    .postCss('resources/css/app.css', 'assets/css', [
        require('postcss-nested'),
        require('postcss-import'),
    ])
