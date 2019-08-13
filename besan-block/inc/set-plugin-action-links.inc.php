<?php
/**
 * Add action links for the plugin on the plugin page.
 */

class BesanActionLinks {

  public function __construct() {
    add_filter( 'plugin_action_links_besan-block/besan-block.php', array( $this, 'besan_action_links' ), 10, 2 );
  }

  public function besan_action_links( $links, $plugin_file_name ) {
    $additional_links = array(
      '<a href="/wp-admin/options-general.php?page=besan_options">Settings</a>',
    );

    return array_merge( $additional_links, $links );
  }

}

/**
 * Only call this class while in the WP admin.
 */
if ( is_admin() ) {
  $besan_action_links = new BesanActionLinks();
}
