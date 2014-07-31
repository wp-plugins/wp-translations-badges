<?php
/**
 * @package   Wp_Translations_Badges
 * @author    Myles McNamara <myles@smyl.es>, fxbenard <fxb@wp-translations.org>
 * @license   GPL-2.0+
 * @link      http://smyl.es
 * @copyright 2014 Myles McNamara, fxbenard
 *
 * @wordpress-plugin
 * Plugin Name: WP-Translations Badges
 * Plugin URI:  http://github.com/wp-translations/wp-translations-badges
 * Description: Display WP-Translations badges on your site with Shortcode or Widget
 * Version:     1.0.5
 * Author:      fxbenard | FxB
 * Author URI:  http://wp-translations.org
 * Text Domain: wp-translations-badges
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * GitHub Plugin URI: https://github.com/WP-Translations/wp-translations-badges
 * GitHub Branch:   master
 * Domain Path: /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

require_once( plugin_dir_path( __FILE__ ) . 'class-wp-translations-badges.php' );

require_once( plugin_dir_path( __FILE__ ) . '/includes/widget-wp_translations_badge.php' );

// Register hooks that are fired when the plugin is activated or deactivated.
// When the plugin is deleted, the uninstall.php file is loaded.
register_activation_hook( __FILE__, array( 'Wp_Translations_Badges', 'activate' ) );
register_deactivation_hook( __FILE__, array( 'Wp_Translations_Badges', 'deactivate' ) );

// Load instance
add_action( 'plugins_loaded', array( 'Wp_Translations_Badges', 'get_instance' ) );
//Wp_Translations_Badges::get_instance();

// Add filter to add new plugin row meta
add_filter( 'plugin_row_meta', array( 'Wp_Translations_Badges', 'add_wptb_row_meta'), 10, 4 );

?>