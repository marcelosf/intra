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


    mix.js('./resources/assets/admin/js/admin.js', 'public/js');
    mix.js('./resources/assets/home/js/home.js', 'public/js');

    mix.sass('./resources/assets/admin/sass/admin.scss', 'public/css');
    mix.sass('./resources/assets/home/sass/home.scss', 'public/css');
    mix.sass('./resources/assets/common/sass/common.scss', 'public/css');



    mix.sourceMaps();
    mix.browserSync({

        proxy: '192.168.10.10:8000'

    });
