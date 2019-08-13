<?php
/**
 * Add Javascript to the post editor.
 */

add_action( 'enqueue_block_editor_assets', 'besan_enqueue_editor_assets' );

function besan_enqueue_editor_assets() {
  $js = '../build/besan-block.min.js';

  // Editor JS file.
  wp_enqueue_script(
    'besan-editor-blocks-js',
    plugins_url( $js, __FILE__ ),
    array( 'wp-blocks', 'wp-editor', 'wp-components' ),
    filemtime( plugin_dir_path( __FILE__ ) . $js )
  );

  // Get the Google API key from WP options.
  $options = get_option( 'besan_api_key' );

  $jsData = array(
    'apiKey' => $options['besan_api_key'],
  );

  // Pass the API option to the editor JS.
  wp_localize_script( 'besan-editor-blocks-js', 'besanOptions', $jsData );
}


/**
 * Add CSS to the admin.
 */

add_action( 'admin_enqueue_scripts', 'besan_enqueue_admin_assets' );

function besan_enqueue_admin_assets() {
  $css = '../build/besan-block-editor.min.css';

  // Editor CSS file.
  wp_enqueue_style(
    'besan-editor-blocks-css',
    plugins_url( $css, __FILE__ ),
    array(),
    filemtime( plugin_dir_path( __FILE__ ) . $css )
  );
}
