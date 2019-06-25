<?php

/**
 * Plugin Name: Besan Block
 * Description: This WordPress plugin adds a charting block to the post editor.
 * Version: 1.0
 * Author: Joni Halabi
 * Author URI: https://thatdevgirl.com
 * License: GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */


// Exit if accessed directly.
if ( !defined( 'ABSPATH' ) ) {
  exit;
}

require_once( 'inc/set-plugin-meta.inc' );
require_once( 'inc/set-assets.inc' );
