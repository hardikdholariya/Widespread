<?php
//upload.php
session_start();
if ($_FILES["file"]["name"] != '') {
    $test = explode('.', $_FILES["file"]["name"]);
    $ext = end($test);
    $name = rand(100, 999) . '.' . $ext;
    $folder = $_SESSION['id'];
    $location = "./{$folder}/profileImg/" . $name;
    move_uploaded_file($_FILES["file"]["tmp_name"], $location);
    require_once("../database/database.php");
    $data = new Database;
    $data->select('user', 'profileImg', null, "username='{$folder}'");
    $result = $data->getResult();
    $profileImg = $result[0]['profileImg'];

    $data = new Database;

    if (empty($profileImg)) {
        $data->update('user', ['profileImg' => $name], "username='{$folder}'");
    } else {
        $unlink = unlink("./{$folder}/profileImg/" . $profileImg);
        $data->update('user', ['profileImg' => $name], "username='{$folder}'");
    }
}
