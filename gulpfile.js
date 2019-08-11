/**
 * Besan Block plugin gulp scripts.
 */

// Declare gulp libraries.
const gulp       = require( 'gulp' ),
      browserify = require( 'browserify' ),
      buffer     = require( 'vinyl-buffer' ),
      minifyCSS  = require( 'gulp-minify-css' ),
      rename     = require( 'gulp-rename' ),
      sass       = require( 'gulp-sass' ),
      source     = require( 'vinyl-source-stream' ),
      uglify     = require( 'gulp-uglify' );

// Array of JS files, in order by dependency.
const jsFiles = [
  'besan-block/source/js/block/index.js'
];

// Task function to build the JS files.
function buildJs() {
  return browserify( { entries: jsFiles } )
    .transform( 'babelify', { presets: [ "@babel/preset-env", "@babel/preset-react" ] } )
    .bundle()
    .pipe( source( 'besan-block.min.js' ) )
    .pipe( buffer() )
    .pipe( uglify() )
    .pipe( gulp.dest( 'besan-block/build' ) );
}

// Task function to build the CSS files.
function buildEditorCss() {
  return gulp.src( 'besan-block/source/scss/editor.scss' )
    .pipe( sass().on( 'error', sass.logError ) )
    .pipe( minifyCSS() )
    .pipe( rename( {
      basename: 'besan-block-editor',
      suffix: '.min'
    } ) )
    .pipe( gulp.dest( 'besan-block/build' ) );
}

// Task definitions.
gulp.task( 'default', gulp.series( buildJs, buildEditorCss ) );
