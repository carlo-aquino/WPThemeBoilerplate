const gulp = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const uglify = require('gulp-uglify');
const cleanCSS = require('gulp-clean-css');
const concat = require('gulp-concat');

gulp.task('copyImages', async function() {
    gulp.src('assets/img/*.{jpg,png,svg}')
        .pipe(gulp.dest('dist/img'));
});

gulp.task('copyFonts', async function() {
    gulp.src('assets/font/*.{ttf,woff,woff2}')
        .pipe(gulp.dest('dist/font'));
});

gulp.task('copySwiperJS', async function() {
    gulp.src('assets/swiperjs/*.js')
        .pipe(gulp.dest('dist/js'));
});

gulp.task('copySwiperCSS', async function() {
    gulp.src('assets/swiperjs/*.css')
        .pipe(gulp.dest('dist/css'));
});

gulp.task('copyAosJS', async function() {
    gulp.src('assets/aos/*.js')
        .pipe(gulp.dest('dist/js'));
});

gulp.task('copyAosCSS', async function() {
    gulp.src('assets/aos/*.css')
        .pipe(gulp.dest('dist/css'));
});

gulp.task('copyFancyJS', async function() {
    gulp.src('assets/fancybox/*.js')
        .pipe(gulp.dest('dist/js'));
});

gulp.task('copyFancyCSS', async function() {
    gulp.src('assets/fancybox/*.css')
        .pipe(gulp.dest('dist/css'));
});

gulp.task('copyColcadeJS', async function() {
    gulp.src('assets/colcade/*.js')
        .pipe(gulp.dest('dist/js'));
});

gulp.task('sass', async function() {
    gulp.src('assets/sass/*.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(gulp.dest('assets/css'));
});

gulp.task('concatJS', async function() {
    gulp.src('assets/js/*.js')
        .pipe(concat('main.js'))
        .pipe(uglify())
        .pipe(gulp.dest('dist/js'));
});

gulp.task('concatCSS', async function() {
    gulp.src('assets/css/*.css')
        .pipe(concat('main.css'))
        .pipe(cleanCSS())
        .pipe(gulp.dest('dist/css'));
});

gulp.task('default', gulp.series('copyImages', 'copyFonts', 'copySwiperJS', 'copySwiperCSS', 'copyAosJS', 'copyAosCSS', 'copyFancyJS', 'copyFancyCSS', 'copyColcadeJS', 'sass', 'concatCSS', 'concatJS'));

gulp.task('watch', async function() {
    gulp.watch('assets/img/*.{jpg,png,svg}', gulp.series('copyImages'));
    gulp.watch('assets/font/*.{ttf,woff}', gulp.series('copyFonts'));
    gulp.watch('assets/swiperjs/*.js', gulp.series('copySwiperJS'));
    gulp.watch('assets/swiperjs/*.css', gulp.series('copySwiperCSS'));
    gulp.watch('assets/aos/*.js', gulp.series('copyAosJS'));
    gulp.watch('assets/aos/*.css', gulp.series('copyAosCSS'));
    gulp.watch('assets/fancy/*.js', gulp.series('copyFancyJS'));
    gulp.watch('assets/fancy/*.css', gulp.series('copyFancyCSS'));
    gulp.watch('assets/colcade/*.js', gulp.series('copyColcadeJS'));
    gulp.watch('assets/sass/**/*.scss', gulp.series('sass'));
    gulp.watch('assets/js/*.js', gulp.series('concatJS'));
    gulp.watch('assets/css/*.css', gulp.series('concatCSS'));
});
