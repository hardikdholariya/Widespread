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
                <input type="text" name="search" id="search" placeholder="Search.." class="main-search" autocomplete="off">
            </div>
        </header>

        <div class="searchItem">
            <div class="searchClose" style="cursor: pointer;">
                <svg aria-label="Close" class="_8-yf5 " color="#000" fill="#ffffff" height="24" role="img" viewBox="0 0 24 24" width="24">
                    <polyline fill="none" points="20.643 3.357 12 12 3.353 20.647" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3"></polyline>
                    <line fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" x1="20.649" x2="3.354" y1="20.649" y2="3.354"></line>
                </svg>
            </div>
            <div class="ser">

            </div>
        </div>
        <div class="menu">
            <a href="./" id="Widespread"><i class='bx bx-home'></i></a>

            <a href="./message.php" id="message"><i class='bx bx-message'></i></a>
            <?php
            $data = new Database;
            $user =  $_COOKIE['id'];

            $data->select('userpost', 'id', null, "usernames ='{$user}'");
            $res = $data->getResult();
            $res1 = [];
            $res2 = [];
            if (count($res) > 0) {
                foreach ($res as $row) {
                    $data->select('postlike', "*", null, "postId={$row['id']} AND open=1");
                    $res1 = $data->getResult();
                    $data->select('postcomment', "*", null, "postId={$row['id']} AND open=1");
                    $res2 = $data->getResult();
                }
            }

            if (count($res1) > 0 || count($res2) > 0) {
            ?>
                <a href="./notification.php" id="notification"><i class='bx bxs-heart' style='color:#d800ff'></i></a>
            <?php
            } else {
            ?>
                <a href="./notification.php" id="notification"><i class='bx bx-heart' style='color:#ffffff'></i></a>

            <?php
            }

            ?>

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
    var loc = "<?= $loc ?>";
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
        $(".searchItem").hide();
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
        var path = window.location.pathname;
        var chat = path.split('/').reverse()[0];
        if (chat == "chat.php") {
            str = loc;
            str = str.substring(0, str.indexOf("?"));
            loc = str;
            var target = document.querySelectorAll(".menu a")[1];
            if ("chat.php" == loc) {
                target.className = "active_link";
                // setTimeout(() => {
                $(".animation").addClass('is-active');
                // }, 00);
            }
        }
        $(".main-search").click(function(e) {
            $(".searchItem").show();
        });
        $(".main-search").keyup(function(e) {
            let search = $(this).val();
            $.ajax({
                type: "POST",
                url: "./load-header-search.php",
                data: {
                    search
                },
                success: function(data) {
                    $(".ser").html(data);
                }
            });
        });
        $(".searchClose").click(function(e) {
            $(".searchItem").hide();
        });
    });
</script>

</html>