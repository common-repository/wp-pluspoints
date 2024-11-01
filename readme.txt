=== Wordpress Your PointsPlus ===
Contributors: andrew.alba
Tags: fitness, diet, points, plus, nutrition, food, log, weight, watchers
Donate link: https://interland3.donorperfect.net/weblink/weblink.aspx?name=E81064&id=3
Requires at least: 2.7
Tested up to: 4.5
Stable tag: 1.3.6
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Your PointsPlus is a handy plugin that allows WordPress users to log their meals using WeightWatchers PointsPlus system

== Description ==

Please feel free to give us your feedback, application enhancements or report any issues. [Start a thread on the plugin forum](https://wordpress.org/tags/media-credit#postform) and we'll get back to you shortly!

Your PointsPlus for Wordpress is a tool that will allow you to log your meals and let you track how many points you use in relationship to your targeted daily Weight Watchers points.

Your PointsPlus can be added to each post via editor and you can use code snippet to make totals always display on post or page.

== Installation ==
This section describes how to install the plugin and get it working.

1. Upload the plugin folder `wp-pluspoints` to the `/wp-content/plugins/` directory
1. Activate the plugin through the \'Plugins\' menu in WordPress
1. Configure the plugin using the `WP-PlusPoints Settings` link in the admin `Settings` menu
1. Place `[wppp serving=1 protien=13 carbs=8 fat=3 fiber=1]` in your post to display the five star rating system
1. See `Other Notes` for more Your PointsPlus options

The `[wppp]` shortcode supports five different attributes. Those attributes, their default values and descriptions are as follows.

* servings [default = 1]: How many servings consumed.
* protein [default = 0]: How much protein per serving (grams).
* carbs [default = 0]: How much carbohydrates per serving (grams).
* fat [default = 0]: How much fat per serving (grams).
* fiber [default = 0]: How much fiber per serving (grams).

== Frequently Asked Questions ==
= Where do you place the code `[wppp]`? =
The plugin requires only that you place the following code in your post/page. You can pass the attributes to the handler. If serving attribute is not included, it defaults to one. All other attributes default to zero.
`[wppp serving=1 protien=11 carbs=33 fat=5 fiber=3]`
That\'s it!

= Is there a demo somewhere of this plugin in action? =
Why yes, yes there is. You can see a demo at [Dingobytes.com](http://www.dingobytes.com/)

= Can I have more than one total per post/page? =
Yes!

== Screenshots ==
1. Multiple log days displayed
2. Isolated shot of total display
3. Personal information settings

== Changelog ==
= 1.3.6 =
* Updated method for getting plugin absolute path
* Updated method for getting plugin url path
* Corrected 'NEW' method to resolve PHP 7 bug
* Confirmed plugin works with Wordpress v. 4.5.3

= 1.3.5 =
* Updated plugin name and admin settings page
* Admin form HTML5 input
* Updated admin form JavaScript
* Confirmed plugin works with Wordpress v. 4.4

= 1.3.2 =
* SVN issues: had to remove wp-admin.php again

= 1.3.1 =
* Removed remote image link and replaced with dashicons
* Updated color scheme to use WordPress colors

= 1.3 =
* Removed obfuscation on admin settings page (caused plugin to be disabled)
* Cleaned up admin page.

= 1.2 =
* Added settings link to the plug-in page
* Refactored settings page using add_submenu_page()

= 1.1 =
* Compressed the JavaScript
* Encoded the Your PointsPlus Settings (admin form) and separated into the include
* Updated screen shot

= 1.0 =
* Initial release of Your PointsPlus

== Upgrade Notice ==
= 1.3.6 =
* Fixed bug preventing PHP 7 install and corrected plugin url and directory paths

== Arbitrary section ==
This plug-in currently makes the following assumptions.

1. Posts will not log more then one day of data.
1. Pages will not log more then one day of data.
1. There is only one user per site.

There are two methods for displaying the totals on your post and or page.

1. Shortcode API
1. Embedding into theme/template

Shortcode API

- Inserts the total on an individual bases
- Insert the shortcode `[wppp_total]` where you want the total to appear.

Embedding into theme/template

- Iserts the total on every page using the template
- Add the following code to your template where you want the total to appear: `<?php echo wp_pluspoints_total_func(); ?>`
- WARNING: This method may break your theme if and when the plug-in is deactivated and or removed.

Some notes about the plugin.
- 
- Serving does not have to be an integer. You can enter 1.5 for a serving value. Serving defaults to 1.
- Protein, Carbohydrates (Carbs), Fat and Fiber are all measured in grams. 