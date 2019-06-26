<?php
/**
 * Enqueue JS assets.
 */

add_action( 'enqueue_block_editor_assets', 'bb_enqueue_assets' );

function bb_enqueue_assets() {
  $editorJs = '../build/besan-block.min.js';
  $editorCss = '../build/besan-block.min.css';

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
