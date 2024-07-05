=== Besan Block ===
Contributors: thatdevgirl
Donate Link: https://www.buymeacoffee.com/thatdevgirl
Tags: chart, data, graph
Requires at least: 5.0
Requires PHP: 7.0
Tested up to: 6.6
Stable tag: 1.4

Add a responsive and accessible data chart block to posts and pages.

== Description ==

This WordPress plugin adds a responsive and accessible data chart block to the post editor. The chart feeds off of data from a publicly viewable Google sheet.

== Installation ==

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

The block will calculate the number of unique values inside that column and create a chart based on that data.

== Frequently Asked Questions ==

= What is "Besan"? =

"Besan" is the Vulcan word for "chart". Live long and prosper.

= What kinds of charts do you support? =

So far, only bar charts (horizontal and vertical). More charts (including pie charts) are coming soon... or, well, eventually.

== Screenshots ==

1. Chart block in the post editor.

2. Example screenshot of the chart block displaying a vertical bar chart on the front-end.

3. Example screenshot of the chart block displaying a horizontal bar chart on the front-end.

== Changelog ==

= 1.4 =
* Tested plugin with WordPress core 6.4.
* Edited instructions and styles on the settings for clarity and accessibility. We're also using more modern CSS here.

= 1.3 =
* Tested plugin with WordPress core 6.2.
* Block code refactoring to keep up with current Gutenberg API standards.

= 1.2 =
* Tested plugin with WordPress core 5.7.
* Rearranging some things under the hood (i.e. code refactoring).
* UX updates to the block's inspector panel options.
* Updated the chart placeholder inside the editor - it now changes color to match the selected chart color!

= 1.1 =
* Tested plugin with WordPress core 5.4.
* Fixed PHP error on admin settings page.

= 1.0 =
* Initial release
