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

  // Get the Google API key from WP options.
  $options = get_option( 'bb_api_key' );

  $jsData = array(
    'apiKey' => $options['bb_api_key'],
  );

  // Pass the API option to the editor JS.
  wp_localize_script( 'bb-editor-blocks-js', 'bbOptions', $jsData );
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
