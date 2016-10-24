<?php

class Schema{

    private $prefix;
    private $charset;

    public function __construct(){
        global $wpdb;
        $this->charset = $wpdb->get_charset_collate();
        $this->prefix = $wpdb->prefix;
    }

    public function create($table_name, array $columns){
        $sql  = "CREATE TABLE IF NOT EXISTS " . $this->prefix . $table_name . " ( ";
        $sql .= $this->addColumns($columns);
        $sql .= " ) " . $this->charset . ";";

        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta( $sql );
    }

    public function getPrefix($table_name){
        return $this->prefix . $table_name;
    }

    public function addColumns($columns){
        $sql = "";
        for( $i = 0; $i < count($columns); $i++){
            $sql .= $columns[$i];
            if($i < (count($columns) - 1))
                $sql .= ",";
        }
        return $sql;
    }
}