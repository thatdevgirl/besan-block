<?php
/**
 * Create an options page for this plugin.
 */

require_once( 'set-options-page-content.inc.php' );

function besan_set_options_page() {
  add_options_page(
    'Besan Block',                   // page title
    'Besan Block',                   // menu title
    'manage_options',                // capability
    'besan_options',                 // slug
    'besan_set_options_page_content' // output function
  );
}

add_action( 'admin_menu', 'besan_set_options_page' );
