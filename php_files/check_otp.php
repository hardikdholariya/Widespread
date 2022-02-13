<?php
require_once("../database/database.php");
date_default_timezone_set("Asia/Kolkata");
if (isset($_POST["otp"])) {
	$otp =  $_POST["otp"];

	$email =  $_POST["email"];

	$data = new Database();

	$count = $data->count('user', '*', null, "email='{$email}' AND otp='{$otp}' AND NOW() <= DATE_ADD(otp_datetime, INTERVAL 10 MINUTE)");

	if ($count > 0) {

		$data->update('user', ['otp' => 'w', 'verify' => 1], "email = '{$email}'");
		echo "valid";
	} else {

		echo "invalid";
	}
}
