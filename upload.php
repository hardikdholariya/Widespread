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
  $value = ['posts' => $ImgName, 'caption' => $caption];
  $data->insert($folder, $value);


  $data = new Database();

  $data->select($folder, 'id', null, "posts = '{$ImgName}'", null, null);
  $result = $data->getResult();

  $id = $result[0]['id'];
  // echo $select;

  $postTableName = $folder . 'postcommentid_' . $id;
  $sql = "CREATE TABLE `$postTableName` (
        `id` int(50) UNSIGNED AUTO_INCREMENT NOT NULL,
        `comment` varchar(60) NOT NULL,
        PRIMARY KEY(id),
        INDEX(comment)
      )";

  $data->createTable($sql);
}
