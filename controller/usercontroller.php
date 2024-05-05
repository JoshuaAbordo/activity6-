<?php

include_once "../database/db.php";

class Usercontroller extends Dbconn{
    public function insertuser(array $insertdata){
        $data = ['username','age','gender','email','password','token'];

        foreach ($data as $key) {
            if(empty($insertdata[$key])){
                return json_encode(['message' => "{$key} is required!"]);
    }
    }
    $username = $insertdata['username'];
    $age = $insertdata['age'];
    $gender = $insertdata['gender'];
    $email = $insertdata['email'];
    $password = $insertdata['password'];
    $token = $insertdata['token'];

    $checksql = $this->conn->query("SELECT * FROM users where email = '$email' ");
    if($checksql->num_rows > 0){
        return ['message'=> 'Email already exists!'];
    }else{
        $prepare = $this->conn->prepare("INSERT INTO users (username,age,gender,email,password,token) values (?,?,?,?,?,?)");
        $prepare->bind_Param("ssssss", $username, $age, $gender, $email, $password, $token);
        $ifinsert = $prepare->execute();

        if($ifinsert){
            return ["message"=> "Inserted Successfully!"];
        }else{
            return ["message"=> "Failed to Insert!"];
        }
    }
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