<?php
require_once("../database/database.php");
$data = new Database;

$dt     = new DateTime('now', new DateTimezone('Asia/Kolkata'));
$date   = $dt->format('F j, Y');
$tm     = new DateTime('now', new DateTimezone('Asia/Kolkata'));
$time   = $tm->format('g:i a');

$message = $_POST['message'];
$receiver = $_POST['r'];
$sender = $_COOKIE['id'];

$val = ['incoming_msg_id' => $receiver, 'outgoing_msg_id' => $sender, 'text_message' => $message, 'curr_date' => $date, 'curr_time' => $time];
$data->insert('message', $val);
