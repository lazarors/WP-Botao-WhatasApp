=== Botão WhatsApp ===
Contributors: dancoulter
Donate link: 
Tags: photos, menssage, whatsapp
Requires at least: 2.9
Tested up to: 1.0.0
Stable tag: 1.5.3

Quickly and easily add Flickr galleries, photos, and even custom search results into your WordPress pages and posts.

== Description ==

This plugin is deprecated, please remove it from your WordPress install.

Using the "shortcodes" system in WordPress 5.8 and up, this plugin will allow you to quickly and easily incorporate 
your Flickr photos into your WordPress pages and posts.

Features include:



== Installation ==

1. Upload the folder containing the plugin files.
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Go to Settings -> Flickr Gallery to enter your basic settings

You will need to enter a Flickr API key.  The settings page has a link to a page where you can apply for a new key.

== Usage ==

* `[flickr-gallery]` - Creates a generic gallery for the user you specified in your settings page.
* `[flickr]http://www.flickr.com/photos/dancoulter/2619594365/[/flickr]` - Inserts the given image.  You can also just put the photo ID in there (the numeric string at the end of the link).

Other options:

* `[flickr-gallery mode="photoset" photoset="72157605870230826"]` - Displays all of the photos from the given Flickr photoset.
* `[flickr-gallery mode="tag" tags="foo" tag_mode="all"]` - Shows photos from your photostream with the specified tags (comma separated). If you leave off the tag_mode option, it defaults to "any".
* `[flickr-gallery mode="recent"]` - Shows recent photos from your photostream
* `[flickr-gallery mode="interesting"]` - Shows interesting photos from your photostream
* `[flickr-gallery mode="search" tags="foo" group_id="46862018@N00"]` - The search mode supports any arbitrary sort using the options listed here: http://www.flickr.com/services/api/flickr.photos.search.html
* `[flickr size="small" float="left"]http://www.flickr.com/photos/dancoulter/2619594365/[/flickr]` - Sets the size of the inserted image to "small" (defaults to "medium") and makes the next paragraph of text wrap around to the right of the image (you can specify "right" for the float parameter as well, which defaults to "none")
* `[flickr height="300" width="400"]http://www.flickr.com/photos/dancoulter/2422361554/[/flickr]` - This one is a video.  It'll automatically embed the flash movie for you.  If you want to change its size, you can use the width and height options.

Advanced options:

* If you want to disable pagination, just include `pagination=0` in your shortcode.