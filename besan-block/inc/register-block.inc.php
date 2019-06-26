<?php
/**
 * Register the Chart block.
 */

require_once( 'render-block.inc.php' );

function besan_register() {
  register_block_type( 'tdg/chart', array(
    // Set up block attributes.
    'attributes' => array(
      'data'    => array( 'type' => 'string', 'default' => '' ),
      'column'  => array( 'type' => 'string', 'default' => 'A' ),
      'type'    => array( 'type' => 'string', 'default' => 'bar-vertical' ),
      'title'   => array( 'type' => 'string', 'default' => '' ),
      'caption' => array( 'type' => 'string', 'default' => '' )
    ),

    // Declare render callback function.
    'render_callback' => 'besan_render'
  ) );
}

// HOOK for block registration.
add_action( 'init', 'besan_register' );
