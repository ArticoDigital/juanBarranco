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

        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta( $sql );
    }

    public function insert($table_name, array $columns){
        $table_name = $this->prefix . $table_name;
        if($GLOBALS['wpdb']->insert($table_name, $columns))
            return $GLOBALS['wpdb']->insert_id;
        return false;
    }

    public function update($table_name, array $columns, array $where){
        $table_name = $this->prefix . $table_name;
        $GLOBALS['wpdb']->update($table_name, $columns, $where);
    }

    public function delete($table_name, array $where){
        $table_name = $this->prefix . $table_name;
        $GLOBALS['wpdb']->delete( $table_name, $where);
    }

    public function select($table_name, $columns, array $condition = null){
        $sql  = "SELECT " . $columns . " FROM " . $this->prefix . $table_name;
        if($condition){
            $sql .= " WHERE " . $this->where($condition);
        }
        return $GLOBALS['wpdb']->get_results($sql, OBJECT);
    }

    public function getPrefix($table_name){
        return $this->prefix . $table_name;
    }

    private function addColumns($columns, $isKey = false){
        $sql = "";
        foreach ($columns as $key => $column){
            $sql .= $isKey ? $key . "," : $column . ",";
        }
        return substr_replace($sql, "", -1);
    }

    private function where($conditionals){
        $sql = "";
        foreach ($conditionals as $key => $conditional){
            $sql .= $key . " = " . $conditional . " AND ";
        }
        return substr_replace($sql, "", -4);
    }
}