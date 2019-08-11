<?php
/**
 * Helper function to create SVG for a vertical bar chart.
 */

function besan_get_svg_bar_vertical( $data, $title ) {
  $consts = _besan_bv_set_consts( $data );
  $svg = '';

  _besan_bv_get_svg_start( $svg, $consts, $title );
  _besan_bv_get_data( $svg, $data, $consts );
  _besan_bv_get_svg_end( $svg );

  return $svg;
}


// [HELPER] Function to set constant values for chart creation.
function _besan_bv_set_consts( $data ) {
  $consts = array(
    'height_total_px'  => 400,
    'height_chart_px'  => 360,
    'label_x_axis_px'  => 380,
    'offset_chart_pct' => 10,
    'offset_bar_pct'   => 2,
    'max_value'        => max( $data ),
    'base_color'       => '#000000',
    'font_size'        => '14'
  );

  $consts['bar_base_px'] = $consts['height_total_px'] - $consts['height_chart_px'] - 2;

  return $consts;
}


// [HELPER] Function to write out the start of the SVG object.
function _besan_bv_get_svg_start( &$svg, $consts, $title ) {
  // Start the SVG structure.
  $svg = '<svg xmlns="http://www.w3.org/2000/svg" width="100%" height="' . $consts['height_total_px'] . '">';

  // Set the title of this SVG.
  $svg .= ( $title ) ? '<title>' . $title . '</title>' : '<title>Data chart</title>';

  // Make the defining lines of the chart.
  $svg .= '<g class="chart-container">';
  $svg .= '<line role="presentation" x1="' . $consts['offset_chart_pct'] . '%" y1="0" x2="' . $consts['offset_chart_pct'] . '%" y2="' . $consts['height_chart_px'] . '" stroke="' . $consts['base_color'] . '" stroke-width="2" />';
  $svg .= '<line role="presentation" x1="' . $consts['offset_chart_pct'] . '%" y1="' . $consts['height_chart_px'] . '" x2="100%" y2="' . $consts['height_chart_px'] . '" stroke="' . $consts['base_color'] . '" stroke-width="2" />';
  $svg .= '<text role="presentation" x="5%" y="20" fill="' . $consts['base_color'] . '" font-size="' . $consts['font_size'] . '">' . $consts['max_value'] . '</text>';
  $svg .= '<text role="presentation" x="5%" y="' . $consts['height_chart_px'] . '" fill="' . $consts['base_color'] . '" font-size="' . $consts['font_size'] . '">0</text>';
  $svg .= '</g>';
}


// [HELPER] Function to write out the bars of data.
function _besan_bv_get_data( &$svg, $data, $consts ) {
  // Figure out how many items are being charted.
  $number_of_items = sizeof( $data );

  // Calculate the width of each bar, based on the number of items.
  $bar_width = ( ( 100 - $consts['offset_chart_pct'] ) - ( $consts['offset_bar_pct'] * $number_of_items ) ) / $number_of_items;

  // Initialize the offset of the first bar.
  $offset = $consts['offset_chart_pct'] + $consts['offset_bar_pct'];

  // Contain all the bars in a parent group.
  $svg .= '<g role="list" aria-label="Bar graph">';

  // Loop through each item and create the bar and its label.
  foreach ( $data as $key => $d ) {
    // Calculate the height and offset of the bar, based on its value.
    $height_ratio = $d / $consts['max_value'];
    $bar_height = $consts['height_chart_px'] * $height_ratio;
    $bar_offset = $consts['height_chart_px'] - $bar_height - 1;

    // Write out the data.
    $svg .= '<g role="listitem" aria-label="' . $key . ', ' . $d . '" tabindex="0">';
    $svg .= '<rect role="presentation" x="' . $offset . '%" y="' . $bar_offset . '" width="' . $bar_width . '%" height="' . $bar_height . '" fill="#ff0000" />';
    $svg .= '<text role="presentation" x="' . $offset . '%" y="' . $consts['label_x_axis_px'] . '" fill="' . $consts['base_color'] . '" font-size="' . $consts['font_size'] . '">' . $key . '</text>';
    $svg .= '</g>';

    // Calculate the offset for the next bar.
    $offset += $consts['offset_bar_pct'] + $bar_width;
  }

  // End the parent group container.
  $svg .= '</g>';
}


// [HELPER] Function to write out the end of the SVG object.
function _besan_bv_get_svg_end( &$svg ) {
  $svg .= '</svg>';
}
