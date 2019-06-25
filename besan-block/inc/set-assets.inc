<?php
/**
 * Enqueue JS assets.
 */

add_action( 'enqueue_block_editor_assets', 'bb_enqueue_assets' );

function bb_enqueue_assets() {
  $editorJS = '../build/besan-block.min.js';

  // Block Javascript.
  wp_enqueue_script(
    'bb-editor-blocks-js',
    plugins_url( $editorJS, __FILE__ ),
    array( 'wp-blocks', 'wp-editor', 'wp-components' ),
    filemtime( plugin_dir_path( __FILE__ ) . $editorJS )
  );
}
