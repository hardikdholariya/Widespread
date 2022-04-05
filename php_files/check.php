<?php
require_once("../database/database.php");
$data = new Database;
$id = $_COOKIE['id'];
$check = $_POST['checked'];
$data->select('sendcheckbox', 'checked,checkName,sendUser', null, "checkName='{$check}' AND sendUser='{$id}'");
$result = $data->getResult();
if (count($result) > 0) {
    $data->delete('sendcheckbox', "checkName='{$check}' AND sendUser='{$id}'");
} else {
    $data->insert('sendcheckbox', ['checked' => 0, 'checkName' => $check, 'sendUser' => $id]);
}
