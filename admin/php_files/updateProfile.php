<?php
require_once("../../database/database.php");
if (isset($_POST['uname']) || isset($_POST['email']) || isset($_POST['file'])) {
    $uname = $_POST['uname'];
    $email = $_POST['email'];
    if (!empty($uname) && !empty($email)) {
        if (!empty($_FILES["file"]["name"])) {

            $test = explode('.', $_FILES["file"]["name"]);
            $ext = end($test);
            $name = rand(100, 999) . '.' . $ext;
            $location = "../upload/" . $name;
            move_uploaded_file($_FILES["file"]["tmp_name"], $location);
            $data = new Database;
            $data->select('admin');
            $result = $data->getResult();
            $profileImg = $result[0]['profile'];
            $data = new Database;
            $email = md5($_POST['email']);

            if (empty($profileImg)) {
                $data->update('admin', ['username' => $uname, 'email' => $email, 'profile' => $name]);
                $result1 = $data->getResult();
                print_r($result1);
            } else {
                $unlink = unlink("../upload/" . $profileImg);
                $data->update('admin', ['username' => $uname, 'email' => $email, 'profile' => $name]);
            }
        }
    }
}
