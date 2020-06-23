const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
  .sass('resources/sass/app.sass', 'public/css')
  .sourceMaps(true, 'source-map')
  .browserSync({
    proxy: 'http://localhost/wp-test/',
    open: false
  })