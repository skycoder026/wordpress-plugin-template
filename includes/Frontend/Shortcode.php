<?php 

namespace WeDevs\Academy\Frontend;

/**
 * The shortcode class handler
 */
class Shortcode {
    
    /**
     * initialize the shortcode class
     */
    public function __construct() {
        add_shortcode( 'wedevs-academy', [$this, 'render_shortcode'] );
    }
    
    /**
     * Render the shortcode
     * 
     * @param array $atts
     * @param string $content
     * 
     * @return string
     */
    public function render_shortcode($atts, $content = null) {
        return '<h1 style="color: red">Hello Academy</h1>';
    }
}