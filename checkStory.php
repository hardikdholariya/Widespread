<?php
require_once("./database/database.php");
date_default_timezone_set("Asia/Kolkata");
$data = new Database;
$data->select('user', 'username');
$result = $data->getResult();
if (count($result) > 0) {
    foreach ($result as $row) {
        $data->select('userstroy', '*', null, "NOW() >= DATE_ADD(add_time, INTERVAL 24 HOUR)");
        $result1 = $data->getResult();
        if (count($result1) > 0) {
            foreach ($result1 as $row2) {
                unlink("./users/{$row['postStoryUsername']}/story/{$row2['story']}");
                $data->delete('userstroy', "story='{$row2['story']}'");
            }
        }
    }
}
