<?php
/**
 * Plugin Name:       Akka Bonus
 * Plugin URI:        https://example.com/akka-bonus
 * Description:       Provides bonus features for WooCommerce products using Advanced Custom Fields (ACF).
 * Version:           1.0.0
 * Author:            Your Name
 * Author URI:        https://example.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       akka-bonus
 * Domain Path:       /languages
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

// Define plugin constants
define( 'AKKA_BONUS_VERSION', '1.0.0' );
define( 'AKKA_BONUS_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'AKKA_BONUS_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'AKKA_BONUS_BASENAME', plugin_basename( __FILE__ ) );

// Autoload classes
spl_autoload_register( 'akka_bonus_autoload_classes' );

function akka_bonus_autoload_classes( $class_name ) {
    if ( 0 === strpos( $class_name, 'Akka_Bonus' ) ) {
        $class_file = AKKA_BONUS_PLUGIN_DIR . 'includes/' . strtolower( str_replace( '_', '-', $class_name ) ) . '.php';
        if ( file_exists( $class_file ) ) {
            require_once $class_file;
        }
    }
}

// Activation and deactivation hooks
register_activation_hook( __FILE__, array( 'Akka_Bonus_Activator', 'activate' ) );
register_deactivation_hook( __FILE__, array( 'Akka_Bonus_Deactivator', 'deactivate' ) );

// Initialize the plugin
function run_akka_bonus() {
    $plugin = new Akka_Bonus();
    $plugin->run();
}
run_akka_bonus();
