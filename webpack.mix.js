const { mix } = require('laravel-mix');

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

mix.js('./resources/assets/admin/js/admin.js', 'public/js')

    .js('./resources/assets/home/js/home.js', 'public/js')

    .sass('./resources/assets/admin/sass/admin.scss', 'public/css')
    .sass('./resources/assets/home/sass/home.scss', 'public/css')


    .copy('node_modules/vue-material/dist/vue-material.css', 'public/css/vue-material.css')
    .sourceMaps()
    .browserSync();
