<?php
require_once("../database/database.php");
$data = new Database();
require_once("../classes/signup-class.php");

$email = $_POST['email'];

$validatione = new frogotEmailDateValidation($_POST);
$errors = $validatione->validateForm();
$error = [];

if ($errors == 1) {
    array_push($error, 1);
    $data = new Database();
    require_once("../php_files/send_otp.php");
}
echo json_encode($error);
