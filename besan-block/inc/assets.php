<?php

/**
 * Add Javascript and CSS assets to the admin.
 */

namespace ThreePM\BesanBlock;

class Assets {

  private const JS_PATH = '../build/besan-block.min.js';
  private const CSS_PATH = '../build/besan-block-editor.min.css';


  /**
   * __construct()
   */
  public function __construct() {
    add_action( 'enqueue_block_editor_assets', [ $this, 'enqueue_to_editor' ] );
    add_action( 'admin_enqueue_scripts', [ $this, 'besan_enqueue_admin_assets' ] );
  }


  /**
   * enqueue_to_editor()
   *
   * Add Javascript assets to the post editor.
   *
   * @return void
   */
  public function enqueue_to_editor(): void {
    $handle = 'besan_editor';

    wp_enqueue_script(
      $handle,
      plugins_url( self::JS_PATH, __FILE__ ),
      [ 'wp-blocks', 'wp-editor', 'wp-components' ],
      filemtime( plugin_dir_path( __FILE__ ) . self::JS_PATH )
    );

    // Get the Google API key from WP options.
    $options = get_option( 'besan_api_key' );

    // Pass the API option to the editor JS.
    wp_localize_script( $handle, 'besanOptions', [ 'apiKey' => esc_attr( $options ) ] );
  }


  /**
   * enqueue_to_admin()
   *
   * Add CSS assets to the admin.
   *
   * @return void
   */
  public function besan_enqueue_admin_assets(): void {
    wp_enqueue_style(
      'besan-editor-blocks-css',
      plugins_url( self::CSS_PATH, __FILE__ ),
      [],
      filemtime( plugin_dir_path( __FILE__ ) . self::CSS_PATH )
    );
  }

}


/**
 * Only call this class while in the WP admin.
 */
if ( is_admin() ) {
  new Assets();
}
