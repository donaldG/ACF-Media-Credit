=== ACF Media Credit ===
Contributors: donaldG2
Donate link: https://www.paypal.com/us/cgi-bin/webscr?cmd=_flow&SESSION=LNaVZ85rUkXbLOhRJPqAzVtr6Uw8Njw-W--sFOXfHTWWyKu52A-9spIhWaW&dispatch=5885d80a13c0db1f8e263663d3faee8d66f31424b43e9a70645c907a6cbd8fb4
Tags: custom, field, custom field, advanced, repeater, media, image, images, credit, byline, author
Requires at least: 4.0
Tested up to: 4.0.1
Stable tag: 1.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Adds an option to create as many media credit fields as needed for an image.

== Description ==
This plugin uses the Repeater field of Advanced Custom Fields to add options for a Credit and Credit Link on each item in your Media Library. Currently this will only correlate and display for IMAGES on the front end. This does not support credits for .pdf files, .swf files, .doc files, etc.

Requires either <a href="http://www.advancedcustomfields.com/pro/" target="_blank">Advanced Custom Fields Pro</a> or the <a href="http://www.advancedcustomfields.com/" target="_blank">free version of ACF</a> with the <a href="http://www.advancedcustomfields.com/add-ons/repeater-field/" target="_blank">Repeater Field</a> add-on.

I suggest using ACF Pro with this plugin.

ACF Fields are exported as a json file (for ACF Pro) in the 'acf_exports' directory of this plugin.
ACF Pro allows you to import that json file if for some reason you're having trouble getting the fields to load.

If you're a developer there are functions available to you (see: <a href="http://dongaines.com/acf-media-credit/" target="_blank">dongaines.com/acf-media-credit</a>)

In the '/inc/' directory the fields have been exported as PHP to work w/ ACF Pro or ACF free

== Installation ==
1. If you've downloaded this from the WordPress admin plugin screen then all you'll need to do is click activate!
2. If you've downloaded this from the WordPress plugin repository then drop the file in your 'wp-content/plugins/' directory, then go to the Plugins screen of the admin and activate.

== Frequently Asked Questions ==
= When I'm in the grid view of the Media Library and try to remove a credit it doesn't go away. What's up? =
This is a bug either in ACF or WordPress core. I've made the ACF Support team aware of it. For the time being if you switch to the original Media Library edit screen (where images are not in the grid view) then you can add/edit/remove credits without any issues.

== Upgrade Notice ==
=1.0=
Current

== Screenshots ==
1. What the fields look like when added to a media item
2. A clearer shot of those fields on a media attachment
3. One of the functions available to developers


== Changelog ==
= 1.0 =
* Requires ACF Pro or ACF Free w/ Repeater Premium Add-On

