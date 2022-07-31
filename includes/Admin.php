<?php 

namespace WeDevs\Academy;

use WeDevs\Academy\Admin\Menu;

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
        new Menu();
    }
}