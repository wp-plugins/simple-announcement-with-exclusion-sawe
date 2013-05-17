<?php 
	register_activation_hook( __FILE__, "simple_announcement_with_exclusion_install" );
	register_activation_hook( __FILE__, "simple_announcement_with_exclusion_table" );
	register_deactivation_hook( __FILE__, "simple_announcement_with_exclusion_uninstall" );
	
	add_shortcode("sawe", "SAWE_shortcode");
	add_action( "pre_get_posts", "SAWE_filter_home" );
	add_action("admin_menu", "simple_announcement_with_exclusion_add_options_page");

	function simple_announcement_with_exclusion_settings_link($links) { 															
		$settings_link = '<a href="options-general.php?page=simple_announcement_with_exclusion">Settings</a>'; 
		array_unshift($links, $settings_link); 
		return $links; 
	}

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

	function simple_announcement_with_exclusion_install() {																			
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
		add_option("simple_announcement_with_exclusion_default_0","","Default loop 0");
		add_option("simple_announcement_with_exclusion_default_1","","Default loop 1");
		add_option("simple_announcement_with_exclusion_default_2","","Default loop 2");
		add_option("simple_announcement_with_exclusion_default_3","","Default loop 3");
		add_option("simple_announcement_with_exclusion_default_4","","Default loop 4");
		add_option("simple_announcement_with_exclusion_default_5","","Default loop 5");
		add_option("simple_announcement_with_exclusion_default_6","","Default loop 6");
		add_option("simple_announcement_with_exclusion_default_7","","Default loop 7");
		add_option("simple_announcement_with_exclusion_default_8","","Default loop 8");
		add_option("simple_announcement_with_exclusion_default_9","","Default loop 9");
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
		add_option("simple_announcement_with_exclusion_scheme","tranquil","Color scheme");
		add_option("simple_announcement_with_exclusion_readmore","Continune reading","Read more link text");
		add_option("simple_announcement_with_exclusion_delete_on_deactivate","no","Delete on deactivate?");
	}

	function simple_announcement_with_exclusion_uninstall() {
		if ( get_option("simple_announcement_with_exclusion_delete_on_deactivate") === "yes") {
			delete_option("simple_announcement_with_exclusion_default_0");
			delete_option("simple_announcement_with_exclusion_default_1");
			delete_option("simple_announcement_with_exclusion_default_2");
			delete_option("simple_announcement_with_exclusion_default_3");
			delete_option("simple_announcement_with_exclusion_default_4");
			delete_option("simple_announcement_with_exclusion_default_5");
			delete_option("simple_announcement_with_exclusion_default_6");
			delete_option("simple_announcement_with_exclusion_default_7");
			delete_option("simple_announcement_with_exclusion_default_8");
			delete_option("simple_announcement_with_exclusion_default_9");
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
			delete_option("simple_announcement_with_exclusion_scheme");
			delete_option("simple_announcement_with_exclusion_readmore");
			delete_option("simple_announcement_with_exclusion_delete_on_deactivate");
			global $wpdb;
			$SAWE_table_name = $wpdb->prefix . "SAWE_config";
			$wpdb->query("TRUNCATE TABLE $SAWE_table_name");
			$wpdb->query("DROP TABLE $SAWE_table_name");
		}
	}
?>