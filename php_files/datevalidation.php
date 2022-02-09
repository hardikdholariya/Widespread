<?php
require("../classes/signup-class.php");
require("../database/database.php");

//dob validation

$date = $_POST['dob'];
$email = $_POST['email'];
$dateValidation = new userDateValidation($_POST);
$errorDate = $dateValidation->validateForm();
if ($errorDate == false) {
    echo "1";
    $data = new Database();
    $value = ['dob' => $date];
    $data->update('user', $value, "email = '{$email}'");
}
