<?php
require("../classes/signup-class.php");
require("../database/database.php");

$email = $_POST['email_address'];
$fullname = $_POST['name'];
$username = $_POST['uname'];
$password = $_POST['pass'];

$validation = new userValidation($_POST);
$errors = $validation->validateForm();
$json =  json_encode($errors);
echo $json;

if (count($errors) == 0) {
    $data = new Database();
    $value = ['email' => $email, 'fullname' => $fullname, 'username' => $username, 'password' => $password];
    $data->insert("user", $value);
}
