# Besan Block

This WordPress plugin adds a responsive and accessible data chart block to the post editor. A content editor can use the "Chart" block to add a data chart to any page or post based on data from a publicly viewable Google sheet.

## Usage instructions

1. In the WordPress admin, install and enable the "Besan Block" plugin.

2. Enter your Google Sheets API key on the plugin's settings page.

3. Edit any page or post and add the "Chart" editor block.

4. In the Inspector panel (on the right-hand side of the editor), enter the following information:
  * The URL of your publicly viewable Google sheet
  * The column of data that your chart will be based on
  * What kind of chart you would like to display
  * What color the bars of the chart should be.

4. Optionally _(but preferably)_, enter a title and caption for the chart inside the editor.

5. Save and view the page!

The block will calculate the number of unique values inside that column and create a chart based on that data. Editors can choose among several chart types:

* Vertical bar chart
* Horizontal bar chart

Other chart types (including pie charts!) are coming soon.
