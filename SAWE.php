<?php
/*
	Plugin Name: Simple Announcement With Exclusion (SAWE)
	Plugin URI: http://suntaku.com/sawe/
	Description: Designate a category for announcements to show in a widget while excluding it from the main loop.
	Version: 1.9
	Author: Matthew Trevino
	Author URI: http://suntaku.com
	License: A "Slug" license name e.g. GPL2

	Copyright 2013  Matthew Trevino  (boyevul@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA


	Contents -
		SAWE-000 Enqueue necessary files for this plugin to function, install the plugin properly
				Delete information when plugin is deactivated (and the option to delete is set properly)
		SAWE-001 Options settings validation
		SAWE-002 Options page creation / page content
		SAWE-003 Widget / Front page exclusion
		SAWE-004 Shortcode (for displaying wherever)



*/


//	Last update March 10th, 2013 - 11:01 AM
	// Issue 1.0.0 - Exclusion not working (commented out in options table until it can be fixed.)
	 // FIXED.  (Also worth noting that pre_get_posts and taxonomy exclusion don't work on sticky posts.


// Add theme support for Post Formats
// Aside, gallery, link, image, quote, status, video, audio, chat	 
	add_theme_support( 'post-formats', array( 'aside', 'gallery','link','image','quote','status','video','audio','chat' ) );
	

// SAWE-000
// Registering and installaing relevant plugin information to the database.
	register_activation_hook( __FILE__, "simple_announcement_with_exclusion_install" );
	register_deactivation_hook( __FILE__, "simple_announcement_with_exclusion_uninstall" );

	function simple_announcement_with_exclusion_install() {
		
		// core settings
		add_option("simple_announcement_with_exclusion_0","","Wrapper");
		add_option("simple_announcement_with_exclusion_1","","post-type");
		add_option("simple_announcement_with_exclusion_1_1","","cat");
		add_option("simple_announcement_with_exclusion_1_2","","tag");
		add_option("simple_announcement_with_exclusion_1_3","","post-format");
		add_option("simple_announcement_with_exclusion_2","3","Option 2");
		add_option("simple_announcement_with_exclusion_3","","Option 3");
		add_option("simple_announcement_with_exclusion_3_2","","Option 3.2");
		add_option("simple_announcement_with_exclusion_4","no","Option 4");
		add_option("simple_announcement_with_exclusion_4_2","yes","Option 4.2");
		add_option("simple_announcement_with_exclusion_4_3","nothing","Option 4.3");
		add_option("simple_announcement_with_exclusion_5","yes","Option 5");
		add_option("simple_announcement_with_exclusion_6","no","Option 6");
		add_option("simple_announcement_with_exclusion_delete_on_deactivate","no","Delete on deactivate?");
	}

	
// Are we deleting information from the database?
// Check to make sure that the option to delete is set to "yes" before we delete the information.	
	function simple_announcement_with_exclusion_uninstall() {
		if ( get_option("simple_announcement_with_exclusion_delete_on_deactivate") === "yes") {
			delete_option("simple_announcement_with_exclusion_0");
			delete_option("simple_announcement_with_exclusion_1");
			delete_option("simple_announcement_with_exclusion_1_1");
			delete_option("simple_announcement_with_exclusion_1_2");
			delete_option("simple_announcement_with_exclusion_1_3");
			delete_option("simple_announcement_with_exclusion_2");
			delete_option("simple_announcement_with_exclusion_3");
			delete_option("simple_announcement_with_exclusion_3_2");
			delete_option("simple_announcement_with_exclusion_4");
			delete_option("simple_announcement_with_exclusion_4_2");
			delete_option("simple_announcement_with_exclusion_4_3");
			delete_option("simple_announcement_with_exclusion_5");
			delete_option("simple_announcement_with_exclusion_6");
			delete_option("simple_announcement_with_exclusion_delete_on_deactivate");
		} else { }
		
	}

	
	
	
	
// SAWE-001
// Options settings vlidation
// Take the values passed from the options page and insert them into the database for saving.
	function update_simple_announcement_with_exclusions() {
		$simple_announcement_with_exclusion_was_updated = false;
		
		if (
				$_REQUEST["simple_announcement_with_exclusion_0"] ||
				$_REQUEST["simple_announcement_with_exclusion_1"] ||
				$_REQUEST["simple_announcement_with_exclusion_1_1"] ||
				$_REQUEST["simple_announcement_with_exclusion_1_2"] ||
				$_REQUEST["simple_announcement_with_exclusion_1_3"] ||
				$_REQUEST["simple_announcement_with_exclusion_2"] ||
				$_REQUEST["simple_announcement_with_exclusion_3"] ||
				$_REQUEST["simple_announcement_with_exclusion_3_2"] ||
				$_REQUEST["simple_announcement_with_exclusion_4"] ||
				$_REQUEST["simple_announcement_with_exclusion_4_2"] ||
				$_REQUEST["simple_announcement_with_exclusion_4_3"] ||
				$_REQUEST["simple_announcement_with_exclusion_5"] ||
				$_REQUEST["simple_announcement_with_exclusion_6"] ||
				$_REQUEST["simple_announcement_with_exclusion_delete_on_deactivate"]
				
			) {
			
			update_option("simple_announcement_with_exclusion_0",$_REQUEST["simple_announcement_with_exclusion_0"]);
			update_option("simple_announcement_with_exclusion_1",$_REQUEST["simple_announcement_with_exclusion_1"]);
			update_option("simple_announcement_with_exclusion_1_1",$_REQUEST["simple_announcement_with_exclusion_1_1"]);
			update_option("simple_announcement_with_exclusion_1_2",$_REQUEST["simple_announcement_with_exclusion_1_2"]);
			update_option("simple_announcement_with_exclusion_1_3",$_REQUEST["simple_announcement_with_exclusion_1_3"]);
			update_option("simple_announcement_with_exclusion_2",$_REQUEST["simple_announcement_with_exclusion_2"]);
			update_option("simple_announcement_with_exclusion_3",$_REQUEST["simple_announcement_with_exclusion_3"]);
			update_option("simple_announcement_with_exclusion_3_2",$_REQUEST["simple_announcement_with_exclusion_3_2"]);
			update_option("simple_announcement_with_exclusion_4",$_REQUEST["simple_announcement_with_exclusion_4"]);
			update_option("simple_announcement_with_exclusion_4_2",$_REQUEST["simple_announcement_with_exclusion_4_2"]);
			update_option("simple_announcement_with_exclusion_4_3",$_REQUEST["simple_announcement_with_exclusion_4_3"]);
			update_option("simple_announcement_with_exclusion_5",$_REQUEST["simple_announcement_with_exclusion_5"]);
			update_option("simple_announcement_with_exclusion_6",$_REQUEST["simple_announcement_with_exclusion_6"]);
			update_option("simple_announcement_with_exclusion_delete_on_deactivate",$_REQUEST["simple_announcement_with_exclusion_delete_on_deactivate"]);
			$simple_announcement_with_exclusion_was_updated = true;
			
		}
		
		// Options were updated - tell the user about it.
		if ($simple_announcement_with_exclusion_was_updated) { 
			echo "<p>Options saved.</p>"; 
		}
	}

// The form for the options page.	
	function print_simple_announcement_with_exclusion_form() {
	
		$default_simple_announcement_with_exclusion_0 = get_option("simple_announcement_with_exclusion_0");
		$default_simple_announcement_with_exclusion_1 = get_option("simple_announcement_with_exclusion_1");
		$default_simple_announcement_with_exclusion_1_1 = get_option("simple_announcement_with_exclusion_1_1");
		$default_simple_announcement_with_exclusion_1_2 = get_option("simple_announcement_with_exclusion_1_2");
		$default_simple_announcement_with_exclusion_1_3 = get_option("simple_announcement_with_exclusion_1_3");
		$default_simple_announcement_with_exclusion_2 = get_option("simple_announcement_with_exclusion_2");
		$default_simple_announcement_with_exclusion_3 = get_option("simple_announcement_with_exclusion_3");
		$default_simple_announcement_with_exclusion_3_2 = get_option("simple_announcement_with_exclusion_3_2");
		$default_simple_announcement_with_exclusion_4 = get_option("simple_announcement_with_exclusion_4");
		$default_simple_announcement_with_exclusion_4_2 = get_option("simple_announcement_with_exclusion_4_2");
		$default_simple_announcement_with_exclusion_4_3 = get_option("simple_announcement_with_exclusion_4_3");
		$default_simple_announcement_with_exclusion_5 = get_option("simple_announcement_with_exclusion_5");
		$default_simple_announcement_with_exclusion_6 = get_option("simple_announcement_with_exclusion_6");
		$default_simple_announcement_with_exclusion_delete_on_deactivate = get_option("simple_announcement_with_exclusion_delete_on_deactivate");
		
		echo "
		
		<script type=\"text/javascript\">
		jQuery(document).ready(function () {
			jQuery('#chooseposttype').bind('change', function () {
				var elements = jQuery('div.posttypeselection').children().hide(); // hide all the elements
				var value = jQuery(this).val();
		
				if (value.length) { // if somethings' selected
					elements.filter('.' + value).show(); // show the ones we want
				}
			}).trigger('change'); // Setup the initial states
		});		
		</script>
		
		<form method=\"post\" class=\"SAWE_settings\">

		<label for=\"simple_announcement_with_exclusion_0\"><span class=\"SAWE_settings_title\">Div class name (optional):</span>
		<input type=\"text\" name=\"simple_announcement_with_exclusion_0\" value=\"",$default_simple_announcement_with_exclusion_0,"\" />
		</label>

		<label for=\"simple_announcement_with_exclusion_1\"><span class=\"SAWE_settings_title\">What kind of post type:</span>
		<select name=\"simple_announcement_with_exclusion_1\" id=\"chooseposttype\">
		<option value=\"\">Choose a post type</option>
		<option value=\"cat\"";if ($default_simple_announcement_with_exclusion_1 == "cat") { echo " selected=\"selected\""; } echo ">Category</option>
		<option value=\"tag\"";if ($default_simple_announcement_with_exclusion_1 == "tag") { echo " selected=\"selected\""; } echo ">Tag</option>
		<option value=\"post-format\"";if ($default_simple_announcement_with_exclusion_1 == "post-format") { echo " selected=\"selected\""; } echo ">Post format</option>
		</select>
		</label>";
		
		echo "<div class=\"posttypeselection\">";
		// If option value cat is selected
		echo "<label for=\"simple_announcement_with_exclusion_1_1\" class=\"cat\"><span class=\"SAWE_settings_title\">Post format:</span>
		<select name=\"simple_announcement_with_exclusion_1_1\">
		<option value=\"\"></option>";
				$sawe_tags =  get_categories('taxonomy=category'); 
				foreach ($sawe_tags as $sawe_tag) {
					echo "<option value=\"",$sawe_tag->cat_ID,"\"";
					if ($sawe_tag->cat_ID == $default_simple_announcement_with_exclusion_1_1) { echo " selected=\"selected\""; }
					echo ">",$sawe_tag->cat_name," - ",$sawe_tag->category_count,"</option>";
				}
		echo "</select>
		</label>
		</div>";
		
		echo "<div class=\"posttypeselection\">";
		// If option value tag is selected
		echo "<label for=\"simple_announcement_with_exclusion_1_2\" class=\"tag\"><span class=\"SAWE_settings_title\">Tag:</span>
		<select name=\"simple_announcement_with_exclusion_1_2\">
		<option value=\"\"></option>";
				$sawe_tags =  get_categories('taxonomy=post_tag'); 
				foreach ($sawe_tags as $sawe_tag) {
					echo "<option value=\"",$sawe_tag->cat_ID,"\"";
					if ($sawe_tag->cat_ID == $default_simple_announcement_with_exclusion_1_2) { echo " selected=\"selected\""; }
					echo ">",$sawe_tag->cat_name," - ",$sawe_tag->category_count,"</option>";
				}
				
		echo "
		</select>
		</label>
		</div>";
		
		
		echo "<div class=\"posttypeselection\">";
		// If option value post-format is selected
		echo "<label for=\"simple_announcement_with_exclusion_1_3\" class=\"post-format\"><span class=\"SAWE_settings_title\">Post format:</span>
		<select name=\"simple_announcement_with_exclusion_1_3\">
		<option value=\"\"></option>
		<option value=\"post-format-aside\"";if ($default_simple_announcement_with_exclusion_1_3 == "post-format-aside") { echo " selected=\"selected\""; } echo ">Aside</option>
		<option value=\"post-format-gallery\"";if ($default_simple_announcement_with_exclusion_1_3 == "post-format-gallery") { echo " selected=\"selected\""; } echo ">Gallery</option>
		<option value=\"post-format-link\"";if ($default_simple_announcement_with_exclusion_1_3 == "post-format-link") { echo " selected=\"selected\""; } echo ">Link</option>
		<option value=\"post-format-image\"";if ($default_simple_announcement_with_exclusion_1_3 == "post-format-image") { echo " selected=\"selected\""; } echo ">Image</option>
		<option value=\"post-format-quote\"";if ($default_simple_announcement_with_exclusion_1_3 == "post-format-quote") { echo " selected=\"selected\""; } echo ">Quote</option>
		<option value=\"post-format-status\"";if ($default_simple_announcement_with_exclusion_1_3 == "post-format-status") { echo " selected=\"selected\""; } echo ">Status</option>
		<option value=\"post-format-video\"";if ($default_simple_announcement_with_exclusion_1_3 == "post-format-video") { echo " selected=\"selected\""; } echo ">Video</option>
		<option value=\"post-format-audio\"";if ($default_simple_announcement_with_exclusion_1_3 == "post-format-audio") { echo " selected=\"selected\""; } echo ">Audio</option>
		<option value=\"post-format-chat\"";if ($default_simple_announcement_with_exclusion_1_3 == "post-format-chat") { echo " selected=\"selected\""; } echo ">Chat</option>
		</select>
		</label>
		</div>";
		
		echo "<label for=\"simple_announcement_with_exclusion_2\"><span class=\"SAWE_settings_title\">Number of posts:</span>
		<input type=\"text\" name=\"simple_announcement_with_exclusion_2\" value=\"",$default_simple_announcement_with_exclusion_2,"\" />
		</label>
		
		<label for=\"simple_announcement_with_exclusion_3\"><span class=\"SAWE_settings_title\">Order by:</span>
		<select name=\"simple_announcement_with_exclusion_3\">
			<option value=\"date\""; if ($default_simple_announcement_with_exclusion_3 == "date") { echo " selected=\"selected\""; } echo ">Date</option>
			<option value=\"title\""; if ($default_simple_announcement_with_exclusion_3 == "title") { echo " selected=\"selected\""; } echo ">Title</option>
			<option value=\"rand\""; if ($default_simple_announcement_with_exclusion_3 == "rand") { echo " selected=\"selected\""; } echo ">Random</option>
		</select>
		</label>	
		

		<label for=\"simple_announcement_with_exclusion_3_2\"><span class=\"SAWE_settings_title\">Posts order:</span>
		<select name=\"simple_announcement_with_exclusion_3_2\">
			<option value=\"ASC\""; if ($default_simple_announcement_with_exclusion_3_2 == "ASC") { echo " selected=\"selected\""; } echo ">Ascending</option>
			<option value=\"DESC\""; if ($default_simple_announcement_with_exclusion_3_2 == "DESC") { echo " selected=\"selected\""; } echo ">Descending</option>
		</select>
		</label>
		
		";
		
		// If thumbnail support isn"t enabled on the current theme, don"t bother giving the option to show thumbnails.
		if ( (function_exists("has_post_thumbnail")) ) {
			echo "
			<label for=\"simple_announcement_with_exclusion_4\"><span class=\"SAWE_settings_title\">Thumbnails?</span>
			<select name=\"simple_announcement_with_exclusion_4\">
				<option value=\"yes\""; if ($default_simple_announcement_with_exclusion_4 == "yes") { echo " selected=\"selected\""; } echo ">Yes</option>
				<option value=\"no\""; if ($default_simple_announcement_with_exclusion_4 == "no") { echo " selected=\"selected\""; } echo ">No</option>
			</select>
			</label>
			";
			}
		
		echo "
			<label for=\"simple_announcement_with_exclusion_4_2\"><span class=\"SAWE_settings_title\">Show titles?</span>
			<select name=\"simple_announcement_with_exclusion_4_2\">
				<option value=\"yes\""; if ($default_simple_announcement_with_exclusion_4_2 == "yes") { echo " selected=\"selected\""; } echo ">Yes</option>
				<option value=\"no\""; if ($default_simple_announcement_with_exclusion_4_2 == "no") { echo " selected=\"selected\""; } echo ">No</option>
			</select>
			</label>
				<label for=\"simple_announcement_with_exclusion_4_3\"><span class=\"SAWE_settings_title\">Show excerpt, content, or nothing?</span>
			<select name=\"simple_announcement_with_exclusion_4_3\">
				<option value=\"nothing\""; if ($default_simple_announcement_with_exclusion_4_3 == "nothing") { echo " selected=\"selected\""; } echo ">Nothing</option>
				<option value=\"excerpt\""; if ($default_simple_announcement_with_exclusion_4_3 == "excerpt") { echo " selected=\"selected\""; } echo ">Excerpt</option>
				<option value=\"content\""; if ($default_simple_announcement_with_exclusion_4_3 == "content") { echo " selected=\"selected\""; } echo ">Content</option>
			</select>
			</label>

			 <label for=\"simple_announcement_with_exclusion_5\"><span class=\"SAWE_settings_title\">Exclude posts from main loop?:</span>
			 <select name=\"simple_announcement_with_exclusion_5\">
			 	<option value=\"yes\""; if ($default_simple_announcement_with_exclusion_5 == "yes") { echo " selected=\"selected\""; } echo ">Yes</option>
			 	<option value=\"no\""; if ($default_simple_announcement_with_exclusion_5 == "no") { echo " selected=\"selected\""; } echo ">No</option>
			 </select>
			 </label>

			<label for=\"simple_announcement_with_exclusion_6\"><span class=\"SAWE_settings_title\">Include default CSS?:</span>
			<select name=\"simple_announcement_with_exclusion_6\">
				<option value=\"yes\""; if ($default_simple_announcement_with_exclusion_6 == "yes") { echo " selected=\"selected\""; } echo ">Yes</option>
				<option value=\"no\""; if ($default_simple_announcement_with_exclusion_6 == "no") { echo " selected=\"selected\""; } echo ">No</option>
			</select>
			</label>

			<label for=\"simple_announcement_with_exclusion_delete_on_deactivate\"><span class=\"SAWE_settings_title\">Delete options on deactivation?:</span>
			<select name=\"simple_announcement_with_exclusion_delete_on_deactivate\">
				<option value=\"yes\""; if ($default_simple_announcement_with_exclusion_delete_on_deactivate == "yes") { echo " selected=\"selected\""; } echo ">Yes</option>
				<option value=\"no\""; if ($default_simple_announcement_with_exclusion_delete_on_deactivate == "no") { echo " selected=\"selected\""; } echo ">No</option>
			</select>
			</label>
			
			
			<input type=\"submit\" name=\"submit\" value=\"Save\" />

		</form>";
	}
	
	
	
	

// SAWE-002
// Options page creation / page content
// Create the information page for this plugin.
	add_action("admin_menu", "simple_announcement_with_exclusion_add_options_page");
	
	if (is_admin() ) {
		wp_register_style( 'SAWEStylesheet', plugins_url('style.css', __FILE__), '1.4' );
		wp_enqueue_style( 'SAWEStylesheet' );
	}
	
	if (!is_admin() && get_option("simple_announcement_with_exclusion_6") === "yes") {
		wp_register_style( 'SAWEDefaultStylesheet', plugins_url('default.css', __FILE__), '1.4' );
		wp_enqueue_style( 'SAWEDefaultStylesheet' );
	}
	
	function simple_announcement_with_exclusion_add_options_page() {
		add_options_page("SAWE", "SAWE", "manage_options", "simple_announcement_with_exclusion", "simple_announcement_with_exclusions_page_content");
	}

// Display the information on the page that was created.
	function simple_announcement_with_exclusions_page_content() { 
		echo "	<div class=\"SAWE_container\">
				<h2>Simple Announcement With Exclusion (SAWE)</h2>
				<p>Designate a group of posts to show in a widget while excluding it from the main loop.</p>

				
				<script type=\"text/javascript\">
				jQuery(document).ready(function () {
					jQuery('#SAWEsection').bind('change', function () {
						var elements = jQuery('div.SAWEsection').children().hide(); // hide all the elements
						var value = jQuery(this).val();
		
						if (value.length) { // if somethings' selected
							elements.filter('.' + value).show(); // show the ones we want
						}
					}).trigger('change'); // Setup the initial states
				});		
				</script>
				<div id=\"information\">
				<select id=\"SAWEsection\" class=\"navigation\">
				<option value=\"\">Sections</option>
				<option value=\"\">--------</option>
				<option value=\"options\" selected=\"selected\">Options</option>
				<option value=\"faq\">FAQ</option>
				</select>				
				
				
				<div class=\"SAWEsection\">
					<div class=\"faq\">

					<div class=\"divclassname\">
					<p><strong><u>Div class name (optional)</u></strong><br />
					This setting is an optional one.  Simply put, it will give the widget created 
					a div class name of your choosing so that you may style it yourself with your 
					theme's CSS.</p>
					</div>

					<div class=\"posttype\">
					<p><strong><u>What kind of post type</u></strong><br />
					You are able to choose from either your post tags, post categories, or post formats.  
					If post formats are not enabled by your theme or a plugin, SAWE will enable <strong>all</strong> 
					post formats.</p>
					<p>Once you make a choice, a second dropdown menu will appear, and you will be able to select 
					from all available options (whether they are tags, categories, or formats).  While the post formats 
					dropdown is pre-filled (aside, gallery, link, image, quote, status, video, audio, chat), tag and categories 
					will be generated dynamically (and only if there is at least one post in that category.</p>
					<p>Unlike the post format dropdown, tags and categories will be accompanied by the number of posts associated 
					with each option, so that you may plan appropriately for how many posts to show in the option below (<em>Number 
					of posts</em>).</p>
					</div>
					
					<div class=\"numberofposts\">
					<p><strong><u>Number of posts</u></strong><br />
					Here, you may define how many posts are shown.  This number may be as high as you wish it to be, or as low 
					as you want.</p>
					</div>
					
					<div class=\"orderby\">
					<p><strong><u>Order by</u></strong><br />
					You may order your posts by date, title, or randomly.					
					</div>
					
					<div class=\"postsorder\">
					<p><strong><u>Posts order</u></strong><br />
					Here, you may define <strong>how</strong> your posts are ordered - in descending order, or ascending.  Descending is 
					top to bottom, and ascending is bottom to top.  If you are planning on showing only one post at a time, top to bottom 
					is going to be your choice (ascending will only show the first post from your chosen post type).</p>
					</div>
					
					<div class=\"thumbnails\">
					<p><strong><u>Thumbnails?</u></strong><br />
					If your theme or plugins do not enable post thumbnails, SAWE enables them for you.  Here, you may choose whether or 
					not to include post thumbnails in your new loop.</p>
					</div>
					
					<div class=\"showtitles\">
					<p><strong><u>Show titles?</u></strong><br />
					Whether or not you want clickable title links to accompany your posts.  If you choose to show nothing in the following option, 
					you may wish to have this activated.</p>
					</div>
					
					<div class=\"excerptcontentnothing\">
					<p><strong><u>Show excerpt, content, or nothing?</u></strong><br />
					Here, you may select whether you want the excerpt of the post shown, the full content of the post, or nothing at all.
					Full content is <strong>full content</strong> - links, images, and all.</p>
					</div>
					
					<div class=\"exclude\">
					<p><strong><u>Exclude posts from main loop?</u></strong><br />
					Whether or not you want the posts in your new loop to be excluded from your main loop (home loop only)</p>
					</div>
					
					<div class=\"includecss\">
					<p><strong><u>Include default CSS?</u></strong><br />
					The default CSS is a simple CSS file that styles the elements of the new loop.  It styles the following elements: 
					#SAWE_shortcode, #SAWE_widget, #SAWE_shortcode img, #SAWE_widget img, #SAWE_shortcode p, #SAWE_widget p.</p>
					<p>#SAWE_shortcode and #SAWE_widget are the container of the new loop, while img and p are images and paragraphs.  
					It will attempt (if enabled) to apply a width of 100% to the images (thumbnails), give clearance on both sides to paragraph 
					elements (so as to separate them from thumbnails and title links), and give a 5px margin.</p>
					<p>Completely optional, and provided as a convenience.</p>
					</div>
					
					<div class=\"deactivation\">
					<p><strong><u>Delete options on deactivation?</u></strong><br />
					SAWE stores its settings in the options table of your Wordpress installation.  If this option is set to no, 
					even if you deactivate it and delete it, the options will remain (should want to reinstall for whatever reason).  
					However, should you want to completely uninstall (and delete these options from your installation database), 
					set this option to <strong>yes</strong> before you deactivate the plugin and uninstall it.</p>
					</div>
					
					</div>
					</div>
					
					
				
				
				</div>		

				
				<div class=\"SAWEsection\">
				<div class=\"options\">
				<blockquote>
				
					";
						
					if ($_REQUEST["submit"]) { 
						update_simple_announcement_with_exclusions();
					}
					print_simple_announcement_with_exclusion_form();
					
				echo "</blockquote>

				

				
				<div class=\"SAWE_information\">
				<strong>Shortcode</strong>
				<p>Use the shortcode <strong>[SAWE]</strong> on a post or a page to display the SAWE loop.</p>
				</div>
				
				<div class=\"SAWE_information\">
				<strong>Post thumbnails</strong>
				<p>";
				
				if ( (function_exists("has_post_thumbnail")) ) { 
					echo "Looks like post thumbnails were already enabled for this theme!";
				} else {
					add_theme_support( 'post-thumbnails' );
					echo "Post thumbnails has been enabled for your theme.  You may add them from your post editing screen.";
				}
				
				echo "</p></div>
				
				<div class=\"SAWE_information\">
				<strong>Changelog</strong>
				<p>You can view the official changelog for this plugin at its page on Github (located here: <a href=\"https://github.com/boyevul/sawe\">https://github.com/boyevul/sawe</a>)</p>
				</div>
				
				<div class=\"SAWE_information\">
				<strong>Thanks for using SAWE!</strong>
				<p>Hopefully you've been able to find some use out of this little plugin!</p>
				</div>
											
				
				
				<div class=\"SAWE_information\" id=\"preview\">
				PREVIEW<hr />
				";
			$SAWE_0_sc = ( get_option("simple_announcement_with_exclusion_0") );
			$SAWE_1_sc = ( get_option("simple_announcement_with_exclusion_1") );
			$SAWE_1_1_sc = ( get_option("simple_announcement_with_exclusion_1_1") );
			$SAWE_1_2_sc = ( get_option("simple_announcement_with_exclusion_1_2") );
			$SAWE_1_3_sc = ( get_option("simple_announcement_with_exclusion_1_3") );
			$SAWE_2_sc = ( get_option("simple_announcement_with_exclusion_2") );
			$SAWE_3_sc = ( get_option("simple_announcement_with_exclusion_3") );
			$SAWE_3_2_sc = ( get_option("simple_announcement_with_exclusion_3_2") );
			$SAWE_4_sc = ( get_option("simple_announcement_with_exclusion_4") );
			$SAWE_4_2_sc = ( get_option("simple_announcement_with_exclusion_4_2") );
			$SAWE_4_3_sc = ( get_option("simple_announcement_with_exclusion_4_3") );
			$SAWE_5_sc = ( get_option("simple_announcement_with_exclusion_5") );
			$SAWE_6_sc = ( get_option("simple_announcement_with_exclusion_6") );
			
			if ($SAWE_1_sc != "" && $SAWE_2_sc != "" && $SAWE_3_sc != "") {
				echo "<div class=\"";
				if ($SAWE_0_w != "") { echo "$SAWE_0_sc"; }
				echo "\" id=\"SAWE_shortcode\">";
				global $post;
				$tmp_post = $post;
				
					if ($SAWE_1_sc == "cat") {
						$args = array(
						"cat" => $SAWE_1_1_sc, 
						"numberposts" => $SAWE_2_sc, 
						"order" => $SAWE_3_2_sc, 
						"orderby" => $SAWE_3_sc
						);
					}
					elseif ($SAWE_1_sc == "tag") {
						$args = array(
						"tag_in" => $SAWE_1_2_sc,
						"numberposts" => $SAWE_2_sc, 
						"order" => $SAWE_3_2_sc, 
						"orderby" => $SAWE_3_sc 
						);
					}
					elseif ($SAWE_1_sc == "post-format") {
						$args = array(
						"numberposts" => $SAWE_2_sc, 
						"order" => $SAWE_3_2_sc, 
						"orderby" => $SAWE_3_sc,
						'tax_query' => array(
							array(
							  'taxonomy' => 'post_format',
							  'field'    => 'slug',
							  'terms'    => array( $SAWE_1_3_sc ),
							  'operator' => 'IN'
							)
						)
						);
					}
					
				$lastposts = get_posts( $args );
				foreach($lastposts as $post) : setup_postdata($post); 

				if ($SAWE_4_sc == "yes") { 
					if ( has_post_thumbnail() ) { ?>
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail( "thumbnail" ); ?></a><br />
					<?php } 			
				}
				
				if ($SAWE_4_2_sc == "yes") { ?>
					<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				<?php }
				
				if ($SAWE_4_3_sc == "excerpt") {
					the_excerpt();
				} elseif ($SAWE_4_3_sc == "content") {
					the_content();
				}				
				
				endforeach;
				
				if ($SAWE_0_sc != "") { 
					echo "</div>"; 
				} 
				
				$post = $tmp_post;
			}				
				echo "</div>
				
				</div>
				</div>
				</div>
				</div>
				
				
				
			";			
	}
	
	
	
	

// SAWE-003
// Widget / Front page exclusion
// Create the widget for placement wherever.
	class SAWEWidget extends WP_Widget {
		function SAWEWidget() {
			parent::WP_Widget( false, $name = "Simple Announcement With Exclusion" );
		}

		function widget( $args, $instance ) {
			extract( $args );
			$title = apply_filters( "widget_title", $instance["title"] );

			echo $before_widget;
		
			if ($title) {
				echo $before_title . $title . $after_title;
			}
		
			$SAWE_0_w = ( get_option("simple_announcement_with_exclusion_0") );
			
			// What kind of post type
			$SAWE_1_w = ( get_option("simple_announcement_with_exclusion_1") );
			
			// Post type selection (be it category, tag, or post format)
			$SAWE_1_1_w = ( get_option("simple_announcement_with_exclusion_1_1") );
			$SAWE_1_2_w = ( get_option("simple_announcement_with_exclusion_1_2") );
			$SAWE_1_3_w = ( get_option("simple_announcement_with_exclusion_1_3") );
			$SAWE_2_w = ( get_option("simple_announcement_with_exclusion_2") );
			$SAWE_3_w = ( get_option("simple_announcement_with_exclusion_3") );
			$SAWE_3_2_w = ( get_option("simple_announcement_with_exclusion_3_2") );
			$SAWE_4_w = ( get_option("simple_announcement_with_exclusion_4") );
			$SAWE_4_2_w = ( get_option("simple_announcement_with_exclusion_4_2") );
			$SAWE_4_3_w = ( get_option("simple_announcement_with_exclusion_4_3") );
			$SAWE_5_w = ( get_option("simple_announcement_with_exclusion_5") );
			$SAWE_6_w = ( get_option("simple_announcement_with_exclusion_6") );
			
			if ($SAWE_1_w != "" && $SAWE_2_w != "" && $SAWE_3_w != "") {
				echo "<div class=\"";
				if ($SAWE_0_w != "") { echo "$SAWE_0_w"; }
				echo "\" id=\"SAWE_widget\">";
				global $post;
				$tmp_post = $post;
				
				 
				
					if ($SAWE_1_w == "cat") {
						$args = array(
						"cat" => $SAWE_1_1_w, 
						"numberposts" => $SAWE_2_w, 
						"order" => $SAWE_3_2_w, 
						"orderby" => $SAWE_3_w 
						);
					}
					elseif ($SAWE_1_w == "tag") {
						$args = array(
						"tag_in" => $SAWE_1_2_w,
						"numberposts" => $SAWE_2_w, 
						"order" => $SAWE_3_2_w, 
						"orderby" => $SAWE_3_w 
						);
					}
					elseif ($SAWE_1_w == "post-format") {
						$args = array(
						"numberposts" => $SAWE_2_w, 
						"order" => $SAWE_3_2_w, 
						"orderby" => $SAWE_3_w,
						'tax_query' => array(
							array(
							  'taxonomy' => 'post_format',
							  'field'    => 'slug',
							  'terms'    => array( $SAWE_1_3_w ),
							  'operator' => 'IN'
							)
						)
						);
					}
				

				$lastposts = get_posts( $args );
				foreach($lastposts as $post) : setup_postdata($post); 

				if ($SAWE_4_w == "yes") { 
					if ( has_post_thumbnail() ) { ?>
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail( "thumbnail" ); ?></a><br />
					<?php } 			
				}
				
				if ($SAWE_4_2_w == "yes") { ?>
					<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				<?php }
				
				if ($SAWE_4_3_w == "excerpt") {
					the_excerpt();
				} elseif ($SAWE_4_3_w == "content") {
					the_content();
				}
				
				endforeach;
				
				if ($SAWE_0_w != "") { 
					echo "</div>"; 
				} 
				
				$post = $tmp_post;
				echo $after_widget ;
			}


			function SAWEupdate( $new_instance, $old_instance ) {
				return $new_instance;
			}
			
			function SAWEform( $instance ) {
				$title = esc_attr( $instance["title"] );
			}
		}
	}

	add_action( "widgets_init", "SAWEWidgetInit" );
		function SAWEWidgetInit() {
		register_widget( "SAWEWidget" );
	}
	
// SAWE-004
// Shortcode (for displaying wherever)
	function SAWE_shortcode() {
		if (!is_admin() ) {
			$SAWE_0_sc = ( get_option("simple_announcement_with_exclusion_0") );
			$SAWE_1_sc = ( get_option("simple_announcement_with_exclusion_1") );
			$SAWE_1_1_sc = ( get_option("simple_announcement_with_exclusion_1_1") );
			$SAWE_1_2_sc = ( get_option("simple_announcement_with_exclusion_1_2") );
			$SAWE_1_3_sc = ( get_option("simple_announcement_with_exclusion_1_3") );
			$SAWE_2_sc = ( get_option("simple_announcement_with_exclusion_2") );
			$SAWE_3_sc = ( get_option("simple_announcement_with_exclusion_3") );
			$SAWE_3_2_sc = ( get_option("simple_announcement_with_exclusion_3_2") );
			$SAWE_4_sc = ( get_option("simple_announcement_with_exclusion_4") );
			$SAWE_4_2_sc = ( get_option("simple_announcement_with_exclusion_4_2") );
			$SAWE_4_3_sc = ( get_option("simple_announcement_with_exclusion_4_3") );
			$SAWE_5_sc = ( get_option("simple_announcement_with_exclusion_5") );
			$SAWE_6_sc = ( get_option("simple_announcement_with_exclusion_6") );
			
			if ($SAWE_1_sc != "" && $SAWE_2_sc != "" && $SAWE_3_sc != "") {
				echo "<div class=\"";
				if ($SAWE_0_w != "") { echo "$SAWE_0_sc"; }
				echo "\" id=\"SAWE_shortcode\">";
				global $post;
				$tmp_post = $post;
				
					if ($SAWE_1_sc == "cat") {
						$args = array(
						"cat" => $SAWE_1_1_sc, 
						"numberposts" => $SAWE_2_sc, 
						"order" => $SAWE_3_2_sc, 
						"orderby" => $SAWE_3_sc
						);
					}
					elseif ($SAWE_1_sc == "tag") {
						$args = array(
						"tag_in" => $SAWE_1_2_sc,
						"numberposts" => $SAWE_2_sc, 
						"order" => $SAWE_3_2_sc, 
						"orderby" => $SAWE_3_sc 
						);
					}
					elseif ($SAWE_1_sc == "post-format") {
						$args = array(
						"numberposts" => $SAWE_2_sc, 
						"order" => $SAWE_3_2_sc, 
						"orderby" => $SAWE_3_sc,
						'tax_query' => array(
							array(
							  'taxonomy' => 'post_format',
							  'field'    => 'slug',
							  'terms'    => array( $SAWE_1_3_sc ),
							  'operator' => 'IN'
							)
						)
						);
					}
					
				$lastposts = get_posts( $args );
				foreach($lastposts as $post) : setup_postdata($post); 

				if ($SAWE_4_sc == "yes") { 
					if ( has_post_thumbnail() ) { ?>
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail( "thumbnail" ); ?></a><br />
					<?php } 			
				}
				
				if ($SAWE_4_2_sc == "yes") { ?>
					<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				<?php }
				
				if ($SAWE_4_3_sc == "excerpt") {
					the_excerpt();
				} elseif ($SAWE_4_3_sc == "content") {
					the_content();
				}				
				
				endforeach;
				
				if ($SAWE_0_sc != "") { 
					echo "</div>"; 
				} 
				
				$post = $tmp_post;
			}
		}
	}
	
	add_shortcode("sawe", "SAWE_shortcode");

	
	
	
	
// Hook into the loop and exclude our announcements category from showing on the front page.
// if the option to do is set.
	function SAWE_filter_home( $query ) {

		$SAWE_1_fh = ( get_option("simple_announcement_with_exclusion_1") );
		$SAWE_1_1_fh = ( get_option("simple_announcement_with_exclusion_1_1") );
		$SAWE_1_2_fh = ( get_option("simple_announcement_with_exclusion_1_2") );
		$SAWE_5_fh = ( get_option("simple_announcement_with_exclusion_5") );

		if ( $query->is_home() && $query->is_main_query() && $SAWE_5_fh == "yes" && $SAWE_1_fh == "cat") {
			$query->set( "category__not_in", $SAWE_1_1_fh );
		}
		elseif ( $query->is_home() && $query->is_main_query() && $SAWE_5_fh == "yes" && $SAWE_1_fh == "tag") {
			$query->set( "category__not_in", $SAWE_1_2_fh );
		}
	}
	
	function SAWE_exclude_formats( $query ) {
	$SAWE_1_hh = ( get_option("simple_announcement_with_exclusion_1") );
	$SAWE_1_3_hh = ( get_option("simple_announcement_with_exclusion_1_3") );
	$SAWE_5_hh = ( get_option("simple_announcement_with_exclusion_5") );
	
	if( $query->is_main_query() && $query->is_home() && $SAWE_5_hh == "yes" && $SAWE_1_hh == "post-format") {
		$tax_query = array( array(
			'taxonomy' => 'post_format',
			'field' => 'slug',
			'terms' => array( $SAWE_1_3_hh ),
			'operator' => 'NOT IN',
		) );
		$query->set( 'tax_query', $tax_query );
	}
	}
	
	
	add_action( "pre_get_posts", "SAWE_filter_home" );	
	add_action( 'pre_get_posts', 'SAWE_exclude_formats' );
	
?>