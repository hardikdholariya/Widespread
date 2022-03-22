<?php
require_once("./session.php");
$id = $_COOKIE['id'];
$cTable = $id . 'following';
$data->select($cTable, 'id');
$result = $data->getResult();
if (count($result) == 0) {
    header("location: ./people/");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Widespread</title>
    <link rel="icon" type="image/x-icon" href="./img/ioc/logo.ico?v=<?php echo time(); ?>">

    <link rel="stylesheet" href="./css/main.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&family=Padauk&family=Passion+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <!-- or -->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css" crossorigin="anonymous">

</head>

<body>

    <?php
    require_once("./header.php");
    ?>
    <section>
        <div class="scrollBtn">
            <button class="btn-scroll btn-1" id="btn-scroll-left" onclick="scrollHorizontally(1)"><i class="fa-solid fa-caret-left"></i></button>

            <button class="btn-scroll btn-2" id="btn-scroll-right" onclick="scrollHorizontally(-1)"><i class="fa-solid fa-caret-right"></i></button>
            <div class="horizontal-scroll">
                <div class="storys-container">

                    <div class="story-circle">
                        <div class="story-img">
                            <img src="./img/login-background.png" alt="">
                        </div>
                        <div class="userName">
                            hardik
                        </div>
                    </div>

                    <div class="story-circle">
                        <div class="story-img">
                            <img src="./img/login-background.png" alt="">
                        </div>
                        <div class="userName">
                            hardik
                        </div>
                    </div>

                    <div class="story-circle">
                        <div class="story-img">
                            <img src="./img/login-background.png" alt="">
                        </div>
                        <div class="userName">
                            hardik
                        </div>
                    </div>
                    <div class="story-circle">
                        <div class="story-img">
                            <img src="./img/login-background.png" alt="">
                        </div>
                        <div class="userName">
                            hardik
                        </div>
                    </div>
                    <div class="story-circle">
                        <div class="story-img">
                            <img src="./img/login-background.png" alt="">
                        </div>
                        <div class="userName">
                            hardik
                        </div>
                    </div>

                    <div class="story-circle">
                        <div class="story-img">
                            <img src="./img/login-background.png" alt="">
                        </div>
                        <div class="userName">
                            hardik
                        </div>
                    </div>

                    <div class="story-circle">
                        <div class="story-img">
                            <img src="./img/login-background.png" alt="">
                        </div>
                        <div class="userName">
                            hardik
                        </div>
                    </div>

                    <div class="story-circle">
                        <div class="story-img">
                            <img src="./img/login-background.png" alt="">
                        </div>
                        <div class="userName">
                            hardik
                        </div>
                    </div>

                    <div class="story-circle">
                        <div class="story-img">
                            <img src="./img/login-background.png" alt="">
                        </div>
                        <div class="userName">
                            hardik
                        </div>
                    </div>

                    <div class="story-circle">
                        <div class="story-img">
                            <img src="./img/login-background.png" alt="">
                        </div>
                        <div class="userName">
                            hardik
                        </div>
                    </div>

                    <div class="story-circle">
                        <div class="story-img loading">
                            <img src="./img/login-background.png" alt="">
                        </div>
                        <div class="userName">
                            hardik
                        </div>
                    </div>

                    <div class="story-circle">
                        <div class="story-img">
                            <img src="./img/login-background.png" alt="">
                        </div>
                        <div class="userName">
                            hardiksdfsdfsdfsdfsdfsd
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="posts">
            <div class="header">
                <div class="userContender">
                    <div class="userImg">
                        <img src="./img/login-background.png" alt="">
                    </div>
                    <div class="AccountName">
                        _.i.m.h.a.r.d.i.k._
                    </div>
                </div>
                <div class="more">
                    <a href="">...</a>
                </div>
            </div>

            <div class="middle">
                <img src="./img/login-background.png" alt="">
            </div>

            <div class="footer">
                <div class="lms">
                    <i class='bx bxs-heart'></i>
                    <i class='bx bxs-message'></i>
                    <i class='bx bxs-share bx-flip-horizontal'></i>
                </div>
                <div class="comments">
                    <a href="">View all comments</a>
                </div>
                <div class="comment_post">
                    <form action="" method="post">
                        <input type="text" name="post_com" class="post_com">
                        <input type="submit" value="Post" class="postBtn">
                    </form>
                </div>
            </div>

        </div>
        <div class="posts">
            <div class="header">
                <div class="userContender">
                    <div class="userImg">
                        <img src="./img/login-background.png" alt="">
                    </div>
                    <div class="AccountName">
                        _.i.m.h.a.r.d.i.k._
                    </div>
                </div>
                <div class="more">
                    <a href="">...</a>
                </div>
            </div>

            <div class="middle"> <img src="./img/cake.svg" alt=""> </div>

            <div class="footer">
                <div class="lms">
                    <i class='bx bxs-heart'></i>
                    <i class='bx bxs-message'></i>
                    <i class='bx bxs-share bx-flip-horizontal'></i>
                </div>
                <div class="comments">
                    <a href="">View all comments</a>
                </div>
                <div class="comment_post">
                    <form action="" method="post">
                        <input type="text" name="post_com" class="post_com">
                        <input type="submit" value="Post" class="postBtn">
                    </form>
                </div>
            </div>

        </div>
        <div class="posts">
            <div class="header">
                <div class="userContender">
                    <div class="userImg">
                        <img src="./img/login-background.png" alt="">
                    </div>
                    <div class="AccountName">
                        _.i.m.h.a.r.d.i.k._
                    </div>
                </div>
                <div class="more">
                    <a href="">...</a>
                </div>
            </div>

            <div class="middle"> <img src="./img/cake.svg" alt=""> </div>

            <div class="footer">
                <div class="lms">
                    <i class='bx bxs-heart'></i>
                    <i class='bx bxs-message'></i>
                    <i class='bx bxs-share bx-flip-horizontal'></i>
                </div>
                <div class="comments">
                    <a href="">View all comments</a>
                </div>
                <div class="comment_post">
                    <form action="" method="post">
                        <input type="text" name="post_com" class="post_com">
                        <input type="submit" value="Post" class="postBtn">
                    </form>
                </div>
            </div>

        </div>

        <div class="posts">
            <div class="header">
                <div class="userContender">
                    <div class="userImg">
                        <img src="./img/login-background.png" alt="">
                    </div>
                    <div class="AccountName">
                        _.i.m.h.a.r.d.i.k._
                    </div>
                </div>
                <div class="more">
                    <a href="">...</a>
                </div>
            </div>

            <div class="middle"> <img src="./img/true.svg" alt=""> </div>

            <div class="footer">
                <div class="lms">
                    <i class='bx bxs-heart'></i>
                    <i class='bx bxs-message'></i>
                    <i class='bx bxs-share bx-flip-horizontal'></i>
                </div>
                <div class="comments">
                    <a href="">View all comments</a>
                </div>
                <div class="comment_post">
                    <form action="" method="post">
                        <input type="text" name="post_com" class="post_com">
                        <input type="submit" value="Post" class="postBtn">
                    </form>
                </div>
            </div>

        </div>

        <div class="posts">
            <div class="header">
                <div class="userContender">
                    <div class="userImg">
                        <img src="./img/login-background.png" alt="">
                    </div>
                    <div class="AccountName">
                        _.i.m.h.a.r.d.i.k._
                    </div>
                </div>
                <div class="more">
                    <a href="">...</a>
                </div>
            </div>

            <div class="middle"> <img src="./img/search-solid.svg" alt=""> </div>

            <div class="footer">
                <div class="lms">
                    <i class='bx bxs-heart'></i>
                    <i class='bx bxs-message'></i>
                    <i class='bx bxs-share bx-flip-horizontal'></i>
                </div>
                <div class="comments">
                    <a href="">View all comments</a>
                </div>
                <div class="comment_post">
                    <form action="" method="post">
                        <input type="text" name="post_com" class="post_com">
                        <input type="submit" value="Post" class="postBtn">
                    </form>
                </div>
            </div>

        </div>

        <div class="posts">
            <div class="header">
                <div class="userContender">
                    <div class="userImg">
                        <img src="./img/login-background.png" alt="">
                    </div>
                    <div class="AccountName">
                        _.i.m.h.a.r.d.i.k._
                    </div>
                </div>
                <div class="more">
                    <a href="">...</a>
                </div>
            </div>

            <div class="middle"> <img src="./img/forgetpassword.png" alt=""> </div>

            <div class="footer">
                <div class="lms">
                    <i class='bx bxs-heart'></i>
                    <i class='bx bxs-message'></i>
                    <i class='bx bxs-share bx-flip-horizontal'></i>
                </div>
                <div class="comments">
                    <a href="">View all comments</a>
                </div>
                <div class="comment_post">
                    <form action="" method="post">
                        <input type="text" name="post_com" class="post_com">
                        <input type="submit" value="Post" class="postBtn">
                    </form>
                </div>
            </div>

        </div>

        <div class="posts">
            <div class="header">
                <div class="userContender">
                    <div class="userImg">
                        <img src="./img/nav_bar-logo.png" alt="">
                    </div>
                    <div class="AccountName">
                        _.i.m.h.a.r.d.i.k._
                    </div>
                </div>
                <div class="more">
                    <a href="">...</a>
                </div>
            </div>

            <div class="middle"> <img src="./img/nav_bar-logo.png" alt=""> </div>

            <div class="footer">
                <div class="lms">
                    <i class='bx bxs-heart'></i>
                    <i class='bx bxs-message'></i>
                    <i class='bx bxs-share bx-flip-horizontal'></i>
                </div>
                <div class="comments">
                    <a href="">View all comments</a>
                </div>
                <div class="comment_post">
                    <form action="" method="post">
                        <input type="text" name="post_com" class="post_com">
                        <input type="submit" value="Post" class="postBtn">
                    </form>
                </div>
            </div>

        </div>

        <div class="posts">
            <div class="header">
                <div class="userContender">
                    <div class="userImg">
                        <img src="./img/login-background.png" alt="">
                    </div>
                    <div class="AccountName">
                        _.i.m.h.a.r.d.i.k._
                    </div>
                </div>
                <div class="more">
                    <a href="">...</a>
                </div>
            </div>

            <div class="middle"> <img src="./img/background-index.jpg" alt=""> </div>

            <div class="footer">
                <div class="lms">
                    <i class='bx bxs-heart'></i>
                    <i class='bx bxs-message'></i>
                    <i class='bx bxs-share bx-flip-horizontal'></i>
                </div>
                <div class="comments">
                    <a href="">View all comments</a>
                </div>
                <div class="comment_post">
                    <form action="" method="post">
                        <input type="text" name="post_com" class="post_com">
                        <input type="submit" value="Post" class="postBtn">
                    </form>
                </div>
            </div>

        </div>

        <div class="posts">
            <div class="header">
                <div class="userContender">
                    <div class="userImg">
                        <img src="./img/login-background.png" alt="">
                    </div>
                    <div class="AccountName">
                        _.i.m.h.a.r.d.i.k._
                    </div>
                </div>
                <div class="more">
                    <a href="">...</a>
                </div>
            </div>

            <div class="middle"> <img src="./img/password.png" alt=""> </div>

            <div class="footer">
                <div class="lms">
                    <i class='bx bxs-heart'></i>
                    <i class='bx bxs-message'></i>
                    <i class='bx bxs-share bx-flip-horizontal'></i>
                </div>
                <div class="comments">
                    <a href="">View all comments</a>
                </div>
                <div class="comment_post">
                    <form action="" method="post">
                        <input type="text" name="post_com" class="post_com">
                        <input type="submit" value="Post" class="postBtn">
                    </form>
                </div>
            </div>

        </div>

        <div class="posts">
            <div class="header">
                <div class="userContender">
                    <div class="userImg">
                        <img src="./img/login-background.png" alt="">
                    </div>
                    <div class="AccountName">
                        _.i.m.h.a.r.d.i.k._
                    </div>
                </div>
                <div class="more">
                    <a href="">...</a>
                </div>
            </div>

            <div class="middle"> <img src="./img/mail.png" alt=""> </div>

            <div class="footer">
                <div class="lms">
                    <i class='bx bxs-heart'></i>
                    <i class='bx bxs-message'></i>
                    <i class='bx bxs-share bx-flip-horizontal'></i>
                </div>
                <div class="comments">
                    <a href="">View all comments</a>
                </div>
                <div class="comment_post">
                    <form action="" method="post">
                        <input type="text" name="post_com" class="post_com">
                        <input type="submit" value="Post" class="postBtn">
                    </form>
                </div>
            </div>

        </div>
    </section>
    <?php
    include_once("./post.php");
    ?>

    <h1>Welcome <a href="./logout.php">log out</a></h1>

    <script src="./js/jquery.js"></script>
    <script src="./js/action.js?v=<?php echo time(); ?>"></script>
</body>

</html>