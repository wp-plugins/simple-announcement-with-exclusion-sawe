=== Simple Announcement With Exclusion ===
Contributors: Matthew Trevino
Tags: category, hide, mini loop, shortcode, aside, categories, exclude, hidden, the_loop, get_posts, page, post, sidebar, tag, post-format
Requires at least: 3.3
Tested up to: 3.5.1
Stable tag: 4.3.3

Specify multiple categories, tags, or post formats to show separately, or hide from certain loops.

== Description ==
SAWE is a plugin that will allow you to designate categories, tags, or post formats, to either show separetly 
on posts or pages (via shortcode) or to hide from the loop(s) (or both).  

You don't have to create save states to take advantage of the exclusion rulesets; you can exclude categories, 
tags, and post-formats just as easily as you can set up the save states themselves.

== Installation ==

1. Upload /SAWE/ to your /wp-content/plugins directory.
2. Navigate to your plugins menu in your Wordpress admin.
3. Activate it.
4. You'll find settings for the plugin under Settings->SAWE.


== Screenshots ==

1. Settings page


== Changelog ==
= 4.3.3 =
* Fixed issue that would break the settings page if a save state were accidentally created without a tag, category, or post format.
* Added a default save state that will show everything from the regular loop, excluding what you have saved in the exclusion config as to be hidden from the home loop (tags, categories, and post format).  The default loop can be displayed by using the shortcode [sawe].
* Colored areas settings page.

= 4.3.2 =
* Added exclusion rules for RSS.
* Option values for exclusion sets now only called where they are needed.

= 4.3.1 =
* Shortcode output div ids given unique identifiers.
* Shortcode output now appears where it is placed on the page/post (instead of at the top).
* Category/tag input boxes are now textareas for easier editing.
* A list of available tags and categories displayed for easy exclusion without having to set up a separate save state for them.
* Added the ability to edit currently existing save states.

= 4.3 =
* Multiple exclusion rulesets are now available.
* The main sawe loop has been taken out - you must now create individual loops for showing with the shortcode: [sawe config_id="#"] where # is the id of your desired loop.
* You cannot exclude categories from category pages or tags from tag pages.
* You must separate ids in the "exclude from these pages" input boxes as comma separated lists (1,2,3,...)

= 4.2.1 =
* Various errors fixed (php related errors)
* Various wording fixed (descriptions)

= 4.2 = 
* Save states are now human readable (when you look at each one, it's obvious as to what they do).  
* If uninstall is set to "yes", deactivating plugin will now delete the save state table as well.

= 4.1 =
* Save different [sawe] instances, and display them wherever using [sawe config_id="#"] (where # is the ID of the saved configuration).

= 4 =
* Saved instances will not be ommited from the loop. (But possible for a future update).
* Widget removed (because it wouldn't behave nicely with, well, anything.)
* WP-Pagenavi support added ( falls onto default pagination if WP-Pagenavi plugin not present)

= 3.3.2  =
* Further cleaned up code / stylesheet.

= 3.3.1 =
* fixed bug that caused php errors when plugin was activated for the first time and no initial parameters had been set.

= 3.3 =
* WP-Pagenavi no longer needed for pagination.  
* Current bug with pagination: on widget, going to page 1 is impossible.

= 3.2 =
* Trailing div taken out - last time I update at 2 in the morning, I promise.

= 3.1 =
* Style.css fixed

= 3 =
* Cleaned up code
* Options CSS should only load on the SAWE options page.
* Moved FAQ off of plugin page and over to papercaves.com/SAWE

= 2.3.3 =
* Pagination for shortcode fixed.

= 2.3.2 =
* Primitive pagination enabled (if you have wp-pagenavi plugin installed and activated).
* Paginated loops do not play well with ... everything else.
* Issue: clicking next on the paginated loop will next posts for the SAWE loop as well as the main loop.

= 2.3.1 = 
* get_posts swapped for query_posts (for widget, shortcode output, and preview area).  
* When category selected as post type, option title should now read "Category" (instead of "Post Format").

= 2.3 =
* So - let's go ahead and clean up the admin screen.

= 1 =
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
