<?php
if ( ! defined( 'WPINC' ) ) {
    die;
}

class Akka_Bonus_Activator {

    public static function activate() {
        // Check for required plugins
        if ( ! class_exists( 'WooCommerce' ) || ! class_exists( 'ACF' ) ) {
            deactivate_plugins( AKKA_BONUS_BASENAME );
            wp_die(
                __( 'Akka Bonus requires WooCommerce and Advanced Custom Fields to be installed and active.', 'akka-bonus' ),
                __( 'Plugin Activation Error', 'akka-bonus' ),
                array( 'back_link' => true )
            );
        }

        // Perform additional activation tasks
        flush_rewrite_rules();
    }
}
