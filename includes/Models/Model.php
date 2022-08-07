<?php 

namespace WeDevs\Academy\Models;

use Plural_Forms;

class Model 
{
    function __construct()
    {
        global $wpdb;

        $this->table = $wpdb->prefix . $this->table;
    }

    // unused
    public function getTableName() {
        return $this->table;
    }

    // unused
    public function getClassName() {
        $classPath = explode('\\', get_class($this));
        $this->class_name = array_pop($classPath);

        return $this->class_name;
    }

    public static function all()
    {
        global $wpdb;
        $self = new static;

        $sql = "SELECT * FROM {$self->table}";
        $results = $wpdb->get_results($sql);

        return $results;
    }
    

    public static function create($data = null)
    {
        global $wpdb;
        $self = new static;

        $wpdb->insert($self->table, $data );
   
        $last_inserted_id = $wpdb->insert_id;
        
        if($last_inserted_id > 0) {
            
            return $self::find($last_inserted_id);

        } else {

            dd($wpdb->last_error);
        }  
    }

    public static function find($id)
    {
        global $wpdb;
        $self = new static;

        $item = $wpdb->get_row("SELECT * FROM $self->table WHERE id = $id");
        return $item;
    }
}