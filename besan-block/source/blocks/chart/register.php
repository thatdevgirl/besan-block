<?php

/**
 * Register the Chart block.
 */

namespace ThreePM\BesanBlock\Chart;

class Register {

  /**
   * __construct()
   */
  public function __construct() {
    // Register the block.
    add_action( 'init', [ $this, 'register' ] );
  }


  /**
   * register()
   *
   * Register this block.
   *
   * @return void
   */
  public function register(): void {
    register_block_type( __DIR__, [
      'render_callback' => [ $this, 'render' ]
    ] );
  }


  /**
   * render()
   *
   * Render this block.
   *
   * @param array $attributes
   * 
   * @return string
   */
  public function render( $attributes ): string {
    $SheetData = new SheetData();
    $data = $SheetData->get( $attributes );

    // If no data exists, return nothing.
    if ( !$data ) { return '<p>Sorry. Chart is unable to display.</p>'; }

    // Otherwise, construct the chart!
    $svg = $this->render_svg( $attributes, $data, $SheetData->get_title() );
    return $this->render_block( $attributes, $svg );
  }


  /**
   * render_svg()
   *
   * Construct the SVG based on the data.
   *
   * @param array $attributes
   * @param array $data
   * @param string $column_title
   * 
   * @return string
   */
  private function render_svg( $attributes, $data, $column_title ) {
    // Extract attributes, for reading ease.
    $title = $attributes['title'] ? $attributes['title'] : $column_title;
    $color = $attributes['color'] ?? '#000000';

    switch( $attributes['type'] ) {
      case 'bar-vertical':
        $BAR_VERTICAL = new BarVertical();
        return $BAR_VERTICAL->get( $data, $title, $color );

      case 'bar-horizontal':
        $BAR_HORIZONTAL = new BarHorizontal();
        return $BAR_HORIZONTAL->get( $data, $title, $color );

      default:
        $BAR_VERTICAL = new BarVertical();
        return $BAR_VERTICAL->get( $data, $title, $color );
    }
  }


  /**
   * render_block()
   *
   * Construct the HTML for the overall block.
   *
   * @param array $attributes
   * @param string $svg
   * 
   * @return string
   */
  private function render_block( $attributes, $svg ) {
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

}

new Register;
