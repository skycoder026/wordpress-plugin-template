<?php

namespace WeDevs\Academy\Admin;

/**
 * The menu handler class
 */
class Menu {

    /**
     * The menu handler class
     *
     * @return void
     */
    public function __construct() {
        add_action( 'admin_menu', [$this, 'add_menu'] );
    }
    
    /**
     * Add the menu
     *
     * @return void
     */
    public function add_menu() {

        $capability = 'manage_options';

        add_menu_page(
            __( 'WeDevs Academy', 'wedevs-academy' ),  // Page title.
            __( 'Academy', 'wedevs-academy' ),  // Menu title. 
            $capability,  // Capability.
            'wedebs-academy',   // Menu slug.
            [$this, 'render_academy_page'],  // Callback.
            'dashicons-welcome-learn-more'
        );
    }
    
    /**
     * Render the academy page
     *
     * @return void
     */
    public function render_academy_page() {
        echo '<h1 style="color: red">Hello Academy</h1>';
    }
}