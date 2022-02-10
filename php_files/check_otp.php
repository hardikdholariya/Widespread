<?php
require_once("../database/database.php");
if (isset($_POST["otp"])) {
	$otp = $_POST["otp"];

	$email = $_POST["email"];

	$data = new Database();

	$count = $data->count('user', '*', null, "email='{$email}' AND otp='{$otp}'");

	if ($count > 0) {

		$data->update('user', ['otp' => '', 'role' => 1], "email = '{$email}'");

		echo "valid";
	} else {
		echo "invalid";
	}
}
