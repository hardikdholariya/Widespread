<?php
require("../classes/signup-class.php");

$email = $_POST['email_address'];
$fullname = $_POST['name'];
$username = $_POST['uname'];
$password = $_POST['pass'];
$submit = $_POST['save-user'];
$date = $_POST['dob'];
$submitDate = $_POST['sumitdob'];

if (isset($submit)) {
    $validation = new userValidation($_POST);
    $errors = $validation->validateForm();
    echo json_encode($errors);
}
if (isset($submtDate)) {
    echo "yes";
}
