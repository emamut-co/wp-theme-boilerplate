const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
  .sass('resources/sass/app.sass', 'public/css')
  .browserSync({
    open: false,
    proxy: 'http://localhost/wp-test/',
    files: ''
  })
  .sourceMaps();