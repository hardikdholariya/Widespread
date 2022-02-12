<?php
session_start();
require_once("./database/database.php");
$data = new Database();

// echo $data->session();
if ($data->session() == false) {

    header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>username</title>
</head>

<body>
    <h1>Welcome <a href="./logout.php">log out</a></h1>

</body>



</html>