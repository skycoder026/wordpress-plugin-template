<?php 

namespace WeDevs\Academy\Database;

class Blueprint 
{
    


    public function id($column = 'id')
    {
        $this->$column = "`$column` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY";

        return $this;
    }


    public function bigIncrements($column)
    {
        $this->$column = "`$column` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT";

        return $this;
    }


    public function unsignedBigInteger($column)
    {
        $this->$column = "`$column` bigint(20) UNSIGNED NOT NULL";

        return $this;
    }


    public function string($column, $length = 255)
    {
        $this->$column = "`$column` varchar({$length}) NOT NULL";

        return $this;
    }


    public function text($column)
    {
        $this->$column = "`$column` text NOT NULL";

        return $this;
    }


    public function timestamps()
    {
        $created_at = 'created_at';
        $updated_at = 'updated_at';

        $this->$created_at = "`created_at` timestamp NULL DEFAULT NULL";
        $this->$updated_at = "`updated_at` timestamp NULL DEFAULT NULL";

        return $this;
    }


    public function nullable()
    {
        end($this);
        $column = key($this);
        
        $column_value = $this->$column;
        $column_value = str_replace('NOT NULL', 'NULL', $column_value);

        $this->$column = $column_value;

        return $this;
    }

    public function toSql()
    {
        $sql = '';
        foreach ($this as $column => $value) {
            $sql .= $value . ',';
        }
        $sql = rtrim($sql, ',');
        
        return $sql;
    }

}



















