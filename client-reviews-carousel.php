<?php
/**
 * Plugin Name:       Client Reviews Carousel (Testimonials)
 * Plugin URI:        https://github.com/AndreiF13/client-reviews-carousel
 * Description:       Client Reviews Carousel Plugin renders the reviews in a carousel with swipe animation. 
 * Version:           1.0.0
 * Author:            AndreiF13
 * Author URI:        https://github.com/AndreiF13/client-reviews-carousel/
 * License:           GPL-3.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-3.0-standalone.html
 * Text Domain:       client-reviews-carousel
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'CLIENT_REVIEWS_CAROUSEL_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-client-reviews-carousel-activator.php
 */
function activate_client_reviews_carousel() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-client-reviews-carousel-activator.php';
	client_reviews_carousel_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-client-reviews-carousel-deactivator.php
 */
function deactivate_client_reviews_carousel() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-client-reviews-carousel-deactivator.php';
	client_reviews_carousel_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_client_reviews_carousel' );
register_deactivation_hook( __FILE__, 'deactivate_client_reviews_carousel' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-client-reviews-carousel.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_client_reviews_carousel() {

	$plugin = new client_reviews_carousel();
	$plugin->run();

}
run_client_reviews_carousel();
