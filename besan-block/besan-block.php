<?php

/**
 * Plugin Name: Besan Block
 * Description: This WordPress plugin adds a charting block to the post editor.
 * Version: 1.3
 * Author: Joni Halabi
 * Author URI: https://jhalabi.com
 * License: GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

// Exit if accessed directly.
if ( !defined( 'ABSPATH' ) ) {
  exit;
}

require_once( 'inc/assets.php' );
require_once( 'inc/options-page.php' );
require_once( 'inc/plugins-page.php' );

require_once( 'source/blocks/chart/register.php' );
