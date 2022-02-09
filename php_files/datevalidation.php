<?php
require("../classes/signup-class.php");

$date = $_POST['dob'];
$dateValidation = new userDateValidation($_POST);
$errorDate = $dateValidation->validateForm();
echo json_encode($errorDate);
