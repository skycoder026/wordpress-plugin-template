<?php 

namespace WeDevs\Academy;

use WeDevs\Academy\Database\Migration;


/**
 * The frontend class handler.
 */
class Installer {

    /**
     * Initialize the frontend class.
     *
     * @return void
     */
    public function run() {
        $this->add_version();
        $this->create_migrations();
    }

    public function add_version()
    {
        $installed = get_option( 'wd_academy_installed' );

        if ( ! $installed ) {
            update_option( 'wd_academy_installed', time() );
        }
        
        update_option( 'wd_academy_version', WD_ACADEMY_VERSION );
    }

    public function create_migrations()
    {
        $migration = new Migration();

        $migration->run();
    }
}