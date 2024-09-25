<?php
if (!defined('WPINC')) {
    die;
}

class Akka_Bonus_Admin
{

    public function __construct()
    {
        add_action('admin_menu', array($this, 'add_plugin_admin_menu'));
    }

    public function enqueue_styles()
    {
        wp_enqueue_style(
            'akka-bonus-admin',
            AKKA_BONUS_PLUGIN_URL . 'admin/css/akka-bonus-admin.css',
            array(),
            AKKA_BONUS_VERSION,
            'all'
        );
    }

    public function enqueue_scripts()
    {
        wp_enqueue_script(
            'akka-bonus-admin',
            AKKA_BONUS_PLUGIN_URL . 'admin/js/akka-bonus-admin.js',
            array('jquery'),
            AKKA_BONUS_VERSION,
            true
        );
    }

    // Additional admin methods
    public function add_plugin_admin_menu()
    {
        add_menu_page(
            __('Akka Bonus', 'akka-bonus'),
            __('Akka Bonus', 'akka-bonus'),
            'manage_options',
            'akka-bonus',
            array($this, 'display_plugin_admin_page'),
            'dashicons-star-filled', // Icon URL or Dashicon class
            6
        );
    }
    public function display_plugin_admin_page() {
        // Output the content of the admin page
        echo '<div class="wrap">';
        echo '<h1>' . esc_html__( 'Akka Bonus Settings', 'akka-bonus' ) . '</h1>';
        // Include settings form or other content here
        echo '<p>' . esc_html__( 'Welcome to the Akka Bonus plugin settings page.', 'akka-bonus' ) . '</p>';
        echo '</div>';
    }


}
