<?php
include_once "../activity2/database/db.php";

class Usercontroller extends Dbconn{
    public function insertuser(){
        $this->conn->query("INSERT INTO users (username,age,gender,email,password,token) VALUES
        ('wawang', '21', 'male', 'wawang12@gmail.com', 'wawang12345', 'notouchmenot')");
    }
    public function getalluser(){
        $data = $this->conn->query("SELECT * FROM users");
        $show = $data->fetch_all(MYSQLI_ASSOC);
        return $show;
    }
    public function searchbyemail(array $search){
        if(empty($search['email'])){
            return json_encode(['email' => 'Please provide email']);
        }
        $email = $this->conn->real_escape_string($search['email']);
        $sql = $this->conn->query("SELECT * FROM users WHERE email LIKE '%$email'");
        $data = $sql->fetch_all(MYSQLI_ASSOC);
        return json_encode($data);
    } 
}