<?php
require_once("../database/database.php");
$data = new Database();

$id = $_COOKIE['id'];
$likeId = $_POST['postImg'];
$likeUser = $_POST['likeUsername'];
$likeTbl = $likeUser . 'postlike_' . $likeId;
$data->delete($likeTbl, "likes = '{$id}'");
