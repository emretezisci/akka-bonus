<?php
if ( ! defined( 'WPINC' ) ) {
    die;
}

class Akka_Bonus_Public {

    public function __construct() {
        // Initialize public functionality
    }

    public function enqueue_styles() {
        wp_enqueue_style(
            'akka-bonus-public',
            AKKA_BONUS_PLUGIN_URL . 'public/css/akka-bonus-public.css',
            array(),
            AKKA_BONUS_VERSION,
            'all'
        );
    }

    public function enqueue_scripts() {
        wp_enqueue_script(
            'akka-bonus-public',
            AKKA_BONUS_PLUGIN_URL . 'public/js/akka-bonus-public.js',
            array( 'jquery' ),
            AKKA_BONUS_VERSION,
            true
        );
    }

    // Additional public methods
}
