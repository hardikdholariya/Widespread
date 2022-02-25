<?php
session_start();
if (isset($_POST['image'])) {
    $data = $_POST['image'];
    $Iname = $_POST['imgname'];
    // basename($Iname)
    $image_array_1 = explode(";", $data);

    $image_array_2 = explode(",", $image_array_1[1]);

    $data = base64_decode($image_array_2[1]);

    // $imgPath = explode('.', $Iname);
    $Iname = strrev($Iname);
    // $ImgName = substr($Iname, 0, strpos($Iname, "."));
    $imgPath = explode('.', $Iname);

    $ImgName = strrev($imgPath[1]) . time() . '.' . strrev($imgPath[0]);
    $folder = $_SESSION['id'];
    $image_name = "./users/{$folder}/upload/{$ImgName}";

    file_put_contents($image_name, $data);

    // echo $image_name;

}
