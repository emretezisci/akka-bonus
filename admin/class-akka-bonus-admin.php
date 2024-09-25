<?php
if ( ! defined( 'WPINC' ) ) {
    die;
}

class Akka_Bonus_Admin {

    public function __construct() {
        // Initialize admin functionality
    }

    public function enqueue_styles() {
        wp_enqueue_style(
            'akka-bonus-admin',
            AKKA_BONUS_PLUGIN_URL . 'admin/css/akka-bonus-admin.css',
            array(),
            AKKA_BONUS_VERSION,
            'all'
        );
    }

    public function enqueue_scripts() {
        wp_enqueue_script(
            'akka-bonus-admin',
            AKKA_BONUS_PLUGIN_URL . 'admin/js/akka-bonus-admin.js',
            array( 'jquery' ),
            AKKA_BONUS_VERSION,
            true
        );
    }

    // Additional admin methods
}
