<?php
require_once("../database/database.php");
$data = new Database();
require_once("../classes/signup-class.php");

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
    $value = ['email' => $email, 'fullname' => $fullname, 'username' => $username, 'password' => md5($password)];
    $data->insert("user", $value);
}
