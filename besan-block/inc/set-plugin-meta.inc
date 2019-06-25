<?php
/**
 * Add meta links to the plugin page.
 */

add_filter( 'plugin_row_meta', 'bb_row_meta', 10, 2 );

function bb_row_meta( $links, $file ) {
  // if ( strpos( $file, 'besan-block' ) !== false ) {
  //   $additional_links = array(
  //     '<a href="' . esc_url( 'https://www.paypal.me/thatdevgirl' ) . '">Donate</a>',
  //   );
  //
  //   return array_merge( $links, $additional_links );
  // }

  return $links;
}
