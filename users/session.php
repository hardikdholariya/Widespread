<?php
session_start();
include_once("../../database/database.php");
$data = new Database();

if ($data->session() == false) {
    header("location: ../../login.php");
}
