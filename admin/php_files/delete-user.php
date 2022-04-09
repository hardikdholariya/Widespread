<?php
require_once("../../database/database.php");
$data = new Database;
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $data->select('user', 'username', null, "id={$id}");
    $result = $data->getResult();
    $following = $result[0]['username'] . 'following';
    $data->select($following);
    $result1 = $data->getResult();
    if (count($result1) > 0) {
        foreach ($result1 as $row) {
            $followingfollowers = $row['following'] . 'followers';
            $data->delete($followingfollowers, "followers='{$result[0]['username']}'");
        }
    }
    $followers = $result[0]['username'] . 'followers';
    $data->select($followers);
    $result2 = $data->getResult();
    if (count($result2) > 0) {
        foreach ($result2 as $row1) {
            $followersfollowing = $row1['following'] . 'following';
            $data->delete($followersfollowing, "following='{$result[0]['username']}'");
        }
    }
    $data->delete('userstroy', "postStoryUsername='{$result[0]['username']}'");
    $data->delete('userpost', "usernames='{$result[0]['username']}'");
    $data->delete('postlike', "like='{$result[0]['username']}'");
    $data->delete('postcomment', "usernames='{$result[0]['username']}'");
    $data->sql("DROP TABLE {$following}");
    $data->sql("DROP TABLE {$followers}");
    $data->delete("user", "id={$id}");
}
