<?php
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
    exit;
}

// Delete plugin options
delete_option( 'akka_bonus_options' );

// Delete custom post meta
$posts = get_posts( array( 'post_type' => 'product', 'numberposts' => -1 ) );

foreach ( $posts as $post ) {
    delete_post_meta( $post->ID, '_akka_bonus_amount' );
    delete_post_meta( $post->ID, 'akka_bonus_description' );
}
