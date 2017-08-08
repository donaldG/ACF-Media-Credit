=== ACF Media Credit ===
Contributors: donaldG2
Donate link: https://www.paypal.com/us/cgi-bin/webscr?cmd=_flow&SESSION=LNaVZ85rUkXbLOhRJPqAzVtr6Uw8Njw-W--sFOXfHTWWyKu52A-9spIhWaW&dispatch=5885d80a13c0db1f8e263663d3faee8d66f31424b43e9a70645c907a6cbd8fb4
Tags: custom, field, custom field, advanced, repeater, media, image, images, credit, byline, author
Requires at least: 4.0
Tested up to: 4.7.3
Stable tag: 2.3.6
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
= Is There A Way to Change The Class Name (or add to it) For The Wrapping Div? =
Yes! There's a filter, `acf_media_credit_div_class` you can use for this purpose. It's documented at http://dongaines.com/acf-media-credit

= Is There A Way to Change The Basic Output of The Credits? =
Yes! There's a filter, `acf_media_credit_base_output` you can use for this purpose. It's documented at http://dongaines.com/acf-media-credit. This filter's great for adding something like `rel="nofollow"` to the credit links or changing the separator.

= Will You Help Me With _______? =
Most likely, I'm a pretty nice dude. If you have a question feel free to log it in the support section or contact me through my site at http://dongaines.com

== Upgrade Notice ==
=2.3.6=
Current

== Screenshots ==
1. What the fields look like when added to a media item
2. A clearer shot of those fields on a media attachment
3. One of the functions available to developers


== Changelog ==
= 2.3.6 =
* Changing filter names so we are able to separate out how markup changes might be applied.

= 2.3.5 =
* Merging PR from Github, fixes php notice about undefined var $image_credit, indentation inconsistencies, and removes unused $total var

= 2.3.4 =
* Oops! Missed a closing tag on that wrapper_tag filter, bit of a hot fix.

= 2.3.3 =
* Add some filters for manipulating markup in html5 ways, specifically useful for Facebook Instant Articles/Google AMP

= 2.3.2 =
* Make sure it doesn't do ACF content inside regular content twice

= 2.3.1 =
* Make sure it doesn't do images w/ captions twice

= 2.3.0 =
* Add the 'acf_the_content' filter to the plugin so that images inside ACF fields like a Repeater don't have to apply 'the_content' filter

= 2.2.2 =
* Got rid of 'undefined variable' PHP notice

= 2.2.1 =
* Got rid of an offset warning, updated coded to VIP standards with tabbing, etc.

= 2.2.0 =
* Added some filters for developers use! 

= 2.1.0 =
* My apologies, left out the 'media-credit' class on a the wrapping div. Also wrapped the media credit span inside a p tag if it matches for that.

= 2.0.1 =
* Change placeholder text in ACF Field for iStock to avoid confusion

= 2.0.0 =
* Reworked the way classes and pertanent info are gathered from the img tag. Should get rid of any problems with inconsistencies in where the align class or other items fall within the tag.

= 1.5 =
* Added conditionals to check if alignment class is at the end of the image class list. When using the paragraph aligmnent tool for images it adds the class at the end instead of the beginning which was causing some issues.

= 1.3.4 =
* Set a max-width:100%; the wrapping media-credit div. Fixes an issue with images not being responsive after the 1.3.3 update where I added a width to the div to fix float issues in IE.

= 1.3.3 =
* In IE a floated div (like the wrapping div this puts around images w/ credits) doesn't get floated properly unless there's a width. This release adds a width via an inline style to the div that wraps the image & credits. The width is taken from the image itself. This should fix any issues in IE where the credit doesn't stay underneath the image when an image is aligned right or left.

= 1.3.2 =
* Added more conditions to the regex. If a <p> tag precedes the image it will now be cool if the paragraph tag has a class or style applied to it.

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

Added filters:
`add_filter('acf_media_credit_base_output', 'your_function_name'); //your_function_name($image_credit)`
`add_filter('acf_media_credit_div_class', 'your_function_name'); //your_function_name($media_credit_div_class)`
