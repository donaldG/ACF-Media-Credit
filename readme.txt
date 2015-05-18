=== ACF Media Credit ===
Contributors: donaldG2
Donate link: https://www.paypal.com/us/cgi-bin/webscr?cmd=_flow&SESSION=LNaVZ85rUkXbLOhRJPqAzVtr6Uw8Njw-W--sFOXfHTWWyKu52A-9spIhWaW&dispatch=5885d80a13c0db1f8e263663d3faee8d66f31424b43e9a70645c907a6cbd8fb4
Tags: custom, field, custom field, advanced, repeater, media, image, images, credit, byline, author
Requires at least: 4.0
Tested up to: 4.2.2
Stable tag: 1.3.1
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
This is a bug either in ACF or WordPress core. I've made the ACF Support team aware of it. For the time being if you switch to the original Media Library edit screen (where images are not in the grid view) then you can add/edit/remove credits without any issues. *This is resolved now*

== Upgrade Notice ==
=1.3.1=
Current

== Screenshots ==
1. What the fields look like when added to a media item
2. A clearer shot of those fields on a media attachment
3. One of the functions available to developers


== Changelog ==
= 1.3.1 =
* Get rid of PHP Warning for missing var (should also clear warning for empty regex)

= 1.3.0 =
* Tested compatibility for WP 4.2
* Changed the output of credits ever so slightly so that if an empty credit field exists it won't be output with the pipe.
* It appears with the update of ACF there's a bug with the Media Library & Repeater Field again. Hence the above update to the output. I'm logging a bug ticket w/ ACF so they can be aware. Right now what I'm seeing is if you add a second credit, then decide to delete the credit it won't go away. You can erase the credit data but still the Repeater Field stays.

= 1.2.1 =
* Add a return function for the post thumbnail media credit

= 1.2 =
* Apologies for the slurry of updates recently, the plugin was launched on a large site and some minor issues arose.
* Now supports classes on images: https://wordpress.org/support/topic/credit-disappears-if-class-added-to-image?replies=3#post-6726612 // thanks for the feedback!
* Fixes an issue where if for some unknown reason (seriously, why would this happen? but it did) you use the same image on the page twice the credit was applied twice to each image. It won't do that now :D
* Also made the method for getting the ID a little more air-tight so that any numbers added via class wouldn't accidentally be picked up.

= 1.1.3 =
* SVN appeared to be creating/adding a misnamed minified css file, trying to get rid of that

= 1.1.2 =
* Updates admin css, had a conflict it appeared.

= 1.1.1 =
* Uses 'function_exists' to make sure there are no conflicts
* Updates admin css so that the credit entries aren't squished

= 1.0.2 =
* Nothing new, just getting the 1.0.1 update correct

= 1.0.1 =
* Open any linked credits in a new window.

= 1.0 =
* Requires ACF Pro or ACF Free w/ Repeater Premium Add-On

== Functions ==
There are a handful of functions available for your use and there is more explanation given to them at <a href="http://dongaines.com/acf-media-credit/" target="_blank">dongaines.com/acf-media-credit</a>. The functions available:
`the_post_thumbnail_media_credit(); //does not require an attachment id`
`the_media_credit_html($attachment_id); //returns`
`the_media_credit($attachment_id); //echos the_media_credit_html();`
`the_plain_media_credit($attachment_id); //outputs the most basic markup`
`print_r(get_media_credit($attachment_id)); //helpful for debugging`

For images with a caption I'm filtering the caption shortcode, please do the same if you need to make a change: `add_filter( 'img_caption_shortcode', 'your_function_name', 10, 3 );`