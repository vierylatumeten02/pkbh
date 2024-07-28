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

mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        //
    ]);

// Copy TinyMCE from node_modules to the public directory
mix.copyDirectory('node_modules/tinymce', 'public/js/tinymce');

// Other mix tasks can go here
mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css');