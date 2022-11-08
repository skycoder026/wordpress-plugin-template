<?php 

namespace WeDevs\Academy;

use WeDevs\Academy\Admin\Menu;
use WeDevs\Academy\Http\Controllers\Admin\AddressBookController;

/**
 * The admin class handler
 */
class Admin {

    /**
     * Initialize the admin class.
     *
     * @return void
     */
    function __construct() {
        // $this->dispach_actions();
        
        // new Menu();
    }

    public function dispach_actions()
    {
        $address_book = new AddressBookController();

        add_action( 'admin_init', [ $address_book, 'form_handler' ]);
    }
}