=== Plugin Name ===
Contributors: aez
Donate link: http://kimonolabs.com/
Tags: api, app, data, kimonolabs
Requires at least: 3.2
Tested up to: 4.0
Stable tag: 1.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Display data from any website on your WordPress site!

== Description ==

Display data from any website on your WordPress site!

The Kimono WordPress plugin lets you embed blocks containing the latest data from any webpage. This lets you easily view a feed of news, events, prices, or any other relevant data without ever having to leave your site. 

You can embed a block by:

* Adding a http://kimonolabs.com/ url via OEmbed
* Using a [kimono] shortcode

Blocks can be custom styled to match your site.

Check out [Wordpress Embedding](https://kimonolabs.com/learn/wordpress) at [kimonolabs.com](http://kimonolabs.com) for detailed instructions.


== Installation ==

1. Upload `kimono-wordpress.zip` to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. (optional) Click on Settings to set your `[kimono]` shortcode defaults (including your API_KEY)
1. Create a post with Kimono content!

Using OEmbed:

  	Check out this great Kimono API:

  	https://www.kimonolabs.com/api/{API_ID}

  	That was a great API.

Using the shortcode:

    [kimono api={API_ID}]

[Learn more](http://kimonolabs.com/learn/wordpress) at [kimonolabs.com](http://kimonolabs.com/).


== Frequently Asked Questions ==

= Why can't I see my results? =

Be sure you have entered the correct API_KEY from http://kimonolabs.com/


== Screenshots ==

1. A KimonoBlock embedded in a post
2. Settings for `[kimono]` shortcode

== Changelog ==

= 1.0 =
Initial Release


== Upgrade Notice ==

= 1.0 =
This is the first release.
