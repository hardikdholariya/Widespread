<?php
include_once("./database/database.php");
$data = new Database();
$data->logout();
header("location:./");
