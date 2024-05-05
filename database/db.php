<?php

class Dbconn{
    protected $conn;
    public function __construct(){
        $this->conn = new mysqli('localhost', 'root', '');
        $this->conn->query("CREATE DATABASE IF NOT EXISTS db_user");
        $this->conn->query("USE db_user");
    }
}
?>