<?php 

namespace WeDevs\Academy\Database;

class Migration 
{

    public function run()
    {
        $directory = __DIR__ . '/migrations';

        $migration_files = scandir($directory) ?? [];

        foreach ($migration_files as $key => $file) {

            
            if (strpos($file, '.php') === false) {
                continue;
            }
            
            // $file = substr($file, 18);

            $file = str_replace('.php', '', $file);
            $file = str_replace('_', ' ', $file);
            $file = ucwords($file);
            $file = str_replace(' ', '', $file);

            
            $file =  __NAMESPACE__ . '\\Migrations\\' . $file;

            
            $file = new $file();

            $file->up();
        }
    }
}