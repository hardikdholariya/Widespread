<?php
require_once("../database/database.php");
$comment = $_POST['postComment'];
$id = $_COOKIE['id'];
$loc = basename($_POST['loc']);
$postImg = $_POST['postImg'];
$data = new Database();
$postTable = $loc . 'postcommentid_' . $postImg;

if (!empty($comment)) {
    $data->insert($postTable, ['comment' => $comment, 'usernames' => $id]);
}
