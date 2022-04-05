<?php
require_once("../database/database.php");
$data = new Database;
$id = $_COOKIE['id'];
$data->select('sendcheckbox', 'checked,checkName,sendUser', null, "sendUser='{$id}'");
$result = $data->getResult();
if (count($result) > 0) {
    $data->delete('sendcheckbox', "sendUser='{$id}'");
}
