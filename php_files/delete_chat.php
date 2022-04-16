<?php
require_once('../database/database.php');
$chatId = $_POST['id'];
$data = new Database;
$data->delete('message', "msg_id={$chatId}");
