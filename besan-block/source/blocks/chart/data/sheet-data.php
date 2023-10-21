<?php

/**
 * Helper class to retrieve Google sheet data via API.
 */

namespace ThreePM\BesanBlock\Chart;

use WP_Http;

class SheetData {

  /**
   * get()
   *
   * Get the data from the Google sheet based on the passed-in attributes.
   *
   * @param array $attributes
   * 
   * @return array|bool
   */
  public function get( array $attributes ): array|bool {
    $data_body = $this->get_data( $attributes );
    return $this->process_data( $data_body );
  }


  public function get_title(): string {
    return '';
    print_r($this->title['body']->values);
    return $this->title['body']['values'];
  }


  /**
   * get_data()
   *
   * Private function to make the call to the Goolge spreadsheet and get the
   * relevant data based on the passed-in attributes.
   *
   * @param array $attributes
   * 
   * @return array
   */
  private function get_data( array $attributes ): array {
    // Get the API key from WP options.
    $api_key = get_option( 'besan_api_key' );

    // Get relevant data from the passed-in attributes array for reading ease.
    $data = $attributes['data'];
    $column = $attributes['column'];

    // Extract the Google sheet ID from the sheet URL.
    $sheet_id = preg_replace( '/(https:\/\/docs.google.com\/spreadsheets\/d\/)|\/edit.*/', '', $data );

    // Calculate the range of data to get.
    $range = $column . '2%3A' . $column . '1000';

    // Make the call to get the data from Google.
    $get_data = new WP_Http();
    $data_url = 'https://sheets.googleapis.com/v4/spreadsheets/'. $sheet_id . '/values/' . $range . '/?&key=' . $api_key;
    $raw_data = $get_data->get( $data_url );
    
    // Get and save the title to the class, for later.
    $title_url = 'https://sheets.googleapis.com/v4/spreadsheets/'. $sheet_id . '/values/' . $column . '1/?&key=' . $api_key;
    $this->title = $get_data->get( $title_url );

    // Return the raw data. It is a JSON string, so convert it to an array first.
    return json_decode( $raw_data['body'], true );
  }


  /**
   * process_data()
   *
   * Private function to process the passed-in data array to count all of its
   * unique values.
   *
   * @param array $data_body
   * 
   * @return array|bool
   */
  private function process_data( array $data_body ): array|bool {
    // If an error is returned with the data, do nothing.
    if ( array_key_exists( 'error', $data_body ) ) { return false; }

    // Find and count all of the unique values in the data.
    $data = [];
    foreach ( $data_body['values'] as $d ) {
      if ( array_key_exists( $d[0], $data ) ) {
        // If the value already exists in my new data array, just add 1 to it.
        $data[ $d[0] ]++;
      } else {
        // Otherwise, create a new item in my new data array for this new value.
        $data[ $d[0] ] = 1;
      }
    }

    return $data;
  }

}
