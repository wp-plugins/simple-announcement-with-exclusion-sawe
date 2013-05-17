<?php 
	function print_simple_announcement_with_exclusion_form() {
		$simple_announcement_with_exclusion_default_0 = get_option("simple_announcement_with_exclusion_default_0");
		$simple_announcement_with_exclusion_default_1 = get_option("simple_announcement_with_exclusion_default_1");
		$simple_announcement_with_exclusion_default_2 = get_option("simple_announcement_with_exclusion_default_2");
		$simple_announcement_with_exclusion_default_3 = get_option("simple_announcement_with_exclusion_default_3");
		$simple_announcement_with_exclusion_default_4 = get_option("simple_announcement_with_exclusion_default_4");
		$simple_announcement_with_exclusion_default_5 = get_option("simple_announcement_with_exclusion_default_5");
		$simple_announcement_with_exclusion_default_6 = get_option("simple_announcement_with_exclusion_default_6");
		$simple_announcement_with_exclusion_default_7 = get_option("simple_announcement_with_exclusion_default_7");
		$simple_announcement_with_exclusion_default_8 = get_option("simple_announcement_with_exclusion_default_8");
		$simple_announcement_with_exclusion_default_9 = get_option("simple_announcement_with_exclusion_default_9");
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
		$simple_announcement_with_exclusion_scheme = get_option("simple_announcement_with_exclusion_scheme");
		$simple_announcement_with_exclusion_readmore = get_option("simple_announcement_with_exclusion_readmore");
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
		<div class=\"base\">
		<div class=\"basesection\">
		<div class=\"list\">";
		$showmecats =  get_categories('taxonomy=category'); 
			echo "<item><span class=\"listleft\">Category</span><span class=\"listright\">id</span></item><item><hr /></item>";
		foreach ($showmecats as $catsshown) {
			echo "<item><span class=\"listleft\">",$catsshown->cat_name,"</span><span class=\"listright\">",$catsshown->cat_ID,"</span></item>";
		}		
		echo "</div>
		<div class=\"list\">";
		$showmetags =  get_categories('taxonomy=post_tag'); 
			echo "<item><span class=\"listleft\">Tag</span><span class=\"listright\">id</span></item><item><hr /></item>";
		foreach ($showmetags as $tagsshown) {
			echo "<item><span class=\"listleft\">",$tagsshown->cat_name,"</span><span class=\"listright\">",$tagsshown->cat_ID,"</span></item>";
		}		
		echo "</div>
		</div>
		<div class=\"basesection\">
		<form method=\"post\" class=\"exclude\">
		<header>Exclusion config</header>
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
		<hr />
		<label for=\"simple_announcement_with_exclusion_6\" class=\"divider\">CSS
		<select name=\"simple_announcement_with_exclusion_6\">
		<option value=\"yes\" "; if ($simple_announcement_with_exclusion_6 === "yes") { echo " selected=\"selected\""; } echo ">Yes</option>
		<option value=\"no\" "; if ($simple_announcement_with_exclusion_6 === "no") { echo " selected=\"selected\""; } echo ">No</option>
		</select>
		</label>
		<label for=\"simple_announcement_with_exclusion_scheme\">Colors
		<select name=\"simple_announcement_with_exclusion_scheme\">
		<option value=\"tranquil\""; if ($simple_announcement_with_exclusion_scheme === "tranquil") { echo " selected=\"selected\""; } echo ">Tranquil</option>
		</select>
		</label>
		<label for=\"simple_announcement_with_exclusion_readmore\">Read more
		<input type=\"text\" name=\"simple_announcement_with_exclusion_readmore\" value=\"$simple_announcement_with_exclusion_readmore\" />
		</label>
		<label for=\"simple_announcement_with_exclusion_delete_on_deactivate\" class=\"uninstall\">Uninstall
		<select name=\"simple_announcement_with_exclusion_delete_on_deactivate\">
		<option value=\"yes\" "; if ($simple_announcement_with_exclusion_delete_on_deactivate === "yes") { echo " selected=\"selected\""; } echo ">Yes</option>
		<option value=\"no\" "; if ($simple_announcement_with_exclusion_delete_on_deactivate === "no") { echo " selected=\"selected\""; } echo ">No</option>
		</select>
		</label>
		<label><input type=\"submit\" name=\"submit\" value=\"Save\" /></label>
		</form>
		</div>
		</div>";

	// Save states form
		echo "<div class=\"base\">
		<div class=\"basesection\">
		<header>Saved states</header>
		";		 
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
			 <header>[sawe config_id=\"",$SAWE_table_admin->saweID,"\"]</header>
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
				echo "<p>Exclusion ID: <strong>" . $saweCAT . $saweTAG . "</strong></p>";
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
		echo "</div>	
		<div class=\"basesection\">	
		<header>Default Loop <strong>[sawe]</strong></header>
		<form method=\"post\">
		<label for=\"simple_announcement_with_exclusion_default_0\">Div
		<input type=\"text\" name=\"simple_announcement_with_exclusion_default_0\" value=\"",$simple_announcement_with_exclusion_default_0,"\" />
		</label>
		<label for=\"simple_announcement_with_exclusion_default_1\">Amount
		<input type=\"text\" name=\"simple_announcement_with_exclusion_default_1\" value=\"",$simple_announcement_with_exclusion_default_1,"\" />
		</label>
		<label for=\"simple_announcement_with_exclusion_default_2\">By
		<select name=\"simple_announcement_with_exclusion_default_2\">
		<option value=\"date\" ";if ($simple_announcement_with_exclusion_default_2 === "date") { echo "selected=\"selected\""; } echo ">Date</option>
		<option value=\"title\" ";if ($simple_announcement_with_exclusion_default_2 === "title") { echo "selected=\"selected\""; } echo ">Title</option>
		<option value=\"rand\" ";if ($simple_announcement_with_exclusion_default_2 === "rand") { echo "selected=\"selected\""; } echo ">Random</option>
		</select>
		</label>	
		<label for=\"simple_announcement_with_exclusion_default_3\">Order
		<select name=\"simple_announcement_with_exclusion_default_3\">
		<option value=\"ASC\" ";if ($simple_announcement_with_exclusion_default_3 === "ASC") { echo "selected=\"selected\""; } echo ">Ascending</option>
		<option value=\"DESC\" ";if ($simple_announcement_with_exclusion_default_3 === "DESC") { echo "selected=\"selected\""; } echo ">Descending</option>
		</select>
		</label>
		<label for=\"simple_announcement_with_exclusion_default_4\">Thumbs
		<select name=\"simple_announcement_with_exclusion_default_4\">
		<option value=\"yes\" ";if ($simple_announcement_with_exclusion_default_4 === "yes") { echo "selected=\"selected\""; } echo ">Yes</option>
		<option value=\"no\" ";if ($simple_announcement_with_exclusion_default_4 === "no") { echo "selected=\"selected\""; } echo ">No</option>
		</select>
		</label>
		<label for=\"simple_announcement_with_exclusion_default_5\">Titles
		<select name=\"simple_announcement_with_exclusion_default_5\">
		<option value=\"yes\" ";if ($simple_announcement_with_exclusion_default_5 === "yes") { echo "selected=\"selected\""; } echo ">Yes</option>
		<option value=\"no\" ";if ($simple_announcement_with_exclusion_default_5 === "no") { echo "selected=\"selected\""; } echo ">No</option>
		</select>
		</label>
		<label for=\"simple_announcement_with_exclusion_default_6\">Show
		<select name=\"simple_announcement_with_exclusion_default_6\">
		<option value=\"nothing\" ";if ($simple_announcement_with_exclusion_default_6 === "nothing") { echo "selected=\"selected\""; } echo ">Nothing</option>
		<option value=\"excerpt\" ";if ($simple_announcement_with_exclusion_default_6 === "excerpt") { echo "selected=\"selected\""; } echo ">Excerpt</option>
		<option value=\"content\" ";if ($simple_announcement_with_exclusion_default_6 === "content") { echo "selected=\"selected\""; } echo ">Content</option>
		</select>
		</label>
		<label for=\"simple_announcement_with_exclusion_default_7\">Paged
		<select name=\"simple_announcement_with_exclusion_default_7\">
		<option value=\"yes\" ";if ($simple_announcement_with_exclusion_default_7 === "yes") { echo "selected=\"selected\""; } echo ">Yes</option>
		<option value=\"no\" ";if ($simple_announcement_with_exclusion_default_7 === "no") { echo "selected=\"selected\""; } echo ">No</option>
		</select>
		</label>
		<label for=\"simple_announcement_with_exclusion_default_8\">Previous
		<input type=\"text\" name=\"simple_announcement_with_exclusion_default_8\" value=\"",$simple_announcement_with_exclusion_default_8,"\" />
		</label>
		<label for=\"simple_announcement_with_exclusion_default_9\">Next
		<input type=\"text\" name=\"simple_announcement_with_exclusion_default_9\" value=\"",$simple_announcement_with_exclusion_default_9,"\" />
		</label>				
		<label><input type=\"submit\" name=\"defaultSave\" value=\"Save default\" /></label>
		</form>
		<form method=\"post\">
		<header>Save states</header>
		<label><select name=\"edit_this\" class=\"selectfull\">
		<option value=\"\">Creating new</option>";
		global $wpdb;
		$SAWE_table_name = $wpdb->prefix . "SAWE_config";
		$SAWE_table_ad = $wpdb->get_results ("SELECT * FROM $SAWE_table_name ORDER BY saweID DESC");
		foreach ($SAWE_table_ad as $SAWE_table_admin) {
			echo "<option value=\"$SAWE_table_admin->saweID\">Edit Save state $SAWE_table_admin->saweID</option>";
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
		<center><small><em>Category ids like: 1,2,3...</em></small></center>
		<textarea name=\"simple_announcement_with_exclusion_1_1_new\"></textarea>
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
		if(
			isset($_POST['submit_new']) && $_REQUEST["edit_this"] === "" && $_REQUEST["simple_announcement_with_exclusion_1_1_new"] != "" ||
			isset($_POST['submit_new']) && $_REQUEST["edit_this"] === "" && $_REQUEST["simple_announcement_with_exclusion_1_2_new"] != "" ||
			isset($_POST['submit_new']) && $_REQUEST["edit_this"] === "" && $_REQUEST["simple_announcement_with_exclusion_1_3_new"] != ""
		){
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
		if(
		isset($_POST['submit_new']) && $_REQUEST["edit_this"] != "" && $_REQUEST["simple_announcement_with_exclusion_1_1_new"] != "" ||
		isset($_POST['submit_new']) && $_REQUEST["edit_this"] != "" && $_REQUEST["simple_announcement_with_exclusion_1_2_new"] != "" ||
		isset($_POST['submit_new']) && $_REQUEST["edit_this"] != "" && $_REQUEST["simple_announcement_with_exclusion_1_3_new"] != ""		
		){
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
		echo "</div>";
	}
?>