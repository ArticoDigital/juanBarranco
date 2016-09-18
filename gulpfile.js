/*
 * Dependencias
 */
var gulp = require('gulp'),
    concat = require('gulp-concat'),
    sass = require('gulp-sass'),
    uglify = require('gulp-uglify'),
    cleanCSS = require('gulp-clean-css'),
    autoprefixer = require('gulp-autoprefixer');
/*
 * Configuración de las tareas 'demo'
 */
gulp.task('demo', function () {
    gulp.src('js/source/*.js')
        .pipe(concat('compilacion.js'))
        .pipe(uglify())
        .pipe(gulp.dest('js/build/'))
});

gulp.task('sass', function () {
    return gulp.src('./wp-content/themes/juan/assets/sass/*.scss')
        .pipe(autoprefixer({
            browsers: ['last 2 versions'],
            cascade: false
        }))
        .pipe(sass().on('error', sass.logError))
        .pipe(cleanCSS({compatibility: 'ie8'}))
        .pipe(gulp.dest('./wp-content/themes/juan/assets/css/'));
});

gulp.task('watch', function () {
    gulp.watch('./wp-content/themes/juan/assets/sass/**/*.scss', ['sass']);
});