<?php

/**
 * Add action links and meta links (under the plugin description) for this
 * plugin on the admin Plugins page.
 */

namespace ThreePM\BesanBlock;

class PluginsPage {

  /**
   * __construct()
   */
  public function __construct() {
    add_action( 'admin_notices', [ $this, 'sunset' ] );
  
    add_filter( 'plugin_action_links_besan-block/besan-block.php', [ $this, 'add_action_links' ], 10, 2 );
    add_filter( 'plugin_row_meta', [ $this, 'add_row_meta' ], 10, 2 );
  }

  /**
   * sunset()
   *
   * Sunset notice that is displayed with the plugin is activated.
   *
   * @return void
   */
 	public function sunset(): void {
    $screen = get_current_screen();
    if ($screen && ( $screen->id == 'plugins') ) {
      print <<<HTML
        <div id="sunset" class="notice notice-warning is-dismissible">
          <p><strong>Important notice about the Besan Block plugin:</strong></p>
          <p>
            Due to a shift in my personal and professional priorities, I have decided
            to take a step back from development. As a result, this plugin is <strong>no longer
            being actively maintained.</strong> You are welcome to
            <a href="https://github.com/thatdevgirl/besan-block" target="_blank">fork it</a>
            and create your own updates. If you do so, please credit me as the original author.
            (I would also love to
            <a href="mailto:joni@jhalabi.com">hear about this plugin’s new life</a>!)
          </p>
          <p>
            All the best, Joni.
          </p>
        </div>
HTML;
    }
  }


  /**
   * add_action_links()
   *
   * Add an action link to go to the plugin's settings page.
   *
   * @param array $links
   * @param string $plugin_file_name
   * 
   * @return array
   */
  public function add_action_links( $links, $plugin_file_name ): array {
    $additional_links = [
      '<a href="/wp-admin/options-general.php?page=besan_options">Settings</a>',
    ];

    return array_merge( $additional_links, $links );
  }


  /**
   * add_row_meta()
   *
   * Add a new Donate link to the row of links under the plugin description.
   *
   * @param array $links
   * @param string $plugin_file_name
   * 
   * @return array
   */
  public function add_row_meta( $links, $plugin_file_name ) {
    $additional_links = [];

    if ( strpos( $plugin_file_name, 'besan-block' ) !== false ) {
      $additional_links = [
        '<a href="' . esc_url( 'https://www.buymeacoffee.com/thatdevgirl' ) . '">Donate</a>',
      ];
    }

    return array_merge( $links, $additional_links );
  }

}


/**
 * Only call this class while in the WP admin.
 */
if ( is_admin() ) {
  new PluginsPage;
}
