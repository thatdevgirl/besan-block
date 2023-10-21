<?php

/**
 * Chart 
 * 
 * Functions that are used across multiple classes that create chart SVGs.
 */

namespace ThreePM\BesanBlock\Chart;

abstract class Chart {
  
  /**
   * get_title()
   *
   * Get the SVG title code.
   *
   * @param string $title
   * @param string $title_id
   * 
   * @return string
   */
  protected function get_title( $title = 'Data chart', $title_id ): string {
    return <<<SVG_TITLE
      <title id="$title_id">$title</title>
SVG_TITLE;
  }


  /**
   * get_title_id()
   * 
   * Generate a unique ID for the SVG title, based on a random number. This 
   * is a precaution, for cases where multiple Chart blocks are on a page.
   * 
   * @return string
   */
  protected function get_title_id(): string {
    // Construct a unique, random number to be used to construct IDs for chart
    // elements, in case there are more than one.
    $random_number = strval(rand());
    
    // Create and return an ID for the SVG `<title>` element.
    return 'tdg-chart-title-' . $random_number;
  }


  /**
   * get_single_aria_label()
   * 
   * Create an ARIA label for a single data point. This label should be 
   * descriptive of that particular data point, in the context of the overall
   * graph.
   * 
   * @param int $items
   * @param string $label
   * 
   * @return string
   */
  protected function get_single_aria_label( int $items, string $label ): string {
    return 'There are ' . $items . ' entries under ' . $label;
  }

}