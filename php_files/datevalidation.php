<?php
require_once("../classes/signup-class.php");
require_once("../database/database.php");

//dob validation

$date = $_POST['dob'];
$email = $_POST['email'];
$dateValidation = new userDateValidation($_POST);
$errorDate = $dateValidation->validateForm();
$error = [];
if ($errorDate == false) {
    array_push($error, 0);
    $data = new Database();
    $value = ['dob' => $date];
    $data->update('user', $value, "email = '{$email}'");
    require_once("../php_files/send_otp.php");
} else {
    array_push($error, 1);
}
echo json_encode($error);
