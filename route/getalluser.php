<?php

include_once "../activity2/controller/usercontroller.php";
header('Content-Type: application/json');
$usercontroller = new Usercontroller();
$getalluser =$usercontroller->getalluser();
echo json_encode($getalluser);
?>