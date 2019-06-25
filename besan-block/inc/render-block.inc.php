<?php
/**
 * Render the Chart block front-end.
 */

require_once( 'get-sheet-data.inc.php' );
require_once( 'get-svg.inc.php' );

function besan_render( $attributes, $content ) {
  // TODO: Make the user add this as an attribute so I'm not storing this key here.
  $api_key = esc_attr( 'AIzaSyDIxAtGtNO5Z43U6pND2YXhJzuysOsLoyY' );

  // Get the relevant data.
  $raw_data = besan_get_sheet_data( $attributes, $api_key );
  $data_body = json_decode( $raw_data['body'], true );

  // Find and count all of the unique values in the data.
  $data = array();

  foreach ( $data_body['values'] as $d ) {
    if ( $data[ $d[0] ] ) {
      $data[ $d[0] ]++;
    } else {
      $data[ $d[0] ] = 1;
    }
  }

  return besan_get_svg( $data );
}
