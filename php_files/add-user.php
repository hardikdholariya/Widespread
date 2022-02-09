<?php
require("../classes/signup-class.php");

$email = $_POST['email_address'];
$fullname = $_POST['name'];
$username = $_POST['uname'];
$password = $_POST['pass'];

$validation = new userValidation($_POST);
$errors = $validation->validateForm();
echo json_encode($errors);

//dob validation
$date = $_POST['dob'];
$dateValidation = new userDateValidation($_POST);
$errorDate = $dateValidation->validateForm();
if ($errorDate == false) {
    echo "1";
}
