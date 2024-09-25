<?php
if ( ! defined( 'WPINC' ) ) {
    die;
}

class Akka_Bonus_ACF {

    public function __construct() {
        add_action( 'acf/init', array( $this, 'register_acf_fields' ) );
    }

    public function register_acf_fields() {
        if ( function_exists( 'acf_add_local_field_group' ) ) {
            acf_add_local_field_group( array(
                'key'      => 'group_akka_bonus',
                'title'    => __( 'Akka Bonus Settings', 'akka-bonus' ),
                'fields'   => array(
                    array(
                        'key'   => 'field_akka_bonus_description',
                        'label' => __( 'Bonus Description', 'akka-bonus' ),
                        'name'  => 'akka_bonus_description',
                        'type'  => 'textarea',
                    ),
                ),
                'location' => array(
                    array(
                        array(
                            'param'    => 'post_type',
                            'operator' => '==',
                            'value'    => 'product',
                        ),
                    ),
                ),
            ) );
        }
    }
}
