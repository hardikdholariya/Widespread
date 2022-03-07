<?php
require_once("../database/database.php");


$account_name = $_COOKIE['id'];
$username_ff = $_POST['username_ff'];

$following_name = $account_name . 'following';
$followers_name = $username_ff . 'followers';

$data = new Database;

$data->select('user', 'following, followers', null, "username = '{$account_name}' OR username = '{$username_ff}'");

$result = $data->getResult();

$data->update('user', ['following' => $result[1]['following'] + 1], "username='{$account_name}'");

$data->update('user', ['followers' => $result[0]['followers'] + 1], "username='{$username_ff}'");



$data->insert($following_name, ['following' => $username_ff]);

$data->insert($followers_name, ['followers' => $account_name]);


echo "yes";
