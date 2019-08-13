<?php
/**
 * Add content to the plugin's options page.
 */

function besan_set_options_page_content() {
  // Get already saved options.
  $besan_api_key = unserialize( get_option( 'besan_api_key' ) );

  // Check to see if the form has posted.
  if ( isset( $_POST[ 'hasUpdates' ] ) && $_POST[ 'hasUpdates' ] == 'Y' ) {
    // Save the API key option.
    update_option( 'besan_api_key', $_POST[ 'besan_api_key' ] );

    // Print a success message to the page.
    print '<div class="updated besan-updated">Google API key has been saved.</div>';
  }

  // Grab the rest of the temmplate.
  require( 'template-options-page.inc.php' );
}
