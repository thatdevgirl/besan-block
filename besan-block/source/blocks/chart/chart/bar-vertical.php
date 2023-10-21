<?php

/**
 * BarVertical
 * 
 * Create the SVG for a **vertical** bar chart.
 */

namespace ThreePM\BesanBlock\Chart;

class BarVertical extends Chart {

  private const TOTAL_HEIGHT = 400;
  private const CHART_HEIGHT = 360;
  private const LABEL_POSITION = 380;
  private const CHART_OFFSET = 10;
  private const BAR_OFFSET = 2;
  private const BASE_COLOR = '#000000';
  private const FONT_SIZE = '14';


  /**
   * get()
   *
   * Main function to get the SVG code.
   *
   * @param array $data
   * @param string $title
   * @param string $chart_color
   * @return string
   */
  public function get( $data, $title, $chart_color ): string {
    // Calculate the maximum value of the chart, based on the maximum value
    // inside the data array. This will be used a couple of times in this class.
    $this->max_value = max( $data );

    // Calculate the base of the bar. Saving the total height constant as a
    // local variable because we need it in the HEREDOC below.
    $total_height = self::TOTAL_HEIGHT;
    $this->bar_base = self::TOTAL_HEIGHT - self::CHART_HEIGHT - 2;

    // Get the SVG title ID.
    $title_id = $this->get_title_id();

    // Construct the SVG.
    $svg = '';
    $svg .= $this->get_title( $title, $title_id );
    $svg .= $this->get_axes();
    $svg .= $this->get_data( $data, $chart_color );

    return <<<SVG_CODE
      <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="$total_height" aria-labelledby="$title_id">
        $svg
      </svg>
SVG_CODE;
  }


  /**
   * get_axes()
   *
   * Get the SVG code for the chart container and axes.
   *
   * @return string
   */
  private function get_axes(): string {
    // Save constants used in the bar code as local variables so we can use
    // them in the HEREDOC, because apparently it can't deal with constants.
    $base_color   = self::BASE_COLOR;
    $chart_height = self::CHART_HEIGHT;
    $chart_offset = self::CHART_OFFSET;
    $font_size    = self::FONT_SIZE;

    return <<<SVG_CODE
      <g class="chart-container">
        <line role="presentation" x1="$chart_offset%" y1="0" x2="$chart_offset%" y2="$chart_height" stroke="$base_color" stroke-width="2" />
        <line role="presentation" x1="$chart_offset%" y1="$chart_height" x2="100%" y2="$chart_height" stroke="$base_color" stroke-width="2" />
        <text role="presentation" x="5%" y="20" fill="$base_color" font-size="$font_size">$this->max_value</text>
        <text role="presentation" x="5%" y="$chart_height" fill="$base_color" font-size="$font_size">0</text>
      </g>
SVG_CODE;
  }


  /**
   * get_data()
   *
   * Get the SVG code for the chart's data bars.
   *
   * @param array $data
   * @param string $chart_color
   * @return string
   */
  private function get_data( $data, $chart_color ): string {
    // Save constants used in the bar code as local variables so we can use
    // them in the HEREDOC, because apparently it can't deal with constants.
    $bar_offset     = self::BAR_OFFSET;
    $base_color     = self::BASE_COLOR;
    $chart_height   = self::CHART_HEIGHT;
    $chart_offset   = self::CHART_OFFSET;
    $font_size      = self::FONT_SIZE;
    $label_position = self::LABEL_POSITION;

    // Calculate the width of each bar, based on the number of items.
    $number_of_items = sizeof( $data );
    $bar_width = ( ( 100 - $chart_offset ) - ( $bar_offset * $number_of_items ) ) / $number_of_items;

    // Initialize the offset of the first bar.
    $offset = $chart_offset + $bar_offset;

    $svg = '';

    // Loop through each item and create the bar and its label.
    foreach ( $data as $key => $d ) {
      // Calculate the height and y-position of this bar, based on its value.
      // The y-position is necessary because the bar rests on the bottom axis
      // of the chart.
      $height_ratio = $d / $this->max_value;
      $bar_height = $chart_height * $height_ratio;
      $bar_y_position = $chart_height - $bar_height - 1;

      // Get the ARIA label for this item.
      $aria_label = $this->get_single_aria_label( $d, $key );

      // Write out the data.
      $svg .= <<<SVG_CODE
        <g role="listitem" aria-label="$aria_label" tabindex="0">
          <rect role="presentation" x="$offset%" y="$bar_y_position" width="$bar_width%" height="$bar_height" fill="$chart_color" />
          <text role="presentation" x="$offset%" y="$label_position" fill="$base_color" font-size="$font_size">$key</text>
        </g>
SVG_CODE;

      // Calculate the offset for the next bar.
      $offset += $bar_offset + $bar_width;
    }

    // Return the bars inside a parent group container.
    return '<g role="list" aria-label="Bar graph">' . $svg . '</g>';
  }

}
