<?php
/**
 * Create an options page for this plugin.
 */

class BesanOptionsPage {

  private $bb_slug = 'besan_options';
  private $bb_group = 'besan_group';

  public function __construct() {
    add_action( 'admin_menu', array( $this, 'besan_set_options_page' ) );
    add_action( 'admin_init', array( $this, 'besan_register_settings' ) );
  }

  /**
   * Define the options page.
   */
  public function besan_set_options_page() {
    add_options_page(
      'Besan Block',                               // page title
      'Besan Block',                               // menu title
      'manage_options',                            // capability
      $this->$bb_slug,                             // slug
      array( $this, 'besan_set_options_callback' ) // callback
    );
  }

  /**
   * Callback to display the options page.
   */
  public function besan_set_options_callback() {
    require_once( 'template-options-page.inc.php' );
  }

  /**
   * Register all settings.
   */
  public function besan_register_settings() {
    register_setting( $this->bb_group, 'besan_api_key' );
  }

}

/**
 * Only call this class while in the WP admin.
 */
if ( is_admin() ) {
  $besan_options = new BesanOptionsPage();
}
