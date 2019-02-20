const mix = require('laravel-mix');

mix.js('resources/dashboard/app.js', 'public/js');
if (mix.inProduction()) {
    mix.version();
}