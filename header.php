<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/header.css">

</head>

<body>
    <div class="img"></div>
    <div class="nva_bar">
        <header>
            <div class="logo">
                <p>Widespread</p>
            </div>
            <div class="search">
                <input type="text" name="search" id="search" placeholder="Search..">
            </div>
        </header>
        <div class="menu">
            <a href="./" id="Widespread"><i class='bx bx-home'></i></a>

            <a href="" id="message"><i class='bx bx-message'></i></a>

            <a href="" id="like"><i class='bx bx-heart' style='color:#ffffff'></i></a>

            <a href="" id="post"><i class='bx bx-plus-medical' style='color:#ffffff'></i></a>

            <a href="./profile.php" id="profile"><i class='bx bx-user' style='color:#ffffff'></i></a>
        </div>
    </div>
    <div class="empty"></div>
</body>

<script>
    var p1 = "success";
</script>

<?php
echo $var = "<script>document.writeln(p1);</script>";
if ($var == 'success ') {
    echo "yes";
}
?>

<script src="./js/jquery.js"></script>
<script>
    for (i = 0; i < 5; i++) {
        var l = document.getElementsByTagName('a')[i].id;
        console.log(l);

    }
</script>

</html>