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
    $val = ['story' => $name, 'postStoryUsername' => $folder];
    $data->insert('userstroy', $val);
    $followers = $folder . 'followers';
    $data->select($followers);
    $result = $data->getResult();
    foreach ($result as $row) {
        $following = $row['followers'] . 'following';
        $data->select($following, '*', null, "following = '{$folder}'");
        $result1 = $data->getResult();
        foreach ($result1 as $row1) {
            $openStory = $row1['openStory'] + 1;
            $data->update($following, [`openStory` => $openStory], "following = '{$folder}'");
        }
        // $sql = "UPDATE `{$following}` SET `openStory`=`openStory` + '1' WHERE following='{$folder}'";
        // $data->sql($sql);
    }
}
