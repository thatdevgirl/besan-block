<?php
/**
 * Render the Chart block front-end.
 */

require_once( 'get-sheet-data.inc.php' );

function besan_render( $attributes, $content ) {
  $data = besan_process_data( $attributes );

  // If no data exists, return nothing.
  if ( !$data ) { return '<p>Sorry. Chart is unable to display.</p>'; }

  // Otherwise, construct the chart!
  $svg = besan_construct_svg( $attributes, $data );
  return besan_construct_block( $attributes, $svg );
}

// [HELPER] Function to process relevant data from raw data.
function besan_process_data( $attributes ) {
  $api_key = get_option( 'besan_api_key' );

  // Get the data from the Google sheet.
  $raw_data = besan_get_sheet_data( $attributes, $api_key );
  $data_body = json_decode( $raw_data['body'], true );

  // If an error is returned with the data, do nothing.
  if ( $data_body['error'] ) { return false; }

  // Find and count all of the unique values in the data.
  $data = array();
  foreach ( $data_body['values'] as $d ) {
    if ( $data[ $d[0] ] ) {
      $data[ $d[0] ]++;
    } else {
      $data[ $d[0] ] = 1;
    }
  }

  return $data;
}

// [HELPER] Function to construct the SVG based on the data.
function besan_construct_svg( $attributes, $data ) {
  switch( $attributes['type'] ) {
    case 'bar-vertical':
      require_once( 'get-svg-bar-vertical.inc.php' );
      return besan_get_svg_bar_vertical( $data, $attributes['title'], $attributes['color'] );

    case 'bar-horizontal':
      require_once( 'get-svg-bar-horizontal.inc.php' );
      return besan_get_svg_bar_horizontal( $data, $attributes['title'], $attributes['color'] );

    default:
      require_once( 'get-svg-bar-vertical.inc.php' );
      return besan_get_svg_bar_vertical( $data, $attributes['title'] );
  }
}

// [HELPER] Function to construct the HTML for the overall block.
function besan_construct_block( $attributes, $svg ) {
  $html = '<figure class="besan-chart">';

  // Add the SVG chart.
  $html .= $svg;

  // Add the caption, if it exists.
  if ( $attributes['caption'] ) {
    $html .= '<figcaption>' . $attributes['caption'] . '</figcaption>';
  }

  $html .= '</figure>';
  return $html;
}
