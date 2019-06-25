/**
 * Besan Block plugin gulp scripts.
 */

// Declare gulp libraries.
const gulp = require( 'gulp' ),
      babel = require( 'gulp-babel' );
      browserify = require( 'browserify' ),
      buffer = require( 'vinyl-buffer' ),
      source = require( 'vinyl-source-stream' ),
      uglify = require( 'gulp-uglify' );

// Array of JS files, in order by dependency.
const jsFiles = [
  'besan-block/source/js/block/index.js'
];

// Task function to build the JS files.
function buildJs() {
  return browserify( { entries: jsFiles } )
    .transform( 'babelify', { presets: ['es2015', 'react'] } )
    .bundle()
    .pipe( source( 'besan-block.min.js' ) )
    .pipe( buffer() )
    .pipe( uglify() )
    .pipe( gulp.dest( 'besan-block/build' ) );
}

// Task definitions.
gulp.task( 'default', buildJs );
