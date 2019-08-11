<?php
/**
 * Helper function to create SVG for a horizontal bar chart.
 */

function besan_get_svg_bar_horizontal( $data, $title ) {
  $consts = _besan_bh_set_consts( $data );
  $svg = '';

  _besan_bh_get_svg_start( $svg, $consts, $title );
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
    'font_size'        => '14'
  );

  // Calculate the height of the chart, based on the number of items.
  $consts['height_chart_px'] = sizeof( $data ) * ( $consts['height_bar_px'] + $consts['offset_bar_px'] );
  $consts['height_total_px'] = $consts['height_chart_px'] + 40;
  $consts['label_x_axis_px'] =  $consts['height_chart_px'] + 20;

  return $consts;
}


// [HELPER] Function to write out the start of the SVG object.
function _besan_bh_get_svg_start( &$svg, $consts, $title ) {
  // Start the SVG structure.
  $svg = '<svg xmlns="http://www.w3.org/2000/svg" width="100%" height="' . $consts['height_total_px'] . '">';

  // Set the title of this SVG.
  $svg .= ( $title ) ? '<title>' . $title . '</title>' : '<title>Data chart</title>';

  // Make the defining lines of the chart.
  $svg .= '<g class="chart-container">';
  $svg .= '<line role="presentation" x1="' . $consts['offset_chart_pct'] . '%" y1="0" x2="' . $consts['offset_chart_pct'] . '%" y2="' . $consts['height_chart_px'] . '" stroke="' . $consts['base_color'] . '" stroke-width="2" />';
  $svg .= '<line role="presentation" x1="' . $consts['offset_chart_pct'] . '%" y1="' . $consts['height_chart_px'] . '" x2="100%" y2="' . $consts['height_chart_px'] . '" stroke="' . $consts['base_color'] . '" stroke-width="2" />';
  $svg .= '<text role="presentation" x="96%" y="' . $consts['label_x_axis_px'] . '" fill="' . $consts['base_color'] . '" font-size="' . $consts['font_size'] . '">' . $consts['max_value'] . '</text>';
  $svg .= '<text role="presentation" x="' . $consts['offset_chart_pct'] . '%" y="' . $consts['label_x_axis_px'] . '" fill="' . $consts['base_color'] . '" font-size="' . $consts['font_size'] . '">0</text>';
  $svg .= '</g>';
}


// [HELPER] Function to write out the bars of data.
function _besan_bh_get_data( &$svg, $data, $consts ) {
  // Initialize the offset of the first bar and its label.
  $offset = 0;
  $label_offset = 30;

  // Contain all the bars in a parent group.
  $svg .= '<g role="list" aria-label="Bar graph">';

  // Loop through each item and create the bar and its label.
  foreach ( $data as $key => $d ) {
    // Calculate the width of the bar, based on its value.
    $bar_width = $d / $consts['max_value'] * 100;

    // Write out the data.
    $svg .= '<g role="listitem" aria-label="' . $key . ', ' . $d . '" tabindex="0">';
    $svg .= '<rect role="presentation" x="' . $consts['offset_chart_pct'] . '%" y="' . $offset . '" width="' . $bar_width . '%" height="' . $consts['height_bar_px'] . '" fill="#0000ff" />';
    $svg .= '<text role="presentation" x="0" y="' . $label_offset . '" fill="' . $consts['base_color'] . '" font-size="' . $consts['font_size'] . '">' . $key . '</text>';
    $svg .= '</g>';

    // Calculate the offset for the next bar.
    $offset += $consts['offset_bar_px'] + $consts['height_bar_px'];
    $label_offset = $offset + 30;
  }

  // End the parent group container.
  $svg .= '</g>';
}


// [HELPER] Function to write out the end of the SVG object.
function _besan_bh_get_svg_end( &$svg ) {
  $svg .= '</svg>';
}
