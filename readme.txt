=== Simple Announcement With Exclusion ===
Contributors: Matthew Trevino
Tags: widget, category, hide, mini loop, shortcode, aside, categories, exclude, hidden, the_loop, get_posts, page, post, sidebar
Requires at least: 3.3
Tested up to: 3.5.1
Stable tag: 1.5

Set aside a category to show in a widget, hide it from the feed.

== Description ==

SAWE is a plugin to set aside a single category as an announcements section (or aside, or updates, or whatever) and display it via shortcode ( [sawe] ) or widget, with the option of also excluding posts from this category from showing up on the main feed.

== Installation ==

1. Upload /SAWE/ to your /wp-content/plugins directory.
2. Navigate to your plugins menu in your Wordpress admin.
3. Activate it.
4. You'll find settings for the plugin under Settings->SAWE.

Place the widget (optional) or use the shortcode [sawe] (optional).

== Screenshots ==

1. Settings page


== Changelog ==
= 1.5 =
* Added the tags to the sorting options.  If both a tag AND a category are selected, nothing will show.  You will need to select the first option of the dropdown (blank) for one or the other for one of the two to show.
* An issue with the exclusion function is keeping posts from being excluded properly.  The function and the option have been commented out in the code until a fix can be issued.

= 1.4 =
* Added default styles (that can be optionally loaded) - styled the options page, added relevant information.
* If your theme doesn't support post thumbnails, SAWE will enable them.

= 1.3 =
* Added ability to show excerpt or full post content. Cleaned up code a bit.

= 1.2 =
* Added [sawe] shortcode (to display SAWE on a post or a page without having to use the widget).

= 1.1 =
* Cleaned up settings page.

= 1.0 =
* Initial release.
