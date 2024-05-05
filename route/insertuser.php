<?php
include_once '../controller/usercontroller.php';
$insertuser = new Usercontroller();
$data = $insertuser->insertuser($_POST);
echo json_encode($data);