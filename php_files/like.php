<?php
require_once("../database/database.php");
$data = new Database();

$id = $_COOKIE['id'];
$likeId = $_POST['postImg'];
$likeUser = $_POST['likeUsername'];
$data->select('postlike', "*", null, "postId='{$likeId}' AND likes='{$id}'");
$result = $data->getResult();

if (count($result) == 0) {

    $data->insert('postlike', ['postId' => $likeId, 'likes' => $id]);
}
