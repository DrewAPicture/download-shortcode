<?php
/**
 * Plugin Name: Download Shortcode
 * Plugin URI: http://www.werdswords.com
 * Description: Allows you to wrap uploaded file links in a shortcode that will force a download when clicked
 * Author: Drew Jaynes (DrewAPicture)
 * Author URI: http://www.werdswords.com
 * Version: 1.1
 */

require_once( __DIR__ . '/includes/class-download-shortcode.php' );

/**
 * Class Download_Shortcode_Setup
 */
class Download_Shortcode_Setup {

	private static $_instance;

	/**
	 * Instantiate singelton.
	 *
	 * @return Download_Shortcode_Setup
	 */
	public static function get_instance() {
		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new Download_Shortcode_Setup();
			self::$_instance->startup();

//			self::$_instance->shortcode = new Download_Shortcode();
		}
		return self::$_instance;
	}

	/**
	 * Start it up.
	 *
	 * Take care of the textdomain, activation and deactivation hooks, etc.
	 */
	public function startup() {
		// Translations.
		load_plugin_textdomain( 'force_download_shortcode', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );

		// Register deactivation hook.
		register_deactivation_hook( __FILE__, array( $this, 'deactivate' ) );

		// Requires.
		require_once( __DIR__ . '/includes/class-download-shortcode.php' );
	}
}
$shortcode = Download_Shortcode_Setup::get_instance();
