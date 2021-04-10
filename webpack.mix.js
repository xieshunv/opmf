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

mix
    /* CSS */
    .sass('resources/sass/main.scss', 'public/css/dashmix.css')
    .sass('resources/sass/dashmix/themes/xeco.scss', 'public/css/themes/')
    .sass('resources/sass/dashmix/themes/xinspire.scss', 'public/css/themes/')
    .sass('resources/sass/dashmix/themes/xmodern.scss', 'public/css/themes/')
    .sass('resources/sass/dashmix/themes/xsmooth.scss', 'public/css/themes/')
    .sass('resources/sass/dashmix/themes/xwork.scss', 'public/css/themes/')
    .sass('resources/sass/dashmix/themes/xdream.scss', 'public/css/themes/')
    .sass('resources/sass/dashmix/themes/xpro.scss', 'public/css/themes/')
    .sass('resources/sass/dashmix/themes/xplay.scss', 'public/css/themes/')

    /* JS */
    .js('resources/js/app.js', 'public/js/laravel.app.js')
    .js('resources/js/dashmix/app.js', 'public/js/dashmix.app.js')

    .copyDirectory('resources/fonts', 'public/fonts')
    .copyDirectory('resources/plugin/webuploader/', 'public/plugins/webuploader/')

    /* Page JS */
    .js('resources/js/pages/tables_datatables.js', 'public/js/pages/tables_datatables.js')
    .js('resources/js/pages/be_comp_dialogs.min.js', 'public/js/pages/be_comp_dialogs.min.js')
    .js('resources/js/common/common.js', 'public/js/common/common.js')

    /* Tools */
    .browserSync('localhost:8000')
    .disableNotifications()

    /* Options */
    .options({
        processCssUrls: false
    });
