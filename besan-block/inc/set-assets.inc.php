<?php
/**
 * Add Javascript and CSS assets to the admin.
 */

class BesanAssets {

  private $bb_js = '../build/besan-block.min.js';
  private $bb_css = '../build/besan-block-editor.min.css';

  public function __construct() {
    add_action( 'enqueue_block_editor_assets', array( $this, 'besan_enqueue_editor_assets' ) );
    add_action( 'admin_enqueue_scripts', array( $this, 'besan_enqueue_admin_assets' ) );
  }

  /**
   * Add Javascript to the post editor.
   */
  public function besan_enqueue_editor_assets() {
    wp_enqueue_script(
      'besan-editor-blocks-js',
      plugins_url( $this->bb_js, __FILE__ ),
      array( 'wp-blocks', 'wp-editor', 'wp-components' ),
      filemtime( plugin_dir_path( __FILE__ ) . $this->bb_js )
    );

    // Get the Google API key from WP options.
    $options = get_option( 'besan_api_key' );

    $jsData = array(
      'apiKey' => esc_attr( $options ),
    );

    // Pass the API option to the editor JS.
    wp_localize_script( 'besan-editor-blocks-js', 'besanOptions', $jsData );
  }

  /**
   * Add CSS to the admin.
   */
  public function besan_enqueue_admin_assets() {
    wp_enqueue_style(
      'besan-editor-blocks-css',
      plugins_url( $this->bb_css, __FILE__ ),
      array(),
      filemtime( plugin_dir_path( __FILE__ ) . $this->bb_css )
    );
  }

}

/**
 * Only call this class while in the WP admin.
 */
if ( is_admin() ) {
  $besan_assets = new BesanAssets();
}
