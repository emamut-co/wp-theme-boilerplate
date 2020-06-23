let mix = require('laravel-mix');
const tailwindcss = require('tailwindcss');

mix.js('src/js/app.js', 'dist/js')
  .sass('src/sass/app.sass', 'dist/css')
  .options({
    processCssUrls: false,
    postCss: [tailwindcss('./tailwind.config.js')]
  })
  .sourceMaps(true, 'source-map')
  .browserSync({
    proxy: 'http://localhost/wp-test/',
    open: false
  })