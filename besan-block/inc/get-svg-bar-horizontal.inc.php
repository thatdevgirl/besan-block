<?php
/**
 * Helper function to create SVG for a horizontal bar chart.
 */

function besan_get_svg_bar_horizontal( $data, $label ) {
  $consts = _besan_bh_set_consts( $data );
  $svg = '';

  _besan_bh_get_svg_start( $svg, $consts, $label );
  _besan_bh_get_data( $svg, $data, $consts );
  _besan_bh_get_svg_end( $svg );

  return $svg;
}


// [HELPER] Function to set constant values for chart creation.
function _besan_bh_set_consts( $data ) {
  $consts = array(
    'height_bar_px'    => 50,
    'offset_chart_pct' => 20,
    'offset_bar_px'    => 10,
    'max_value'        => max( $data ),
    'base_color'       => '#000000',
    'font_size'        => '16'
  );

  // Calculate the height of the chart, based on the number of items.
  $consts['height_chart_px'] = sizeof( $data ) * ( $consts['height_bar_px'] + $consts['offset_bar_px'] );
  $consts['height_total_px'] = $consts['height_chart_px'] + 40;
  $consts['label_x_axis_px'] =  $consts['height_chart_px'] + 20;

  return $consts;
}


// [HELPER] Function to write out the start of the SVG object.
function _besan_bh_get_svg_start( &$svg, $consts, $label ) {
  // Start the SVG structure.
  $svg = '<svg xmlns="http://www.w3.org/2000/svg" width="100%" height="' . $consts['height_total_px'] . '"';

  // Set the description of this SVG.
  $svg .= '<desc>Chart of ' . $label . '</desc>';

  // Make the defining lines of the chart.
  $svg .= '<g class="chart-container">';
  $svg .= '<line x1="' . $consts['offset_chart_pct'] . '%" y1="0" x2="' . $consts['offset_chart_pct'] . '%" y2="' . $consts['height_chart_px'] . '" stroke="' . $consts['base_color'] . '" stroke-width="2" />';
  $svg .= '<line x1="' . $consts['offset_chart_pct'] . '%" y1="' . $consts['height_chart_px'] . '" x2="100%" y2="' . $consts['height_chart_px'] . '" stroke="' . $consts['base_color'] . '" stroke-width="2" />';
  $svg .= '<text x="98%" y="' . $consts['label_x_axis_px'] . '" fill="' . $consts['base_color'] . '" font-size="' . $consts['font_size'] . '">' . $consts['max_value'] . '</text>';
  $svg .= '<text x="' . $consts['offset_chart_pct'] . '%" y="' . $consts['label_x_axis_px'] . '" fill="' . $consts['base_color'] . '" font-size="' . $consts['font_size'] . '">0</text>';
  $svg .= '</g>';
}


// [HELPER] Function to write out the bars of data.
function _besan_bh_get_data( &$svg, $data, $consts ) {
  // Initialize the offset of the first bar and its label.
  $offset = 0;
  $label_offset = 30;

  // Loop through each item and create the bar and its label.
  foreach ( $data as $key => $d ) {
    // Calculate the width of the bar, based on its value.
    $bar_width = $d / $consts['max_value'] * 100;

    // Write out the data.
    $svg .= '<g>';
    $svg .= '<desc>' . $d . ' entries are ' . $key . '</desc>';
    $svg .= '<rect x="' . $consts['offset_chart_pct'] . '%" y="' . $offset . '" width="' . $bar_width . '%" height="' . $consts['height_bar_px'] . '" fill="#0000ff" />';
    $svg .= '<text x="0" y="' . $label_offset . '" fill="' . $consts['base_color'] . '" font-size="' . $consts['font_size'] . '">' . $key . '</text>';
    $svg .= '</g>';

    // Calculate the offset for the next bar.
    $offset += $consts['offset_bar_px'] + $consts['height_bar_px'];
    $label_offset = $offset + 30;
  }
}


// [HELPER] Function to write out the end of the SVG object.
function _besan_bh_get_svg_end( &$svg ) {
  $svg .= '</svg>';
}