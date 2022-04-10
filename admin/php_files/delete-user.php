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
            $data->count($followingfollowers,"followers",null,"followers='{$result[0]['username']}'");
            $resultcount=$data->getResult();
            if($resultcount > 0){
            $data->delete($followingfollowers, "followers='{$result[0]['username']}'"); 
            }
        }
    }

    $followers = $result[0]['username'] . 'followers';

    $data->select($followers);
    $result2 = $data->getResult();
    if (count($result2) > 0) {
        foreach ($result2 as $row1) {
            $followersfollowing = $row1['followers'] . 'following';
            $data->count($followersfollowing,"following",null,"following='{$result[0]['username']}'");
            $resultcount1=$data->getResult();
            if($resultcount1 > 0){
                $data->delete($followersfollowing, "following='{$result[0]['username']}'");
            }
        }
    }

    $data->count('userstroy',"*",null,"postStoryUsername='{$result[0]['username']}'");
    if($data->getResult()>0){
        $data->delete('userstroy', "postStoryUsername='{$result[0]['username']}'");
    }
    $data->count('userpost',"*",null,"usernames='{$result[0]['username']}'");
    if($data->getResult()>0){
        $data->delete('userpost', "usernames='{$result[0]['username']}'");
    }
    $data->count('postlike',"*",null,"likes='{$result[0]['username']}'");
    if($data->getResult()>0){
        $data->delete('postlike', "likes='{$result[0]['username']}'");
    }
    $data->count('postcomment',"*",null,"usernames='{$result[0]['username']}'");
    if($data->getResult()>0){
        $data->delete('postcomment', "usernames='{$result[0]['username']}'");
    }
    $data->tableDrop($followers);
    $data->tableDrop($following);
    $data->delete("user", "id={$id}");
}
