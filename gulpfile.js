const gulp = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const autoprefixer = require('gulp-autoprefixer');
const sourcemaps = require('gulp-sourcemaps');
const rename = require('gulp-rename');
const browserify = require('browserify');
const babelify = require('babelify');
const source = require('vinyl-source-stream');
const buffer = require('vinyl-buffer');
const uglify = require('gulp-uglify');

const styleSRC = 'src/scss/main.scss';
const styleDIST = './dist/css/';
const styleWATCH = 'src/scss/**/*.scss';

const jsSRC = 'main.js';
const jsFOLDER = 'src/js/';
const jsFILES = [jsSRC];
const jsDIST = './dist/js/';
const jsWATCH = 'src/js/**/*.js';

gulp.task('style', async function() {
    gulp.src( styleSRC )
        .pipe( sourcemaps.init() )
        .pipe( sass( {
            errorLogToConsole: true,
            outputStyle: 'compressed'
        } ) )
        .on( 'error', console.error.bind( console ) )
        .pipe( autoprefixer( {
			cascade: false
		} ) )
        .pipe( rename( { suffix: '.min' } ) )
        .pipe( sourcemaps.write( './' ) )
        .pipe( gulp.dest( styleDIST ) );
});

gulp.task('script', async function() {
    jsFILES.map( function( entry ) {
        return browserify( {
            entries: [ jsFOLDER + entry ]
        } )
        .transform( babelify, { presets: ["@babel/preset-env"] } )
        .bundle()
        .pipe( source( entry ) )
        .pipe( rename( { suffix: '.min' } ) )
        .pipe( buffer() )
        .pipe( sourcemaps.init( { loadMaps: true } ) )
        .pipe( uglify() )
        .pipe( sourcemaps.write( './' ) )
        .pipe( gulp.dest( jsDIST ) );
    } )
});

gulp.task('jsLIB', async function() {
    gulp.src( 'src/js/libraries/*' )
        .pipe( gulp.dest( 'dist/js' ) );
});

gulp.task('cssLIB', async function() {
    gulp.src( 'src/css/libraries/*' )
        .pipe( gulp.dest( 'dist/css' ) );
});

gulp.task('images', async function() {
    gulp.src( 'src/img/*.{jpg,png,svg}' )
        .pipe( gulp.dest( 'dist/img' ) );
});

gulp.task('fonts', async function() {
    gulp.src( 'src/font/*.{ttf,woff,woff2}' )
        .pipe( gulp.dest( 'dist/font' ) );
});

gulp.task( 'default', gulp.series( 'style', 'script', 'jsLIB', 'cssLIB', 'images', 'fonts' ) );

gulp.task( 'watch', function() {
    gulp.watch( styleWATCH, gulp.series( 'style' ) );
    gulp.watch( jsWATCH, gulp.series( 'script' ) );
} )
