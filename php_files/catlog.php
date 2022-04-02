<?php
require_once("../database/database.php");
$data = new Database;
date_default_timezone_set("Asia/Kolkata");

$dt     = new DateTime('now', new DateTimezone('Asia/Kolkata'));
$date   = $dt->format('F j, Y');
$tm     = new DateTime('now', new DateTimezone('Asia/Kolkata'));
$time   = $tm->format('g:i a');

$iv = openssl_random_pseudo_bytes(16);
$message = $data->str_openssl_enc($_POST['message'], $iv);
$receiver = $_POST['r'];
$sender = $_COOKIE['id'];
$iv = bin2hex($iv);

$val = ['incoming_msg_id' => $receiver, 'outgoing_msg_id' => $sender, 'text_message' => $message, 'curr_date' => $date, 'curr_time' => $time, 'vi' => $iv];

if ($data->insert('message', $val)) {
    $data->select('conversations', "*", null, "(user_1='{$receiver}' AND user_2='{$sender}') OR (user_2='{$receiver}' AND user_1='{$sender}')");
    $result = $data->getResult();
    if (count($result) == 0) {
        $data->insert('conversations', ['user_1' => $receiver, 'user_2' => $sender, 'time' => date("Y-m-d H:i:s")]);
    } else {
        $data->update('conversations', ['time' => date("Y-m-d H:i:s")], "(user_1 = '{$receiver}' AND user_2 = '{$sender}') OR (user_1 = '{$sender}' AND user_2 = '{$receiver}')");
    }
}
