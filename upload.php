<?php
require_once("./database/database.php");
if (isset($_POST['image'])) {
  $data = $_POST['image'];
  $Iname = $_POST['imgname'];
  $caption = $_POST['caption'];
  // basename($Iname)
  $image_array_1 = explode(";", $data);

  $image_array_2 = explode(",", $image_array_1[1]);

  echo $data = base64_decode($image_array_2[1]);


  $Iname = strrev($Iname);
  $imgPath = explode('.', $Iname);

  $ImgName = strrev($imgPath[1]) . time() . '.' . strrev($imgPath[0]);
  $folder = $_COOKIE['id'];
  $image_name = "./users/{$folder}/upload/{$ImgName}";

  file_put_contents($image_name, $data);

  $data = new Database();
  $value = ['usernames' => $folder, 'posts' => $ImgName, 'caption' => $caption, 'posttime' => date("Y-m-d H:i:s")];
  $data->insert('userpost', $value);
}
