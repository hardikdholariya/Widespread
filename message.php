<?php
require_once("./session.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>username</title>
    <link rel="stylesheet" href="./css/message.css?v=<?php echo time(); ?>">
    <link rel="icon" type="image/x-icon" href="./img/ioc/logo.ico?v=<?php echo time(); ?>">

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
    include_once("./post.php");
    ?>
    <div class="chatUser">
        <div class="search">
            <!-- <input type="text" name="search" id="search" placeholder="Search.."> -->
            <input type="text" name="searchUser" id="searchUser" placeholder="Search User....">
        </div>
        <div class="users">
            <?php
            $id = $_COOKIE['id'];
            $data = new Database;
            $data->select('user', "username,fullname,profileImg", null, "username != '{$id}'");
            $result = $data->getResult();
            if (count($result) > 0) {
                foreach ($result as $row) {
            ?>
                    <a href="chat.php?r=<?php echo $row['username']; ?>">
                        <div class="chatWithUser">
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
                                    <h4><?= $row['username'] ?></h4>
                                </div>
                                <div class="fullName">
                                    <h5>
                                        <?= $row['fullname'] ?>
                                    </h5>
                                </div>

                            </div>
                        </div>
                    </a>
            <?php
                }
            }
            ?>

        </div>
    </div>
    <script src="./js/jquery.js"></script>
    <script>
        $(document).ready(function() {
            $("#searchUser").keyup(function(e) {
                var search = $(this).val();
                $.ajax({
                    type: "post",
                    url: "./search-chat.php",
                    data: {
                        search: search
                    },
                    success: function(data) {
                        $(".users").html(data);
                    }
                });
            });
        });
    </script>
</body>

</html>