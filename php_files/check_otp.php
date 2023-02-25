<?php
require_once("../database/database.php");
date_default_timezone_set("Asia/Kolkata");
if (isset($_POST["otp"])) {
	$otp =  md5($_POST["otp"]);

	$email =  $_POST["email"];

	$data = new Database();

	$count = $data->count('user', '*', null, "email='{$email}' AND otp='{$otp}' AND NOW() <= DATE_ADD(otp_datetime, INTERVAL 5 MINUTE)");

	if ($count > 0) {
		$w = md5('w');
		$data->update('user', ['otp' => $w, 'verify' => 1], "email = '{$email}'");
		if (!empty($_POST["username"])) {
			$username = $_POST["username"];

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

			if ($data->createTable($sql1) && $data->createTable($sql2)) {
				$folder = "{$username}";
				mkdir("../users/" . $folder);
				mkdir("../users/" . $folder . "/upload");
				mkdir("../users/" . $folder . "/profileImg");
				mkdir("../users/" . $folder . "/story");

				$fp = fopen("../users/" . $folder . "/index.php", "w");
				$fe = fopen("../users/" . $folder . "/edit.php", "w");
				$ffo = fopen("../users/" . $folder . "/followers.php", "w");
				$ffi = fopen("../users/" . $folder . "/following.php", "w");
				$ffp = fopen("../users/" . $folder . "/post.php", "w");


				$content = '<?php require_once("../session.php"); require_once("../header.php"); require_once("../post.php"); require_once("../profile.php"); ?>';

				$content_e = '<?php require_once("../session.php"); require_once("../header.php"); require_once("../post.php"); require_once("../editProfile.php"); ?>';

				$content_ffo = '<?php require_once("../session.php"); require_once("../header.php"); require_once("../post.php"); require_once("../followers.php"); ?>';

				$content_ffi = '<?php require_once("../session.php"); require_once("../header.php"); require_once("../post.php"); require_once("../following.php"); ?>';

				$content_ffp = '<?php require_once("../session.php"); require_once("../header.php"); require_once("../post.php"); require_once("../fullPost.php"); ?>';


				fwrite($fp, $content);
				fwrite($fe, $content_e);
				fwrite($ffo, $content_ffo);
				fwrite($ffi, $content_ffi);
				fwrite($ffp, $content_ffp);

				fclose($htaccess);
				fclose($fp);
				fclose($fe);
				fclose($ffo);
				fclose($ffp);
			}
		}
		echo "valid";
	} else {

		echo "invalid";
	}
}
