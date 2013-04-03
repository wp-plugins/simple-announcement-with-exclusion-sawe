<?php
/*
	Plugin Name: Simple Announcement With Exclusion (SAWE)
	Plugin URI: http://papercaves.com/wordpress-plugins/
	Description: Designate a category for announcements to show in a widget while excluding it from the main loop.
	Version: 2.3.3
	Author: Matthew Trevino
	Author URI: http://papercaves.com
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

	// Issue 1.0.0 - Exclusion not working (commented out in options table until it can be fixed.)
	 // FIXED.  (Also worth noting that pre_get_posts and taxonomy exclusion don't work on sticky posts.

	// Issue 1.0.1 - Everywhere excluded it from EVERYWHERE.  Designated everywhere to mean is_main_query() only.
	 // FIXED March 20th, 2013 10:09 AM
	 
	 
	 
	 
	 
// Add theme support for Post Formats
// Aside, gallery, link, image, quote, status, video, audio, chat	 
	add_theme_support( 'post-formats', array( 'aside', 'gallery','link','image','quote','status','video','audio','chat' ) );
// Add shortcode [sawe]
	add_shortcode("sawe", "SAWE_shortcode");
// Add widget
	add_action( "widgets_init", "SAWEWidgetInit" );
		function SAWEWidgetInit() {
		register_widget( "SAWEWidget" );
	}	
// Add filters for exclusion rule sets
	add_action( "pre_get_posts", "SAWE_filter_home" );	
	add_action( "pre_get_posts", "SAWE_exclude_formats" );
// Grab options
	$simple_announcement_with_exclusion_0 = get_option("simple_announcement_with_exclusion_0");
	$simple_announcement_with_exclusion_1 = get_option("simple_announcement_with_exclusion_1");
	$simple_announcement_with_exclusion_1_1 = get_option("simple_announcement_with_exclusion_1_1");
	$simple_announcement_with_exclusion_1_2 = get_option("simple_announcement_with_exclusion_1_2");
	$simple_announcement_with_exclusion_1_3 = get_option("simple_announcement_with_exclusion_1_3");
	$simple_announcement_with_exclusion_2 = get_option("simple_announcement_with_exclusion_2");
	$simple_announcement_with_exclusion_3 = get_option("simple_announcement_with_exclusion_3");
	$simple_announcement_with_exclusion_3_2 = get_option("simple_announcement_with_exclusion_3_2");
	$simple_announcement_with_exclusion_4 = get_option("simple_announcement_with_exclusion_4");
	$simple_announcement_with_exclusion_4_2 = get_option("simple_announcement_with_exclusion_4_2");
	$simple_announcement_with_exclusion_4_3 = get_option("simple_announcement_with_exclusion_4_3");
	$simple_announcement_with_exclusion_5 = get_option("simple_announcement_with_exclusion_5");
	$simple_announcement_with_exclusion_6 = get_option("simple_announcement_with_exclusion_6");
	$simple_announcement_with_exclusion_7 = get_option("simple_announcement_with_exclusion_7");
	$simple_announcement_with_exclusion_delete_on_deactivate = get_option("simple_announcement_with_exclusion_delete_on_deactivate");
	
	
	
	
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
		add_option("simple_announcement_with_exclusion_7","no","Option 7");
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
			delete_option("simple_announcement_with_exclusion_7");
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
				$_REQUEST["simple_announcement_with_exclusion_7"] ||
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
			update_option("simple_announcement_with_exclusion_7",$_REQUEST["simple_announcement_with_exclusion_7"]);
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
	
		$simple_announcement_with_exclusion_0 = get_option("simple_announcement_with_exclusion_0");
		$simple_announcement_with_exclusion_1 = get_option("simple_announcement_with_exclusion_1");
		$simple_announcement_with_exclusion_1_1 = get_option("simple_announcement_with_exclusion_1_1");
		$simple_announcement_with_exclusion_1_2 = get_option("simple_announcement_with_exclusion_1_2");
		$simple_announcement_with_exclusion_1_3 = get_option("simple_announcement_with_exclusion_1_3");
		$simple_announcement_with_exclusion_2 = get_option("simple_announcement_with_exclusion_2");
		$simple_announcement_with_exclusion_3 = get_option("simple_announcement_with_exclusion_3");
		$simple_announcement_with_exclusion_3_2 = get_option("simple_announcement_with_exclusion_3_2");
		$simple_announcement_with_exclusion_4 = get_option("simple_announcement_with_exclusion_4");
		$simple_announcement_with_exclusion_4_2 = get_option("simple_announcement_with_exclusion_4_2");
		$simple_announcement_with_exclusion_4_3 = get_option("simple_announcement_with_exclusion_4_3");
		$simple_announcement_with_exclusion_5 = get_option("simple_announcement_with_exclusion_5");
		$simple_announcement_with_exclusion_6 = get_option("simple_announcement_with_exclusion_6");
		$simple_announcement_with_exclusion_7 = get_option("simple_announcement_with_exclusion_7");
		$simple_announcement_with_exclusion_delete_on_deactivate = get_option("simple_announcement_with_exclusion_delete_on_deactivate");	
		
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
		<input type=\"text\" name=\"simple_announcement_with_exclusion_0\" value=\"",$simple_announcement_with_exclusion_0,"\" />
		</label>

		<label for=\"simple_announcement_with_exclusion_1\"><span class=\"SAWE_settings_title\">What kind of post type:</span>
		<select name=\"simple_announcement_with_exclusion_1\" id=\"chooseposttype\">
		<option value=\"\">Choose a post type</option>
		<option value=\"cat\"";if ($simple_announcement_with_exclusion_1 === "cat") { echo " selected=\"selected\""; } echo ">Category</option>
		<option value=\"tag\"";if ($simple_announcement_with_exclusion_1 === "tag") { echo " selected=\"selected\""; } echo ">Tag</option>
		<option value=\"post-format\"";if ($simple_announcement_with_exclusion_1 === "post-format") { echo " selected=\"selected\""; } echo ">Post format</option>
		</select>
		</label>";
		
		echo "<div class=\"posttypeselection\">";
		// If option value cat is selected
		echo "<label for=\"simple_announcement_with_exclusion_1_1\" class=\"cat\"><span class=\"SAWE_settings_title\">Category:</span>
		<select name=\"simple_announcement_with_exclusion_1_1\">
		<option value=\"\"></option>";
				$sawe_tags =  get_categories('taxonomy=category'); 
				foreach ($sawe_tags as $sawe_tag) {
					echo "<option value=\"",$sawe_tag->cat_ID,"\"";
					if ($sawe_tag->cat_ID === $simple_announcement_with_exclusion_1_1) { echo " selected=\"selected\""; }
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
					if ($sawe_tag->cat_ID === $simple_announcement_with_exclusion_1_2) { echo " selected=\"selected\""; }
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
		<option value=\"post-format-aside\"";if ($simple_announcement_with_exclusion_1_3 === "post-format-aside") { echo " selected=\"selected\""; } echo ">Aside</option>
		<option value=\"post-format-gallery\"";if ($simple_announcement_with_exclusion_1_3 === "post-format-gallery") { echo " selected=\"selected\""; } echo ">Gallery</option>
		<option value=\"post-format-link\"";if ($simple_announcement_with_exclusion_1_3 === "post-format-link") { echo " selected=\"selected\""; } echo ">Link</option>
		<option value=\"post-format-image\"";if ($simple_announcement_with_exclusion_1_3 === "post-format-image") { echo " selected=\"selected\""; } echo ">Image</option>
		<option value=\"post-format-quote\"";if ($simple_announcement_with_exclusion_1_3 === "post-format-quote") { echo " selected=\"selected\""; } echo ">Quote</option>
		<option value=\"post-format-status\"";if ($simple_announcement_with_exclusion_1_3 === "post-format-status") { echo " selected=\"selected\""; } echo ">Status</option>
		<option value=\"post-format-video\"";if ($simple_announcement_with_exclusion_1_3 === "post-format-video") { echo " selected=\"selected\""; } echo ">Video</option>
		<option value=\"post-format-audio\"";if ($simple_announcement_with_exclusion_1_3 === "post-format-audio") { echo " selected=\"selected\""; } echo ">Audio</option>
		<option value=\"post-format-chat\"";if ($simple_announcement_with_exclusion_1_3 === "post-format-chat") { echo " selected=\"selected\""; } echo ">Chat</option>
		</select>
		</label>
		</div>";
		
		echo "<label for=\"simple_announcement_with_exclusion_2\"><span class=\"SAWE_settings_title\">Number of posts:</span>
		<input type=\"text\" name=\"simple_announcement_with_exclusion_2\" value=\"",$simple_announcement_with_exclusion_2,"\" />
		</label>
		
		<label for=\"simple_announcement_with_exclusion_3\"><span class=\"SAWE_settings_title\">Order by:</span>
		<select name=\"simple_announcement_with_exclusion_3\">
			<option value=\"date\""; if ($simple_announcement_with_exclusion_3 === "date") { echo " selected=\"selected\""; } echo ">Date</option>
			<option value=\"title\""; if ($simple_announcement_with_exclusion_3 === "title") { echo " selected=\"selected\""; } echo ">Title</option>
			<option value=\"rand\""; if ($simple_announcement_with_exclusion_3 === "rand") { echo " selected=\"selected\""; } echo ">Random</option>
		</select>
		</label>	
		

		<label for=\"simple_announcement_with_exclusion_3_2\"><span class=\"SAWE_settings_title\">Posts order:</span>
		<select name=\"simple_announcement_with_exclusion_3_2\">
			<option value=\"ASC\""; if ($simple_announcement_with_exclusion_3_2 === "ASC") { echo " selected=\"selected\""; } echo ">Ascending</option>
			<option value=\"DESC\""; if ($simple_announcement_with_exclusion_3_2 === "DESC") { echo " selected=\"selected\""; } echo ">Descending</option>
		</select>
		</label>
		
		";
		
		// If thumbnail support isn"t enabled on the current theme, don"t bother giving the option to show thumbnails.
		if ( (function_exists("has_post_thumbnail")) ) {
			echo "
			<label for=\"simple_announcement_with_exclusion_4\"><span class=\"SAWE_settings_title\">Thumbnails?</span>
			<select name=\"simple_announcement_with_exclusion_4\">
				<option value=\"yes\""; if ($simple_announcement_with_exclusion_4 === "yes") { echo " selected=\"selected\""; } echo ">Yes</option>
				<option value=\"no\""; if ($simple_announcement_with_exclusion_4 === "no") { echo " selected=\"selected\""; } echo ">No</option>
			</select>
			</label>
			";
			}
		
		echo "
			<label for=\"simple_announcement_with_exclusion_4_2\"><span class=\"SAWE_settings_title\">Show titles?</span>
			<select name=\"simple_announcement_with_exclusion_4_2\">
				<option value=\"yes\""; if ($simple_announcement_with_exclusion_4_2 === "yes") { echo " selected=\"selected\""; } echo ">Yes</option>
				<option value=\"no\""; if ($simple_announcement_with_exclusion_4_2 === "no") { echo " selected=\"selected\""; } echo ">No</option>
			</select>
			</label>
				<label for=\"simple_announcement_with_exclusion_4_3\"><span class=\"SAWE_settings_title\">Show excerpt, content, or nothing?</span>
			<select name=\"simple_announcement_with_exclusion_4_3\">
				<option value=\"nothing\""; if ($simple_announcement_with_exclusion_4_3 === "nothing") { echo " selected=\"selected\""; } echo ">Nothing</option>
				<option value=\"excerpt\""; if ($simple_announcement_with_exclusion_4_3 === "excerpt") { echo " selected=\"selected\""; } echo ">Excerpt</option>
				<option value=\"content\""; if ($simple_announcement_with_exclusion_4_3 === "content") { echo " selected=\"selected\""; } echo ">Content</option>
			</select>
			</label>

			 <label for=\"simple_announcement_with_exclusion_5\"><span class=\"SAWE_settings_title\">Exclude posts from main loop?:</span>
			 <select name=\"simple_announcement_with_exclusion_5\">
			 	<option value=\"yes\""; if ($simple_announcement_with_exclusion_5 === "yes") { echo " selected=\"selected\""; } echo ">Yes</option>
			 	<option value=\"no\""; if ($simple_announcement_with_exclusion_5 === "no") { echo " selected=\"selected\""; } echo ">No</option>
				<option value=\"frontcat\""; if ($simple_announcement_with_exclusion_5 === "frontcat") { echo " selected=\"selected\""; } echo ">Main &amp; Category</option>
				<option value=\"fronttag\""; if ($simple_announcement_with_exclusion_5 === "fronttag") { echo " selected=\"selected\""; } echo ">Main &amp; Tag</option>
				<option value=\"everywhere\""; if ($simple_announcement_with_exclusion_5 === "everywhere") { echo " selected=\"selected\""; } echo ">Everywhere</option>
				
			 </select>
			 </label>

			<label for=\"simple_announcement_with_exclusion_6\"><span class=\"SAWE_settings_title\">Include default CSS?:</span>
			<select name=\"simple_announcement_with_exclusion_6\">
				<option value=\"yes\""; if ($simple_announcement_with_exclusion_6 === "yes") { echo " selected=\"selected\""; } echo ">Yes</option>
				<option value=\"no\""; if ($simple_announcement_with_exclusion_6 === "no") { echo " selected=\"selected\""; } echo ">No</option>
			</select>
			</label>";
			
			
			// wp-pagenavi plugin needs to be present to take advantage of pagination
			if ( (function_exists("wp_pagenavi")) ) {
				echo "<label for=\"simple_announcement_with_exclusion_7\"><span class=\"SAWE_settings_title\">Paged?:</span>
				<select name=\"simple_announcement_with_exclusion_7\">
					<option value=\"yes\""; if ($simple_announcement_with_exclusion_7 === "yes") { echo " selected=\"selected\""; } echo ">Yes</option>
					<option value=\"no\""; if ($simple_announcement_with_exclusion_7 === "no") { echo " selected=\"selected\""; } echo ">No</option>
				</select>
				</label>";
			}
			
			echo "<label for=\"simple_announcement_with_exclusion_delete_on_deactivate\"><span class=\"SAWE_settings_title\">Delete options on deactivation?:</span>
			<select name=\"simple_announcement_with_exclusion_delete_on_deactivate\">
				<option value=\"yes\""; if ($simple_announcement_with_exclusion_delete_on_deactivate === "yes") { echo " selected=\"selected\""; } echo ">Yes</option>
				<option value=\"no\""; if ($simple_announcement_with_exclusion_delete_on_deactivate === "no") { echo " selected=\"selected\""; } echo ">No</option>
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
		wp_register_style( 'SAWEStylesheet', plugins_url('style.css', __FILE__), '2.3' );
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
				<h2>Simple Announcement With Exclusion</h2>
				<p>Designate a group of posts to show in a widget while excluding it from the main loop.</p>
				<blockquote>
					Use the widget or shortcode: [SAWE] to display on a post or page.
				</blockquote>
				<blockquote>
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

					<div>
					<p><strong><u>Div class name (optional)</u></strong><br />
					This setting is an optional one.  Simply put, it will give the widget created 
					a div class name of your choosing so that you may style it yourself with your 
					theme's CSS.</p>
					</div>
					<div>
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
					<div>
					<p><strong><u>Number of posts</u></strong><br />
					Here, you may define how many posts are shown.  This number may be as high as you wish it to be, or as low 
					as you want.</p>
					</div>
					<div>
					<p><strong><u>Order by</u></strong><br />
					You may order your posts by date, title, or randomly.					
					</div>
					<div>
					<p><strong><u>Posts order</u></strong><br />
					Here, you may define <strong>how</strong> your posts are ordered - in descending order, or ascending.  Descending is 
					top to bottom, and ascending is bottom to top.  If you are planning on showing only one post at a time, top to bottom 
					is going to be your choice (ascending will only show the first post from your chosen post type).</p>
					</div>
					<div>
					<p><strong><u>Thumbnails?</u></strong><br />
					If your theme or plugins do not enable post thumbnails, SAWE enables them for you.  Here, you may choose whether or 
					not to include post thumbnails in your new loop.</p>
					</div>
					<div>
					<p><strong><u>Show titles?</u></strong><br />
					Whether or not you want clickable title links to accompany your posts.  If you choose to show nothing in the following option, 
					you may wish to have this activated.</p>
					</div>
					<div>
					<p><strong><u>Show excerpt, content, or nothing?</u></strong><br />
					Here, you may select whether you want the excerpt of the post shown, the full content of the post, or nothing at all.
					Full content is <strong>full content</strong> - links, images, and all.</p>
					</div>
					<div>
					<p><strong><u>Exclude posts from main loop?</u></strong><br />
					Whether or not you want the posts in your new loop to be excluded from your main loop (home loop only)</p>
					<p>Yes will exclude it from the main (home) loop only - no will leave them in the loop.  Main &amp; Category will 
					exclude the posts from both the main loop and category loop (useful for post types and tags).  Main &amp; Tag will 
					exclude the posts from both the main loop and the tag loop (useful for categories).  Everywhere will only show the 
					content either in single post view or through the widget (excluded from any archive, search result, or front page).</p>
					</div>
					<div>
					<p><strong><u>Include default CSS?</u></strong><br />
					The default CSS is a simple CSS file that styles the elements of the new loop.  It styles the following elements: 
					#SAWE_shortcode, #SAWE_widget, #SAWE_shortcode img, #SAWE_widget img, #SAWE_shortcode p, #SAWE_widget p.</p>
					<p>#SAWE_shortcode and #SAWE_widget are the container of the new loop, while img and p are images and paragraphs.  
					It will attempt (if enabled) to apply a width of 100% to the images (thumbnails), give clearance on both sides to paragraph 
					elements (so as to separate them from thumbnails and title links), and give a 5px margin.</p>
					<p>Completely optional, and provided as a convenience.</p>
					</div>
					<div>
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

				<div class=\"SAWE_information\" id=\"preview\">
				<h3>Preview</h3>
				";
			
	global $simple_announcement_with_exclusion_0;
	global $simple_announcement_with_exclusion_1;
	global $simple_announcement_with_exclusion_1_1;
	global $simple_announcement_with_exclusion_1_2;
	global $simple_announcement_with_exclusion_1_3;
	global $simple_announcement_with_exclusion_2;
	global $simple_announcement_with_exclusion_3;
	global $simple_announcement_with_exclusion_3_2;
	global $simple_announcement_with_exclusion_4;
	global $simple_announcement_with_exclusion_4_2;
	global $simple_announcement_with_exclusion_4_3;
	global $simple_announcement_with_exclusion_5;
	global $simple_announcement_with_exclusion_6;
	global $simple_announcement_with_exclusion_7;
	global $simple_announcement_with_exclusion_delete_on_deactivate;	
			
			if ( (function_exists("wp_pagenavi")) ) { $simple_announcement_with_exclusion_7 = ( get_option("simple_announcement_with_exclusion_7") ); } else { $simple_announcement_with_exclusion_7 = "no"; }
					if ($simple_announcement_with_exclusion_7 === "yes") {
						$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
					}
					if ($simple_announcement_with_exclusion_7 === "no") {
						$paged = '';
					}
			
			if ($simple_announcement_with_exclusion_1 != "" && $simple_announcement_with_exclusion_2 != "" && $simple_announcement_with_exclusion_3 != "") {
				echo "<div class=\"";
				if ($simple_announcement_with_exclusion_0 != "") { echo "$simple_announcement_with_exclusion_0"; }
				echo "\" id=\"SAWE_shortcode\">";

					if ($simple_announcement_with_exclusion_1 === "cat") {
						$args = array(
						"paged" => $paged,
						"cat" => $simple_announcement_with_exclusion_1_1, 
						"posts_per_page" => $simple_announcement_with_exclusion_2, 
						"order" => $simple_announcement_with_exclusion_3_2, 
						"orderby" => $simple_announcement_with_exclusion_3 
						);
					}
					elseif ($simple_announcement_with_exclusion_1 === "tag") {
						$args = array(
						"paged" => $paged,
						"tag__in" => $simple_announcement_with_exclusion_1_2,
						"posts_per_page" => $simple_announcement_with_exclusion_2, 
						"order" => $simple_announcement_with_exclusion_3_2, 
						"orderby" => $simple_announcement_with_exclusion_3 
						);
					}
					elseif ($simple_announcement_with_exclusion_1 === "post-format") {
						$args = array(
						"paged" => $paged,
						"posts_per_page" => $simple_announcement_with_exclusion_2, 
						"order" => $simple_announcement_with_exclusion_3_2, 
						"orderby" => $simple_announcement_with_exclusion_3,
						"tax_query" => array(
							array(
							  'taxonomy' => 'post_format',
							  'field'    => 'slug',
							  'terms'    => array( $simple_announcement_with_exclusion_1_3 ),
							  'operator' => 'IN'
							)
						)
						);
					}
				

				$temp = $wp_query;
				$wp_query= null;
				$wp_query = new WP_Query( $args );
				if ( $wp_query->have_posts() ):
				while ($wp_query->have_posts()) : $wp_query->the_post();
					if ($simple_announcement_with_exclusion_4 === "yes") { 
						if ( has_post_thumbnail() ) { 
							echo "<a href=\"",the_permalink(),"\" title=\"",the_title(),"\">
								",the_post_thumbnail( "thumbnail" ),"</a><br />";
						} 			
					}
					if ($simple_announcement_with_exclusion_4_2 === "yes") { 
							echo "<a class=\"SAWE_shortcode_title\" href=\"",the_permalink(),"\">",the_title(),"</a>";
					}
					if ($simple_announcement_with_exclusion_4_3 === "excerpt") { the_excerpt(); 
					} elseif ($simple_announcement_with_exclusion_4_3 === "content") { the_content(); }
				endwhile;
				endif;
				$wp_query = null;
				$wp_query = $temp;
				wp_reset_query();				
				
				if ($simple_announcement_with_exclusion_0 != "") { 
					echo "</div>"; 
				} 
				

			}				
				echo "</div>
				
				</div>
				</div>
				</div>
				</blockquote>
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
		
	global $simple_announcement_with_exclusion_0;
	global $simple_announcement_with_exclusion_1;
	global $simple_announcement_with_exclusion_1_1;
	global $simple_announcement_with_exclusion_1_2;
	global $simple_announcement_with_exclusion_1_3;
	global $simple_announcement_with_exclusion_2;
	global $simple_announcement_with_exclusion_3;
	global $simple_announcement_with_exclusion_3_2;
	global $simple_announcement_with_exclusion_4;
	global $simple_announcement_with_exclusion_4_2;
	global $simple_announcement_with_exclusion_4_3;
	global $simple_announcement_with_exclusion_5;
	global $simple_announcement_with_exclusion_6;
	global $simple_announcement_with_exclusion_7;
	global $simple_announcement_with_exclusion_delete_on_deactivate;				
			// Post pagination (needs wp-pagenavi wordpress plugin)
			if ( (function_exists("wp_pagenavi")) ) { $simple_announcement_with_exclusion_7 = ( get_option("simple_announcement_with_exclusion_7") ); } else { $simple_announcement_with_exclusion_7 = "no"; }
					if ($simple_announcement_with_exclusion_7 === "yes") {
						$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
					}
					if ($simple_announcement_with_exclusion_7 === "no") {
						$paged = '';
					}
					
			if ($simple_announcement_with_exclusion_1 != "" && $simple_announcement_with_exclusion_2 != "" && $simple_announcement_with_exclusion_3 != "") {
				echo "<div class=\"";
				if ($simple_announcement_with_exclusion_0 != "") { echo "$simple_announcement_with_exclusion_0"; }
				echo "\" id=\"SAWE_widget\">";
				
					if ($simple_announcement_with_exclusion_1 === "cat") {
						$args = array(
						"paged" => $paged,
						"cat" => $simple_announcement_with_exclusion_1_1, 
						"posts_per_page" => $simple_announcement_with_exclusion_2, 
						"order" => $simple_announcement_with_exclusion_3_2, 
						"orderby" => $simple_announcement_with_exclusion_3 
						);
					}
					elseif ($simple_announcement_with_exclusion_1 === "tag") {
						$args = array(
						"paged" => $paged,
						"tag__in" => $simple_announcement_with_exclusion_1_2,
						"posts_per_page" => $simple_announcement_with_exclusion_2, 
						"order" => $simple_announcement_with_exclusion_3_2, 
						"orderby" => $simple_announcement_with_exclusion_3 
						);
					}
					elseif ($simple_announcement_with_exclusion_1 === "post-format") {
						$args = array(
						"paged" => $paged,
						"posts_per_page" => $simple_announcement_with_exclusion_2, 
						"order" => $simple_announcement_with_exclusion_3_2, 
						"orderby" => $simple_announcement_with_exclusion_3,
						"tax_query" => array(
							array(
							  'taxonomy' => 'post_format',
							  'field'    => 'slug',
							  'terms'    => array( $simple_announcement_with_exclusion_1_3 ),
							  'operator' => 'IN'
							)
						)
						);
					}
				// The widget loop
				$temp = $wp_query;
				$wp_query= null;
				$wp_query = new WP_Query( $args );
				if ( $wp_query->have_posts() ):
				while ($wp_query->have_posts()) : $wp_query->the_post();
					if ($simple_announcement_with_exclusion_4 === "yes") { 
						if ( has_post_thumbnail() ) { 
							echo "<a href=\"",the_permalink(),"\" title=\"",the_title(),"\">
								",the_post_thumbnail( "thumbnail" ),"</a><br />";
						} 			
					}
					if ($simple_announcement_with_exclusion_4_2 === "yes") { 
							echo "<a class=\"SAWE_shortcode_title\" href=\"",the_permalink(),"\">",the_title(),"</a>";
					}
					if ($simple_announcement_with_exclusion_4_3 === "excerpt") { the_excerpt(); 
					} elseif ($simple_announcement_with_exclusion_4_3 === "content") { the_content(); }
				endwhile;
				if ($simple_announcement_with_exclusion_7 === "yes") { 
					if ( (function_exists("wp_pagenavi")) ) {
						echo "<div class=\"SAWE_post_navigation\">";
						wp_pagenavi(array( 'query' => $wp_query ) );
						echo "</div>";
					}
				}
				endif;
				$wp_query = null;
				$wp_query = $temp;
				wp_reset_query();
				if ($simple_announcement_with_exclusion_0 != "") { echo "</div>"; } 
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


	
// SAWE-004
// Shortcode (for displaying wherever)
	function SAWE_shortcode() {
		if (!is_admin() ) {
	global $simple_announcement_with_exclusion_0;
	global $simple_announcement_with_exclusion_1;
	global $simple_announcement_with_exclusion_1_1;
	global $simple_announcement_with_exclusion_1_2;
	global $simple_announcement_with_exclusion_1_3;
	global $simple_announcement_with_exclusion_2;
	global $simple_announcement_with_exclusion_3;
	global $simple_announcement_with_exclusion_3_2;
	global $simple_announcement_with_exclusion_4;
	global $simple_announcement_with_exclusion_4_2;
	global $simple_announcement_with_exclusion_4_3;
	global $simple_announcement_with_exclusion_5;
	global $simple_announcement_with_exclusion_6;
	global $simple_announcement_with_exclusion_7;
	global $simple_announcement_with_exclusion_delete_on_deactivate;				
			// Post pagination (needs wp-pagenavi wordpress plugin)
			if ( (function_exists("wp_pagenavi")) ) { $simple_announcement_with_exclusion_7 = ( get_option("simple_announcement_with_exclusion_7") ); } else { $simple_announcement_with_exclusion_7 = "no"; }
					if ($simple_announcement_with_exclusion_7 === "yes") {
						$paged = (get_query_var('page')) ? get_query_var('page') : 1;
					}
					if ($simple_announcement_with_exclusion_7 === "no") {
						$paged = '';
					}
			if ($simple_announcement_with_exclusion_1 != "" && $simple_announcement_with_exclusion_2 != "" && $simple_announcement_with_exclusion_3 != "") {
				echo "<div class=\"";
				if ($simple_announcement_with_exclusion_0 != "") { echo "$simple_announcement_with_exclusion_0"; }
				echo "\" id=\"SAWE_shortcode\">";
				
					if ($simple_announcement_with_exclusion_1 === "cat") {
						$args = array(
						"paged" => $paged,
						"cat" => $simple_announcement_with_exclusion_1_1, 
						"posts_per_page" => $simple_announcement_with_exclusion_2, 
						"order" => $simple_announcement_with_exclusion_3_2, 
						"orderby" => $simple_announcement_with_exclusion_3 
						);
					}
					elseif ($simple_announcement_with_exclusion_1 === "tag") {
						$args = array(
						"paged" => $paged,
						"tag__in" => $simple_announcement_with_exclusion_1_2,
						"posts_per_page" => $simple_announcement_with_exclusion_2, 
						"order" => $simple_announcement_with_exclusion_3_2, 
						"orderby" => $simple_announcement_with_exclusion_3 
						);
					}
					elseif ($simple_announcement_with_exclusion_1 === "post-format") {
						$args = array(
						"paged" => $paged,
						"posts_per_page" => $simple_announcement_with_exclusion_2, 
						"order" => $simple_announcement_with_exclusion_3_2, 
						"orderby" => $simple_announcement_with_exclusion_3,
						"tax_query" => array(
							array(
							  'taxonomy' => 'post_format',
							  'field'    => 'slug',
							  'terms'    => array( $simple_announcement_with_exclusion_1_3 ),
							  'operator' => 'IN'
							)
						)
						);
					}
				// The shortcode loop
				$temp = $wp_query;
				$wp_query= null;
				$wp_query = new WP_Query( $args );
				if ( $wp_query->have_posts() ):
				while ($wp_query->have_posts()) : $wp_query->the_post();
					if ($simple_announcement_with_exclusion_4 === "yes") { 
						if ( has_post_thumbnail() ) { 
							echo "<a href=\"",the_permalink(),"\" title=\"",the_title(),"\">
								",the_post_thumbnail( "thumbnail" ),"</a><br />";
						} 			
					}
					if ($simple_announcement_with_exclusion_4_2 === "yes") { 
							echo "<a class=\"SAWE_shortcode_title\" href=\"",the_permalink(),"\">",the_title(),"</a>";
					}
					if ($simple_announcement_with_exclusion_4_3 === "excerpt") { the_excerpt(); 
					} elseif ($simple_announcement_with_exclusion_4_3 === "content") { the_content(); }
				endwhile;
				if ($simple_announcement_with_exclusion_7 === "yes") { 
					if ( (function_exists("wp_pagenavi")) ) {
						echo "<div class=\"SAWE_post_navigation\">";
						wp_pagenavi(array( 'query' => $wp_query ) );
						echo "</div>";
					}
				}
				endif;
				$wp_query = null;
				$wp_query = $temp;
				wp_reset_query();
				if ($simple_announcement_with_exclusion_0 != "") { echo "</div>"; } 
			}
			
		}
	}
	


	
	
	
	
// Hook into the loop and exclude our announcements category from showing on the front page.
// if the option to do is set.
	function SAWE_filter_home( $query ) {

	global $simple_announcement_with_exclusion_0;
	global $simple_announcement_with_exclusion_1;
	global $simple_announcement_with_exclusion_1_1;
	global $simple_announcement_with_exclusion_1_2;
	global $simple_announcement_with_exclusion_1_3;
	global $simple_announcement_with_exclusion_2;
	global $simple_announcement_with_exclusion_3;
	global $simple_announcement_with_exclusion_3_2;
	global $simple_announcement_with_exclusion_4;
	global $simple_announcement_with_exclusion_4_2;
	global $simple_announcement_with_exclusion_4_3;
	global $simple_announcement_with_exclusion_5;
	global $simple_announcement_with_exclusion_6;
	global $simple_announcement_with_exclusion_7;
	global $simple_announcement_with_exclusion_delete_on_deactivate;	
		if ( $simple_announcement_with_exclusion_5 === "yes" ) {
		if ( $query->is_home() && $query->is_main_query() && $simple_announcement_with_exclusion_1 === "cat") {
			$query->set( "category__not_in", $simple_announcement_with_exclusion_1_1 );
		}
		
		if ( $query->is_home() && $query->is_main_query() && $simple_announcement_with_exclusion_1 === "tag") {
			$query->set( "tag__not_in", array($simple_announcement_with_exclusion_1_2) );
		}
		}
		
		if ( $simple_announcement_with_exclusion_5 === "frontcat" ) {
		if ( $query->is_home && $simple_announcement_with_exclusion_1 === "cat" || $query->is_category && $simple_announcement_with_exclusion_1 === "cat") {
			$query->set( "category__not_in", $simple_announcement_with_exclusion_1_1 );
		}
		if ( $query->is_home && $simple_announcement_with_exclusion_1 === "tag" || $query->is_category && $simple_announcement_with_exclusion_1 === "tag") {
			$query->set( "tag__not_in", array($simple_announcement_with_exclusion_1_2) );
		}
		}

		if ( $simple_announcement_with_exclusion_5 === "fronttag" ) {
		if ( $query->is_home && $simple_announcement_with_exclusion_1 === "cat" || $query->is_tag && $simple_announcement_with_exclusion_1 === "cat") {
			$query->set( "category__not_in", $simple_announcement_with_exclusion_1_1 );
		}
		if ( $query->is_home && $simple_announcement_with_exclusion_1 === "tag" || $query->is_tag && $simple_announcement_with_exclusion_1 === "tag") {
			$query->set( "tag__not_in", array($simple_announcement_with_exclusion_1_2) );
		}
		}		

		if ( $simple_announcement_with_exclusion_5 === "everywhere" ) {
		if ( $query->is_home && $simple_announcement_with_exclusion_1 === "cat" || $query->is_archive && $query->is_main_query() && $simple_announcement_with_exclusion_1 === "cat" || $query->is_search  && $query->is_main_query() && $simple_announcement_with_exclusion_1 === "cat") {
			$query->set( "category__not_in", $simple_announcement_with_exclusion_1_1 );
		}
		if ( $query->is_home && $simple_announcement_with_exclusion_1 === "tag" || $query->is_archive && $query->is_main_query() && $simple_announcement_with_exclusion_1 === "tag" || $query->is_search  && $query->is_main_query() && $simple_announcement_with_exclusion_1 === "tag") {
			$query->set( "tag__not_in", array($simple_announcement_with_exclusion_1_2) );
		}
		}				
	
	}
	
	function SAWE_exclude_formats( $query ) {
	global $simple_announcement_with_exclusion_0;
	global $simple_announcement_with_exclusion_1;
	global $simple_announcement_with_exclusion_1_1;
	global $simple_announcement_with_exclusion_1_2;
	global $simple_announcement_with_exclusion_1_3;
	global $simple_announcement_with_exclusion_2;
	global $simple_announcement_with_exclusion_3;
	global $simple_announcement_with_exclusion_3_2;
	global $simple_announcement_with_exclusion_4;
	global $simple_announcement_with_exclusion_4_2;
	global $simple_announcement_with_exclusion_4_3;
	global $simple_announcement_with_exclusion_5;
	global $simple_announcement_with_exclusion_6;
	global $simple_announcement_with_exclusion_7;
	global $simple_announcement_with_exclusion_delete_on_deactivate;		
	if( $query->is_main_query() && $query->is_home() && $simple_announcement_with_exclusion_5 === "yes" && $simple_announcement_with_exclusion_1 === "post-format") {
		$tax_query = array( array(
			'taxonomy' => 'post_format',
			'field' => 'slug',
			'terms' => array( $simple_announcement_with_exclusion_1_3 ),
			'operator' => 'NOT IN',
		) );
		$query->set( 'tax_query', $tax_query );
	}

	if( $query->is_main_query() && $query->is_home() && $simple_announcement_with_exclusion_5 === "fronttag" && $simple_announcement_with_exclusion_1 === "post-format" ||  $query->is_tag() && $simple_announcement_with_exclusion_5 === "fronttag" && $simple_announcement_with_exclusion_1 === "post-format") {
		$tax_query = array( array(
			'taxonomy' => 'post_format',
			'field' => 'slug',
			'terms' => array( $simple_announcement_with_exclusion_1_3 ),
			'operator' => 'NOT IN',
		) );
		$query->set( 'tax_query', $tax_query );
	}	
	
	if( $query->is_main_query() && $query->is_home() && $simple_announcement_with_exclusion_5 === "frontcat" && $simple_announcement_with_exclusion_1 === "post-format" ||  $query->is_category() && $simple_announcement_with_exclusion_5 === "frontcat" && $simple_announcement_with_exclusion_1 === "post-format") {
		$tax_query = array( array(
			'taxonomy' => 'post_format',
			'field' => 'slug',
			'terms' => array( $simple_announcement_with_exclusion_1_3 ),
			'operator' => 'NOT IN',
		) );
		$query->set( 'tax_query', $tax_query );
	}	
	
	if( $query->is_main_query() && $query->is_home() && $simple_announcement_with_exclusion_5 === "everywhere" && $simple_announcement_with_exclusion_1 === "post-format" ||  $query->is_archive() && $query->is_main_query() && $simple_announcement_with_exclusion_5 === "everywhere" && $simple_announcement_with_exclusion_1 === "post-format" ||  $query->is_search() && $query->is_main_query() && $simple_announcement_with_exclusion_5 === "everywhere" && $simple_announcement_with_exclusion_1 === "post-format") {
		$tax_query = array( array(
			'taxonomy' => 'post_format',
			'field' => 'slug',
			'terms' => array( $simple_announcement_with_exclusion_1_3 ),
			'operator' => 'NOT IN',
		) );
		$query->set( 'tax_query', $tax_query );
	}
	
	}
	
?>