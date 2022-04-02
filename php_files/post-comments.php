<?php
require_once("../database/database.php");
$comment = $_POST['postComment'];
$id = $_COOKIE['id'];
$postImg = $_POST['postImg'];
$data = new Database();

if (!empty($comment)) {
    $data->insert('postcomment', ['postId' => $postImg, 'comment' => $comment, 'usernames' => $id]);
}
