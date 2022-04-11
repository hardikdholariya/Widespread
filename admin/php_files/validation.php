<?php
require_once("../../database/database.php");
$data = new Database;
$data->select('admin');
$result = $data->getResult();
if (count($result) > 0) {
    foreach ($result as $row) {
        if ((!empty($_POST['username'])) && (!empty($_POST['password'])) && (!empty($_POST['email']))) {
            $username = $_POST['username'];
            $password = md5($_POST['password']);
            $email = md5($_POST['email']);
            if (($username == $row['username']) && ($password == $row['password']) && ($email == $row['email'])) {
                session_start();
                $_SESSION["ad"] = $row['username'];
                $_SESSION['rol'] = 1;
                echo 1;
            }
        }
    }
}
