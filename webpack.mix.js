let mix = require('laravel-mix');

mix.js([
    'resources/js/app.js',
    'resources/js/bootstrap.js',
    ], 'public/js')
    .vue()
    .postCss('resources/css/app.css', 'public/css');
