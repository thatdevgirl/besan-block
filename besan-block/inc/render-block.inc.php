<?php
/**
 * Render the Chart block front-end.
 */

require_once( 'get-sheet-data.inc.php' );

function besan_render( $attributes, $content ) {
  // TODO: Make the user add this as an attribute so I'm not storing this key here.
  $api_key = esc_attr( 'AIzaSyDIxAtGtNO5Z43U6pND2YXhJzuysOsLoyY' );

  // Get the data label.
  $label = $attributes['label'];

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

  // Return the SVG based on the selected chart type.
  switch( $attributes['type'] ) {
    case 'bar-vertical':
      require_once( 'get-svg-bar-vertical.inc.php' );
      return besan_get_svg_bar_vertical( $data, $label );

    case 'bar-horizontal':
      require_once( 'get-svg-bar-horizontal.inc.php' );
      return besan_get_svg_bar_horizontal( $data, $label );

    default:
      require_once( 'get-svg-bar-vertical.inc.php' );
      return besan_get_svg_bar_vertical( $data, $label );
  }
}
