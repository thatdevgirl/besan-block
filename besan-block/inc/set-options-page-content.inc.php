<?php
/**
 * Add content to the plugin's options page.
 */

function bb_set_options_page_content() {
  // Get already saved options.
  $bb_api_key = unserialize( get_option( 'bb_api_key' ) );

  // Check to see if the form has posted.
  if ( isset( $_POST[ 'hasUpdates' ] ) && $_POST[ 'hasUpdates' ] == 'Y' ) {
    // Save the API key option.
    update_option( 'bb_api_key', $_POST[ 'bb_api_key' ] );

    // Print a success message to the page.
    print '<div class="updated bb-notice">Google API key has been saved.</div>';
  }

  // Grab the rest of the temmplate.
  require( 'template-options-page.inc.php' );
}
