<?php
include_once "../controller/usercontroller.php";
header('Content-Type: application/json');
$search = $_GET;
$searchbyemail = new Usercontroller();
$searchdata = $searchbyemail->searchbyemail($search);
echo json_encode($searchdata);