<section class="besan-block-settings" aria-label="Besan Block plugin settings">
  <h1>Besan Block Plugin Settings</h1>

  <p>You will need to add a Google API key here to use the Besan Block "Chart" block.</p>

  <ol>
    <li>To get this key, go to the <a href="https://console.developers.google.com/apis/dashboard" target="_blank">Google APIs Dashboard</a>. You should have a Google account to access this dashboard.</li>
    <li>Inside the dashboard, go to "Select a Project" at the top of the page and click on "New Project".</li>
    <li>Give your project a name and click the "Create" button.</li>
    <li>From the <a href="https://console.developers.google.com/apis/library" target="_blank">Library</a> page, search for the "Google Sheets API" and click the blue "Enable" button.</li>
    <li>From the <a href="https://console.developers.google.com/apis/credentials" target="_blank">Credentials</a> page, click "Create credentials" and select "API key" in the drop-down menu that appears.</li>
    <li>A pop-up window with your API key will appear. Copy the key, then click "Restrict Key".</li>
    <li>Under the "API restrictions" heading, check "Restrict Key", then select the "Google Sheets API" from the drop down menu.</li>
    <li>Click "Save".</li>
    <li>Paste the API key you copied in the form below.</li>
  </ol>

  <form method="post" action="options.php">
    <?php settings_fields( 'besan-block-settings-group' ); ?>
    <?php do_settings_sections( 'besan-block-settings-group' ); ?>

    <input type="text" name="bb_api_key" value="<?php echo esc_attr( get_option( 'bb_api_key' ) ); ?>" />

    <input type="submit" value="Save API key" class="cp-btn cp-submit" />
  </form>
</section>
