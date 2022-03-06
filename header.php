<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/header.css?v=<?php echo time(); ?>">
    <link rel="icon" type="image/x-icon" href="./img/ioc/logo.ico?v=<?php echo time(); ?>">
</head>

<body>
    <div class="animation"> </div>

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

            <a href="./message.php" id="message"><i class='bx bx-message'></i></a>

            <a href="./like.php" id="like"><i class='bx bx-heart' style='color:#ffffff'></i></a>

            <a href="" class="post" id="post"><i class='bx bx-plus-medical' style='color:#ffffff'></i></a>
            <?php
            $id = $_COOKIE['id'];
            ?>
            <a href="./users/<?php echo $id; ?>/" id="profile"><i class='bx bx-user' style='color:#ffffff'></i></a>
        </div>
    </div>
    <div class="empty"></div>
</body>

<?php
$loc = basename($_SERVER['REQUEST_URI'], '.php');
?>
<script src="./js/jquery.js"></script>
<script>
    const loc = "<?= $loc ?>";
    const animation = document.querySelector(".animation");
    for (i = 0; i < 5; i++) {
        var target = document.querySelectorAll(".menu a")[i];
        if (target.id == loc) {
            target.className = "active_link";
            setTimeout(() => {
                $(".animation").addClass('is-active');
            }, 500);
        }
    }
    $(document).ready(function() {
        ;
        $(".close").on('click', function(e) {
            // e.preventDefault();

            $('.post').removeClass('active_link');
            for (i = 0; i < 5; i++) {
                var target = document.querySelectorAll(".menu a")[i];
                if (target.id == loc) {
                    $(target).addClass("active_link");
                    console.log(target);
                }
            }
        });
        var target = document.querySelectorAll(".menu a");
        $(".post").on('click', function(e) {
            e.preventDefault();
            for (i = 0; i < 5; i++) {
                if (target[i].id == loc) {
                    $(target).removeClass("active_link");
                }
            }
        });
    });
</script>

</html>