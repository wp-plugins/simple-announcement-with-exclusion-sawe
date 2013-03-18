=== Simple Announcement With Exclusion ===
Contributors: Matthew Trevino
Tags: widget, category, hide, mini loop, shortcode, aside, categories, exclude, hidden, the_loop, get_posts, page, post, sidebar
Requires at least: 3.3
Tested up to: 3.5.1
Stable tag: 2.1

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
= 2.1 =
* 3 new exclusion rules: Main & category (exclude from main loop and category loop - useful for post types and tags) - Main & tag (exclude from main loop and tag loop - useful for categories) - Everywhere (exclude from search results, category loop, tag loop, and front page).

= 2.0 =
* Choosing tag wasn't working - fixed it.  Exclusion fixed (again).

= 1.9 = 
* FAQ moved to separate section, hidden so as not to clutter the options page - navigated to via dropdown.

= 1.8 =
* Included FAQ (which explains all of the options) to the top of the options page and a preview area to the bottom (so you can instantly see what is being displayed, and how).

= 1.7 = 
* Upgrading to 1.7 will require you to reset your exclusion/announcement parameters (by setting taxonomy and post format/category/tag).
* Ability to choose from post format, category, or tag.
* Adds support for all post formats available.

= 1.6 = 
* Fixed exclusion (it should now be working properly).  Worthwhile to note that pre_get_posts and exclusion rules don't affect sticky posts.

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
