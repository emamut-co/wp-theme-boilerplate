const gulp = require('gulp'),
  sass = require('gulp-sass'),
  postcss = require("gulp-postcss"),
  autoprefixer = require("autoprefixer"),
  cssnano = require("cssnano"),
  sourcemaps = require("gulp-sourcemaps"),
  browserSync = require('browser-sync').create();

//compile sass into css
function style() {
  return gulp.src('src/sass/**/*.sass')
    .pipe(sourcemaps.init())
    .pipe(sass())
    .on("error", sass.logError)
    .pipe(postcss([autoprefixer(), cssnano()]))
    .pipe(sourcemaps.write())
    .pipe(gulp.dest('css'))
    .pipe(browserSync.stream());
}

function watch() {
  browserSync.init({
    proxy: 'http://localhost/workspace/wp-test',
    open: false
  });
  gulp.watch('src/sass/**/*.sass', style)
  gulp.watch('./**/*.html').on('change', browserSync.reload);
  gulp.watch('./**/*.php').on('change', browserSync.reload);
  gulp.watch('src/js/**/*.js').on('change', browserSync.reload);
}

exports.style = style;
exports.watch = watch;