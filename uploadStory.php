<?php
//upload.php
date_default_timezone_set("Asia/Kolkata");

if ($_FILES["file"]["name"] != '') {
    $test = explode('.', $_FILES["file"]["name"]);
    $ext = end($test);
    $name = time() . '.' . $ext;
    $folder = $_COOKIE['id'];
    $location = "./users/{$folder}/story/" . $name;
    move_uploaded_file($_FILES["file"]["tmp_name"], $location);
    require_once("./database/database.php");
    $data = new Database;
    $val = ['story' => $name, 'time' => date("Y-m-d H:i:s")];
    $data->insert($folder, $val);
}
