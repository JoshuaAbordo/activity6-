<?php
include_once "../database/db.php";
class Tableuser extends Dbconn{
    public function CreateTable(){
        $this->conn->query("CREATE TABLE IF NOT EXISTS users(
            id int primary key auto_increment,
            username varchar(250)not null,
            age varchar(250)not null,
            gender varchar(250)not null,
            email varchar(250)not null UNIQUE,
            password varchar(250)not null,
            token varchar(250)not null
            )
        ");
    }
 }