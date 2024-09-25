<?php
if ( ! defined( 'WPINC' ) ) {
    die;
}

class Akka_Bonus_WooCommerce {

    public function __construct() {
        add_action( 'woocommerce_product_options_general_product_data', array( $this, 'add_bonus_fields' ) );
        add_action( 'woocommerce_process_product_meta', array( $this, 'save_bonus_fields' ) );
        add_action( 'woocommerce_before_add_to_cart_button', array( $this, 'display_bonus_info' ) );
    }

    public function add_bonus_fields() {
        echo '<div class="options_group">';

        woocommerce_wp_text_input( array(
            'id'          => '_akka_bonus_amount',
            'label'       => __( 'Bonus Amount', 'akka-bonus' ),
            'description' => __( 'Set a bonus amount for this product.', 'akka-bonus' ),
            'type'        => 'number',
            'custom_attributes' => array(
                'step' => '0.01',
                'min'  => '0'
            ),
        ) );

        echo '</div>';
    }

    public function save_bonus_fields( $post_id ) {
        $bonus_amount = isset( $_POST['_akka_bonus_amount'] ) ? sanitize_text_field( $_POST['_akka_bonus_amount'] ) : '';
        update_post_meta( $post_id, '_akka_bonus_amount', $bonus_amount );
    }

    public function display_bonus_info() {
        global $product;
        $bonus_amount = get_post_meta( $product->get_id(), '_akka_bonus_amount', true );

        if ( $bonus_amount ) {
            echo '<p class="akka-bonus-info">' . sprintf( __( 'Buy this product and get a bonus of %s!', 'akka-bonus' ), wc_price( $bonus_amount ) ) . '</p>';
        }
    }
}
