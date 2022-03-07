<?php
require_once("../database/database.php");


$account_name = $_COOKIE['id'];
$username_ff = $_POST['username_ff'];

$following_name = $account_name . 'following';
$followers_name = $username_ff . 'followers';

$data = new Database;

$data->insert($following_name, ['following' => $username_ff]);

$data->insert($followers_name, ['followers' => $account_name]);


echo "yes";
