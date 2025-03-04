<?php
/**
 * Author Details
 *
 * Plugin Name: Author Details
 * Plugin URI:  https://wordpress.org/plugins/author-details/
 * Description: Display the author details at the end of the post.
 * Version:     1.7
 * Author:      EDC TEAM (E-Dawah Committee)
 * Author URI:  https://edc.org.kw
 * License:     GPLv2 or later
 * License URI: http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * Requires at least: 5.0
 * Requires PHP: 7.4
*/

global $ad_plugin_dir_path;
$ad_plugin_dir_path = WP_CONTENT_URL.'/plugins/'.plugin_basename(dirname(__FILE__));

include_once(dirname(__FILE__).'/includes/includes-master-list.php');
include_once(dirname(__FILE__).'/admin/admin.php');


//Call the Installer/Upgrader when plugin is activated
function ad_activate(){
	require_once(dirname(__FILE__).'/installer.php');
}

//Adding hooks
register_activation_hook(__FILE__, 'ad_activate');

//Adding CSS
function Author_Details_Style() {
	global $ad_plugin_dir_path;
	wp_enqueue_style('author_details_style', $ad_plugin_dir_path.'/author-details-style.css');
}
add_action('wp_enqueue_scripts', 'Author_Details_Style');

$top_priority = 0;
add_filter('the_content', 'ad_append_author_details_bio', $top_priority);
?>
