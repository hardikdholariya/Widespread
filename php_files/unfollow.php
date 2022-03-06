<?php
require_once("../database/database.php");

$account_name = $_COOKIE['id'];
$username_ff = $_POST['username_ff'];

$following_name = $account_name . 'following';
$followers_name = $username_ff . 'followers';

$data = new Database;

$data->select('user', 'following, followers', null, "username = '{$account_name}' OR username = '{$username_ff}'");

$result = $data->getResult();

if (($data->delete($following_name, "following = '{$username_ff}'")) && ($data->delete($followers_name, "followers = '{$account_name}'"))) {

    $data->update('user', ['following' => $result[0]['following'] - 1], "username='{$account_name}'");

    $data->update('user', ['followers' => $result[1]['followers'] - 1], "username='{$username_ff}'");

    echo "yes";
} else {
    echo "no";
}
