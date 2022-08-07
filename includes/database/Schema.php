<?php

namespace WeDevs\Academy\Database;

class Schema 
{
    public static function create($table, $bluprint)
    {
        global $wpdb;
        $charset_collate = $wpdb->get_charset_collate();


        $table = $wpdb->prefix . $table;

        $sql = "CREATE TABLE IF NOT EXISTS {$table} (" . $bluprint->toSql() . ") $charset_collate";
        
        $wpdb->query($sql);
    }

    public static function dropIfExists($table)
    {
        global $wpdb;
        
        $table = $wpdb->prefix . $table;
        
        $sql = "DROP TABLE IF EXISTS {$table}";
        
        $wpdb->query($sql);
    }
}