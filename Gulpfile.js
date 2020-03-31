var gulp = require('gulp');
var sass = require('gulp-sass');
var browserSync = require('browser-sync').create();
var sourcemaps = require('gulp-sourcemaps');
var autoprefixer = require('gulp-autoprefixer');
var rename = require('gulp-rename');
var del = require('del');

var sass_folder = './assets/sass/';
var css_folder = './assets/css/';
var sassOptions = {
  errLogToConsole: true,
  outputStyle: 'expanded'
};

gulp.task('sass', (done) => {
  gulp.src(sass_folder + '/**/*.sass')
    .pipe(sourcemaps.init())
    .pipe(sass(sassOptions).on('error', sass.logError))
    .pipe(autoprefixer('last 1 version', '> 1%', 'ie 8', 'ie 7'))
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest(css_folder));

    done();
});

gulp.task('browser-sync', () => {
  browserSync.init(['./assets/css/**/*.css', './assets/js/**/*.js', './**/*.php'], {
    proxy: 'http://localhost/workspace/wp-test',
    open: false
  });
});

gulp.task('clean:css_folder', (done)  =>{
  del.sync(
    './assets/css/*.map',
    './assets/css/*.css'
  );
  done();
});

gulp.task('default', gulp.series('clean:css_folder', 'sass', 'browser-sync', () => {
  gulp.watch(sass_folder + '/**/*.sass', series('sass'));
}));

gulp.task('prod', gulp.series('clean:css_folder', () => {
  gulp.src(sass_folder + '/**/*.sass')
    .pipe(sourcemaps.init({ loadMaps: true }))
    .pipe(sass({ outputStyle: 'compressed' }))
    .pipe(autoprefixer('last 1 version', '> 1%', 'ie 8', 'ie 7'))
    .pipe(rename({suffix: '.min'}))
    .pipe(gulp.dest(css_folder))
    .pipe(browserSync.stream());
}));
