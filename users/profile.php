<?php
require_once("../../database/database.php");
$data = new Database;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>username</title>
    <link rel="stylesheet" href="../profile.css?v=<?php echo time(); ?>">
    <link rel="icon" type="image/x-icon" href="../../img/ioc/logo.ico?v=<?php echo time(); ?>">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&family=Padauk&family=Passion+One&family=Syne+Mono&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <!-- or -->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css" crossorigin="anonymous">
</head>

<body>

    <div class="profile">
        <div class="profileDetail">

            <label for="file" class="userimg">
                <?php
                $folder = $data->mysqli->real_escape_string($_SESSION['id']);
                $data->select('user', 'profileImg,followers,following,fullname', null, "username = '{$folder}'", null, null);
                $result = $data->getResult();

                $profileImg = $result[0]['profileImg'];
                if (!empty($profileImg)) { ?>
                    <img src="./profileImg/<?php echo $profileImg; ?>" alt="User Profile" id="foo">
                <?php } else { ?>
                    <img src="../../img/icon/user.jpg" alt="User Profile" id="foo">
                <?php } ?>
                <input type="file" name="file" id="file" accept="image/*" style="display: none;">
            </label>

            <div class="userDetail">
                <div class="ues">
                    <div class="username">
                        <h2><?php echo $folder; ?></h2>
                    </div>
                    <div class="editProfile">
                        <button class="edit">Edit Profile</button>
                    </div>
                    <div class="setting">
                        <a href="">
                            <img src="../../img/icon/settings.svg" />
                        </a>
                    </div>
                </div>

                <div class="pff">
                    <div class="imgPost">
                        <?php
                        $posts = $data->count($folder, 'posts');
                        ?>
                        <span><?php echo $posts; ?></span>
                        <p>Posts</p>
                    </div>
                    <div class="followers">
                        <?php
                        $following = $result[0]['followers'];
                        ?>
                        <span><?php echo $following; ?></span>
                        <p>followers</p>
                    </div>
                    <div class="following">
                        <?php
                        $following = $result[0]['following'];
                        ?>
                        <span><?php echo $following; ?></span>
                        <p>following</p>
                    </div>
                </div>
                <div class="userFullName">
                    <?php
                    $userFullName = $result[0]['fullname'];
                    ?>
                    <h3><?php echo $userFullName; ?></h3>
                </div>

            </div>

        </div>

        <div class="postIcon">
            <i class='bx bx-folder' style='color:#ffffff'></i>
            <span>POSTS</span>
        </div>
        <div class="postImg">
            <?php
            $data->select($folder, 'posts', null, null, 'id DESC');
            $result = $data->getResult();
            foreach ($result as $row) { ?>
                <div class="pImg">
                    <img src="<?php echo "./upload/" . $row['posts'] ?>" alt="post">
                </div>
            <?php } ?>
        </div>
    </div>
    <script src="../../js/jquery.js"></script>
    <script src="../../ajax/script.js?v=<?php echo time(); ?>"></script>
</body>

</html>