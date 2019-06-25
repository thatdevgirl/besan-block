<?php
/**
 * Render the Chart block front-end.
 */

require_once( 'get-sheet-data.inc.php' );

function besan_render( $attributes, $content ) {
  // TODO: Make the user add this as an attribute so I'm not storing this key here.
  $api_key = esc_attr( 'AIzaSyDIxAtGtNO5Z43U6pND2YXhJzuysOsLoyY' );

  $data = besan_get_sheet_data( $attributes, $api_key );

  echo '<pre>';
  print_r($data);
  echo '</pre>';

  return $attributes['data'];
}
