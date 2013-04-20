<?php
/*
Plugin Name: Simple Announcement With Exclusion (SAWE)
Plugin URI: http://papercaves.com/wordpress-plugins/sawe/
Description: Designate a category for announcements to show in a shortcode while excluding it from the main loop.
Version: 4.3.2
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
------------------------------------------------------------------------*/
//	Last Updated April 18th, 2013 at 11:41 PM










//	---------------------------------------------------------------------
//	Plugin activation/installation/deactivation procedures
//	---------------------------------------------------------------------
// 	Plugin installation
	register_activation_hook( __FILE__, "simple_announcement_with_exclusion_install" );												
	register_activation_hook( __FILE__, "simple_announcement_with_exclusion_table" );												
	register_deactivation_hook( __FILE__, "simple_announcement_with_exclusion_uninstall" );											

// 	Additional installation procedures
	add_theme_support( 'post-formats', array( 'aside', 'gallery','link','image','quote','status','video','audio','chat' ) );		
	add_shortcode("sawe", "SAWE_shortcode");																						
	add_action( "pre_get_posts", "SAWE_filter_home" );																				
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

// 	Save state table		
	function simple_announcement_with_exclusion_table() {																			
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

//  Primary loop [sawe] options
	function simple_announcement_with_exclusion_install() {																			
		// Delete deprecated options from 4.2.1
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
		delete_option("simple_announcement_with_exclusion_7");
		delete_option("simple_announcement_with_exclusion_8_1");
		delete_option("simple_announcement_with_exclusion_8_2");
		add_option("simple_announcement_with_exclusion_6","no","Option 6");
		add_option("simple_announcement_with_exclusion_9","","Categories front");
		add_option("simple_announcement_with_exclusion_9_2","","Categories front and tag");
		add_option("simple_announcement_with_exclusion_9_3","","Categories everywhere");
		add_option("simple_announcement_with_exclusion_9_4","","tags front");
		add_option("simple_announcement_with_exclusion_9_5","","tags front and category");
		add_option("simple_announcement_with_exclusion_9_7","","tags everywhere");		
		add_option("simple_announcement_with_exclusion_9_8","","format everywhere");		
		add_option("simple_announcement_with_exclusion_9_9","","format everywhere");		
		add_option("simple_announcement_with_exclusion_9_10","","format everywhere");		
		add_option("simple_announcement_with_exclusion_9_11","","format everywhere");	
		add_option("simple_announcement_with_exclusion_9_12","","Exclude cats from feed");
		add_option("simple_announcement_with_exclusion_9_13","","Exclude tags from feed");
		add_option("simple_announcement_with_exclusion_9_14","","Exclude post-format from feed");
		add_option("simple_announcement_with_exclusion_delete_on_deactivate","no","Delete on deactivate?");
	}

//	Uninstallation procedure	
	function simple_announcement_with_exclusion_uninstall() {
		if ( get_option("simple_announcement_with_exclusion_delete_on_deactivate") === "yes") {
			delete_option("simple_announcement_with_exclusion_6");
			delete_option("simple_announcement_with_exclusion_9");
			delete_option("simple_announcement_with_exclusion_9_2");
			delete_option("simple_announcement_with_exclusion_9_3");
			delete_option("simple_announcement_with_exclusion_9_4");
			delete_option("simple_announcement_with_exclusion_9_5");
			delete_option("simple_announcement_with_exclusion_9_7");
			delete_option("simple_announcement_with_exclusion_9_8");
			delete_option("simple_announcement_with_exclusion_9_9");
			delete_option("simple_announcement_with_exclusion_9_10");
			delete_option("simple_announcement_with_exclusion_9_11");
			delete_option("simple_announcement_with_exclusion_9_12");
			delete_option("simple_announcement_with_exclusion_9_13");
			delete_option("simple_announcement_with_exclusion_9_14");
			delete_option("simple_announcement_with_exclusion_delete_on_deactivate");
			global $wpdb;
			$SAWE_table_name = $wpdb->prefix . "SAWE_config";
			$wpdb->query("TRUNCATE TABLE $SAWE_table_name");
			$wpdb->query("DROP TABLE $SAWE_table_name");
		}
	}
	
	$simple_announcement_with_exclusion_6 = get_option("simple_announcement_with_exclusion_6");
	$simple_announcement_with_exclusion_9 = get_option("simple_announcement_with_exclusion_9");
	$simple_announcement_with_exclusion_9_2 = get_option("simple_announcement_with_exclusion_9_2");
	$simple_announcement_with_exclusion_9_3 = get_option("simple_announcement_with_exclusion_9_3");
	$simple_announcement_with_exclusion_9_4 = get_option("simple_announcement_with_exclusion_9_4");
	$simple_announcement_with_exclusion_9_5 = get_option("simple_announcement_with_exclusion_9_5");
	$simple_announcement_with_exclusion_9_7 = get_option("simple_announcement_with_exclusion_9_7");
	$simple_announcement_with_exclusion_9_8 = get_option("simple_announcement_with_exclusion_9_8");
	$simple_announcement_with_exclusion_9_9 = get_option("simple_announcement_with_exclusion_9_9");
	$simple_announcement_with_exclusion_9_10 = get_option("simple_announcement_with_exclusion_9_10");
	$simple_announcement_with_exclusion_9_11 = get_option("simple_announcement_with_exclusion_9_11");
	$simple_announcement_with_exclusion_9_12 = get_option("simple_announcement_with_exclusion_9_12");
	$simple_announcement_with_exclusion_9_13 = get_option("simple_announcement_with_exclusion_9_13");
	$simple_announcement_with_exclusion_9_14 = get_option("simple_announcement_with_exclusion_9_14");
	$simple_announcement_with_exclusion_delete_on_deactivate = get_option("simple_announcement_with_exclusion_delete_on_deactivate");	
	
	
	
	
	
	
	
	
	
	
//	---------------------------------------------------------------------	
//	Update options (main loop) if requested
//	---------------------------------------------------------------------	
	function update_simple_announcement_with_exclusions() {
		global $simple_announcement_with_exclusion_6;
		global $simple_announcement_with_exclusion_9;
		global $simple_announcement_with_exclusion_9_2;
		global $simple_announcement_with_exclusion_9_3;
		global $simple_announcement_with_exclusion_9_4;
		global $simple_announcement_with_exclusion_9_5;
		global $simple_announcement_with_exclusion_9_7;
		global $simple_announcement_with_exclusion_9_8;
		global $simple_announcement_with_exclusion_9_9;
		global $simple_announcement_with_exclusion_9_10;
		global $simple_announcement_with_exclusion_9_11;
		global $simple_announcement_with_exclusion_9_12;
		global $simple_announcement_with_exclusion_9_13;
		global $simple_announcement_with_exclusion_9_14;
		global $simple_announcement_with_exclusion_delete_on_deactivate;	
// 	Only update if request isn't empty and request isn't the same as it was before
		if(isset($_POST['submit'])){
			if ($_REQUEST["simple_announcement_with_exclusion_6"] != "$simple_announcement_with_exclusion_6") { update_option("simple_announcement_with_exclusion_6",$_REQUEST["simple_announcement_with_exclusion_6"]); }
			if ($_REQUEST["simple_announcement_with_exclusion_9"] != "$simple_announcement_with_exclusion_9") { update_option("simple_announcement_with_exclusion_9",$_REQUEST["simple_announcement_with_exclusion_9"]); }
			if ($_REQUEST["simple_announcement_with_exclusion_9_2"] != "$simple_announcement_with_exclusion_9_2") { update_option("simple_announcement_with_exclusion_9_2",$_REQUEST["simple_announcement_with_exclusion_9_2"]); }
			if ($_REQUEST["simple_announcement_with_exclusion_9_3"] != "$simple_announcement_with_exclusion_9_3") { update_option("simple_announcement_with_exclusion_9_3",$_REQUEST["simple_announcement_with_exclusion_9_3"]); }
			if ($_REQUEST["simple_announcement_with_exclusion_9_4"] != "$simple_announcement_with_exclusion_9_4") { update_option("simple_announcement_with_exclusion_9_4",$_REQUEST["simple_announcement_with_exclusion_9_4"]); }
			if ($_REQUEST["simple_announcement_with_exclusion_9_5"] != "$simple_announcement_with_exclusion_9_5") { update_option("simple_announcement_with_exclusion_9_5",$_REQUEST["simple_announcement_with_exclusion_9_5"]); }
			if ($_REQUEST["simple_announcement_with_exclusion_9_7"] != "$simple_announcement_with_exclusion_9_7") { update_option("simple_announcement_with_exclusion_9_7",$_REQUEST["simple_announcement_with_exclusion_9_7"]); }
			if ($_REQUEST["simple_announcement_with_exclusion_9_8"] != "$simple_announcement_with_exclusion_9_8") { update_option("simple_announcement_with_exclusion_9_8",$_REQUEST["simple_announcement_with_exclusion_9_8"]); }
			if ($_REQUEST["simple_announcement_with_exclusion_9_9"] != "$simple_announcement_with_exclusion_9_9") { update_option("simple_announcement_with_exclusion_9_9",$_REQUEST["simple_announcement_with_exclusion_9_9"]); }
			if ($_REQUEST["simple_announcement_with_exclusion_9_10"] != "$simple_announcement_with_exclusion_9_10") { update_option("simple_announcement_with_exclusion_9_10",$_REQUEST["simple_announcement_with_exclusion_9_10"]); }
			if ($_REQUEST["simple_announcement_with_exclusion_9_11"] != "$simple_announcement_with_exclusion_9_11") { update_option("simple_announcement_with_exclusion_9_11",$_REQUEST["simple_announcement_with_exclusion_9_11"]); }
			if ($_REQUEST["simple_announcement_with_exclusion_9_12"] != "$simple_announcement_with_exclusion_9_12") { update_option("simple_announcement_with_exclusion_9_12",$_REQUEST["simple_announcement_with_exclusion_9_12"]); }
			if ($_REQUEST["simple_announcement_with_exclusion_9_13"] != "$simple_announcement_with_exclusion_9_13") { update_option("simple_announcement_with_exclusion_9_13",$_REQUEST["simple_announcement_with_exclusion_9_13"]); }
			if ($_REQUEST["simple_announcement_with_exclusion_9_14"] != "$simple_announcement_with_exclusion_9_14") { update_option("simple_announcement_with_exclusion_9_14",$_REQUEST["simple_announcement_with_exclusion_9_14"]); }
			if ($_REQUEST["simple_announcement_with_exclusion_delete_on_deactivate"] != "" && $_REQUEST["simple_announcement_with_exclusion_delete_on_deactivate"] != "$simple_announcement_with_exclusion_delete_on_deactivate") { update_option("simple_announcement_with_exclusion_delete_on_deactivate",$_REQUEST["simple_announcement_with_exclusion_delete_on_deactivate"]); }
		}
	}
	
	
	
	
	
	
	
	
	
	
//	---------------------------------------------------------------------
// 	The form for the options page.	
//	---------------------------------------------------------------------
	function print_simple_announcement_with_exclusion_form() {
		$simple_announcement_with_exclusion_6 = get_option("simple_announcement_with_exclusion_6");
		$simple_announcement_with_exclusion_9 = get_option("simple_announcement_with_exclusion_9");
		$simple_announcement_with_exclusion_9_2 = get_option("simple_announcement_with_exclusion_9_2");
		$simple_announcement_with_exclusion_9_3 = get_option("simple_announcement_with_exclusion_9_3");
		$simple_announcement_with_exclusion_9_4 = get_option("simple_announcement_with_exclusion_9_4");
		$simple_announcement_with_exclusion_9_5 = get_option("simple_announcement_with_exclusion_9_5");
		$simple_announcement_with_exclusion_9_7 = get_option("simple_announcement_with_exclusion_9_7");
		$simple_announcement_with_exclusion_9_8 = get_option("simple_announcement_with_exclusion_9_8");
		$simple_announcement_with_exclusion_9_9 = get_option("simple_announcement_with_exclusion_9_9");
		$simple_announcement_with_exclusion_9_10 = get_option("simple_announcement_with_exclusion_9_10");
		$simple_announcement_with_exclusion_9_11 = get_option("simple_announcement_with_exclusion_9_11");
		$simple_announcement_with_exclusion_9_12 = get_option("simple_announcement_with_exclusion_9_12");
		$simple_announcement_with_exclusion_9_13 = get_option("simple_announcement_with_exclusion_9_13");
		$simple_announcement_with_exclusion_9_14 = get_option("simple_announcement_with_exclusion_9_14");
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
		
		<label><u>Exclusion config</u></label>
		
		<label for=\"simple_announcement_with_exclusion_1\">Type
		<select name=\"simple_announcement_with_exclusion_1\" id=\"chooseposttype\">
		<option value=\"cat\">Category</option>
		<option value=\"tag\">Tag</option>
		<option value=\"post-format\">Post format</option>
		</select>
		</label>
			
		<label class=\"divider\"><u>Exclude from these loops</u>:<br /><small>You may put the same id/post format in all boxes to exclude them 
		from the designated areas.</small></label>
		<div class=\"posttypeselection\">
		<div class=\"cat\">
		<label for=\"simple_announcement_with_exclusion_9_12\">Feed
		<textarea name=\"simple_announcement_with_exclusion_9_12\">$simple_announcement_with_exclusion_9_12</textarea>
		</label>
		<label for=\"simple_announcement_with_exclusion_9\">Home
		<textarea name=\"simple_announcement_with_exclusion_9\">$simple_announcement_with_exclusion_9</textarea>
		</label>
		<label for=\"simple_announcement_with_exclusion_9_2\">Tag
		<textarea name=\"simple_announcement_with_exclusion_9_2\">$simple_announcement_with_exclusion_9_2</textarea>
		</label>
		<label for=\"simple_announcement_with_exclusion_9_3\" class=\"bottom\">Search
		<textarea name=\"simple_announcement_with_exclusion_9_3\">$simple_announcement_with_exclusion_9_3</textarea>
		</label>
		
		<div class=\"list\">";
		$showmecats =  get_categories('taxonomy=category'); 
			echo "<item><span class=\"listleft\">Category</span><span class=\"listright\">id</span></item><item><hr /></item>";
		foreach ($showmecats as $catsshown) {
			echo "<item><span class=\"listleft\">",$catsshown->cat_name,"</span><span class=\"listright\">",$catsshown->cat_ID,"</span></item>";
		}		
		echo "</div>
		
		
		</div>
		</div>
		
		<div class=\"posttypeselection\">
		<div class=\"tag\">
		<label for=\"simple_announcement_with_exclusion_9_13\">Feed
		<textarea name=\"simple_announcement_with_exclusion_9_13\">$simple_announcement_with_exclusion_9_13</textarea>
		</label>
		<label for=\"simple_announcement_with_exclusion_9_4\">Home
		<textarea name=\"simple_announcement_with_exclusion_9_4\">$simple_announcement_with_exclusion_9_4</textarea>
		</label>
		<label for=\"simple_announcement_with_exclusion_9_5\">Category
		<textarea name=\"simple_announcement_with_exclusion_9_5\">$simple_announcement_with_exclusion_9_5</textarea>
		</label>
		<label for=\"simple_announcement_with_exclusion_9_7\" class=\"bottom\">Search
		<textarea name=\"simple_announcement_with_exclusion_9_7\">$simple_announcement_with_exclusion_9_7</textarea>
		</label>
		<div class=\"list\">";
		$showmetags =  get_categories('taxonomy=post_tag'); 
			echo "<item><span class=\"listleft\">Tag</span><span class=\"listright\">id</span></item><item><hr /></item>";
		foreach ($showmetags as $tagsshown) {
			echo "<item><span class=\"listleft\">",$tagsshown->cat_name,"</span><span class=\"listright\">",$tagsshown->cat_ID,"</span></item>";
		}		
		echo "</div>

		
		
		</div>
		</div>
		
		<div class=\"posttypeselection\">
		<div class=\"post-format\">
		<label for=\"simple_announcement_with_exclusion_9_14\">Feed
		<select name=\"simple_announcement_with_exclusion_9_14\">
		<option value=\"\"></option>
		<option value=\"post-format-aside\"";if ($simple_announcement_with_exclusion_9_14 === "post-format-aside") { echo " selected=\"selected\""; } echo ">Aside</option>
		<option value=\"post-format-gallery\"";if ($simple_announcement_with_exclusion_9_14 === "post-format-gallery") { echo " selected=\"selected\""; } echo ">Gallery</option>
		<option value=\"post-format-link\"";if ($simple_announcement_with_exclusion_9_14 === "post-format-link") { echo " selected=\"selected\""; } echo ">Link</option>
		<option value=\"post-format-image\"";if ($simple_announcement_with_exclusion_9_14 === "post-format-image") { echo " selected=\"selected\""; } echo ">Image</option>
		<option value=\"post-format-quote\"";if ($simple_announcement_with_exclusion_9_14 === "post-format-quote") { echo " selected=\"selected\""; } echo ">Quote</option>
		<option value=\"post-format-status\"";if ($simple_announcement_with_exclusion_9_14 === "post-format-status") { echo " selected=\"selected\""; } echo ">Status</option>
		<option value=\"post-format-video\"";if ($simple_announcement_with_exclusion_9_14 === "post-format-video") { echo " selected=\"selected\""; } echo ">Video</option>
		<option value=\"post-format-audio\"";if ($simple_announcement_with_exclusion_9_14 === "post-format-audio") { echo " selected=\"selected\""; } echo ">Audio</option>
		<option value=\"post-format-chat\"";if ($simple_announcement_with_exclusion_9_14 === "post-format-chat") { echo " selected=\"selected\""; } echo ">Chat</option>
		</select>
		</label>		
		<label for=\"simple_announcement_with_exclusion_9_8\" class=\"post-format\">Home
		<select name=\"simple_announcement_with_exclusion_9_8\">
		<option value=\"\"></option>
		<option value=\"post-format-aside\"";if ($simple_announcement_with_exclusion_9_8 === "post-format-aside") { echo " selected=\"selected\""; } echo ">Aside</option>
		<option value=\"post-format-gallery\"";if ($simple_announcement_with_exclusion_9_8 === "post-format-gallery") { echo " selected=\"selected\""; } echo ">Gallery</option>
		<option value=\"post-format-link\"";if ($simple_announcement_with_exclusion_9_8 === "post-format-link") { echo " selected=\"selected\""; } echo ">Link</option>
		<option value=\"post-format-image\"";if ($simple_announcement_with_exclusion_9_8 === "post-format-image") { echo " selected=\"selected\""; } echo ">Image</option>
		<option value=\"post-format-quote\"";if ($simple_announcement_with_exclusion_9_8 === "post-format-quote") { echo " selected=\"selected\""; } echo ">Quote</option>
		<option value=\"post-format-status\"";if ($simple_announcement_with_exclusion_9_8 === "post-format-status") { echo " selected=\"selected\""; } echo ">Status</option>
		<option value=\"post-format-video\"";if ($simple_announcement_with_exclusion_9_8 === "post-format-video") { echo " selected=\"selected\""; } echo ">Video</option>
		<option value=\"post-format-audio\"";if ($simple_announcement_with_exclusion_9_8 === "post-format-audio") { echo " selected=\"selected\""; } echo ">Audio</option>
		<option value=\"post-format-chat\"";if ($simple_announcement_with_exclusion_9_8 === "post-format-chat") { echo " selected=\"selected\""; } echo ">Chat</option>
		</select>
		</label>
		<label for=\"simple_announcement_with_exclusion_9_9\" class=\"post-format\">Category
		<select name=\"simple_announcement_with_exclusion_9_9\">
		<option value=\"\"></option>
		<option value=\"post-format-aside\"";if ($simple_announcement_with_exclusion_9_9 === "post-format-aside") { echo " selected=\"selected\""; } echo ">Aside</option>
		<option value=\"post-format-gallery\"";if ($simple_announcement_with_exclusion_9_9 === "post-format-gallery") { echo " selected=\"selected\""; } echo ">Gallery</option>
		<option value=\"post-format-link\"";if ($simple_announcement_with_exclusion_9_9 === "post-format-link") { echo " selected=\"selected\""; } echo ">Link</option>
		<option value=\"post-format-image\"";if ($simple_announcement_with_exclusion_9_9 === "post-format-image") { echo " selected=\"selected\""; } echo ">Image</option>
		<option value=\"post-format-quote\"";if ($simple_announcement_with_exclusion_9_9 === "post-format-quote") { echo " selected=\"selected\""; } echo ">Quote</option>
		<option value=\"post-format-status\"";if ($simple_announcement_with_exclusion_9_9 === "post-format-status") { echo " selected=\"selected\""; } echo ">Status</option>
		<option value=\"post-format-video\"";if ($simple_announcement_with_exclusion_9_9 === "post-format-video") { echo " selected=\"selected\""; } echo ">Video</option>
		<option value=\"post-format-audio\"";if ($simple_announcement_with_exclusion_9_9 === "post-format-audio") { echo " selected=\"selected\""; } echo ">Audio</option>
		<option value=\"post-format-chat\"";if ($simple_announcement_with_exclusion_9_9 === "post-format-chat") { echo " selected=\"selected\""; } echo ">Chat</option>
		</select>
		</label>		
		<label for=\"simple_announcement_with_exclusion_9_10\" class=\"post-format\">Tag
		<select name=\"simple_announcement_with_exclusion_9_10\">
		<option value=\"\"></option>
		<option value=\"post-format-aside\"";if ($simple_announcement_with_exclusion_9_10 === "post-format-aside") { echo " selected=\"selected\""; } echo ">Aside</option>
		<option value=\"post-format-gallery\"";if ($simple_announcement_with_exclusion_9_10 === "post-format-gallery") { echo " selected=\"selected\""; } echo ">Gallery</option>
		<option value=\"post-format-link\"";if ($simple_announcement_with_exclusion_9_10 === "post-format-link") { echo " selected=\"selected\""; } echo ">Link</option>
		<option value=\"post-format-image\"";if ($simple_announcement_with_exclusion_9_10 === "post-format-image") { echo " selected=\"selected\""; } echo ">Image</option>
		<option value=\"post-format-quote\"";if ($simple_announcement_with_exclusion_9_10 === "post-format-quote") { echo " selected=\"selected\""; } echo ">Quote</option>
		<option value=\"post-format-status\"";if ($simple_announcement_with_exclusion_9_10 === "post-format-status") { echo " selected=\"selected\""; } echo ">Status</option>
		<option value=\"post-format-video\"";if ($simple_announcement_with_exclusion_9_10 === "post-format-video") { echo " selected=\"selected\""; } echo ">Video</option>
		<option value=\"post-format-audio\"";if ($simple_announcement_with_exclusion_9_10 === "post-format-audio") { echo " selected=\"selected\""; } echo ">Audio</option>
		<option value=\"post-format-chat\"";if ($simple_announcement_with_exclusion_9_10 === "post-format-chat") { echo " selected=\"selected\""; } echo ">Chat</option>
		</select>
		</label>
		<label for=\"simple_announcement_with_exclusion_9_11\" class=\"post-format\">Search
		<select name=\"simple_announcement_with_exclusion_9_11\">
		<option value=\"\"></option>
		<option value=\"post-format-aside\"";if ($simple_announcement_with_exclusion_9_11 === "post-format-aside") { echo " selected=\"selected\""; } echo ">Aside</option>
		<option value=\"post-format-gallery\"";if ($simple_announcement_with_exclusion_9_11 === "post-format-gallery") { echo " selected=\"selected\""; } echo ">Gallery</option>
		<option value=\"post-format-link\"";if ($simple_announcement_with_exclusion_9_11 === "post-format-link") { echo " selected=\"selected\""; } echo ">Link</option>
		<option value=\"post-format-image\"";if ($simple_announcement_with_exclusion_9_11 === "post-format-image") { echo " selected=\"selected\""; } echo ">Image</option>
		<option value=\"post-format-quote\"";if ($simple_announcement_with_exclusion_9_11 === "post-format-quote") { echo " selected=\"selected\""; } echo ">Quote</option>
		<option value=\"post-format-status\"";if ($simple_announcement_with_exclusion_9_11 === "post-format-status") { echo " selected=\"selected\""; } echo ">Status</option>
		<option value=\"post-format-video\"";if ($simple_announcement_with_exclusion_9_11 === "post-format-video") { echo " selected=\"selected\""; } echo ">Video</option>
		<option value=\"post-format-audio\"";if ($simple_announcement_with_exclusion_9_11 === "post-format-audio") { echo " selected=\"selected\""; } echo ">Audio</option>
		<option value=\"post-format-chat\"";if ($simple_announcement_with_exclusion_9_11 === "post-format-chat") { echo " selected=\"selected\""; } echo ">Chat</option>
		</select>
		</label>
		</div>
		</div>
		
		<label for=\"simple_announcement_with_exclusion_6\" class=\"divider\">CSS
		<select name=\"simple_announcement_with_exclusion_6\">
			<option value=\"yes\""; if ($simple_announcement_with_exclusion_6 === "yes") { echo " selected=\"selected\""; } echo ">Yes</option>
			<option value=\"no\""; if ($simple_announcement_with_exclusion_6 === "no") { echo " selected=\"selected\""; } echo ">No</option>
		</select>
		</label>
		<label for=\"simple_announcement_with_exclusion_delete_on_deactivate\" class=\"uninstall\">Uninstall
		<select name=\"simple_announcement_with_exclusion_delete_on_deactivate\">
			<option value=\"yes\""; if ($simple_announcement_with_exclusion_delete_on_deactivate === "yes") { echo " selected=\"selected\""; } echo ">Yes</option>
			<option value=\"no\""; if ($simple_announcement_with_exclusion_delete_on_deactivate === "no") { echo " selected=\"selected\""; } echo ">No</option>
		</select>
		</label>
		
		<label><input type=\"submit\" name=\"submit\" value=\"Save\" /></label>
		</form>";
//	---------------------------------------------------------------------
// 	Form to add additional loops
//	---------------------------------------------------------------------
		echo "<div class=\"SAWEleft\">

		<form method=\"post\">
		<label><u>Save states</u></label>
	
		<label><select name=\"edit_this\" class=\"selectfull\">
		<option value=\"\">Creating new</option><option value=\"\">-----</option><option value=\"\">Edit a save sate</option>";
		global $wpdb;
		$SAWE_table_name = $wpdb->prefix . "SAWE_config";
		$SAWE_table_ad = $wpdb->get_results ("SELECT * FROM $SAWE_table_name ORDER BY saweID DESC");
		foreach ($SAWE_table_ad as $SAWE_table_admin) {
			echo "<option value=\"$SAWE_table_admin->saweID\">Save state $SAWE_table_admin->saweID</option>";
		}		
		
		echo "</select></label>
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
		
		if(isset($_POST['submit_new']) && $_REQUEST["edit_this"] === ""){
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
			('', '$saweDIV', '$saweTYPE', '$saweCAT', '$saweTAG', '$saweFORMAT', '$saweAMOUNT', '$saweBY', '$saweORDER', '$saweTHUMBS', '$saweTITLES', '$saweSHOW', '$sawePAGED', '$sawePREVIOUS', '$saweNEXT' )") ;
		}

		if(isset($_POST['submit_new']) && $_REQUEST["edit_this"] != ""){
			$SAWE_editing_this = $_REQUEST["edit_this"];
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
			$wpdb->query("UPDATE $SAWE_table_name 
			SET
			saweDIV = '$saweDIV',  
			saweTYPE = '$saweTYPE',  
			saweCAT = '$saweCAT',  
			saweTAG = '$saweTAG',  
			saweFORMAT = '$saweFORMAT',  
			saweAMOUNT = '$saweAMOUNT',  
			saweBY = '$saweBY',  
			saweORDER = '$saweORDER',  
			saweTHUMBS = '$saweTHUMBS',  
			saweTITLES = '$saweTITLES',  
			saweSHOW = '$saweSHOW',  
			sawePAGED = '$sawePAGED',  
			sawePREVIOUS = '$sawePREVIOUS',  
			saweNEXT = '$saweNEXT' 
			WHERE 
			saweID = $SAWE_editing_this
			") ;
		}
		
		echo "</div><div class=\"SAWE\">";
		
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
			 <strong>[sawe config_id=\"",$SAWE_table_admin->saweID,"\"]</strong> &mdash; <br />
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
			if ($saweDIV != "") { echo " in the div labeled $saweDIV (#SAWE_shortcode)"; }
			elseif ($saweDIV === "") { echo " in the div labeled #SAWE_shortcode (no custom class)"; }
			if ($saweNEXT != "" || $sawePREVIOUS != "") {
				echo ", with navigation links marked as follows:  ";
				if ($saweNEXT != "") { echo "Next $saweNEXT."; }
				elseif ($saweNEXT === "") { echo "Next (has no custom title). "; }
				if ($sawePREVIOUS !="") { echo "and Previous $sawePREVIOUS."; }
				elseif ($sawePREVIOUS === "") { echo "and Previous (has no custom title)."; }
			} else { 
				echo "."; 
			}
			
			echo "<hr />";
			
			if ( $saweCAT != "" || $saweTAG != "" ) {
				echo "Exclusion ID: <strong>" . $saweCAT . $saweTAG . "</strong>";
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
	function simple_announcement_with_exclusions_page_content() { 
		echo "<div class=\"papercaves_plugin_container\"><h2>Simple Announcement With Exclusion</h2><p>Created by Matt @ <a href=\"http://papercaves.com/\">Paper Caves</a> &mdash; <a href=\"http://papercaves.com/wordpress-plugins/sawe/\">Documentation</a></p>";
		if(isset($_POST["submit"])){
			if ($_REQUEST["submit"]) { 
				update_simple_announcement_with_exclusions();
			}
		}
		print_simple_announcement_with_exclusion_form();
		echo "</div>";
	}

	
	
	
	
	
	
	
	
	
//	---------------------------------------------------------------------
//	Set up the [sawe] shortcode functionality
//  ---------------------------------------------------------------------	
	function SAWE_shortcode( $atts, $content = null ) {
		ob_start();
		if (!is_admin() ) {																

			global $wp_rewrite;															
			if ($wp_rewrite->permalink_structure == '') { 
				$permalinks = "default";
			} else { 
				$permalinks = "pretty"; 
			}
			
			extract(shortcode_atts(array(
				'config_id' => '',
			), $atts));
			
			if(empty($config_id)) {	
				
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
						echo "<div class=\"";
						if ($saweDIV != "") { echo "$saweDIV"; }
						echo "\" id=\"SAWE_shortcode $sawe_this_ID\">";						
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
						echo "</div>";
						wp_reset_postdata();
					}
				}
			}
		}
	return ob_get_clean();
	}

	
	
	
	
	
	
	
	
	
//  ---------------------------------------------------------------------
// 	Exclusion magic
// 	Take options from main [sawe] loop, and apply them to the main query,
//	depending on what exclusion rules (if any) we are using.
//	---------------------------------------------------------------------
// 	Handle exclusion rules for categories and tags (main [sawe] loop
	
	function SAWE_filter_home( $query ) {	
		global $simple_announcement_with_exclusion_9;
		global $simple_announcement_with_exclusion_9_2;
		global $simple_announcement_with_exclusion_9_3;
		global $simple_announcement_with_exclusion_9_4;
		global $simple_announcement_with_exclusion_9_5;
		global $simple_announcement_with_exclusion_9_7;
		global $simple_announcement_with_exclusion_9_8;
		global $simple_announcement_with_exclusion_9_9;
		global $simple_announcement_with_exclusion_9_10;
		global $simple_announcement_with_exclusion_9_11;
		global $simple_announcement_with_exclusion_9_12;
		global $simple_announcement_with_exclusion_9_13;
		global $simple_announcement_with_exclusion_9_14;

		if ($query->is_feed) {
				$rss1 = explode(',', $simple_announcement_with_exclusion_9_12);
				foreach ($rss1 as &$RSS1) { $RSS1 = "".$RSS1.","; }
				$rss_1 = implode($rss1);		
				$rss11 = explode(',', str_replace(' ', '', $rss_1));
				$rss2 = explode(',', $simple_announcement_with_exclusion_9_13);
				foreach ($rss2 as &$RSS2) { $RSS2 = "".$RSS2.","; }
				$rss_2 = implode($rss2);		
				$rss22 = explode(',', str_replace(' ', '', $rss_2));
				
				$tax_query = array(
				'relation' => 'AND OR',
				array(
					'taxonomy' => 'category',
					'terms' => $rss11,
					'field' => 'id',
					'operator' => 'NOT IN'
				),
				array(
					'taxonomy' => 'post_tag',
					'terms' => $rss22,
					'field' => 'id',
					'operator' => 'NOT IN'
				),
				array(
					'taxonomy' => 'post_format',
					'field' => 'slug',
					'terms' => array( $simple_announcement_with_exclusion_9_14 ),
					'operator' => 'NOT IN'
				),
				);
				$query->set( 'tax_query', $tax_query );						
		}
		
		if ( $query->is_main_query() && !is_admin() ) {
		
			if ( $query->is_home() ) {
				$c1 = explode(',', $simple_announcement_with_exclusion_9);
				foreach ($c1 as &$C1) { $C1 = "".$C1.","; }
				$c_1 = implode($c1);		
				$c11 = explode(',', str_replace(' ', '', $c_1));
				$t1 = explode(',', $simple_announcement_with_exclusion_9_4);
				foreach ($t1 as &$T1) { $T1 = "".$T1.","; }
				$t_1 = implode($t1);		
				$t11 = explode(',', str_replace(' ', '', $t_1));
		
				$tax_query = array(
				'relation' => 'AND OR',
				array(
					'taxonomy' => 'category',
					'terms' => $c11,
					'field' => 'id',
					'operator' => 'NOT IN'
				),
				array(
					'taxonomy' => 'post_tag',
					'terms' => $t11,
					'field' => 'id',
					'operator' => 'NOT IN'
				),
				array(
					'taxonomy' => 'post_format',
					'field' => 'slug',
					'terms' => array( $simple_announcement_with_exclusion_9_8 ),
					'operator' => 'NOT IN'
				),
				);
				$query->set( 'tax_query', $tax_query );
			}

			elseif ( $query->is_category()) {
				$t2 = explode(',', $simple_announcement_with_exclusion_9_5);
				foreach ($t2 as &$T2) { $T2 = "".$T2.","; }
				$t_2 = implode($t2);
				$t22 = explode(',', str_replace(' ', '', $t_2));
			
				$tax_query = array(
					'relation' => 'AND OR',
					array(
						'taxonomy' => 'post_tag',
						'terms' => $t22,
						'field' => 'id',
						'operator' => 'NOT IN',
					),
					array(
						'taxonomy' => 'post_format',
						'field' => 'slug',
						'terms' => array( $simple_announcement_with_exclusion_9_9 ),
						'operator' => 'NOT IN',
								),
				);
				$query->set( 'tax_query', $tax_query );				
			}

			elseif ( $query->is_tag() ) {
				$c3 = explode(',', $simple_announcement_with_exclusion_9_2);
				foreach ($c3 as &$C3) { $C3 = "".$C3.","; }
				$c_3 = implode($c3);
				$c33 = explode(',', str_replace(' ', '', $c_3));
			
				$tax_query = array(
					'relation' => 'AND OR',
					array(
						'taxonomy' => 'category',
						'terms' => $c33,
						'field' => 'id',
						'operator' => 'NOT IN',
					),
					array(
						'taxonomy' => 'post_format',
						'field' => 'slug',
						'terms' => array( $simple_announcement_with_exclusion_9_10 ),
						'operator' => 'NOT IN',
								),
				);
				$query->set( 'tax_query', $tax_query );
			}		

			elseif ( $query->is_search() ) {
				$c4 = explode(',', $simple_announcement_with_exclusion_9_3);
				foreach ($c4 as &$C4) { $C4 = "".$C4.","; }
				$c_4 = implode($c4);		
				$c44 = explode(',', str_replace(' ', '', $c_4));
				
				$t4 = explode(',', $simple_announcement_with_exclusion_9_7);
				foreach ($t4 as &$T4) { $T4 = "".$T4.","; }
				$t_4 = implode($t4);		
				$t44 = explode(',', str_replace(' ', '', $t_4));			
			
				$tax_query = array(
					'relation' => 'AND OR',
					array(
						'taxonomy' => 'category',
						'terms' => $c44,
						'field' => 'id',
						'operator' => 'NOT IN',
					),
					array(
						'taxonomy' => 'post_tag',
						'terms' => $t44,
						'field' => 'id',
						'operator' => 'NOT IN',
					),
					array(
						'taxonomy' => 'post_format',
						'field' => 'slug',
						'terms' => array( $simple_announcement_with_exclusion_9_11 ),
						'operator' => 'NOT IN',
								),
				);
				$query->set( 'tax_query', $tax_query );					
			}
		}
	}
?>