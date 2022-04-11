<?php
session_start();
if (!isset($_SESSION["ad"])) {
    header("location: ./login.php");
}
