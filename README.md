ACF Media Credit
=========

This is the Git repo for the ACF Media Credit plugin. This repo is provided as a source for downloading a compressed (.zip) version of the plugin.

Requirements
------------
This plugin requires Advanced Custom Fields Pro OR the free version of ACF with the Repeater premium add-on.

Installation
------------
1. Download the zip file
2. Change the root directory name to 'acf-media-credit'
3. Add it to the 'wp-content/plugins/' directory
4. Go to the plugins admin screen and enable ACF Media Credit

Questions?
----------
Couple of options, either:

1. Go to my site and leave a comment: http://dongaines.com/acf-media-credit/ 
2. Hit me up on Twitter @donaldG.
3. Comment here on Git
4. Use the WordPress repo: https://wordpress.org/support/plugin/acf-media-credit

Changelog
-----
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

Notes
-----
05-18-2015: Bringing up to date with the WordPress repo!

12-17-2014: Plugin is on the WordPress repo: https://wordpress.org/plugins/acf-media-credit/

12-12-2014: This plugin has been submitted to the WordPress repository of plugins and is awaiting approval. 