const { src, dest, watch, parallel } = require( 'gulp' );
const sass = require( 'gulp-sass' )( require( 'sass' ) );
const minify = require( 'gulp-minify' );
const babel = require( 'gulp-babel' );

// Task for compiling sass to css
function buildSass( cb ) {
    src( './assets/sass/**/*.sass' )
        .pipe( sass().on( 'error', sass.logError ) )
        .pipe( dest( 'dest/css' ) );
    cb();
}

// Task for compiling and minifying js
function buildJs( cb ) {
    src( './assets/js/**/*.js' )
        //.pipe( babel() )
        .pipe( minify( {
            ext: {
                min: '.min.js'
            },
            ignoreFiles: ['-min.js']
        } ) )
        .pipe( dest( 'dest/js' ) )
    cb();
}

// Watch task
function watchFiles( cb ) {
    watch( './assets/sass/**/*.sass', buildSass  )
    watch( './assets/js/**/*.js', buildJs )
}

exports.buildSass = buildSass;
exports.buildJs = buildJs;
exports.watch = watchFiles;