<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../header.css?v=<?php time() ?>">
    <link rel="icon" type="image/x-icon" href="./../../img/logo.svg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&family=Padauk&family=Passion+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <!-- or -->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css" crossorigin="anonymous">
    <style>
        .searchItem {
            position: fixed;
            background-color: #ffffffe0;
            backdrop-filter: blur(5px);
            width: 300px;
            height: 400px;
            z-index: 20;
            top: 12%;
            right: 19%;
            border-radius: 20px 0px 20px 20px;
            box-shadow: 20px 20px 50px rgb(0 0 0 / 50%);
            overflow-y: auto;
            overflow-x: hidden;
            color: black;
        }

        .searchItem a {
            color: black;
        }

        .searchItem .like {
            display: flex;
            flex-direction: row;
            align-content: center;
            justify-content: flex-start;
            align-items: center;
            width: 100%;
            padding: 10px;
        }

        .searchItem .userImg {
            width: 54px;
            height: 54px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: auto 8px;
        }

        .searchItem .userImg img {
            object-fit: cover;
            object-position: center;
            height: 44px;
            width: 44px;
            border-radius: 50%;
            border: 2px solid #000;
        }

        .searchItem .userDetail .username {
            display: flex;
            flex-direction: column;
        }

        .searchItem::-webkit-scrollbar {
            display: none;
        }

        .searchItem {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        .searchClose {
            position: absolute;
            top: 0;
            right: 0;
            padding: 15px;
        }

        .searchItem {
            position: fixed;
            background-color: #ffffffe0;
            backdrop-filter: blur(5px);
            width: 300px;
            height: 400px;
            z-index: 20;
            top: 12%;
            right: 19%;
            border-radius: 20px 0px 20px 20px;
            box-shadow: 20px 20px 50px rgb(0 0 0 / 50%);
            overflow-y: auto;
            overflow-x: hidden;
            color: #000;
        }

        .searchItem a {
            color: #000;
        }

        .searchItem .like {
            display: flex;
            flex-direction: row;
            align-content: center;
            justify-content: flex-start;
            align-items: center;
            width: 100%;
            padding: 10px;
        }

        .searchItem .userImg {
            width: 54px;
            height: 54px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: auto 8px;
        }

        .searchItem .userImg img {
            object-fit: cover;
            object-position: center;
            height: 44px;
            width: 44px;
            border-radius: 50%;
            border: 2px solid #000;
        }

        .searchItem .userDetail .username {
            display: flex;
            flex-direction: column;
        }

        .searchItem::-webkit-scrollbar {
            display: none;
        }

        .searchItem {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        .searchClose {
            position: absolute;
            top: 0;
            right: 0;
            padding: 15px;
        }
    </style>
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
            <a href="../../" id="Widespread"><i class='bx bx-home'></i></a>

            <a href="../../message.php" id="message"><i class='bx bx-message'></i></a>
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
                <a href="../../notification.php" id="notification"><i class='bx bxs-heart' style='color:#d800ff'></i></a>
            <?php
            } else {
            ?>
                <a href="../../notification.php" id="notification"><i class='bx bx-heart' style='color:#ffffff'></i></a>

            <?php
            }
            ?>
            <a href="" class="post" id="post"><i class='bx bx-plus-medical' style='color:#ffffff'></i></a>
            <?php
            $id =  $_COOKIE['id'];
            ?>
            <a href="../<?php echo $id; ?>" id="<?php echo $id; ?>"><i class='bx bx-user' style='color:#ffffff'></i></a>
        </div>
    </div>
    <div class="empty"></div>
</body>

<?php
$loc = basename($_SERVER['REQUEST_URI'], '.php');
?>
<script src="../../js/jquery.js"></script>
<script>
    $(document).ready(function() {
        $("img").on("contextmenu", function() {
            return false;
        })
    });
</script>
<script>
    const loc = "<?= $loc ?>";
    const animation = document.querySelector(".animation");
    for (i = 0; i < 5; i++) {
        var target = document.querySelectorAll(".menu a")[i];
        // console.log(loc);
        if (target.id == loc) {
            target.className = "active_link";
            setTimeout(() => {
                $(".animation").addClass('is-active');
            }, 500);
        } else if (loc == 'index') {

        } else {
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
        $(".main-search").click(function(e) {
            $(".searchItem").show();
        });
        $(".main-search").keyup(function(e) {
            let search = $(this).val();
            $.ajax({
                type: "POST",
                url: "../load-header-search.php",
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