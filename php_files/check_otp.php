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
				`posts` varchar(50) NOT NULL,
				`likes` int(50) NOT NULL,
				`comment` int(50) NOT NULL,
				`share` int(100) NOT NULL,
				PRIMARY KEY(id),
				INDEX(posts),
				INDEX(likes),
				INDEX(comment),
				INDEX(share)
			  )";

			if ($data->createTable($sql)) {
				$folder = "{$username}";
				mkdir("../users/" . $folder);
				$fp = fopen("../users/" . $folder . "/index.php", "w");
				$content = "<?php echo 'hello'; ?>";
				fwrite($fp, $content);
				fclose($fp);
			}
		}
		echo "valid";
	} else {

		echo "invalid";
	}
}
