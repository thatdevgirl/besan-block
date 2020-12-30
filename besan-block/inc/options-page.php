<?php

/**
 * Create an options page for this plugin.
 */

namespace ThreePM\BesanBlock;

class OptionsPage {

  private const SLUG = 'besan_options';
  private const GROUP = 'besan_group';


  /**
   * __construct()
   */
  public function __construct() {
    add_action( 'admin_menu', [ $this, 'set_page' ] );
    add_action( 'admin_init', [ $this, 'register_settings' ] );
  }


  /**
   * set_page()
   *
   * Define the options page.
   *
   * @return void
   */
  public function set_page(): void {
    add_options_page(
      'Besan Block',            // page title
      'Besan Block',            // menu title
      'manage_options',         // capability
      self::SLUG,               // slug
      [ $this, 'set_callback' ] // callback
    );
  }


  /**
   * set_callback()
   *
   * Callback to display the options page.
   */
  public function set_callback() {
    require_once( 'template-options-page.php' );
  }


  /**
   * register_settings()
   *
   * Register all settings.
   */
  public function register_settings() {
    register_setting( self::GROUP, 'besan_api_key' );
  }

}


/**
 * Only call this class while in the WP admin.
 */
if ( is_admin() ) {
  new OptionsPage;
}
