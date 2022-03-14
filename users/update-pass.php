<?php
require_once("../database/database.php");
require_once("../classes/signup-class.php");

$cOldPassword = $_POST['cOldPassword'];
$cNewPassword = $_POST['cNewPassword'];
$cConfirmPassword = $_POST['cConfirmPassword'];

// echo $cNewPassword;

$validation = new changePassValidation($_POST);
$errors = $validation->validateForm();
$json =  json_encode($errors);

echo $json;
if (count($errors) == 0) {
    $data = new Database;
    $username = $_COOKIE['id'];
    $value = md5($cConfirmPassword);
    $data->update('user', ['password' => $value], "username = '{$username}'");
}
