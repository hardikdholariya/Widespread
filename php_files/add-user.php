<?php
require("../classes/signup-class.php");

$email = $_POST['email_address'];
$fullname = $_POST['name'];
$username = $_POST['uname'];
$password = $_POST['pass'];

$validation = new userValidation($_POST);
$errors = $validation->validateForm();
echo json_encode($errors);
