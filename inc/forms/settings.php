<?php 
	function print_simple_announcement_with_exclusion_form() {
		global $wpdb;
		echo "<div class=\"exclusions\">
		<input type=\"radio\" id=\"instance1\" name=\"selectFromThis\" class=\"instanceTrigger1\"><label for=\"instance1\">Exclusion rules</label>
		<input type=\"radio\" id=\"instance2\" name=\"selectFromThis\" class=\"instanceTrigger2\"><label for=\"instance2\">Saved loops</label>
		<input type=\"radio\" id=\"instance3\" name=\"selectFromThis\" class=\"instanceTrigger3\"><label for=\"instance3\">Default loop</label>
		<input type=\"radio\" id=\"instance4\" name=\"selectFromThis\" class=\"instanceTrigger4\"><label for=\"instance4\">New/Edit loops</label>
		<hr />
		
		<div class=\"list\"><div>";
		$showmecats =  get_categories('taxonomy=category'); 
			echo "<item>Category ids</item>";
		foreach ($showmecats as $catsshown) {
			echo "<item><span class=\"listleft\">",$catsshown->cat_name,"</span><span class=\"listright\">",$catsshown->cat_ID,"</span></item>";
		}		
			echo "</div><div>";
		$showmetags =  get_categories('taxonomy=post_tag'); 
			echo "<item>Tag ids</item>";
		foreach ($showmetags as $tagsshown) {
			echo "<item><span class=\"listleft\">",$tagsshown->cat_name,"</span><span class=\"listright\">",$tagsshown->cat_ID,"</span></item>";
		}		
		echo "</div></div>
		
		<hr />
		
		
		";
		
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
		<div class=\"instance1\">
		<form method=\"post\" class=\"exclude\">
		
		<div class=\"posttypeselection\">		
		I 
		<select name=\"simple_announcement_with_exclusion_6\">
		<option value=\"yes\" "; if ($simple_announcement_with_exclusion_6 === "yes") { echo " selected=\"selected\""; } echo ">do</option>
		<option value=\"no\" "; if ($simple_announcement_with_exclusion_6 === "no") { echo " selected=\"selected\""; } echo ">do not</option>
		</select>
		want to include the default CSS for this plugin on all pages, 
		and use the 
		<select name=\"simple_announcement_with_exclusion_scheme\">
		<option value=\"tranquil\""; if ($simple_announcement_with_exclusion_scheme === "tranquil") { echo " selected=\"selected\""; } echo ">Tranquil</option>
		</select>
		color scheme.  
		<input type=\"text\" name=\"simple_announcement_with_exclusion_readmore\" value=\"$simple_announcement_with_exclusion_readmore\" />
		will be my \"Read more\" link text (when using excerpts). 
		</div>
		
		<div class=\"posttypeselection\">
		I 
		<select name=\"simple_announcement_with_exclusion_delete_on_deactivate\">
		<option value=\"yes\" "; if ($simple_announcement_with_exclusion_delete_on_deactivate === "yes") { echo " selected=\"selected\""; } echo ">do</option>
		<option value=\"no\" "; if ($simple_announcement_with_exclusion_delete_on_deactivate === "no") { echo " selected=\"selected\""; } echo ">do not</option>
		</select>
		want to delete all options and databases associated with this plugin when I deactivate it in the admin menu.
		</div>
		
		
		<div class=\"posttypeselection\">		
		I want to hide the following 
		<input type=\"radio\" id=\"instance5\" name=\"selectFromThisToo\" class=\"instanceTrigger5\"><label class=\"inline\" for=\"instance5\">categories</label>
		<input type=\"radio\" id=\"instance6\" name=\"selectFromThisToo\" class=\"instanceTrigger6\"><label class=\"inline\" for=\"instance6\">tags</label>
		<input type=\"radio\" id=\"instance7\" name=\"selectFromThisToo\" class=\"instanceTrigger7\"><label class=\"inline\" for=\"instance7\">post-formats</label>:
		<div class=\"categoriesSelect\">
		<input type=\"text\" name=\"simple_announcement_with_exclusion_9_12\" value=\"$simple_announcement_with_exclusion_9_12\">
		from the <em>feed</em>, 
		<input type=\"text\" name=\"simple_announcement_with_exclusion_9\" value=\"$simple_announcement_with_exclusion_9\">
		from the <em>front page</em>, 
		<input type=\"text\" name=\"simple_announcement_with_exclusion_9_2\" value=\"$simple_announcement_with_exclusion_9_2\">
		from tag <em>archives</em>, 
		<input type=\"text\" name=\"simple_announcement_with_exclusion_9_3\" value=\"$simple_announcement_with_exclusion_9_3\">
		and from <em>search results</em>.
		</div>
		<div class=\"tagsSelect\">
		<input type=\"text\" name=\"simple_announcement_with_exclusion_9_13\" value=\"$simple_announcement_with_exclusion_9_13\">
		from the <em>feed</em>, 
		<input type=\"text\" name=\"simple_announcement_with_exclusion_9_4\" value=\"$simple_announcement_with_exclusion_9_4\">
		from the <em>front page</em>, 
		<input type=\"text\" name=\"simple_announcement_with_exclusion_9_5\" value=\"$simple_announcement_with_exclusion_9_5\">
		from <em>category archives</em>, 
		<input type=\"text\" name=\"simple_announcement_with_exclusion_9_7\" value=\"$simple_announcement_with_exclusion_9_7\">
		and from <em>search results</em>.
		</div>
		<div class=\"formatsSelect\">
		<select name=\"simple_announcement_with_exclusion_9_14\">
		<option value=\"\">none</option>
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
		from the <em>feed</em>, 
		<select name=\"simple_announcement_with_exclusion_9_8\">
		<option value=\"\">none</option>
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
		from the <em>front page</em>, 
		<select name=\"simple_announcement_with_exclusion_9_9\">
		<option value=\"\">none</option>
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
		from <em>category archives</em>, 
		<select name=\"simple_announcement_with_exclusion_9_10\">
		<option value=\"\">none</option>
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
		from <em>tag archives</em>, 
		<select name=\"simple_announcement_with_exclusion_9_11\">
		<option value=\"\">none</option>
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
		and from <em>search results</em>.
		</div>		
		</div>
		<input type=\"submit\" name=\"submit\" value=\"Save these settings for me\" />
		</form>
		</div>
		";

	// Save states form
		echo "
			<div class=\"instance2\">";
		
		$SAWE_table_name = $wpdb->prefix . "SAWE_config";
			global $wpdb;
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
				"
				<div class=\"posttypeselection\">
				 [sawe config_id=\"",$SAWE_table_admin->saweID,"\"] will 
				show $saweAMOUNT ";
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
			
			
				echo ", with navigation links marked as follows:  ";
				
				if( $saweNEXT ) { echo "Next ( $saweNEXT ) "; }
				elseif( !$saweNEXT ) { echo "Next (has no custom title). "; }
				
				if( $sawePREVIOUS ) { echo " Previous ( $sawePREVIOUS )"; }
				elseif( !$sawePREVIOUS ) { echo "and Previous (has no custom title)."; }
				elseif( $sawePREVIOUS && $saweNEXT ) { echo "and Previous ( $sawePrevious )"; }
				
			
				echo " from "; 
			
				if ( $saweCAT != "" || $saweTAG != "" ) {
					echo "category (or tag) id(s) <strong>" . $saweCAT . $saweTAG . "</strong>";
				} else {
					echo "post format $saweFORMAT";
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
				}		
			}

		echo "</div>
		<div class=\"instance3\">
		<div class=\"posttypeselection\">
		<form method=\"post\">
		For the default loop (displayed with [sawe]), 
		the class should be 
		<input type=\"text\" name=\"simple_announcement_with_exclusion_default_0\" value=\"",$simple_announcement_with_exclusion_default_0,"\" />
		.  It should show 
		<input type=\"text\" name=\"simple_announcement_with_exclusion_default_1\" value=\"",$simple_announcement_with_exclusion_default_1,"\" />
		 posts, ordered by 
		<select name=\"simple_announcement_with_exclusion_default_2\">
		<option value=\"date\" ";if ($simple_announcement_with_exclusion_default_2 === "date") { echo "selected=\"selected\""; } echo ">Date</option>
		<option value=\"title\" ";if ($simple_announcement_with_exclusion_default_2 === "title") { echo "selected=\"selected\""; } echo ">Title</option>
		<option value=\"rand\" ";if ($simple_announcement_with_exclusion_default_2 === "rand") { echo "selected=\"selected\""; } echo ">Random</option>
		</select>
		 in 
		<select name=\"simple_announcement_with_exclusion_default_3\">
		<option value=\"ASC\" ";if ($simple_announcement_with_exclusion_default_3 === "ASC") { echo "selected=\"selected\""; } echo ">Ascending</option>
		<option value=\"DESC\" ";if ($simple_announcement_with_exclusion_default_3 === "DESC") { echo "selected=\"selected\""; } echo ">Descending</option>
		</select>
		 order.  I 
		<select name=\"simple_announcement_with_exclusion_default_4\">
		<option value=\"yes\" ";if ($simple_announcement_with_exclusion_default_4 === "yes") { echo "selected=\"selected\""; } echo ">do</option>
		<option value=\"no\" ";if ($simple_announcement_with_exclusion_default_4 === "no") { echo "selected=\"selected\""; } echo ">do not</option>
		</select>
		want post thumbnails shown.  The post title 
		<select name=\"simple_announcement_with_exclusion_default_5\">
		<option value=\"yes\" ";if ($simple_announcement_with_exclusion_default_5 === "yes") { echo "selected=\"selected\""; } echo ">should</option>
		<option value=\"no\" ";if ($simple_announcement_with_exclusion_default_5 === "no") { echo "selected=\"selected\""; } echo ">should not</option>
		</select>
		be displayed, and 
		<select name=\"simple_announcement_with_exclusion_default_6\">
		<option value=\"nothing\" ";if ($simple_announcement_with_exclusion_default_6 === "nothing") { echo "selected=\"selected\""; } echo ">nothing from</option>
		<option value=\"excerpt\" ";if ($simple_announcement_with_exclusion_default_6 === "excerpt") { echo "selected=\"selected\""; } echo ">the excerpt of</option>
		<option value=\"content\" ";if ($simple_announcement_with_exclusion_default_6 === "content") { echo "selected=\"selected\""; } echo ">the content of</option>
		</select>
		the post should be seen.  
		I 
		<select name=\"simple_announcement_with_exclusion_default_7\">
		<option value=\"yes\" ";if ($simple_announcement_with_exclusion_default_7 === "yes") { echo "selected=\"selected\""; } echo ">would</option>
		<option value=\"no\" ";if ($simple_announcement_with_exclusion_default_7 === "no") { echo "selected=\"selected\""; } echo ">would not</option>
		</select>
		like it to be paged, and the previous and next links (if it <strong>is</strong> paged) should read 
		<input type=\"text\" name=\"simple_announcement_with_exclusion_default_8\" value=\"",$simple_announcement_with_exclusion_default_8,"\" />
		 and 
		<input type=\"text\" name=\"simple_announcement_with_exclusion_default_9\" value=\"",$simple_announcement_with_exclusion_default_9,"\" />
		(respectively).
		<input type=\"submit\" name=\"defaultSave\" value=\"I would like to save these defaults.\" />
		</form>
		</div></div>
		<div class=\"instance4\">
		<div class=\"posttypeselection\">
		<form method=\"post\">
		I would like to <select name=\"edit_this\" class=\"selectfull\">
		<option value=\"\">create a new</option>";
		global $wpdb;
		$SAWE_table_name = $wpdb->prefix . "SAWE_config";
		$SAWE_table_ad = $wpdb->get_results ("SELECT * FROM $SAWE_table_name ORDER BY saweID DESC");
		foreach ($SAWE_table_ad as $SAWE_table_admin) {
			echo "<option value=\"$SAWE_table_admin->saweID\">edit id $SAWE_table_admin->saweID</option>";
		}		
		echo "</select> loop with the following: 
		the div class should be 
		<input type=\"text\" name=\"simple_announcement_with_exclusion_0_new\" />.  
		It will show  
		<input type=\"text\" name=\"simple_announcement_with_exclusion_2_new\" /> posts from the  		
		
		
		<input id=\"selectiona\" type=\"radio\" name=\"simple_announcement_with_exclusion_1_new\" value=\"cat\"><label class=\"inline\" for=\"selectiona\">categories</label>
		<input id=\"selectionb\" type=\"radio\" name=\"simple_announcement_with_exclusion_1_new\" value=\"tag\"><label class=\"inline\" for=\"selectionb\">tags</label>
		<input id=\"selectionc\" type=\"radio\" name=\"simple_announcement_with_exclusion_1_new\" value=\"post-format\"><label class=\"inline\" for=\"selectionc\">post format</label>
		
		(<small>click one</small>) 
		
		<input type=\"text\" id=\"selection1\" name=\"simple_announcement_with_exclusion_1_1_new\">
		<select  id=\"selection2\"name=\"simple_announcement_with_exclusion_1_2_new\">
		<option value=\"\"></option>";
		$sawe_tags =  get_categories('taxonomy=post_tag'); 
		foreach ($sawe_tags as $sawe_tag) {
			echo "<option value=\"",$sawe_tag->cat_ID,"\">",$sawe_tag->cat_name," - ",$sawe_tag->category_count,"</option>";
		}
		echo "
		</select>
		<select  id=\"selection3\" name=\"simple_announcement_with_exclusion_1_3_new\">
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
		</select>, 
		ordered by 
		<select name=\"simple_announcement_with_exclusion_3_new\">
		<option value=\"date\">Date</option>
		<option value=\"title\">Title</option>
		<option value=\"rand\">Random</option>
		</select>
		in 
		<select name=\"simple_announcement_with_exclusion_3_2_new\">
		<option value=\"ASC\">Ascending</option>
		<option value=\"DESC\">Descending</option>
		</select>
        order.  I 
		<select name=\"simple_announcement_with_exclusion_4_new\">
		<option value=\"yes\">do</option>
		<option value=\"no\">do not</option>
		</select>
		want to show post thumbnails.  
		Titles 
		<select name=\"simple_announcement_with_exclusion_4_2_new\">
		<option value=\"yes\">should</option>
		<option value=\"no\">should not</option>
		</select>
		shown, 
		and I would like to show 
		<select name=\"simple_announcement_with_exclusion_4_3_new\">
		<option value=\"nothing\">nothing</option>
		<option value=\"excerpt\">the excerpt</option>
		<option value=\"content\">the content</option>
		</select>
		from the post.  
		This loop 
		<select name=\"simple_announcement_with_exclusion_7_new\">
		<option value=\"yes\">should</option>
		<option value=\"no\">should not</option>
		</select>
		be paged, and the previous and next links should read 
		<input type=\"text\" name=\"simple_announcement_with_exclusion_8_1_new\" />
		 and 
		<input type=\"text\" name=\"simple_announcement_with_exclusion_8_2_new\" />
		(respectively).  
		<input type=\"submit\" name=\"submit_new\" value=\"I would like to save (or edit) this loop.\" />";
		if(!isset($_POST['dropConfigs'])){
			echo "
			<input type=\"submit\" name=\"dropConfigs\" value=\"I would like to delete all of my saved loops.\" />
			";
		}			 
		if(isset($_POST['dropConfigs'])){
			echo "
			<input type=\"submit\" name=\"dropConfigsyes\" value=\"I am sure.  Delete them.\" />
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
			
									$wpdb->query( 
										$wpdb->prepare( 
											"INSERT INTO $SAWE_table_name 
											(
												saweID,
												saweDIV,
												saweTYPE,
												saweCAT,
												saweTAG,
												saweFORMAT,
												saweAMOUNT,
												saweBY,
												saweORDER,
												saweTHUMBS,
												saweTITLES,
												saweSHOW,
												sawePAGED,
												sawePREVIOUS,
												saweNEXT
											) VALUES (
												%d,
												%s,
												%s,
												%s,
												%s,
												%s,
												%d,
												%s,
												%s,
												%s,
												%s,
												%s,
												%s,
												%s,
												%s
											)",
											$saweDIV,
											$saweTYPE,
											$saweCAT,
											$saweTAG,
											$saweFORMAT,
											$saweAMOUNT,
											$saweBY,
											$saweORDER,
											$saweTHUMBS,
											$saweTITLES,
											$saweSHOW,
											$sawePAGED,
											$sawePREVIOUS,
											$saweNEXT
										)
									);			
			
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
		echo "</div>
		</div>";
	}
?>