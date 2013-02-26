<?php
/*
	Plugin Name: Simple Announcement With Exclusion (SAWE)
	Plugin URI: https://github.com/boyevul/SAWE
	Description: Designate a category for announcements to show in a widget while excluding it from the main loop.
	Version: 1.4
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


//	Last update February 16th, 2013 - 8:04 PM


// SAWE-000
// Registering and installaing relevant plugin information to the database.
	register_activation_hook( __FILE__, "simple_announcement_with_exclusion_install" );
	register_deactivation_hook( __FILE__, "simple_announcement_with_exclusion_uninstall" );

	function simple_announcement_with_exclusion_install() {
		
		// core settings
		add_option("simple_announcement_with_exclusion_0","","Wrapper");
		add_option("simple_announcement_with_exclusion_1","","Category");
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
		<form method=\"post\" class=\"SAWE_settings\">

		<label for=\"simple_announcement_with_exclusion_0\"><span class=\"SAWE_settings_title\">Div class name (optional):</span>
		<input type=\"text\" name=\"simple_announcement_with_exclusion_0\" value=\"",$default_simple_announcement_with_exclusion_0,"\" />
		</label>

		<label for=\"simple_announcement_with_exclusion_1\"><span class=\"SAWE_settings_title\">Category:</span>
		<select name=\"simple_announcement_with_exclusion_1\">";
				$sawe_categories=  get_categories(); 
				foreach ($sawe_categories as $sawe_category) {
					echo "<option value=\"",$sawe_category->cat_ID,"\"";
					if ($sawe_category->cat_ID == $default_simple_announcement_with_exclusion_1) { echo " selected=\"selected\""; }
					echo ">",$sawe_category->cat_name," - ",$sawe_category->category_count,"</option>";
				}
				
		echo "
		</select>
		</label>

		<label for=\"simple_announcement_with_exclusion_2\"><span class=\"SAWE_settings_title\">Number of posts:</span>
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
				<label for=\"simple_announcement_with_exclusion_4_3\"><span class=\"SAWE_settings_title\">Show post excerpt, full content, or nothing?</span>
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
				<p>Designate a category for announcements to show in a widget while excluding it from the main loop.</p>
				
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
				<strong>About Default Styles</strong>
				<p>You have the option of loading the default styles for the widget/shortcode area, which will style 
				the output of SAWE to make the content fit in the best way possible.  However, since each theme is different, 
				and styling can be tricky when it comes to preparing for the potential thousands of different themes this 
				plugin could interact with, I can't say that it will look great <strong>in every situation</strong>.</p>
				<p>Should you find that loading the default styles makes it stick out in a way that is unsastisfactory, I'd 
				suggest simply disabling that option, adding a class name, and editing the CSS manually.</p>
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
			$SAWE_1_w = ( get_option("simple_announcement_with_exclusion_1") );
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
				$args = array( 
					"category" => $SAWE_1_w, 
					"numberposts" => $SAWE_2_w, 
					"order" => $SAWE_3_2_w, 
					"orderby" => $SAWE_3_w 
				);
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

// Hook into the loop and exclude our announcements category from showing on the front page.
// if the option to do is set.
	function SAWE_filter_home( $query ) {
		$SAWE_1_fh = ( get_option("simple_announcement_with_exclusion_1") );
		$SAWE_5_fh = ( get_option("simple_announcement_with_exclusion_5") );
		if ( $query->is_home() && $query->is_main_query() && $SAWE_5_fh == "yes" ) {
			$query->set( "cat", "-".$SAWE_1_fh."" );
		}
	}
	add_action( "pre_get_posts", "SAWE_filter_home" );
	
	
	
	
// SAWE-004
// Shortcode (for displaying wherever)
	function SAWE_shortcode() {
		if (!is_admin() ) {
			$SAWE_0_sc = ( get_option("simple_announcement_with_exclusion_0") );
			$SAWE_1_sc = ( get_option("simple_announcement_with_exclusion_1") );
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
				$args = array( 
					"category" => $SAWE_1_sc, 
					"numberposts" => $SAWE_2_sc, 
					"order" => $SAWE_3_2_sc, 
					"orderby" => $SAWE_3_sc 
				);
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
?>