<?php
require_once("../database/database.php");
$email = $_POST['email'];
$error = [];
$data = new Database();

require_once("../php_files/send_otp.php");
echo json_encode($error);
