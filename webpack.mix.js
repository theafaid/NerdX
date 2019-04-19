const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js([
    'resources/js/app.js',
    'public/design/site/js/theme.min.js'
], 'public/js')
   .sass('resources/sass/app.scss', 'public/css');


mix.styles([
    'public/design/site/plugins/animate/animate.min.css',
    'public/design/site/css/theme.css',
    'public/design/site/css/custom.css'
], 'public/css/style.css');
