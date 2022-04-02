<?php
require_once("../database/database.php");
$data = new Database();

$id = $_COOKIE['id'];
$likeId = $_POST['postImg'];
$likeTbl = 'postlike';
$data->delete($likeTbl, "postId={$likeId} AND likes = '{$id}'");
