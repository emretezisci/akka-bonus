<?php
if ( ! defined( 'WPINC' ) ) {
    die;
}

class Akka_Bonus_Deactivator {

    public static function deactivate() {
        // Perform deactivation tasks
        flush_rewrite_rules();
    }
}
