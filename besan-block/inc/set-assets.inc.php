<?php
/**
 * Add Javascript and CSS for the editor.
 */

add_action( 'enqueue_block_editor_assets', 'bb_enqueue_editor_assets' );

function bb_enqueue_editor_assets() {
  $editorJs = '../build/besan-block.min.js';
  $editorCss = '../build/besan-block-editor.min.css';

  // Editor JS file.
  wp_enqueue_script(
    'bb-editor-blocks-js',
    plugins_url( $editorJs, __FILE__ ),
    array( 'wp-blocks', 'wp-editor', 'wp-components' ),
    filemtime( plugin_dir_path( __FILE__ ) . $editorJs )
  );

  // Editor CSS file.
  wp_enqueue_style(
    'bb-editor-blocks-css',
    plugins_url( $editorCss, __FILE__ ),
    array(),
    filemtime( plugin_dir_path( __FILE__ ) . $editorCss )
  );
}


/**
 * Add CSS for the front-end.
 */

add_action( 'wp_enqueue_scripts', 'bb_enqueue_frontend_assets' );

function bb_enqueue_frontend_assets() {
  wp_enqueue_style(
    'bb-frontend-css',
    plugin_dir_url( __FILE__ ) . '../build/besan-block.min.css'
  );
}
