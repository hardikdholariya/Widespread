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
        foreach ($result_t2 as $row) {
            $following_updateTbl = $row['followers'] . "following";
            $data->update($following_updateTbl, ['following' => $cUsername], "following='{$username}'");
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
