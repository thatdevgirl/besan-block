<?php

/**
 * Add action links and meta links (under the plugin description) for this
 * plugin on the admin Plugins page.
 */

namespace ThreePM\BesanBlock;

class PluginsPage {

  /**
   * __construct()
   */
  public function __construct() {
    add_filter( 'plugin_action_links_besan-block/besan-block.php', [ $this, 'add_action_links' ], 10, 2 );
    add_filter( 'plugin_row_meta', [ $this, 'add_row_meta' ], 10, 2 );
  }


  /**
   * add_action_links()
   *
   * Add an action link to go to the plugin's settings page.
   *
   * @param array $links
   * @param string $plugin_file_name
   * 
   * @return array
   */
  public function add_action_links( $links, $plugin_file_name ): array {
    $additional_links = [
      '<a href="/wp-admin/options-general.php?page=besan_options">Settings</a>',
    ];

    return array_merge( $additional_links, $links );
  }


  /**
   * add_row_meta()
   *
   * Add a new Donate link to the row of links under the plugin description.
   *
   * @param array $links
   * @param string $plugin_file_name
   * 
   * @return array
   */
  public function add_row_meta( $links, $plugin_file_name ) {
    $additional_links = [];

    if ( strpos( $plugin_file_name, 'besan-block' ) !== false ) {
      $additional_links = [
        '<a href="' . esc_url( 'https://www.buymeacoffee.com/thatdevgirl' ) . '">Donate</a>',
      ];
    }

    return array_merge( $links, $additional_links );
  }

}


/**
 * Only call this class while in the WP admin.
 */
if ( is_admin() ) {
  new PluginsPage;
}
