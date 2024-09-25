<?php
if ( ! defined( 'WPINC' ) ) {
    die;
}

class Akka_Bonus {

    public function __construct() {
        $this->load_dependencies();
        $this->set_locale();
        $this->define_admin_hooks();
        $this->define_public_hooks();
    }

    private function load_dependencies() {
        // Dependencies are autoloaded
        // Initialize integration classes
        if ( class_exists( 'WooCommerce' ) ) {
            $this->woocommerce = new Akka_Bonus_WooCommerce();
        }

        if ( class_exists( 'ACF' ) ) {
            $this->acf = new Akka_Bonus_ACF();
        }
    }

    private function set_locale() {
        add_action( 'plugins_loaded', array( $this, 'load_plugin_textdomain' ) );
    }

    public function load_plugin_textdomain() {
        load_plugin_textdomain(
            'akka-bonus',
            false,
            dirname( AKKA_BONUS_BASENAME ) . '/languages/'
        );
    }

    private function define_admin_hooks() {
        $plugin_admin = new Akka_Bonus_Admin();

        add_action( 'admin_enqueue_scripts', array( $plugin_admin, 'enqueue_styles' ) );
        add_action( 'admin_enqueue_scripts', array( $plugin_admin, 'enqueue_scripts' ) );

        // Additional admin hooks
    }

    private function define_public_hooks() {
        $plugin_public = new Akka_Bonus_Public();

        add_action( 'wp_enqueue_scripts', array( $plugin_public, 'enqueue_styles' ) );
        add_action( 'wp_enqueue_scripts', array( $plugin_public, 'enqueue_scripts' ) );

        // Additional public hooks
    }

    public function run() {
        // Execute plugin logic
    }
}
