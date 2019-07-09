<?php
/**
 * Create an options page for this plugin.
 */

require_once( 'set-options-page-content.inc.php' );

function bb_set_options_page() {
  add_options_page(
    'Besan Block',                // page title
    'Besan Block',                // menu title
    'manage_options',             // capability
    'besan_options',              // slug
    'bb_set_options_page_content' // output function
  );
}

add_action( 'admin_menu', 'bb_set_options_page' );
