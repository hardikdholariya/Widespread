<?php
require_once("./session.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= $_GET['r'] ?> • <?= $_COOKIE['id'] ?></title>
    <link rel="stylesheet" href="./css/message.css?v=<?php echo time(); ?>">
    <link rel="icon" type="image/x-icon" href="./img/ioc/logo.ico?v=<?php echo time(); ?>">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&family=Padauk&family=Passion+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <!-- or -->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/emojionearea.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

</head>

<body>
    <?php
    require_once("./header.php");
    include_once("./post.php");
    $receive = $_GET['r'];
    ?>

    <input type="hidden" id="receive" value="<?= $receive ?>">
    <div class="chat">
        <?php
        $data->select('user', 'username,fullname,profileImg', null, "username='{$receive}'");
        $result = $data->getResult();
        if (count($result) > 0) {
            foreach ($result as $row) { ?>
                <div class="chatWithUser" style="cursor: auto;">
                    <div class="back">
                        <a href="./message.php"><i class='bx bx-arrow-back'></i></a>
                    </div>
                    <div class="userImg">
                        <?php
                        if (!empty($row['profileImg'])) {
                        ?>
                            <img src="./users/<?= $row['username'] ?>/profileImg/<?= $row['profileImg'] ?>" alt="">
                        <?php
                        } else {
                        ?>
                            <img src="./img/icon/user.jpg" alt="">
                        <?php
                        }
                        ?>
                    </div>
                    <div class="name">
                        <div class="username">
                            <h4 style="cursor: auto;"><?= $row['username'] ?></h4>
                        </div>
                        <div class="fullName">
                            <h5><?= $row['fullname'] ?> </h5>
                        </div>

                    </div>
                </div>
        <?php
            }
        }
        ?>
        <div class="userChat" id="userChat">
        </div>
        <form method="post" class="chatPostBtn" id="chatPostBtn">
            <input type="text" name="postChat" id="postChat" autocomplete="off" placeholder="Type Message...">
            <input type="submit" value="Send" id="send">
        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <script src="./js/jquery.js"></script>
    <script src="./js/emojionearea.js"></script>
    <script>
        var el = document.getElementById("userChat");
        scrollToBottom();
        $(document).ready(function() {
            $(window).on("load", function() {
                $("#postChat").emojioneArea({
                    autocomplete: false,
                    inline: true
                });

            });
            $(document).on('click', '.emojionearea', function(e) {
                e.preventDefault();
                $(this).removeClass("focused");
            });

            $(document).on('mouseover', '#postChat', function(e) {
                $("#postChat").emojioneArea({
                    autocomplete: false,
                    inline: true
                });
            });
            el.onmouseenter = () => {
                el.classList.add("active");
            }
            el.onmouseleave = () => {
                el.classList.remove("active");
            }
            $(function() {
                var receiver = $("#receive").val();
                setInterval(function() {
                    $.ajax({
                        type: "POST",
                        url: "./load-chat.php",
                        data: {
                            r: receiver
                        },
                        success: function(data) {
                            $(".userChat").html(data);
                            if (data != "") {
                                if (!el.classList.contains("active")) {
                                    scrollToBottom();
                                }
                            }
                        }
                    });
                }, 300);

            });
            $(document).on('click', '#send', function(e) {
                e.preventDefault();
                var postChat = $("#postChat").val();
                if (postChat != "") {
                    var receiver = $("#receive").val();
                    $.ajax({
                        type: "POST",
                        url: "./php_files/catlog.php",
                        data: {
                            message: postChat,
                            r: receiver
                        },
                        success: function(data) {
                            var emoj = $(".emojionearea-editor").html("");
                            $(".userChat").html(data);
                        }
                    });
                }
            });
        });

        function scrollToBottom() {
            el.scrollTop = el.scrollHeight;
        }
    </script>

    <script>
        $(document).ready(function() {
            $(document).on("contextmenu", "img", function() {
                return false;
            })
        });
    </script>
</body>

</html>