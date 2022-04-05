<?php
require_once('../database/database.php');
$data = new Database;
$users = $_POST['users'];
$imgId = $_POST['imgId'];
$folder = $_POST['folder'];
$id = $_COOKIE['id'];

date_default_timezone_set("Asia/Kolkata");
$dt     = new DateTime('now', new DateTimezone('Asia/Kolkata'));
$date   = $dt->format('F j, Y');
$tm     = new DateTime('now', new DateTimezone('Asia/Kolkata'));
$time   = $tm->format('g:i a');

foreach ($users as $user) {

    $iv = openssl_random_pseudo_bytes(16);
    $mes = "/users/{$folder}/post.php?p={$imgId}";
    $message = $data->str_openssl_enc($mes, $iv);
    $iv = bin2hex($iv);
    $val = ['incoming_msg_id' => $user, 'outgoing_msg_id' => $id, 'text_message' => $message, 'link' => 0, 'curr_date' => $date, 'curr_time' => $time, 'vi' => $iv];
    if ($data->insert('message', $val)) {
        $data->select('conversations', "*", null, "(user_1='{$user}' AND user_2='{$id}') OR (user_2='{$user}' AND user_1='{$id}')");
        $result = $data->getResult();
        if (count($result) == 0) {
            $data->insert('conversations', ['user_1' => $user, 'user_2' => $id, 'time' => date("Y-m-d H:i:s")]);
        } else {
            $data->update('conversations', ['time' => date("Y-m-d H:i:s")], "(user_1 = '{$user}' AND user_2 = '{$id}') OR (user_1 = '{$id}' AND user_2 = '{$user}')");
        }
        $data->delete('sendcheckbox', "checkName='{$user}' AND sendUser='{$id}'");
    }
}
