let mix = require('laravel-mix');

mix.js('src/js/app.js', 'dist/js')
  .sass('src/sass/app.sass', 'dist/css')
  .browserSync({
    proxy: 'http://localhost/wp-test/',
    open: false,
    files:[
      'dist/css/app.css',
      'dist/js/app.js',
      './**/*.+(html|php)'
    ]
  })
  .sourceMaps(true, 'source-map')