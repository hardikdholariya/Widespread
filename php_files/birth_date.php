<?php
require_once("../database/database.php");
$data = new Database;
$id = $_COOKIE['id'];
$data->select('user', 'DATE_FORMAT(dob, "%d %M") AS dob,wish', null, "username='{$id}'");
$result = $data->getResult();
if (count($result) > 0) {
    foreach ($result as $row) {
        $dob = $row['dob'];
        $curDate = date('d F');
        $wish = $row['wish'];
        if ($wish == 0) {
            if ($dob == $curDate) {
                $birth = $data->update('user', ['wish' => 1], "username = '{$id}'");
                if ($birth) {
                    setcookie('birth', true, time() + 1 * 24 * 60 * 60, "/");
                    echo 1;
                }
            }
        } else {
            // if (isset($_COOKIE['birth']))
            setcookie('birth', 'deleted', time() + 1 * 24 * 60 * 60, "/");

            if ($wish == 1) {
                if ($dob != $curDate) {
                    $data->update('user', ['wish' => 0], "username = '{$id}' AND wish=1");
                }
            }
        }
    }
}
