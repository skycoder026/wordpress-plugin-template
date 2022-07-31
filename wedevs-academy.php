<?php 

/**
 * Plugin Name: WeDevs Academy
 * Description: This is a plugin for WeDevs Academy
 * Plugin URI: https://wedevs.com/plugins/academy/
 * Author: Skycoder
 * Author URI: https://skycoder.net/
 * Version: 1.0.0
 * License: GPL2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * 
 */

 if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
 }

 require_once __DIR__ . '/vendor/autoload.php';


 /**
  * Main plugin class. we declare this class as final to prevent overriding or reinitialize.
  */
final class WeDevs_Academy {

    /**
     * plugin version
     * 
     * @var string
     */
    const version = '1.0';

    /**
     * class constructor 
     */
    private function __construct() {

        $this->define_constants();
        
        register_activation_hook( __FILE__, [$this, 'activate'] );

        add_action( 'plugins_loaded', [$this, 'init_plugin'] );
    }
    
    /**
     * Initialize a singleton instance of WeDevs_Academy.
     *
     * @return \WeDevs_Academy
     */
    public static function init() {
        
        static $instance = false;
        
        if ( ! $instance ) {
            $instance = new self();
        }
        
        return $instance;
    }

    /**
     * Define plugin constants.
     *
     * @return void
     */
    function define_constants() {
        define( 'WD_ACADEMY_VERSION', self::version );
        define( 'WD_ACADEMY_FILE', __FILE__ );
        define( 'WD_ACADEMY_PATH', __DIR__ );
        define( 'WD_ACADEMY_URL', plugins_url( '', WD_ACADEMY_FILE ) );
        define( 'WD_ACADEMY_ASSETS', WD_ACADEMY_URL . '/assets' );
        define( 'WD_ACADEMY_UPLOADS', WD_ACADEMY_ASSETS . '/uploads' );
        define( 'WD_ACADEMY_IMAGES', WD_ACADEMY_ASSETS . '/images' );
    }

    /**
     * Initialize the plugin.
     *
     * @return void
     */
    public function init_plugin() {

        if ( is_admin() ) { 
            // if admin user
            new WeDevs\Academy\Admin();
        } else {    
            // if guest user
            new WeDevs\Academy\Frontend();
        }
    }

    /**
     * Do stuff upon plugin activation. this information only for save plugin version and first installed time.
     *
     * @return void
     */
    public function activate() {

        $installed = get_option( 'wd_academy_installed' );

        if ( ! $installed ) {
            update_option( 'wd_academy_installed', time() );
        }
        
        update_option( 'wd_academy_version', WD_ACADEMY_VERSION );
    }
}

/**
 * Initialize the main plugin.
 * 
 * @return \WeDevs_Academy
 */
function wedevs_academy() {
    return WeDevs_Academy::init();
}

// kick-off the plugin
wedevs_academy();