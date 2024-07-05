<?php

/**
 * Plugin Name: Besan Block
 * Description: Add a data chart block to the post editor, which can get its data from an external Google Sheet.
 * Version: 1.4
 * Author: Joni Halabi
 * Author URI: https://jhalabi.com
 * License: GPLv2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

// Exit if accessed directly.
if ( !defined( 'ABSPATH' ) ) {
  exit;
}

// Required files for assets and plugin options.
require_once( 'inc/assets.php' );
require_once( 'inc/options-page.php' );
require_once( 'inc/plugins-page.php' );


// Required files for the Chart block.
require_once( 'source/blocks/chart/data/sheet-data.php' );
require_once( 'source/blocks/chart/chart/chart.php' );
require_once( 'source/blocks/chart/chart/bar-horizontal.php' );
require_once( 'source/blocks/chart/chart/bar-vertical.php' );
require_once( 'source/blocks/chart/register.php' );
