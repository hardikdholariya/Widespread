<?php
include_once("../database/database.php");
$data = new Database();

if ($data->session() == false) {
    header("location: ../login.php");
}
?>

<center>
    <h1>kdls</h1>
</center>