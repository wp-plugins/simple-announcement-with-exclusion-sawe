=== Simple Announcement With Exclusion ===
Contributors: boyevul
Tags: category, hide, mini loop, shortcode, aside, categories, exclude, hidden, the_loop, get_posts, page, post, sidebar, tag, post-format
Requires at least: 3.9.1
Tested up to: 3.9.1
Stable tag: 5.0.0.3

Specify multiple categories, tags, or post formats to show separately, or hide from certain loops.

== Description ==
SAWE is a plugin that will allow you to designate categories, tags, or post formats, to either show separetly 
on posts or pages (via shortcode) or to hide from the loop(s) (or both).  

You don't have to create save states to take advantage of the exclusion rulesets; you can exclude categories, 
tags, and post-formats just as easily as you can set up the save states themselves.

== Installation ==

1. Upload /simple-announcement-with-exclusion-sawe/ to your /wp-content/plugins directory.
2. Navigate to your plugins menu in your Wordpress admin.
3. Activate it.
4. You'll find settings for the plugin under Settings->SAWE.


== Changelog ==
* 5.0.0.3  Enqueue error for stylesheets fixed.
* 5.0.0.2  Wording on settings page changed to make options clearer.
* 5.0.0.1  Admin panel cleanup
* 5.0.0.0  UI is now more user friendly, and each setting will display to you in a sentence as to what you are setting.  Scripts removed from admin page, CSS used in place.

* 4.6.0.0  Core code changes/updates, most notably separation of internal code (for easier future updates).
* 4.5.0.0  UI should be slightly easier to use.
* 4.4.5.0  Posts output in loops that have <!--more--> tag present should now respect the more tag, and use the wording that is set for "Read more" (in settings).
* 4.4.4.0  Removed post format enabler as it is no longer necessary with the upcoming Wordpress upgrade.
* 4.4.3.0  Cleaned up code.
* 4.4.2.0  Bug fix: Selecting random in default loop settings would not set the selector to random.
* 4.4.2.0  Bug fix: Order by parameters for default loop settings had no affect on the loop output.
* 4.4.1.0  Support for paginated posts (read more link).
* 4.4.1.0  Read more link text wording option added.
* 4.4.0.0  Ability to use multiple (comma separated) categories (by id, found in the category id listing in exclusion config) added for save states.
* 4.4.0.0  Markup fix: If no custom class is given, a blank class selector will not longer be output.
* 4.4.0.0  Markup change: Output is now as follows: <main div><article (custom class)><section>content</section></article></main div>
* 4.4.0.0  (Ignore the color scheme selector for now - there are no schemes yet, and the default is tranquil (light blues)).
* 4.3.3.2  Bug fix: save state editing.
* 4.3.3.2  Bug fix: paged default loop pages not showing up.
* 4.3.3.1  If the unfiltered loop is called on a single post or page, and the content is set to show either content, you will get a friendly warning instead of output.  This keeps the loop from running inifinitely.
* 4.3.3.0  Fixed issue that would break the settings page if a save state were accidentally created without a tag, category, or post format.
* 4.3.3.0  Added a default save state that will show everything from the regular loop (unfiltered).  The default loop can be displayed by using the shortcode [sawe].
* 4.3.3.0  Colored areas settings page.
* 4.3.2.0  Added exclusion rules for RSS.
* 4.3.2.0  Option values for exclusion sets now only called where they are needed.
* 4.3.1.0  Shortcode output div ids given unique identifiers.
* 4.3.1.0  Shortcode output now appears where it is placed on the page/post (instead of at the top).
* 4.3.1.0  Category/tag input boxes are now textareas for easier editing.
* 4.3.1.0  A list of available tags and categories displayed for easy exclusion without having to set up a separate save state for them.
* 4.3.1.0  Added the ability to edit currently existing save states.
* 4.3.0.0  Multiple exclusion rulesets are now available.
* 4.3.0.0  The main sawe loop has been taken out - you must now create individual loops for showing with the shortcode: [sawe config_id="#"] where # is the id of your desired loop.
* 4.3.0.0  You cannot exclude categories from category pages or tags from tag pages.
* 4.3.0.0  You must separate ids in the "exclude from these pages" input boxes as comma separated lists (1,2,3,...)
* 4.2.1.0  Various errors fixed (php related errors)
* 4.2.1.0  Various wording fixed (descriptions)
* 4.2.0.0  Save states are now human readable (when you look at each one, it's obvious as to what they do).  
* 4.2.0.0  If uninstall is set to "yes", deactivating plugin will now delete the save state table as well.
* 4.1.0.0  Save different [sawe] instances, and display them wherever using [sawe config_id="#"] (where # is the ID of the saved configuration).
* 4.0.0.0  Saved instances will not be ommited from the loop. (But possible for a future update).
* 4.0.0.0  Widget removed (because it wouldn't behave nicely with, well, anything.)
* 4.0.0.0  WP-Pagenavi support added ( falls onto default pagination if WP-Pagenavi plugin not present)

* 3.3.2.0  Further cleaned up code / stylesheet.
* 3.3.1.0  fixed bug that caused php errors when plugin was activated for the first time and no initial parameters had been set.
* 3.3.0.0  WP-Pagenavi no longer needed for pagination.  
* 3.3.0.0  Current bug with pagination: on widget, going to page 1 is impossible.
* 3.2.0.0  Trailing div taken out - last time I update at 2 in the morning, I promise.
* 3.1.0.0  Style.css fixed
* 3.0.0.0  Cleaned up code
* 3.0.0.0  Options CSS should only load on the SAWE options page.
* 3.0.0.0  Moved FAQ off of plugin page and over to papercaves.com/SAWE

* 2.3.3.0  Pagination for shortcode fixed.
* 2.3.2.0  Primitive pagination enabled (if you have wp-pagenavi plugin installed and activated).
* 2.3.2.0  Paginated loops do not play well with ... everything else.
* 2.3.2.0  Issue: clicking next on the paginated loop will next posts for the SAWE loop as well as the main loop.
* 2.3.1.0  get_posts swapped for query_posts (for widget, shortcode output, and preview area).  
* 2.3.1.0  When category selected as post type, option title should now read "Category" (instead of "Post Format").
* 2.3.0.0  So - let's go ahead and clean up the admin screen.

* 1.8.0.0  Included FAQ (which explains all of the options) to the top of the options page and a preview area to the bottom (so you can instantly see what is being displayed, and how).
* 1.7.0.0  Upgrading to 1.7 will require you to reset your exclusion/announcement parameters (by setting taxonomy and post format/category/tag).
* 1.7.0.0  Ability to choose from post format, category, or tag.
* 1.7.0.0  Adds support for all post formats available.
* 1.6.0.0  Fixed exclusion (it should now be working properly).  Worthwhile to note that pre_get_posts and exclusion rules don't affect sticky posts.
* 1.5.0.0  Added the tags to the sorting options.  If both a tag AND a category are selected, nothing will show.  You will need to select the first option of the dropdown (blank) for one or the other for one of the two to show.
* 1.5.0.0  An issue with the exclusion function is keeping posts from being excluded properly.  The function and the option have been commented out in the code until a fix can be issued.
* 1.4.0.0  Added default styles (that can be optionally loaded) - styled the options page, added relevant information.
* 1.4.0.0  If your theme doesn't support post thumbnails, SAWE will enable them.
* 1.3.0.0  Added ability to show excerpt or full post content. Cleaned up code a bit.
* 1.2.0.0  Added [sawe] shortcode (to display SAWE on a post or a page without having to use the widget).
* 1.1.0.0  Cleaned up settings page.
* 1.0.0.0  Initial release.