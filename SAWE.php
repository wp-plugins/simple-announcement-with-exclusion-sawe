<?php
/*
	Plugin Name: Simple Announcement With Exclusion (SAWE)
	Plugin URI: http://papercaves.com/wordpress-plugins/sawe/
	Description: Designate a category for announcements to show in a shortcode while excluding it from the main loop.
	Version: 4.2
	Author: Matthew Trevino
	Author URI: http://papercaves.com
	License: A "Slug" license name e.g. GPL2
	------------------------------------------------------------------------
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
	------------------------------------------------------------------------
	Contents -
		Initialize plugin, register hooks and add actions
		SAWE-000 Enqueue necessary files for this plugin to function, install the plugin properly
				Delete information when plugin is deactivated (and the option to delete is set properly)
		SAWE-001 Options settings validation
		SAWE-002 Options page creation / page content
		SAWE-003 Shortcode (for displaying wherever)
	------------------------------------------------------------------------*/
// 	Initialize plugin, register hooks and add actions
	register_activation_hook( __FILE__, "simple_announcement_with_exclusion_install" );
	register_activation_hook( __FILE__, "simple_announcement_with_exclusion_table" );
	register_deactivation_hook( __FILE__, "simple_announcement_with_exclusion_uninstall" );
	add_theme_support( 'post-formats', array( 'aside', 'gallery','link','image','quote','status','video','audio','chat' ) );
	add_shortcode("sawe", "SAWE_shortcode");
	add_action( "pre_get_posts", "SAWE_filter_home" );	
	add_action( "pre_get_posts", "SAWE_exclude_formats" );
	add_action("admin_menu", "simple_announcement_with_exclusion_add_options_page");
	function simple_announcement_with_exclusion_settings_link($links) { 
	  $settings_link = '<a href="options-general.php?page=simple_announcement_with_exclusion">Settings</a>'; 
	  array_unshift($links, $settings_link); 
	  return $links; 
	}
	$simple_announcement_with_exclusion_plugin = plugin_basename(__FILE__); 
	add_filter("plugin_action_links_$simple_announcement_with_exclusion_plugin", 'simple_announcement_with_exclusion_settings_link' );
	function SAWE_style() {
		wp_register_style( 'SAWEStylesheet', plugins_url('style.css', __FILE__), '2.5' );
		wp_enqueue_style( 'SAWEStylesheet' );
	}
	if (!is_admin() && get_option("simple_announcement_with_exclusion_6") === "yes") {
		wp_register_style( 'SAWEDefaultStylesheet', plugins_url('default.css', __FILE__), '1.4' );
		wp_enqueue_style( 'SAWEDefaultStylesheet' );
	}
	function simple_announcement_with_exclusion_add_options_page() {
		$SAWE_options = add_options_page("SAWE", "SAWE", "manage_options", "simple_announcement_with_exclusion", "simple_announcement_with_exclusions_page_content");
		add_action( $SAWE_options, 'SAWE_style' );
	}	
	global $wp_rewrite;
	if ($wp_rewrite->permalink_structure == '') { $permalinks = "default"; } else { $permalinks = "pretty"; }
	function simple_announcement_with_exclusion_table() {
	
	// Create table for separate [sawe] loops to be shown via [sawe id='#']
		global $wpdb;
		$SAWE_db_version = '1';
		
		$SAWE_table_name = $wpdb->prefix . "SAWE_config";
		
			$SAWE_sql = "CREATE TABLE $SAWE_table_name (
			saweID INT( 11 ) NOT NULL PRIMARY KEY AUTO_INCREMENT , 
			saweDIV TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
			saweTYPE TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
			saweCAT TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
			saweTAG TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
			saweFORMAT TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
			saweAMOUNT TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
			saweBY TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
			saweORDER TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
			saweTHUMBS TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
			saweTITLES TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
			saweSHOW TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
			sawePAGED TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
			sawePREVIOUS TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
			saweNEXT TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
			);";
		
		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
		dbDelta( $SAWE_sql );
		add_option( "SAWE_db_version", $SAWE_db_version );
		
	}	
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
	$simple_announcement_with_exclusion_8_1 = get_option("simple_announcement_with_exclusion_8_1");
	$simple_announcement_with_exclusion_8_2 = get_option("simple_announcement_with_exclusion_8_2");
	$simple_announcement_with_exclusion_delete_on_deactivate = get_option("simple_announcement_with_exclusion_delete_on_deactivate");
// ------------------------------------------------------------------------	
// SAWE-000
// Registering and installaing relevant plugin information to the database.
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
		add_option("simple_announcement_with_exclusion_8_1","Previous","Option 8.1");
		add_option("simple_announcement_with_exclusion_8_2","Next","Option 8.2");
		add_option("simple_announcement_with_exclusion_delete_on_deactivate","no","Delete on deactivate?");
	}
// ------------------------------------------------------------------------
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
			delete_option("simple_announcement_with_exclusion_8_1");
			delete_option("simple_announcement_with_exclusion_8_2");
			delete_option("simple_announcement_with_exclusion_delete_on_deactivate");
			global $wpdb;
			$SAWE_table_name = $wpdb->prefix . "SAWE_config";
			$wpdb->query("TRUNCATE TABLE $SAWE_table_name");
			$wpdb->query("DROP TABLE $SAWE_table_name");
		}
	}
// ------------------------------------------------------------------------
// SAWE-001
// Options settings vlidation
// Take the values passed from the options page and insert them into the database for saving.
	function update_simple_announcement_with_exclusions() {
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
		global $simple_announcement_with_exclusion_8_1;
		global $simple_announcement_with_exclusion_8_2;
		global $simple_announcement_with_exclusion_delete_on_deactivate;	
		// Only update if request isn't empty and request isn't the same as it was before
		if(isset($_POST['submit'])){
			if ($_REQUEST["simple_announcement_with_exclusion_0"] != "" && $_REQUEST["simple_announcement_with_exclusion_0"] != "$simple_announcement_with_exclusion_0") { update_option("simple_announcement_with_exclusion_0",$_REQUEST["simple_announcement_with_exclusion_0"]); }
			if ($_REQUEST["simple_announcement_with_exclusion_1"] != "" && $_REQUEST["simple_announcement_with_exclusion_1"] != "$simple_announcement_with_exclusion_1") { update_option("simple_announcement_with_exclusion_1",$_REQUEST["simple_announcement_with_exclusion_1"]); }
			if ($_REQUEST["simple_announcement_with_exclusion_1_1"] != "" && $_REQUEST["simple_announcement_with_exclusion_1_1"] != "$simple_announcement_with_exclusion_1_1") { update_option("simple_announcement_with_exclusion_1_1",$_REQUEST["simple_announcement_with_exclusion_1_1"]); }
			if ($_REQUEST["simple_announcement_with_exclusion_1_2"] != "" && $_REQUEST["simple_announcement_with_exclusion_1_2"] != "$simple_announcement_with_exclusion_1_2") { update_option("simple_announcement_with_exclusion_1_2",$_REQUEST["simple_announcement_with_exclusion_1_2"]); }
			if ($_REQUEST["simple_announcement_with_exclusion_1_3"] != "" && $_REQUEST["simple_announcement_with_exclusion_1_3"] != "$simple_announcement_with_exclusion_1_3") { update_option("simple_announcement_with_exclusion_1_3",$_REQUEST["simple_announcement_with_exclusion_1_3"]); }
			if ($_REQUEST["simple_announcement_with_exclusion_2"] != "" && $_REQUEST["simple_announcement_with_exclusion_2"] != "$simple_announcement_with_exclusion_2") { update_option("simple_announcement_with_exclusion_2",$_REQUEST["simple_announcement_with_exclusion_2"]); }
			if ($_REQUEST["simple_announcement_with_exclusion_3"] != "" && $_REQUEST["simple_announcement_with_exclusion_3"] != "$simple_announcement_with_exclusion_3") { update_option("simple_announcement_with_exclusion_3",$_REQUEST["simple_announcement_with_exclusion_3"]); }
			if ($_REQUEST["simple_announcement_with_exclusion_3_2"] != "" && $_REQUEST["simple_announcement_with_exclusion_3_2"] != "$simple_announcement_with_exclusion_3_2") { update_option("simple_announcement_with_exclusion_3_2",$_REQUEST["simple_announcement_with_exclusion_3_2"]); }
			if ($_REQUEST["simple_announcement_with_exclusion_4"] != "" && $_REQUEST["simple_announcement_with_exclusion_4"] != "$simple_announcement_with_exclusion_4") { update_option("simple_announcement_with_exclusion_4",$_REQUEST["simple_announcement_with_exclusion_4"]); }
			if ($_REQUEST["simple_announcement_with_exclusion_4_2"] != "" && $_REQUEST["simple_announcement_with_exclusion_4_2"] != "$simple_announcement_with_exclusion_4_2") { update_option("simple_announcement_with_exclusion_4_2",$_REQUEST["simple_announcement_with_exclusion_4_2"]); }
			if ($_REQUEST["simple_announcement_with_exclusion_4_3"] != "" && $_REQUEST["simple_announcement_with_exclusion_4_3"] != "$simple_announcement_with_exclusion_4_3") { update_option("simple_announcement_with_exclusion_4_3",$_REQUEST["simple_announcement_with_exclusion_4_3"]); }
			if ($_REQUEST["simple_announcement_with_exclusion_5"] != "" && $_REQUEST["simple_announcement_with_exclusion_5"] != "$simple_announcement_with_exclusion_5") { update_option("simple_announcement_with_exclusion_5",$_REQUEST["simple_announcement_with_exclusion_5"]); }
			if ($_REQUEST["simple_announcement_with_exclusion_6"] != "" && $_REQUEST["simple_announcement_with_exclusion_6"] != "$simple_announcement_with_exclusion_6") { update_option("simple_announcement_with_exclusion_6",$_REQUEST["simple_announcement_with_exclusion_6"]); }
			if ($_REQUEST["simple_announcement_with_exclusion_7"] != "" && $_REQUEST["simple_announcement_with_exclusion_7"] != "$simple_announcement_with_exclusion_7") { update_option("simple_announcement_with_exclusion_7",$_REQUEST["simple_announcement_with_exclusion_7"]); }
			if ($_REQUEST["simple_announcement_with_exclusion_8_1"] != "" && $_REQUEST["simple_announcement_with_exclusion_8_1"] != "$simple_announcement_with_exclusion_8_1") { update_option("simple_announcement_with_exclusion_8_1",$_REQUEST["simple_announcement_with_exclusion_8_1"]); }
			if ($_REQUEST["simple_announcement_with_exclusion_8_2"] != "" && $_REQUEST["simple_announcement_with_exclusion_8_2"] != "$simple_announcement_with_exclusion_8_2") { update_option("simple_announcement_with_exclusion_8_2",$_REQUEST["simple_announcement_with_exclusion_8_2"]); }
			if ($_REQUEST["simple_announcement_with_exclusion_delete_on_deactivate"] != "" && $_REQUEST["simple_announcement_with_exclusion_0"] != "$simple_announcement_with_exclusion_delete_on_deactivate") { update_option("simple_announcement_with_exclusion_delete_on_deactivate",$_REQUEST["simple_announcement_with_exclusion_delete_on_deactivate"]); }
		}
	}
// ------------------------------------------------------------------------
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
		$simple_announcement_with_exclusion_8_1 = get_option("simple_announcement_with_exclusion_8_1");
		$simple_announcement_with_exclusion_8_2 = get_option("simple_announcement_with_exclusion_8_2");
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
		jQuery('#chooseposttype_new').bind('change', function () {
				var elements = jQuery('div.posttypeselection_new').children().hide(); // hide all the elements
				var value = jQuery(this).val();
		
				if (value.length) { // if somethings' selected
					elements.filter('.' + value).show(); // show the ones we want
				}
			}).trigger('change'); // Setup the initial states
		});		
		</script>
		<form method=\"post\">
		<label>Shortcode Config &mdash; [sawe]</label>
		<label for=\"simple_announcement_with_exclusion_0\">Div
		<input type=\"text\" name=\"simple_announcement_with_exclusion_0\" value=\"",$simple_announcement_with_exclusion_0,"\" />
		</label>
		<label for=\"simple_announcement_with_exclusion_1\">Type
		<select name=\"simple_announcement_with_exclusion_1\" id=\"chooseposttype\">
		<option value=\"cat\"";if ($simple_announcement_with_exclusion_1 === "cat") { echo " selected=\"selected\""; } echo ">Category</option>
		<option value=\"tag\"";if ($simple_announcement_with_exclusion_1 === "tag") { echo " selected=\"selected\""; } echo ">Tag</option>
		<option value=\"post-format\"";if ($simple_announcement_with_exclusion_1 === "post-format") { echo " selected=\"selected\""; } echo ">Post format</option>
		</select>
		</label>
		<div class=\"posttypeselection\">
		<label for=\"simple_announcement_with_exclusion_1_1\" class=\"cat\">
		<select name=\"simple_announcement_with_exclusion_1_1\">";
				$sawe_tags =  get_categories('taxonomy=category'); 
				foreach ($sawe_tags as $sawe_tag) {
					echo "<option value=\"",$sawe_tag->cat_ID,"\"";
					if ($sawe_tag->cat_ID === $simple_announcement_with_exclusion_1_1) { echo " selected=\"selected\""; }
					echo ">",$sawe_tag->cat_name," - ",$sawe_tag->category_count,"</option>";
				}
		echo "</select>
		</label>
		</div>
		<div class=\"posttypeselection\">
		<label for=\"simple_announcement_with_exclusion_1_2\" class=\"tag\">
		<select name=\"simple_announcement_with_exclusion_1_2\">";
				$sawe_tags =  get_categories('taxonomy=post_tag'); 
				foreach ($sawe_tags as $sawe_tag) {
					echo "<option value=\"",$sawe_tag->cat_ID,"\"";
					if ($sawe_tag->cat_ID === $simple_announcement_with_exclusion_1_2) { echo " selected=\"selected\""; }
					echo ">",$sawe_tag->cat_name," - ",$sawe_tag->category_count,"</option>";
				}
		echo "
		</select>
		</label>
		</div>
		<div class=\"posttypeselection\">
		<label for=\"simple_announcement_with_exclusion_1_3\" class=\"post-format\">
		<select name=\"simple_announcement_with_exclusion_1_3\">
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
		</div>
		<label for=\"simple_announcement_with_exclusion_2\">Amount
		<input type=\"text\" name=\"simple_announcement_with_exclusion_2\" value=\"",$simple_announcement_with_exclusion_2,"\" />
		</label>
		<label for=\"simple_announcement_with_exclusion_3\">By
		<select name=\"simple_announcement_with_exclusion_3\">
			<option value=\"date\""; if ($simple_announcement_with_exclusion_3 === "date") { echo " selected=\"selected\""; } echo ">Date</option>
			<option value=\"title\""; if ($simple_announcement_with_exclusion_3 === "title") { echo " selected=\"selected\""; } echo ">Title</option>
			<option value=\"rand\""; if ($simple_announcement_with_exclusion_3 === "rand") { echo " selected=\"selected\""; } echo ">Random</option>
		</select>
		</label>	
		<label for=\"simple_announcement_with_exclusion_3_2\">Order
		<select name=\"simple_announcement_with_exclusion_3_2\">
			<option value=\"ASC\""; if ($simple_announcement_with_exclusion_3_2 === "ASC") { echo " selected=\"selected\""; } echo ">Ascending</option>
			<option value=\"DESC\""; if ($simple_announcement_with_exclusion_3_2 === "DESC") { echo " selected=\"selected\""; } echo ">Descending</option>
		</select>
		</label>
		<label for=\"simple_announcement_with_exclusion_4\">Thumbs
		<select name=\"simple_announcement_with_exclusion_4\">
			<option value=\"yes\""; if ($simple_announcement_with_exclusion_4 === "yes") { echo " selected=\"selected\""; } echo ">Yes</option>
			<option value=\"no\""; if ($simple_announcement_with_exclusion_4 === "no") { echo " selected=\"selected\""; } echo ">No</option>
		</select>
		</label>
		<label for=\"simple_announcement_with_exclusion_4_2\">Titles
		<select name=\"simple_announcement_with_exclusion_4_2\">
			<option value=\"yes\""; if ($simple_announcement_with_exclusion_4_2 === "yes") { echo " selected=\"selected\""; } echo ">Yes</option>
			<option value=\"no\""; if ($simple_announcement_with_exclusion_4_2 === "no") { echo " selected=\"selected\""; } echo ">No</option>
		</select>
		</label>
			<label for=\"simple_announcement_with_exclusion_4_3\">Show
		<select name=\"simple_announcement_with_exclusion_4_3\">
			<option value=\"nothing\""; if ($simple_announcement_with_exclusion_4_3 === "nothing") { echo " selected=\"selected\""; } echo ">Nothing</option>
			<option value=\"excerpt\""; if ($simple_announcement_with_exclusion_4_3 === "excerpt") { echo " selected=\"selected\""; } echo ">Excerpt</option>
			<option value=\"content\""; if ($simple_announcement_with_exclusion_4_3 === "content") { echo " selected=\"selected\""; } echo ">Content</option>
		</select>
		</label>
		 <label for=\"simple_announcement_with_exclusion_5\">Exclude
		 <select name=\"simple_announcement_with_exclusion_5\">
		 	<option value=\"yes\""; if ($simple_announcement_with_exclusion_5 === "yes") { echo " selected=\"selected\""; } echo ">Yes</option>
		 	<option value=\"no\""; if ($simple_announcement_with_exclusion_5 === "no") { echo " selected=\"selected\""; } echo ">No</option>
			<option value=\"frontcat\""; if ($simple_announcement_with_exclusion_5 === "frontcat") { echo " selected=\"selected\""; } echo ">Main &amp; Category</option>
			<option value=\"fronttag\""; if ($simple_announcement_with_exclusion_5 === "fronttag") { echo " selected=\"selected\""; } echo ">Main &amp; Tag</option>
			<option value=\"everywhere\""; if ($simple_announcement_with_exclusion_5 === "everywhere") { echo " selected=\"selected\""; } echo ">Everywhere</option>
		 </select>
		 </label>
		<label for=\"simple_announcement_with_exclusion_6\">CSS
		<select name=\"simple_announcement_with_exclusion_6\">
			<option value=\"yes\""; if ($simple_announcement_with_exclusion_6 === "yes") { echo " selected=\"selected\""; } echo ">Yes</option>
			<option value=\"no\""; if ($simple_announcement_with_exclusion_6 === "no") { echo " selected=\"selected\""; } echo ">No</option>
		</select>
		</label>
		<label for=\"simple_announcement_with_exclusion_7\">Paged
			<select name=\"simple_announcement_with_exclusion_7\">
				<option value=\"yes\""; if ($simple_announcement_with_exclusion_7 === "yes") { echo " selected=\"selected\""; } echo ">Yes</option>
				<option value=\"no\""; if ($simple_announcement_with_exclusion_7 === "no") { echo " selected=\"selected\""; } echo ">No</option>
			</select>
		</label>
		<label for=\"simple_announcement_with_exclusion_8_1\">Previous
			<input type=\"text\" name=\"simple_announcement_with_exclusion_8_1\" value=\"",$simple_announcement_with_exclusion_8_1,"\" />
		</label>
		<label for=\"simple_announcement_with_exclusion_8_2\">Next
			<input type=\"text\" name=\"simple_announcement_with_exclusion_8_2\" value=\"",$simple_announcement_with_exclusion_8_2,"\" />
		</label>				
		<label for=\"simple_announcement_with_exclusion_delete_on_deactivate\" class=\"uninstall\">Uninstall
		<select name=\"simple_announcement_with_exclusion_delete_on_deactivate\">
			<option value=\"yes\""; if ($simple_announcement_with_exclusion_delete_on_deactivate === "yes") { echo " selected=\"selected\""; } echo ">Yes</option>
			<option value=\"no\""; if ($simple_announcement_with_exclusion_delete_on_deactivate === "no") { echo " selected=\"selected\""; } echo ">No</option>
		</select>
		</label>
		<label><input type=\"submit\" name=\"submit\" value=\"Save\" /></label>
		</form>";
		//--- 
		// Form to add additional loops
		//---
		echo "<form method=\"post\">
		<label>Multi-Config &mdash; [sawe]</label>
		<label for=\"simple_announcement_with_exclusion_0_new\">Div
		<input type=\"text\" name=\"simple_announcement_with_exclusion_0_new\" />
		</label>
		<label for=\"simple_announcement_with_exclusion_1_new\">Type
		<select name=\"simple_announcement_with_exclusion_1_new\" id=\"chooseposttype_new\">
		<option value=\"cat\">Category</option>
		<option value=\"tag\">Tag</option>
		<option value=\"post-format\">Post format</option>
		</select>
		</label>
		<div class=\"posttypeselection_new\">
		<label for=\"simple_announcement_with_exclusion_1_1_new\" class=\"cat\">
		<select name=\"simple_announcement_with_exclusion_1_1_new\">
		<option value=\"\"></option>";
				$sawe_tags =  get_categories('taxonomy=category'); 
				foreach ($sawe_tags as $sawe_tag) {
					echo "<option value=\"",$sawe_tag->cat_ID,"\">",$sawe_tag->cat_name," - ",$sawe_tag->category_count,"</option>";
				}
		echo "</select>
		</label>
		</div>
		<div class=\"posttypeselection_new\">
		<label for=\"simple_announcement_with_exclusion_1_2_new\" class=\"tag\">
		<select name=\"simple_announcement_with_exclusion_1_2_new\">
		<option value=\"\"></option>";
				$sawe_tags =  get_categories('taxonomy=post_tag'); 
				foreach ($sawe_tags as $sawe_tag) {
					echo "<option value=\"",$sawe_tag->cat_ID,"\">",$sawe_tag->cat_name," - ",$sawe_tag->category_count,"</option>";
				}
		echo "
		</select>
		</label>
		</div>
		<div class=\"posttypeselection_new\">
		<label for=\"simple_announcement_with_exclusion_1_3_new\" class=\"post-format\">
		<select name=\"simple_announcement_with_exclusion_1_3_new\">
		<option value=\"\"></option>
		<option value=\"post-format-aside\">Aside</option>
		<option value=\"post-format-gallery\">Gallery</option>
		<option value=\"post-format-link\">Link</option>
		<option value=\"post-format-image\">Image</option>
		<option value=\"post-format-quote\">Quote</option>
		<option value=\"post-format-status\">Status</option>
		<option value=\"post-format-video\">Video</option>
		<option value=\"post-format-audio\">Audio</option>
		<option value=\"post-format-chat\">Chat</option>
		</select>
		</label>
		</div>
		<label for=\"simple_announcement_with_exclusion_2_new\">Amount
		<input type=\"text\" name=\"simple_announcement_with_exclusion_2_new\" />
		</label>
		<label for=\"simple_announcement_with_exclusion_3_new\">By
		<select name=\"simple_announcement_with_exclusion_3_new\">
			<option value=\"date\">Date</option>
			<option value=\"title\">Title</option>
			<option value=\"rand\">Random</option>
		</select>
		</label>	
		<label for=\"simple_announcement_with_exclusion_3_2_new\">Order
		<select name=\"simple_announcement_with_exclusion_3_2_new\">
			<option value=\"ASC\">Ascending</option>
			<option value=\"DESC\">Descending</option>
		</select>
		</label>
		<label for=\"simple_announcement_with_exclusion_4_new\">Thumbs
		<select name=\"simple_announcement_with_exclusion_4_new\">
			<option value=\"yes\">Yes</option>
			<option value=\"no\">No</option>
		</select>
		</label>
		<label for=\"simple_announcement_with_exclusion_4_2_new\">Titles
		<select name=\"simple_announcement_with_exclusion_4_2_new\">
			<option value=\"yes\">Yes</option>
			<option value=\"no\">No</option>
		</select>
		</label>
		<label for=\"simple_announcement_with_exclusion_4_3_new\">Show
		<select name=\"simple_announcement_with_exclusion_4_3_new\">
			<option value=\"nothing\">Nothing</option>
			<option value=\"excerpt\">Excerpt</option>
			<option value=\"content\">Content</option>
		</select>
		</label>
		<label for=\"simple_announcement_with_exclusion_7_new\">Paged
			<select name=\"simple_announcement_with_exclusion_7_new\">
				<option value=\"yes\">Yes</option>
				<option value=\"no\">No</option>
			</select>
		</label>
		<label for=\"simple_announcement_with_exclusion_8_1_new\">Previous
			<input type=\"text\" name=\"simple_announcement_with_exclusion_8_1_new\" />
		</label>
		<label for=\"simple_announcement_with_exclusion_8_2_new\">Next
			<input type=\"text\" name=\"simple_announcement_with_exclusion_8_2_new\" />
		</label>				
		<label><input type=\"submit\" name=\"submit_new\" value=\"Save New\" /></label>";
		if(!isset($_POST['dropConfigs'])){
			echo "
			<label><input type=\"submit\" name=\"dropConfigs\" value=\"Delete all saves\" /></label>
			";
		}			 
		if(isset($_POST['dropConfigs'])){
			echo "
			<label><input type=\"submit\" name=\"dropConfigsyes\" value=\"Can't be undone\" /></label>
			";		
		}
		echo "</form>";
		if(isset($_POST['dropConfigsyes'])){
			global $wpdb;
			$SAWE_table_name = $wpdb->prefix . "SAWE_config";
			$sawe_current = plugin_basename(__FILE__);
			$wpdb->query("TRUNCATE TABLE $SAWE_table_name");
			echo "<meta http-equiv=\"refresh\" content=\"0;url=\"$sawe_current\" />";
		}			 
		if(isset($_POST['submit_new'])){
		global $wpdb;
		$SAWE_table_name = $wpdb->prefix . "SAWE_config";
		$saweDIV = $_REQUEST["simple_announcement_with_exclusion_0_new"];
		$saweTYPE = $_REQUEST["simple_announcement_with_exclusion_1_new"];
		$saweCAT = $_REQUEST["simple_announcement_with_exclusion_1_1_new"];
		$saweTAG = $_REQUEST["simple_announcement_with_exclusion_1_2_new"];
		$saweFORMAT = $_REQUEST["simple_announcement_with_exclusion_1_3_new"];
		$saweAMOUNT = $_REQUEST["simple_announcement_with_exclusion_2_new"];
		$saweBY = $_REQUEST["simple_announcement_with_exclusion_3_new"];
		$saweORDER = $_REQUEST["simple_announcement_with_exclusion_3_2_new"];
		$saweTHUMBS = $_REQUEST["simple_announcement_with_exclusion_4_new"];
		$saweTITLES = $_REQUEST["simple_announcement_with_exclusion_4_2_new"];
		$saweSHOW = $_REQUEST["simple_announcement_with_exclusion_4_3_new"];
		$sawePAGED = $_REQUEST["simple_announcement_with_exclusion_7_new"];
		$sawePREVIOUS = $_REQUEST["simple_announcement_with_exclusion_8_1_new"];
		$saweNEXT = $_REQUEST["simple_announcement_with_exclusion_8_2_new"];
		$wpdb->query("INSERT INTO $SAWE_table_name 
		( saweID, saweDIV, saweTYPE, saweCAT, saweTAG, saweFORMAT, saweAMOUNT, saweBY, saweORDER, saweTHUMBS, saweTITLES, saweSHOW, sawePAGED, sawePREVIOUS, saweNEXT ) VALUES 
		('', '$saweDIV', '$saweTYPE', '$saweCAT', '$saweTAG', '$saweFORMAT', '$saweAMOUNT', '$saweBY', '$saweORDER', '$saweTHUMBS', '$saweTITLES', '$saweSHOW', '$sawePAGED', '$sawePREVIOUS', '$saweNEXT')") ;
		}
		echo "<div class=\"SAWE\">
		<div class=\"item\">
		<p><em>Saved SAWEs</em><br />shortcode <strong>[SAWE config_id=\"#\"]<br />
		(where # is the <strong>ID</strong> of the save)</strong></p>
		</div>";
		global $wpdb;
		$SAWE_table_name = $wpdb->prefix . "SAWE_config";
		$SAWE_table_ad = $wpdb->get_results ("SELECT * FROM $SAWE_table_name ORDER BY saweID DESC");
			foreach ($SAWE_table_ad as $SAWE_table_admin) {
			 $sawe_this_ID = $SAWE_table_admin->saweID;
			 $saweDIV = $SAWE_table_admin->saweDIV;
			 $saweTYPE = $SAWE_table_admin->saweTYPE;
			 $saweCAT = $SAWE_table_admin->saweCAT;
			 $saweTAG = $SAWE_table_admin->saweTAG;
			 $saweFORMAT = $SAWE_table_admin->saweFORMAT;
			 $saweAMOUNT = $SAWE_table_admin->saweAMOUNT;
			 $saweBY = $SAWE_table_admin->saweBY;
			 $saweORDER = $SAWE_table_admin->saweORDER;
			 $saweTHUMBS = $SAWE_table_admin->saweTHUMBS;
			 $saweTITLES = $SAWE_table_admin->saweTITLES;
			 $saweSHOW = $SAWE_table_admin->saweSHOW;
			 $sawePAGED = $SAWE_table_admin->sawePAGED;
			 $sawePREVIOUS = $SAWE_table_admin->sawePREVIOUS;
			 $saweNEXT = $SAWE_table_admin->saweNEXT;
			echo 
			"<div class=\"item\">
			 <strong>",$SAWE_table_admin->saweID,"</strong> &mdash; <br />
			Show $saweAMOUNT ";
			if ($saweAMOUNT === '1') { 
				echo "item"; 
			} elseif ($saweAMOUNT >= '1') { 
				echo "items"; 
			} else {
				echo "nothing";
			}			
			echo " (";
			if ($saweTHUMBS === "yes") { echo "Thumbnails, "; }
			elseif ($saweTHUMBS === "no") { echo "No thumbnails,  "; }
			if ($saweTITLES === "yes") { echo "titles, "; }
			elseif ($saweTITLES === "no") { echo "No titles, "; }
			if ($saweSHOW === "excerpt") { echo "and post excerpt  "; }
			elseif ($saweSHOW === "content") { echo "full post content"; }
			elseif ($saweSHOW === "nothing") { echo "no post content"; }
			echo ")";
			
			if ($sawePAGED === "yes") { echo ", paged, "; }
			elseif ($sawePAGED === "no") { echo ", non-paged, "; }
			
			if ($saweORDER === "ASC") { echo "in ascending order"; }
			elseif ($saweORDER === "DESC") { echo "in descending order"; }
			
			if ($saweBY === "date") { echo " by date, "; }
			elseif ($saweBY === "title") { echo " by title, "; }
			elseif ($saweBY === "random") { echo " randomly, "; }
			
			echo "from the ";
			if ($saweTYPE === "cat") { echo "category ",get_the_category_by_id($saweCAT); }
			elseif ($saweTYPE === "tag") { echo "tag "; 
				$sawe_tags =  get_categories('taxonomy=post_tag'); 
				foreach ($sawe_tags as $sawe_tag) {
					if ($sawe_tag->cat_ID === $saweTAG) {
					echo $sawe_tag->cat_name;
					} else {}
				}
			}
			elseif ($saweTYPE === "post-format") { 
				if ($saweFORMAT === "post-format-aside") { echo "aside"; }
				elseif ($saweFORMAT === "post-format-gallery") { echo "gallery"; }
				elseif ($saweFORMAT === "post-format-link") { echo "link"; }
				elseif ($saweFORMAT === "post-format-image") { echo "image"; }
				elseif ($saweFORMAT === "post-format-quote") { echo "quote"; }
				elseif ($saweFORMAT === "post-format-status") { echo "status"; }
				elseif ($saweFORMAT === "post-format-video") { echo "video"; }
				elseif ($saweFORMAT === "post-format-audio") { echo "audio"; }
				elseif ($saweFORMAT === "post-format-chat") { echo "chat"; }
				echo " post format ";
			}
			if ($saweDIV != "") { echo "in the div labeled $saweDIV (#SAWE_shortcode) "; }
			elseif ($saweDIV === "") { echo "in the div labeled #SAWE_shortcode (no custom class) "; }
			if ($saweNEXT != "" || $sawePREVIOUS != "") {
				echo ", with navigation links marked as follows:  ";
				if ($saweNEXT != "") { echo "Next $saweNEXT."; }
				elseif ($saweNEXT === "") { echo "Next (has no custom title). "; }
				if ($sawePREVIOUS !="") { echo "and Previous $sawePREVIOUS."; }
				elseif ($sawePREVIOUS === "") { echo "and Previous (has no custom title)."; }
			}
			if(isset($_POST[$sawe_this_ID])){
				echo "
				<form method=\"post\" class=\"SAWE_item_form\">
				<input type=\"submit\" name=\"yes_$sawe_this_ID\" value=\"[Are you sure?]\">
				</form>";
			}
			if(!isset($_POST[$sawe_this_ID])){
				echo "
				<form method=\"post\" class=\"SAWE_item_form\">
				<input type=\"submit\" name=\"$sawe_this_ID\" value=\"[Delete this save state?]\">
				</form>
				";
			}
			echo "</div>";
			if(isset($_POST['yes_'.$sawe_this_ID])){
					$sawe_current = plugin_basename(__FILE__);
					$wpdb->query("DELETE FROM $SAWE_table_name WHERE saweID = '$sawe_this_ID'");
					echo "<meta http-equiv=\"refresh\" content=\"0;url=\"$sawe_current\" />";
			}			 
		}			
		 echo "</div>";
	}
// ------------------------------------------------------------------------
// SAWE-002
// Options page creation / page content
// Create the information page for this plugin.
// Display the information on the page that was created.
	function simple_announcement_with_exclusions_page_content() { 
		echo "<div class=\"papercaves_plugin_container\"><h2>Simple Announcement With Exclusion</h2><p>Created by Matt @ <a href=\"http://papercaves.com/\">Paper Caves</a> &mdash; <a href=\"http://papercaves.com/wordpress-plugins/sawe/\">Plugin information</a></p>";
		if ($_REQUEST["submit"]) { 
			update_simple_announcement_with_exclusions();
		}
		print_simple_announcement_with_exclusion_form();
		echo "</div>";
	}
// ------------------------------------------------------------------------
// SAWE-003
// Shortcode (for displaying wherever)
	function SAWE_shortcode( $atts, $content = null ) {
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
			global $simple_announcement_with_exclusion_8_1;
			global $simple_announcement_with_exclusion_8_2;
			global $permalinks;
			extract(shortcode_atts(array(
				'config_id' => '',
			), $atts));
			if(empty($config_id)) {
				if ($simple_announcement_with_exclusion_1 != "") {
					if ($simple_announcement_with_exclusion_7 === "yes") {
						$paged_shortcode = (get_query_var('paged')) ? get_query_var('paged') : 1;
					}
					if ($simple_announcement_with_exclusion_7 === "no") {
						$paged_shortcode = '';
					}
					echo "<div class=\"";
					if ($simple_announcement_with_exclusion_0 != "") { echo "$simple_announcement_with_exclusion_0"; }
					echo "\" id=\"SAWE_shortcode\">";
					if ($simple_announcement_with_exclusion_1 === "cat") {
						$SAWE_shortcode = new WP_Query( array(
						"cat" => $simple_announcement_with_exclusion_1_1, 
						"paged" => $paged_shortcode,
						"posts_per_page" => $simple_announcement_with_exclusion_2, 
						"order" => $simple_announcement_with_exclusion_3_2, 
						"orderby" => $simple_announcement_with_exclusion_3 
						));
					}
					elseif ($simple_announcement_with_exclusion_1 === "tag") {
						$SAWE_shortcode = new WP_Query(array(
						"tag__in" => $simple_announcement_with_exclusion_1_2,
						"paged" => $paged_shortcode,
						"posts_per_page" => $simple_announcement_with_exclusion_2, 
						"order" => $simple_announcement_with_exclusion_3_2, 
						"orderby" => $simple_announcement_with_exclusion_3 
						));
					}
					elseif ($simple_announcement_with_exclusion_1 === "post-format") {
						$SAWE_shortcode = new WP_Query(array(
						"paged" => $paged_shortcode,
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
						));
					}
					// The shortcode loop
					while ($SAWE_shortcode->have_posts()) : $SAWE_shortcode->the_post();
					global $post;
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
							echo "<p>";
							wp_pagenavi(array( 'query' => $SAWE_shortcode ) );
							echo "</p>";
						} else { 
							$big = 999999999;
							if ($permalinks === "default") {
								echo "<p>",paginate_links( array(
									'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
									'format' => '?paged=%#%',
									'current' => max( 1, get_query_var('paged') ),
									'total' => $SAWE_shortcode->max_num_pages,
									'prev_text' => __($simple_announcement_with_exclusion_8_1),
									'next_text' => __($simple_announcement_with_exclusion_8_2)
								) ),"</p>";
							}
							if ($permalinks === "pretty") {
								echo "<p>",paginate_links( array(
									'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
									'format' => '/paged/%#%',
									'current' => max( 1, get_query_var('paged') ),
									'total' => $SAWE_shortcode->max_num_pages,
									'prev_text' => __($simple_announcement_with_exclusion_8_1),
									'next_text' => __($simple_announcement_with_exclusion_8_2)
								) ),"</p>";
							}
						}
					}
					wp_reset_postdata();
					echo "</div>";
				}
			} else {
				global $wpdb;
				$SAWE_table_name = $wpdb->prefix . "SAWE_config";
				$SAWE_table_grab = $wpdb->get_results ("SELECT * FROM $SAWE_table_name WHERE saweID = $config_id LIMIT 1");
				foreach ($SAWE_table_grab as $SAWE_table_grabbed) {
					$sawe_this_ID = $SAWE_table_grabbed->saweID;
					$saweDIV = $SAWE_table_grabbed->saweDIV;
					$saweTYPE = $SAWE_table_grabbed->saweTYPE;
					$saweCAT = $SAWE_table_grabbed->saweCAT;
					$saweTAG = $SAWE_table_grabbed->saweTAG;
					$saweFORMAT = $SAWE_table_grabbed->saweFORMAT;
					$saweAMOUNT = $SAWE_table_grabbed->saweAMOUNT;
					$saweBY = $SAWE_table_grabbed->saweBY;
					$saweORDER = $SAWE_table_grabbed->saweORDER;
					$saweTHUMBS = $SAWE_table_grabbed->saweTHUMBS;
					$saweTITLES = $SAWE_table_grabbed->saweTITLES;
					$saweSHOW = $SAWE_table_grabbed->saweSHOW;
					$sawePAGED = $SAWE_table_grabbed->sawePAGED;
					$sawePREVIOUS = $SAWE_table_grabbed->sawePREVIOUS;
					$saweNEXT = $SAWE_table_grabbed->saweNEXT;
					if ($saweTYPE != "") {
						if ($sawePAGED === "yes") {
							$pagednewShortcode = (get_query_var('paged')) ? get_query_var('paged') : 1;
						}
						if ($sawePAGED === "no") {
							$pagednewShortcode = '';
						}
						echo "<div class=\"";
						if ($simple_announcement_with_exclusion_0 != "") { echo "$simple_announcement_with_exclusion_0"; }
						echo "\" id=\"SAWE_shortcode\">";
						if ($saweTYPE === "cat") {
							$newShortcode = new WP_Query( array(
							"cat" => $saweCAT, 
							"paged" => $pagednewShortcode,
							"posts_per_page" => $saweAMOUNT, 
							"order" => $saweORDER, 
							"orderby" => $saweBY 
							));
						}
						elseif ($saweTYPE === "tag") {
							$newShortcode = new WP_Query(array(
							"tag__in" => $saweTAG,
							"paged" => $pagednewShortcode,
							"posts_per_page" => $saweAMOUNT, 
							"order" => $saweORDER, 
							"orderby" => $saweBY 
							));
						}
						elseif ($saweTYPE === "post-format") {
							$newShortcode = new WP_Query(array(
							"paged" => $pagednewShortcode,
							"posts_per_page" => $saweAMOUNT, 
							"order" => $saweORDER, 
							"orderby" => $saweBY,
							"tax_query" => array(
								array(
								'taxonomy' => 'post_format',
									'field'    => 'slug',
									'terms'    => array( $saweFORMAT ),
									'operator' => 'IN'
									)
								)
							));
						}
						// The shortcode loop
						while ($newShortcode->have_posts()) : $newShortcode->the_post();
						global $post;
						if ($saweTHUMBS === "yes") { 
							if ( has_post_thumbnail() ) { 
								echo "<a href=\"",the_permalink(),"\" title=\"",the_title(),"\">
									",the_post_thumbnail( "thumbnail" ),"</a><br />";
							} 			
						}
						if ($saweTITLES === "yes") { 
								echo "<a class=\"SAWE_shortcode_title\" href=\"",the_permalink(),"\">",the_title(),"</a>";
						}
						if ($saweSHOW === "excerpt") { the_excerpt(); 
						} elseif ($saweSHOW === "content") { the_content(); }
						endwhile;
						if ($sawePAGED === "yes") {
							if ( (function_exists("wp_pagenavi")) ) {
								echo "<p>";
								wp_pagenavi(array( 'query' => $newShortcode ) );
								echo "</p>";
							} else { 
								$big = 999999999;
								if ($permalinks === "default") {
									echo "<p>",paginate_links( array(
										'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
										'format' => '?paged=%#%',
										'current' => max( 1, get_query_var('paged') ),
										'total' => $newShortcode->max_num_pages,
										'prev_text' => __($sawePREVIOUS),
										'next_text' => __($saweNEXT)
									) ),"</p>";
								}
								if ($permalinks === "pretty") {
									echo "<p>",paginate_links( array(
										'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
										'format' => '/paged/%#%',
										'current' => max( 1, get_query_var('paged') ),
										'total' => $newShortcode->max_num_pages,
										'prev_text' => __($sawePREVIOUS),
										'next_text' => __($saweNEXT)
									) ),"</p>";
								}
							}
						}
						wp_reset_postdata();
						echo "</div>";
					}
				}
			}
		}
	}
// ------------------------------------------------------------------------
// Hook into the loop and exclude our announcements category from showing on the front page.
// if the option to do is set.
	function SAWE_filter_home( $query ) {
		global $simple_announcement_with_exclusion_1;
		global $simple_announcement_with_exclusion_1_1;
		global $simple_announcement_with_exclusion_1_2;
		global $simple_announcement_with_exclusion_5;
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
		global $simple_announcement_with_exclusion_1;
		global $simple_announcement_with_exclusion_1_3;
		global $simple_announcement_with_exclusion_5;
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
// ------------------------------------------------------------------------
?>