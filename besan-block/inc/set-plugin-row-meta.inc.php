<?php
/**
 * Add meta links under the plugin description on the plugin page.
 */

class BesanRowMeta {

  public function __construct() {
    add_filter( 'plugin_row_meta', array( $this, 'besan_row_meta' ), 10, 2 );
  }

  public function besan_row_meta( $links, $plugin_file_name ) {
    if ( strpos( $plugin_file_name, 'besan-block' ) !== false ) {
      $additional_links = array(
        '<a href="' . esc_url( 'https://www.paypal.me/thatdevgirl' ) . '">Donate</a>',
      );

      return array_merge( $links, $additional_links );
    }

    return $links;
  }

}

/**
 * Only call this class while in the WP admin.
 */
if ( is_admin() ) {
  $besan_row_meta = new BesanRowMeta();
}
