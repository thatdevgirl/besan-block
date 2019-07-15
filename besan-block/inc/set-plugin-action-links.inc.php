<?php
/**
 * Add action links for the plugin on the plugin page.
 */

add_filter( 'plugin_action_links_besan-block/besan-block.php', 'bb_action_links', 10, 2 );

function bb_action_links( $links, $plugin_file_name ) {
  $additional_links = array(
    '<a href="/wp-admin/options-general.php?page=besan_options">Settings</a>',
  );

  return array_merge( $additional_links, $links );
}
