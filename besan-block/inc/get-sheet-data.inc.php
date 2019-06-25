<?php
/**
 * Helper function to retrieve Google sheet data via API.
 */

function besan_get_sheet_data( $attributes, $api_key ) {
  // Extract the Google sheet ID from the sheet URL.
  $sheet_id = preg_replace( '/(https:\/\/docs.google.com\/spreadsheets\/d\/)|\/edit.*/', '', $attributes['data'] );

  // Calculate the range of data to get.
  $range = $attributes['column'] . '2%3A' . $attributes['column'] . '1000';

  // Make the call to get the data from Google.
  $get_data = new WP_Http();
  $url = 'https://sheets.googleapis.com/v4/spreadsheets/'. $sheet_id . '/values/' . $range . '/?&key=' . $api_key;

  return $get_data -> get( $url );
}
