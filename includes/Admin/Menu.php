<?php

namespace WeDevs\Academy\Admin;

use WeDevs\Academy\Http\Controllers\Admin\AddressBookController;

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
            __( 'WeDevs Academy', WD_TRANSLATE ),  // Page title.
            __( 'Academy', WD_TRANSLATE ),  // Menu title. 
            $capability,  // Capability.
            'wedevs-academy',   // Menu slug.
            [$this, 'render_address_book_page'],  // Callback.
            'dashicons-welcome-learn-more'
        );

        add_submenu_page(
            'wedevs-academy',  // Parent slug.
            __( 'Address Book', WD_TRANSLATE ),  // Page title.
            __( 'Address Book', WD_TRANSLATE ),  // Menu title.
            $capability,  // Capability.
            'wedevs-academy',  // Menu slug.
            [$this, 'render_address_book_page']  // Callback.
        );

        add_submenu_page(
            'wedevs-academy',  // Parent slug.
            __( 'Settings', WD_TRANSLATE ),  // Page title.
            __( 'Settings', WD_TRANSLATE ),  // Menu title.
            $capability,  // Capability.
            'wedevs-academy-settings',  // Menu slug.
            [$this, 'render_settings_page']  // Callback.
        );
    }
    
    
    /**
     * Render the address book page
     *
     * @return void
     */
    public function render_address_book_page() {
        (new AddressBookController())->render_address_book_page();
    }
    
    /**
     * Render the address book page
     *
     * @return void
     */
    public function render_settings_page() {
        echo '<h1 style="color: red">Hello Settings</h1>';
    }
}