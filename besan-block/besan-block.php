<?php

/**
 * Plugin Name: Besan Block
 * Description: This WordPress plugin adds a charting block to the post editor.
 * Version: 1.1
 * Author: Joni Halabi
 * Author URI: https://thatdevgirl.com
 * License: GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

// Exit if accessed directly.
if ( !defined( 'ABSPATH' ) ) {
  exit;
}

require_once( 'inc/set-plugin-row-meta.inc.php' );
require_once( 'inc/set-plugin-action-links.inc.php' );
require_once( 'inc/set-options-page.inc.php' );
require_once( 'inc/set-assets.inc.php' );
require_once( 'inc/register-block.inc.php' );
