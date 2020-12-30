<?php

/**
 * Helper class to create SVG for a horizontal bar chart.
 */

namespace ThreePM\BesanBlock\Chart;

class BarHorizontal {

  private const BAR_HEIGHT = 40;
  private const CHART_OFFSET = 20;
  private const BAR_OFFSET = 15;
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

    // Calculate the height of the chart, based on the number of items, and the
    // total height of the SVG, which is the chart height plus a little padding.
    $this->chart_height = sizeof( $data ) * ( self::BAR_HEIGHT + self::BAR_OFFSET );
    $total_height = $this->chart_height + 40;

    // Construct the SVG.
    $svg = '';
    $svg .= $this->get_title( $title );
    $svg .= $this->get_axes();
    $svg .= $this->get_data( $data, $chart_color );

    return <<<SVG_CODE
      <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="$total_height">
        $svg
      </svg>
SVG_CODE;
  }


  /**
   * get_title()
   *
   * Get the SVG title code.
   *
   * @param string $title;
   * @return string
   */
  private function get_title( $title = 'Data chart' ): string {
    return '<title>' . $title . '</title>';
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
    $base_color     = self::BASE_COLOR;
    $chart_offset   = self::CHART_OFFSET;
    $font_size      = self::FONT_SIZE;
    $label_position = $this->chart_height + 20;

    return <<<SVG_CODE
      <g class="chart-container">
        <line role="presentation" x1="$chart_offset%" y1="0" x2="$chart_offset%" y2="$this->chart_height" stroke="$base_color" stroke-width="2" />
        <line role="presentation" x1="$chart_offset%" y1="$this->chart_height" x2="100%" y2="$this->chart_height" stroke="$base_color" stroke-width="2" />
        <text role="presentation" x="96%" y="$label_position" fill="$base_color" font-size="$font_size">$this->max_value</text>
        <text role="presentation" x="$chart_offset%" y="$label_position" fill="$base_color" font-size="$font_size">0</text>
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
    $bar_height   = self::BAR_HEIGHT;
    $base_color   = self::BASE_COLOR;
    $chart_offset = self::CHART_OFFSET;
    $font_size    = self::FONT_SIZE;

    // Initialize the offset of the first bar and its label.
    $offset = 0;
    $label_offset = 30;

    $svg = '';

    // Loop through each item and create the bar and its label.
    foreach ( $data as $key => $d ) {
      // Calculate the width of the bar, based on its value.
      $bar_width = $d / $this->max_value * 100;

      // Write out the data.
      $svg .= <<<SVG_CODE
        <g role="listitem" aria-label="$key, $d" tabindex="0">
          <rect role="presentation" x="$chart_offset%" y="$offset" width="$bar_width%" height="$bar_height" fill="$chart_color" />
          <text role="presentation" x="0" y="$label_offset" fill="$base_color" font-size="$font_size">$key</text>
        </g>
SVG_CODE;

      // Calculate the offset for the next bar.
      $offset += self::BAR_OFFSET + self::BAR_HEIGHT;
      $label_offset = $offset + 30;
    }

    // Return the bars inside a parent group container.
    return '<g role="list" aria-label="Bar graph">' . $svg . '</g>';
  }

}
