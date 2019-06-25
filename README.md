# Besan Block

This WordPress plugin adds a data chart block to the post editor. The block pulls in data from a publicly viewable Google sheet.

A content editor can add a chart to any page or post by selecting the "Chart" block from the post editor block library. In the Inspector Panel, the editor will need to enter the full URL of the Google Sheet to be charted, as well as the column of data to base the chart on. The block will calculate the number of unique values inside that column and create a chart based on that data.

Editors can choose among several chart types:

* Vertical bar chart
* Horizontal bar chart
* Pie chart _(doesn't actually work)_

## Development notes and to-dos

* Example spreadsheet used: https://docs.google.com/spreadsheets/d/1BxiMVs0XRA5nFMdKvBdBZjgmUUqptlbs74OgvE2upms/edit#gid=0
* Need to remove the Google API key from this repo. Probably add a settings page where someone can enter in their own Google API key. Maybe some documentation, notes, etc can live there too.
* Custom colors? Or... better colors? Maybe allow user to specify color or choose "random".
