<?php 

namespace WeDevs\Academy;

use WeDevs\Academy\Frontend\Shortcode;

/**
 * The frontend class handler.
 */
class Frontend {

    /**
     * Initialize the frontend class.
     *
     * @return void
     */
    function __construct() {
        new Shortcode();
    }

}