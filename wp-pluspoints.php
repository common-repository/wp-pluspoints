<?php
/*
Plugin Name: Your PointsPlus
Plugin URI: http://www.dingobytes.com/wordpress/wordpress-plus-points/
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=AHW8KLEXPH6GC
Description: A plug-in that will allow you to log your meals and let you know how many Plus Points you use in relationship to your targeted daily plus points.
Version: 1.3.6
Author: Andrew Alba
Author URI: http://www.dingobytes.com/

        Credits & Thanks: http://www.weightwatchers.com/

*/
$WPPP_vNum = '1.3.6';

// Check for location modifications in wp-config
// Then define accordingly
define('WPPP_PLUGDIR', plugin_dir_path(__FILE__));
define('WPPP_PLUGPATH', plugin_dir_url(__FILE__));

// contains functions for calculations
require_once 'wp-pluspoints.class.php';

function wp_pluspoints_func($atts) {
	global $WP_PlusPoints;
	extract(shortcode_atts(array(
		'servings' => 1,
		'protein' => 0,
		'carbs' => 0,
		'fat' => 0,
		'fiber' => 0,
	), $atts));
	return $WP_PlusPoints->getPoints($servings,$protein,$carbs,$fat,$fiber);
}

function wp_pluspoints_total_func($atts) {
	global $WP_PlusPoints;
	global $wppp_daily_points;
	extract(shortcode_atts(array(
		'daily_total' => get_option('wppp_daily_points'),
	), $atts));
	return $WP_PlusPoints->getPostWPPPTotals($daily_total);
}

add_shortcode('wppp', 'wp_pluspoints_func');
add_shortcode('wppp_total', 'wp_pluspoints_total_func');

/* Assigning hooks to actions */
$WP_PlusPoints = new WP_PlusPoints();

wp_register_style('WPPP-CSS', WPPP_PLUGPATH . 'wppp.css');
wp_enqueue_style('WPPP-CSS');
wp_enqueue_script('WPPP-JS', WPPP_PLUGPATH . 'wppp.js', array('jquery'), '0.1');

/* @desc Adds the Settings link to the plugin activate/deactivate page */
function wppp_plugin_action_links($links, $file) {
	if ( $file == plugin_basename( dirname(__FILE__).'/wp-pluspoints.php' ) ) {
		$links[] = '<a href="options-general.php?page=wp_pluspoints">' . __('Settings', 'wp_pluspoints') . '</a>';
	}

	return $links;
}

// create custom plugin settings menu
add_action('admin_menu', 'wppp_create_menu');

function wppp_create_menu() {
	//create new top-level menu
	if ( function_exists('add_submenu_page') ) {
		add_submenu_page('options-general.php', __('Your PointsPlus Plugin Settings'), __('Your PointsPlus'), 'manage_options', 'wp_pluspoints', 'wppp_settings_page');
	}
	//add_options_page('Your PointsPlus Plugin Settings', 'Your PointsPlus', 'administrator', __FILE__, 'wppp_settings_page');
	add_filter('plugin_action_links','wppp_plugin_action_links',10,2);
	//call register settings function
	add_action( 'admin_init', 'register_wppp_settings' );
}

//setup warning
function wppp_admin_warnings() {
	global $wppp_daily_points;
	if ( !get_option('wppp_daily_points') && !isset($_POST['submit']) ) {
		function wppp_warning() {
			echo "
			<div id='wppp-warning' class='updated fade'><p><strong>".__('WordPress PlusPoints plug-in is almost ready.', 'wp_pluspoints')."</strong> ".sprintf(__('You must <a href="%1$s">enter your personal information</a> for it to work.', 'wp_pluspoints'), "options-general.php?page=wp-pluspoints/wp-pluspoints.php")."</p></div>
			";
		}
		add_action('admin_notices', 'wppp_warning');
		return;
	}
}

function wppp_warning_init() {
	wppp_admin_warnings();
}
add_action('init', 'wppp_warning_init');

function admin_register_head() {
	echo '<link rel="stylesheet" type="text/css" href="' . WPPP_PLUGPATH . 'wppp_admin.css" />';
	echo '<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,400italic|Pacifico" rel="stylesheet" type="text/css"/>';
}
add_action('admin_head', 'admin_register_head');

function register_wppp_settings() {
	//register our settings
	register_setting('wppp-settings-group', 'wppp_daily_points');
	register_setting('wppp-settings-group', 'wppp_sex');
	register_setting('wppp-settings-group', 'wppp_age');
	register_setting('wppp-settings-group', 'wppp_unit_of_measurement');
	register_setting('wppp-settings-group', 'wppp_weight');
	register_setting('wppp-settings-group', 'wppp_height');
	register_setting('wppp-settings-group', 'wppp_credits');
}

// admin settings
require_once 'wp-pluspoints-admin.php';
?>