<?php
session_start();
require_once("./database/database.php");
$data = new Database();

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
    <link rel="stylesheet" href="./css/main.css?v=<?php echo time(); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&family=Padauk&family=Passion+One&display=swap" rel="stylesheet">

</head>

<body>

    <div class="nva_bar">
        <header>
            <div class="logo">
                <img src="./img/nav_bar-logo.png" alt="logo">
            </div>
            <div class="search">
                <input type="text" name="search" id="search" placeholder="Search..">
            </div>
        </header>
        <div class="menu">
            <a href=""><img src="./img/icon/home.png" alt=""></a>
            <a href=""><img src="./img/icon/message.png" alt=""></a>
            <a href=""><img src="./img/icon/like.png" alt=""></a>
            <a href=""><img src="./img/icon/post.png" alt=""></a>
            <a href=""><img src="./img/icon/user.png" alt=""></a>
        </div>
    </div>
    <div class="empty"></div>
    <section>
        <button>
            < </button>
                <button> > </button>

                <div class="story">
                    <div class="user">
                        <div class="userImg">
                            <img src="./img/true.svg" alt="">
                        </div>
                        <div class="userName">
                            hardikdhoarioyua
                        </div>
                    </div>

                    <div class="user">
                        <div class="userImg">
                            <img src="./img/true.svg" alt="">
                        </div>
                        <div class="userName">
                            hardik
                        </div>
                    </div>

                    <div class="user">
                        <div class="userImg">
                            <img src="./img/true.svg" alt="">
                        </div>
                        <div class="userName">
                            hardik
                        </div>
                    </div>

                    <div class="user">
                        <div class="userImg">
                            <img src="./img/true.svg" alt="">
                        </div>
                        <div class="userName">
                            hardik
                        </div>
                    </div>

                    <div class="user">
                        <div class="userImg">
                            <img src="./img/true.svg" alt="">
                        </div>
                        <div class="userName">
                            hardik
                        </div>
                    </div>

                    <div class="user">
                        <div class="userImg">
                            <img src="./img/true.svg" alt="">
                        </div>
                        <div class="userName">
                            hardik
                        </div>
                    </div>

                    <div class="user">
                        <div class="userImg">
                            <img src="./img/true.svg" alt="">
                        </div>
                        <div class="userName">
                            hardik
                        </div>
                    </div>

                    <div class="user">
                        <div class="userImg">
                            <img src="./img/true.svg" alt="">
                        </div>
                        <div class="userName">
                            hardik
                        </div>
                    </div>

                    <div class="user">
                        <div class="userImg">
                            <img src="./img/true.svg" alt="">
                        </div>
                        <div class="userName">
                            hardik
                        </div>
                    </div>

                </div>
                <div class="userAccount"></div>
    </section>



    <h1>Welcome <a href="./logout.php">log out</a></h1>
</body>

</html>