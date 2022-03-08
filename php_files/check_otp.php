<?php
require_once("../database/database.php");
date_default_timezone_set("Asia/Kolkata");
if (isset($_POST["otp"])) {
	$otp =  $_POST["otp"];

	$email =  $_POST["email"];
	$username = $_POST["username"];
	$data = new Database();

	$count = $data->count('user', '*', null, "email='{$email}' AND otp='{$otp}' AND NOW() <= DATE_ADD(otp_datetime, INTERVAL 10 MINUTE)");

	if ($count > 0) {

		$data->update('user', ['otp' => 'w', 'verify' => 1], "email = '{$email}'");
		if ($data->tableExists($username) == false) {
			$sql = "CREATE TABLE `$username` (
				`id` int(50) UNSIGNED AUTO_INCREMENT NOT NULL,
				`posts` varchar(200) NOT NULL,
				`caption` varchar(500) NOT NULL,
				`likes` int(50) NOT NULL,
				`comment` int(50) NOT NULL,
				`share` int(100) NOT NULL,
				PRIMARY KEY(id),
				UNIQUE(posts),
				INDEX(caption),
				INDEX(likes),
				INDEX(comment),
				INDEX(share)
			  ) ";
			$following = $username . "following";
			$sql1 =  "CREATE TABLE `$following` (
				`id` int(50) UNSIGNED AUTO_INCREMENT NOT NULL,
				`following` varchar(200) NOT NULL,
				PRIMARY KEY(id),
				UNIQUE(`following`)
			  )";

			$followers = $username . "followers";
			$sql2 =  "CREATE TABLE `$followers` (
				`id` int(50) UNSIGNED AUTO_INCREMENT NOT NULL,
				`followers` varchar(200) NOT NULL,
				PRIMARY KEY(id),
				UNIQUE(`followers`)
			  )";

			if ($data->createTable($sql) && $data->createTable($sql1) && $data->createTable($sql2)) {
				$folder = "{$username}";
				mkdir("../users/" . $folder);
				mkdir("../users/" . $folder . "/upload");
				mkdir("../users/" . $folder . "/profileImg");

				$fp = fopen("../users/" . $folder . "/index.php", "w");
				$fe = fopen("../users/" . $folder . "/edit.php", "w");

				$content = '<?php require_once("../session.php"); require_once("../header.php"); require_once("../post.php"); require_once("../profile.php"); require_once("../setting.php"); ?>';

				$content_e = '<?php require_once("../session.php"); require_once("../header.php"); require_once("../post.php"); require_once("../editProfile.php"); ?>';

				fwrite($fp, $content);
				fwrite($fe, $content_e);

				fclose($fp);
				fclose($fe);
			}
		}
		echo "valid";
	} else {

		echo "invalid";
	}
}
