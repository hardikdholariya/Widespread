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
    $story_id = $data->getResult();
    $followers = $folder . 'followers';
    $data->select($followers);
    $result = $data->getResult();
    foreach ($result as $row) {
        $following = $row['followers'] . 'following';
        $data->select($following, '*', null, "following = '{$folder}'");
        $result1 = $data->getResult();
        foreach ($result1 as $row1) {
            $openStory = $row1['openStory'];
            if (!empty($openStory)) {
                $openStory .= ",{$story_id[0]}";
            } else {
                $openStory = $story_id[0];
            }
            $data->update($following, ['openStory' => $openStory], "following = '{$folder}'");
        }
    }
}
