<?php
require_once("../database/database.php");
$data = new Database;
$id = $_COOKIE['id'];
$imgId = $_POST['imgId'];
$data->delete('postlike', "postId={$imgId}");
$data->delete('postcomment', "postId={$imgId}");
$data->delete('userpost', "Id={$imgId}");
