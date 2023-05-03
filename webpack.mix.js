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
mix.styles([
    'resources/vendor/css/skin-blue.min.css',
    'resources/vendor/css/AdminLTE.min.css',
    'resources/vendor/css/config.css',
    'resources/vendor/css/jquery-jvectormap.css',
    'resources/vendor/css/ionicons.min.css',
    'resources/vendor/css/dataTables.bootstrap.min.css',
    'resources/vendor/css/font-awesome.min.css',
    'resources/vendor/css/bootstrap.min.css',
], 'public/css/plantilla.css')
    .scripts([
        'resources/vendor/js/jquery.min.js',
        'resources/vendor/js/bootstrap.min.js',
        'resources/vendor/js/fastclick.js',
        'resources/vendor/js/adminlte.min.js',
        'resources/vendor/js/jquery.sparkline.min.js',
        'resources/vendor/js/jquery-jvectormap-1.2.2.min.js',
        'resources/vendor/js/jquery-jvectormap-world-mill-en.js',
        'resources/vendor/js/jquery.slimscroll.min.js',
        'resources/vendor/js/demo.js'],
        'public/js/plantilla.js')
    .js(['resources/js/app.js'], 'public/js/app.js')
    .copy('resources/vendor/font-awesome/fonts', 'public/fonts')
    .copy('resources/vendor/img','public/img');

