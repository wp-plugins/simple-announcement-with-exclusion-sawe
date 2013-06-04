<?php
	/*
	 * Plugin Name: Simple Announcement With Exclusion (SAWE)
	 * Description: Specify multiple categories, tags, or post formats to show separately, or hide from certain loops.
	 * Author: Matthew Trevino
	 * Author URI: http://papercaves.com
	 * Plugin URI: http://papercaves.com/sawe/
	 * Version: 5.0
	 * License: GPL2
	 */
 
	include( plugin_dir_path( __FILE__ ) . 'inc/functions.php');
	include( plugin_dir_path( __FILE__ ) . 'inc/variables.php');
	include( plugin_dir_path( __FILE__ ) . 'inc/forms.php');

	if (!is_admin() && get_option("simple_announcement_with_exclusion_6") === "yes") {												
		if (get_option("simple_announcement_with_exclusion_scheme") === "tranquil") {
				wp_register_style( 'SAWEDefaultStylesheet', plugins_url('default.css', __FILE__), '1.4' );
			} else {
				wp_register_style( 'SAWEDefaultStylesheet', plugins_url('default.css', __FILE__), '1.4' );
			}
		wp_enqueue_style( 'SAWEDefaultStylesheet' );
	}
	
	$simple_announcement_with_exclusion_plugin = plugin_basename(__FILE__); 
	add_filter("plugin_action_links_$simple_announcement_with_exclusion_plugin", 'simple_announcement_with_exclusion_settings_link' );

	function SAWE_style() {																											
		wp_register_style( 'SAWEStylesheet', plugins_url('style.css', __FILE__), '2.5' );
		wp_enqueue_style( 'SAWEStylesheet' );
	}
		
	function simple_announcement_with_exclusion_add_options_page() {																
		$SAWE_options = add_options_page("SAWE", "SAWE", "manage_options", "simple_announcement_with_exclusion", "simple_announcement_with_exclusions_page_content");
		add_action( $SAWE_options, 'SAWE_style' );
	}		
 
	include( plugin_dir_path( __FILE__ ) . 'inc/forms/settings.php');


	function simple_announcement_with_exclusions_page_content() {
		if (is_admin() ) {
			echo "<div class=\"papercaves_plugin_container\"><h2>Simple Announcement With Exclusion</h2><p>Created by Matt @ <a href=\"http://papercaves.com/\">Paper Caves</a> &mdash; <a href=\"http://papercaves.com/sawe/\">Documentation</a><br />
			<strong><em>Don't forget to <a href=\"http://wordpress.org/support/view/plugin-reviews/simple-announcement-with-exclusion-sawe\">rate and review</a> this plugin if you found it helpful!</em></strong></p>";
			if(isset($_POST["submit"])){
				if ($_REQUEST["submit"]) { 
					update_simple_announcement_with_exclusions();
				}
			}
			if(isset($_POST["defaultSave"])){
				if ($_REQUEST["defaultSave"]) { 
					update_simple_announcement_with_exclusions_defaults();
				}
			}		
			print_simple_announcement_with_exclusion_form();
			echo "</div>";
		}
	}

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
				global $simple_announcement_with_exclusion_readmore;
				$sc1 = explode(',', $simple_announcement_with_exclusion_9);
				foreach ($sc1 as &$SC1) { $SC1 = "".$SC1.","; }
				$sc_1 = implode($sc1);		
				$sc11 = explode(',', str_replace(' ', '', $sc_1));
				$st1 = explode(',', $simple_announcement_with_exclusion_9_4);
				foreach ($st1 as &$ST1) { $ST1 = "".$ST1.","; }
				$st_1 = implode($st1);		
				$st11 = explode(',', str_replace(' ', '', $st_1));
				if ($simple_announcement_with_exclusion_default_7 === "yes") {
					$defaultPage = (get_query_var('paged')) ? get_query_var('paged') : 1;
				}
				if ($simple_announcement_with_exclusion_default_7 === "no") {
					$defaultPage = '';
				}
				wp_reset_postdata();
				global $more;
				$defaultQuery = new WP_Query( array(
				'paged' => $defaultPage,
				'posts_per_page' => $simple_announcement_with_exclusion_default_1,
				'order' => $simple_announcement_with_exclusion_default_3, 
				'orderby' => $simple_announcement_with_exclusion_default_2
				));				
				if (
					$simple_announcement_with_exclusion_default_6 === "content" && is_home() ||
					$simple_announcement_with_exclusion_default_6 === "content" && is_single() ||
					$simple_announcement_with_exclusion_default_6 === "content" && is_archive()
				)
				{ }
				else {
				echo "<div id=\"SAWE_shortcode\"><article ";
				if ($simple_announcement_with_exclusion_default_0 != "") {
				echo "class=\"$simple_announcement_with_exclusion_default_0\"";
				}
				echo ">";
				while ($defaultQuery->have_posts()) : $defaultQuery->the_post();
				global $post;
				$more = 0;		
				echo "<section><div>";
				if ($simple_announcement_with_exclusion_default_4 === "yes") { 
					if ( has_post_thumbnail() ) { 
						echo "<a href=\"",the_permalink(),"\" title=\"",the_title(),"\">
						",the_post_thumbnail( "thumbnail" ),"</a><br />";
					}
				}
				if ($simple_announcement_with_exclusion_default_5 === "yes") { 
					echo "<a class=\"SAWE_shortcode_title\" href=\"",the_permalink(),"\">",the_title(),"</a>";
				}
				if ($simple_announcement_with_exclusion_default_6 === "excerpt") { the_excerpt(); 
				} elseif ($simple_announcement_with_exclusion_default_6 === "content") { the_content("".$simple_announcement_with_exclusion_readmore."");
				global $numpages;
					if ( is_singular() && $numpages > 1 ) {
						echo "<a class=\"continue\" href=\"",the_permalink(),"\">",$simple_announcement_with_exclusion_readmore,"</a>";
					}
				}
				echo "</section>";
				endwhile;
				if (
					$simple_announcement_with_exclusion_default_6 === "content" && is_home() ||
					$simple_announcement_with_exclusion_default_6 === "content" && is_single() ||
					$simple_announcement_with_exclusion_default_6 === "content" && is_archive()
				) { } else {					
					if ($simple_announcement_with_exclusion_default_7 === "yes") {
						if ( (function_exists("wp_pagenavi")) ) {
							echo "<p>";
							wp_pagenavi(array( 'query' => $defaultQuery ) );
							echo "</p>";
						} else { 
							$big = 999999999;
							if ($permalinks === "default") {
								echo "<p>",paginate_links( array(
									'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
									'format' => '?paged=%#%',
									'current' => max( 1, get_query_var('paged') ),
									'total' => $defaultQuery->max_num_pages,
									'prev_text' => __($simple_announcement_with_exclusion_default_8),
									'next_text' => __($simple_announcement_with_exclusion_default_9)
								) ),"</p>";
							}
							if ($permalinks === "pretty") {
								echo "<p>",paginate_links( array(
									'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
									'format' => '/paged/%#%',
									'current' => max( 1, get_query_var('paged') ),
									'total' => $defaultQuery->max_num_pages,
									'prev_text' => __($simple_announcement_with_exclusion_default_8),
									'next_text' => __($simple_announcement_with_exclusion_default_09)
								) ),"</p>";
							}
						}
					}
				}
				wp_reset_postdata();
				echo "</article></div>";
			}
			} else {
				global $simple_announcement_with_exclusion_readmore;
				echo "<div id=\"SAWE_shortcode\">";
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
						wp_reset_postdata();
						global $more;
						echo "<article";
						if ($saweDIV != "") { echo " class=\"$saweDIV"; }
						echo ">";						
						while ($newShortcode->have_posts()) : $newShortcode->the_post();
						global $post;
						$more = 0;
						echo "<section>";
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
						} elseif ($saweSHOW === "content") {  the_content("".$simple_announcement_with_exclusion_readmore.""); 
							global $numpages;
							if ( is_singular() && $numpages > 1 ) {
								echo "<a class=\"continue\" href=\"",the_permalink(),"\">",$simple_announcement_with_exclusion_readmore,"</a>";
							}
						}
						echo "</section>";
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
						echo "</article>";
						wp_reset_postdata();
					}
				}
				echo "</div>";
			}
		}
		return ob_get_clean();
	}

	function the_category_filter($exclude_cats) {
		global $simple_announcement_with_exclusion_9_12;
		global $simple_announcement_with_exclusion_9_13;
		$cats1 = explode(',', $simple_announcement_with_exclusion_9_12);
		foreach ($cats1 as &$CATS1) { $CATS1 = "".$CATS1.","; }
		$cats_1 = implode($cats1);		
		$cats11 = explode(',', str_replace(' ', '', $cats_1));
		$exclude_cats['exclude'] = $cats11;
	}
	add_filter('wp_list_categories','the_category_filter');	
	
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