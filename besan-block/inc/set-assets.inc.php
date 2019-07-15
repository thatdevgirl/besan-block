<?php
/**
 * Add Javascript to the post editor.
 */

add_action( 'enqueue_block_editor_assets', 'bb_enqueue_editor_assets' );

function bb_enqueue_editor_assets() {
  $js = '../build/besan-block.min.js';

  // Editor JS file.
  wp_enqueue_script(
    'bb-editor-blocks-js',
    plugins_url( $js, __FILE__ ),
    array( 'wp-blocks', 'wp-editor', 'wp-components' ),
    filemtime( plugin_dir_path( __FILE__ ) . $js )
  );
}


/**
 * Add CSS to the admin.
 */

add_action( 'admin_enqueue_scripts', 'bb_enqueue_admin_assets' );

function bb_enqueue_admin_assets() {
  $css = '../build/besan-block-editor.min.css';

  // Editor CSS file.
  wp_enqueue_style(
    'bb-editor-blocks-css',
    plugins_url( $css, __FILE__ ),
    array(),
    filemtime( plugin_dir_path( __FILE__ ) . $css )
  );
}


/**
 * Add CSS to the front-end.
 */

add_action( 'wp_enqueue_scripts', 'bb_enqueue_frontend_assets' );

function bb_enqueue_frontend_assets() {
  $css = '../build/besan-block.min.css';

  wp_enqueue_style(
    'bb-frontend-css',
    plugins_url( $css, __FILE__ ),
    array(),
    filemtime( plugin_dir_path( __FILE__ ) . $css )
  );
}
