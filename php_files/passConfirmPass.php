<?php
require_once("../classes/signup-class.php");
require_once("../database/database.php");

$pass = $_POST['password'];
$cPass = $_POST['cPassword'];
$email = $_POST['email'];
$validation = new passwordValidation($_POST);
$errors = $validation->validateForm();

// echo $errors;

if ($errors == 1) {
    $data = new Database;
    $values = ['password' => md5($pass)];
    $data->update('user', $values, "email='{$email}'");
    echo 1;
}
