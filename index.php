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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
        <div class="scrollBtn">
            <button class="btn-scroll" id="btn-scroll-left" onclick="scrollHorizontally(1)"><i class="fa-solid fa-caret-left"></i></button>
            <button class="btn-scroll" id="btn-scroll-right" onclick="scrollHorizontally(-1)"><i class="fa-solid fa-caret-right"></i></button>
            <div class="horizontal-scroll">

                <div class="storys-container">
                    <div class="story-circle"><img src="./img/mail.png" alt=""></div>
                    <div class="story-circle"><img src="./img/mail.png" alt=""></div>
                    <div class="story-circle"><img src="./img/mail.png" alt=""></div>
                    <div class="story-circle"><img src="./img/mail.png" alt=""></div>
                    <div class="story-circle"><img src="./img/mail.png" alt=""></div>
                    <div class="story-circle"><img src="./img/mail.png" alt=""></div>
                    <div class="story-circle"><img src="./img/mail.png" alt=""></div>
                    <div class="story-circle"><img src="./img/mail.png" alt=""></div>
                    <div class="story-circle"><img src="./img/mail.png" alt=""></div>
                    <div class="story-circle"><img src="./img/mail.png" alt=""></div>
                    <div class="story-circle"><img src="./img/mail.png" alt=""></div>
                    <div class="story-circle"><img src="./img/mail.png" alt=""></div>
                    <div class="story-circle"><img src="./img/mail.png" alt=""></div>
                    <div class="story-circle"><img src="./img/mail.png" alt=""></div>
                    <div class="story-circle"><img src="./img/mail.png" alt=""></div>
                    <div class="story-circle"><img src="./img/mail.png" alt=""></div>
                    <div class="story-circle"><img src="./img/mail.png" alt=""></div>
                    <div class="story-circle"><img src="./img/mail.png" alt=""></div>
                    <div class="story-circle"><img src="./img/mail.png" alt=""></div>
                    <div class="story-circle"><img src="./img/mail.png" alt=""></div>
                    <div class="story-circle"><img src="./img/mail.png" alt=""></div>
                    <div class="story-circle"><img src="./img/mail.png" alt=""></div>

                </div>
            </div>
        </div>


        <!-- <div class="story">
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

        </div> -->
        <div class="userAccount"></div>
    </section>



    <h1>Welcome <a href="./logout.php">log out</a></h1>

    <script>
        let currentScrollPosition = 0;
        let scrollAmount = 320;

        const sCont = document.querySelector(".storys-container");
        const hScroll = document.querySelector(".horizontal-scroll");
        const btnScrollLeft = document.querySelector("#btn-scroll-left");
        const btnScrollRight = document.querySelector("#btn-scroll-right");

        btnScrollLeft.style.opacity = "0";

        let maxScroll = -sCont.offsetWidth + hScroll.offsetWidth;

        function scrollHorizontally(val) {
            currentScrollPosition += (val * scrollAmount);

            if (currentScrollPosition >= 0) {
                currentScrollPosition = 0
                btnScrollLeft.style.opacity = "0";
            } else {
                btnScrollLeft.style.opacity = "1";
            }
            if (currentScrollPosition <= maxScroll) {
                currentScrollPosition = maxScroll;
                btnScrollRight.style.opacity = "0";
            } else {
                btnScrollRight.style.opacity = "1";
            }
            sCont.style.left = currentScrollPosition + "px";
        }
    </script>

</body>

</html>