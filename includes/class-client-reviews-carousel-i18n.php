<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://github.com/AndreiF13/client-reviews-carousel/
 * @since      1.0.0
 *
 * @package    client_reviews_carousel
 * @subpackage client_reviews_carousel/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    client_reviews_carousel
 * @subpackage client_reviews_carousel/includes
 * @author     AndreiF13 <andrei@webdesignwordpress.eu>
 */
class client_reviews_carousel_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'client-reviews-carousel',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}

}
