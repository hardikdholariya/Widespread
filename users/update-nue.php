<?php
require_once("../database/database.php");
require_once("../classes/signup-class.php");

$cName = $_POST['cName'];
$cUsername = $_POST['cUsername'];

$validation = new changeValidation($_POST);
$errors = $validation->validateForm();
$json =  json_encode($errors);

echo $json;
$username = $_COOKIE['id'];
if (count($errors) == 0) {

    $data = new Database;
    $data->select('user', 'fullname');
    $result_u = $data->getResult();
    foreach ($result_u as $row1) {

        if ($cName != $row1['fullname']) {
            $data->update('user', ['fullname' => $cName, 'username' => $cUsername], "username='{$username}'");
        }
    }
    if ($username != $cUsername) {
        $data->renameTable($username, $cUsername);
        $count = $data->count($cUsername, 'posts');
        for ($i = 1; $i <= $count; $i++) {
            $post_table = $username . "postcommentid_{$i}";
            $post_tableRename = $cUsername . "postcommentid_{$i}";
            $data->renameTable($post_table, $post_tableRename);
        }

        $followers_table = $username . "followers";
        $followers_tableRename = $cUsername . "followers";

        $data->renameTable($followers_table, $followers_tableRename);

        $following_table = $username . "following";
        $following_tableRename = $cUsername . "following";

        $data->renameTable($following_table, $following_tableRename);

        $data->select($following_tableRename, 'following');
        $result_t = $data->getResult();
        $data->select($followers_tableRename, 'followers');
        $result_t2 = $data->getResult();

        foreach ($result_t as $row) {
            $followers_updateTbl = $row['following'] . "followers";
            $data->update($followers_updateTbl, ['followers' => $cUsername], "followers='{$username}'");
        }
        foreach ($result_t2 as $row1) {
            $following_updateTbl = $row1['followers'] . "following";
            $data->update($following_updateTbl, ['following' => $cUsername], "following='{$username}'");
        }
        $data->select('conversations', 'user_1,user_2');
        $result = $data->getResult();
        foreach ($result as $row2) {
            if ($row2['user_1'] == $username) {
                $data->update('conversations', ['user_1' => $cUsername], "user_1='{$username}'");
            } else if ($row2['user_2'] == $username) {
                $data->update('conversations', ['user_2' => $cUsername], "user_2='{$username}'");
            }
        }
        $data->select('message', 'incoming_msg_id,outgoing_msg_id');
        $result2 = $data->getResult();
        foreach ($result2 as $row3) {
            if ($row3['incoming_msg_id'] == $username) {
                $data->update('message', ['incoming_msg_id' => $cUsername], "incoming_msg_id='{$username}'");
            } else if ($row3['outgoing_msg_id'] == $username) {
                $data->update('message', ['outgoing_msg_id' => $cUsername], "outgoing_msg_id='{$username}'");
            }
        }
        $data->select('postcomment', 'usernames');
        $result3 = $data->getResult();
        foreach ($result3 as $row4) {
            $data->update('postcomment', ['usernames' => $cUsername], "usernames='{$username}'");
        }

        $data->select('postlike', 'likes');
        $result4 = $data->getResult();
        foreach ($result2 as $row5) {
            $data->update('postlike', ['likes' => $cUsername], "likes='{$username}'");
        }
        $data->select('userpost', 'usernames');
        $result5 = $data->getResult();
        foreach ($result2 as $row6) {
            $data->update('userpost', ['usernames' => $cUsername], "usernames='{$username}'");
        }
        $data->select('userstroy', 'postStoryUsername');
        $result6 = $data->getResult();
        foreach ($result2 as $row7) {
            $data->update('userstroy', ['postStoryUsername' => $cUsername], "postStoryUsername='{$username}'");
        }

        mkdir($cUsername);
        $folder = $cUsername;
        $old_folder = $_COOKIE['id'];
        $files = glob($old_folder . '/*');
        foreach ($files as $file) {
            if (!is_dir($file)) {
                $php_file = basename($file);
                copy($old_folder . '/' . $php_file, $folder . '/' . $php_file);
            } else {
                $php_folder = basename($file);
                $php_folder_Infolder = $folder . '/' . $php_folder;
                mkdir($php_folder_Infolder);
                $img_folder = glob($old_folder . '/' . $php_folder . '/*');
                foreach ($img_folder as $Img) {
                    $php_Infolder = basename($Img);
                    copy($Img, $folder . '/' . $php_folder . '/' . $php_Infolder);
                }
            }
        }
        setcookie("id", $cUsername, time() + (86400 * 30), "/");

        function deleteAll($dir)
        {
            foreach (glob($dir . '/*') as $file) {
                if (is_dir($file)) {
                    deleteAll($file);
                } else {
                    unlink($file);
                }
            }
            rmdir($dir);
        }
        deleteAll($old_folder);
    }
}
