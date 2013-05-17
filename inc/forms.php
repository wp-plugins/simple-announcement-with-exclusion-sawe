<?php 
	if (is_admin() ) { 
		function update_simple_announcement_with_exclusions_defaults() {
			global $simple_announcement_with_exclusion_default_0;
			global $simple_announcement_with_exclusion_default_1;
			global $simple_announcement_with_exclusion_default_2;
			global $simple_announcement_with_exclusion_default_3;
			global $simple_announcement_with_exclusion_default_4;
			global $simple_announcement_with_exclusion_default_5;
			global $simple_announcement_with_exclusion_default_6;
			global $simple_announcement_with_exclusion_default_7;
			global $simple_announcement_with_exclusion_default_8;
			global $simple_announcement_with_exclusion_default_9;
			if(isset($_POST['defaultSave'])){
				if ($_REQUEST["simple_announcement_with_exclusion_default_0"] != "$simple_announcement_with_exclusion_default_0") { update_option("simple_announcement_with_exclusion_default_0",$_REQUEST["simple_announcement_with_exclusion_default_0"]); }
				if ($_REQUEST["simple_announcement_with_exclusion_default_1"] != "$simple_announcement_with_exclusion_default_1") { update_option("simple_announcement_with_exclusion_default_1",$_REQUEST["simple_announcement_with_exclusion_default_1"]); }
				if ($_REQUEST["simple_announcement_with_exclusion_default_2"] != "$simple_announcement_with_exclusion_default_2") { update_option("simple_announcement_with_exclusion_default_2",$_REQUEST["simple_announcement_with_exclusion_default_2"]); }
				if ($_REQUEST["simple_announcement_with_exclusion_default_3"] != "$simple_announcement_with_exclusion_default_3") { update_option("simple_announcement_with_exclusion_default_3",$_REQUEST["simple_announcement_with_exclusion_default_3"]); }
				if ($_REQUEST["simple_announcement_with_exclusion_default_4"] != "$simple_announcement_with_exclusion_default_4") { update_option("simple_announcement_with_exclusion_default_4",$_REQUEST["simple_announcement_with_exclusion_default_4"]); }
				if ($_REQUEST["simple_announcement_with_exclusion_default_5"] != "$simple_announcement_with_exclusion_default_5") { update_option("simple_announcement_with_exclusion_default_5",$_REQUEST["simple_announcement_with_exclusion_default_5"]); }
				if ($_REQUEST["simple_announcement_with_exclusion_default_6"] != "$simple_announcement_with_exclusion_default_6") { update_option("simple_announcement_with_exclusion_default_6",$_REQUEST["simple_announcement_with_exclusion_default_6"]); }
				if ($_REQUEST["simple_announcement_with_exclusion_default_7"] != "$simple_announcement_with_exclusion_default_7") { update_option("simple_announcement_with_exclusion_default_7",$_REQUEST["simple_announcement_with_exclusion_default_7"]); }
				if ($_REQUEST["simple_announcement_with_exclusion_default_8"] != "$simple_announcement_with_exclusion_default_8") { update_option("simple_announcement_with_exclusion_default_8",$_REQUEST["simple_announcement_with_exclusion_default_8"]); }
				if ($_REQUEST["simple_announcement_with_exclusion_default_9"] != "$simple_announcement_with_exclusion_default_9") { update_option("simple_announcement_with_exclusion_default_9",$_REQUEST["simple_announcement_with_exclusion_default_9"]); }
			}		
		}

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
			global $simple_announcement_with_exclusion_scheme;
			global $simple_announcement_with_exclusion_readmore;
			global $simple_announcement_with_exclusion_delete_on_deactivate;	
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
				if ($_REQUEST["simple_announcement_with_exclusion_scheme"] != "$simple_announcement_with_exclusion_scheme") { update_option("simple_announcement_with_exclusion_scheme",$_REQUEST["simple_announcement_with_exclusion_scheme"]); }
				if ($_REQUEST["simple_announcement_with_exclusion_readmore"] != "$simple_announcement_with_exclusion_readmore") { update_option("simple_announcement_with_exclusion_readmore",$_REQUEST["simple_announcement_with_exclusion_readmore"]); }
				if ($_REQUEST["simple_announcement_with_exclusion_delete_on_deactivate"] != "" && $_REQUEST["simple_announcement_with_exclusion_delete_on_deactivate"] != "$simple_announcement_with_exclusion_delete_on_deactivate") { update_option("simple_announcement_with_exclusion_delete_on_deactivate",$_REQUEST["simple_announcement_with_exclusion_delete_on_deactivate"]); }
			}
		}
	}
?>