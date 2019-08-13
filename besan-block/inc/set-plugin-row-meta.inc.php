<?php
/**
 * Add meta links under the plugin description on the plugin page.
 */

add_filter( 'plugin_row_meta', 'besan_row_meta', 10, 2 );

function besan_row_meta( $links, $plugin_file_name ) {
  if ( strpos( $plugin_file_name, 'besan-block' ) !== false ) {
    $additional_links = array(
      '<a href="' . esc_url( 'https://www.paypal.me/thatdevgirl' ) . '">Donate</a>',
    );

    return array_merge( $links, $additional_links );
  }

  return $links;
}
