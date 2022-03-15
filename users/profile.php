<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $loc; ?></title>
    <link rel="stylesheet" href="../profile.css?v=<?php echo time(); ?>">
    <link rel="icon" type="image/x-icon" href="../../img/ioc/logo.ico?v=<?php echo time(); ?>">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&family=Padauk&family=Passion+One&family=Syne+Mono&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <!-- or -->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
</head>

<body>
    <div class="profile" id="table-data">
    </div>
    <div class="setting_menu">
        <div class="setting_box">
            <div class="changePass b">Change Password</div>
            <div class="notification b">Notification</div>
            <a class="help b" href="mailto:hardikdholariya01@gmail.com">Help</a>
            <div class="logOut b">Log Out</div>
            <div class="cancel">Cancel</div>
        </div>
    </div>
    <div class="following_pop">
        <div class="following_container">
            <div class="close_p">
                <p>Following</p>
                <i id="close_p" class="bx bx-x"></i>
            </div>
            <div class="suggestionsP" id="followingLoad">
                <?php
                $data = new Database;
                $following_p = $loc . "following";
                $join = "`{$following_p}` ON user.username = `{$following_p}`.following";
                $data->select('user', 'user.username,user.fullname,user.profileImg', $join);
                $result = $data->getResult();

                if (count($result) == 0) {
                ?>

                    <div class="addP">
                        <i class="fa-solid fa-user-plus"></i>
                    </div>

                    <?php
                } else {
                    foreach ($result as $row) {
                    ?>
                        <div class="profileDetailp">

                            <?php
                            if (!empty($row['profileImg'])) {
                            ?>
                                <div class="userImgp">
                                    <img src="../<?php echo $row['username']; ?>/profileImg/<?php echo $row['profileImg']; ?>" alt="User Profile" id="foo">
                                </div>
                            <?php
                            } else {
                            ?>
                                <div class="userImgp">
                                    <img src="../../img/icon/user.jpg" alt="User Profile" id="foo">
                                </div>
                            <?php
                            }
                            ?>
                            <div class="userDetailp">
                                <div class="uesp">
                                    <div class="usernamep">
                                        <h4 class="username_ffp"><?php echo $row['username']; ?></h4>
                                    </div>
                                    <div class="userFullNamep">
                                        <h5><?php echo $row['fullname']; ?></h5>
                                    </div>
                                </div>
                                <div class="followGroupp">
                                    <button class="follow">Follow</button>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
                <h4 class="h4">Suggestions For You</h4>
                <div class="profileDetailp">
                    <div class="userImgp">
                        <img src="../../img/icon/user.jpg" alt="User Profile" id="foo">
                    </div>
                    <div class="userDetailp">
                        <div class="uesp">
                            <div class="usernamep">
                                <h4 class="username_ffp" data-id="_.i.m.h.a.r.d.i.k._">_.i.m.h.a.r.d.i.k._</h4>
                            </div>
                            <div class="userFullNamep">
                                <h5>Hardikd dholairy </h5>
                            </div>
                        </div>
                        <div class="followGroupp">
                            <button class="follow" data-item-id="_.i.m.h.a.r.d.i.k._">Follow</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="followers_pop">
        <div class="followers_container">
            <div class="close_p">
                <p>followers</p>
                <i id="close_pf" class="bx bx-x"></i>
            </div>
            <div class="suggestionsP">
                <div class="addP">
                    <i class="fa-solid fa-user-plus"></i>
                </div>
                <div class="profileDetailp" data-eid="1" data-item-id="stand-out">
                    <div class="userImgp">
                        <img src="../../img/icon/user.jpg" alt="User Profile" id="foo">
                    </div>
                    <div class="userDetailp">
                        <div class="uesp">
                            <div class="usernamep">
                                <h4 class="username_ffp" data-id="_.i.m.h.a.r.d.i.k._">_.i.m.h.a.r.d.i.k._</h4>
                            </div>
                            <div class="userFullNamep">
                                <h5>Hardikd dholairy </h5>
                            </div>
                        </div>
                        <div class="followGroupp">
                            <button class="follow" data-item-id="_.i.m.h.a.r.d.i.k._">Follow</button>
                        </div>
                    </div>
                </div>
                <div class="profileDetailp" data-eid="1" data-item-id="stand-out">
                    <div class="userImgp">
                        <img src="../../img/icon/user.jpg" alt="User Profile" id="foo">
                    </div>
                    <div class="userDetailp">
                        <div class="uesp">
                            <div class="usernamep">
                                <h4 class="username_ffp" data-id="_.i.m.h.a.r.d.i.k._">_.i.m.h.a.r.d.i.k._</h4>
                            </div>
                            <div class="userFullNamep">
                                <h5>Hardikd dholairy </h5>
                            </div>
                        </div>
                        <div class="followGroupp">
                            <button class="follow" data-item-id="_.i.m.h.a.r.d.i.k._">Follow</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script src="../../js/jquery.js"></script>
    <script>
        $(document).ready(function() {
            $(".following_pop").hide();
            $(".followers_pop").hide();
            $(".setting_menu").hide();

            const loc = "<?= $loc ?>";

            function followingLoad() {
                $.ajax({
                    url: "../following-load.php",
                    type: "POST",
                    data: {
                        loc: loc
                    },
                    success: function(data) {
                        $("#followingLoad").html(data);
                        // $('.userDetail').show();
                    }
                });
            }
            followingLoad();
            $(document).on('click', '.setting', function(e) {
                e.preventDefault();
                $(".setting_menu").fadeIn("slow");
                $(".setting_menu").show();
            });
            $(document).on('click', '.cancel', function(e) {
                e.preventDefault();
                $(".setting_menu").hide();
            });
            $(document).on('click', '.logOut', function(e) {
                e.preventDefault();
                console.log("kd");
                $.ajax({
                    type: "POST",
                    url: "../logout.php",
                    success: function() {
                        window.location.href = "../../login.php";
                    }
                });
            });
            $(document).on('click', '.changePass', function(e) {
                e.preventDefault();
                window.location.href = "./edit.php?p=0";
            });
            $(document).on('click', '.notification', function(e) {
                e.preventDefault();
                window.location.href = "../../like.php";
            });
            $(document).on('click', '.following', function(e) {
                e.preventDefault();
                $(".following_pop").fadeIn("slow");
                $(".following_pop").show();
            });
            $(document).on('click', '#close_p', function(e) {
                e.preventDefault();
                $(".following_pop").hide();
            });
            // $(document).on('click', '.followers', function(e) {

            // });
            $(document).on('click', '.followers', function(e) {
                e.preventDefault();
                $(".followers_pop").fadeIn("slow");
                $(".followers_pop").show();
            });
            $(document).on('click', '#close_pf', function(e) {
                e.preventDefault();
                $(".followers_pop").hide();
            });
        });
    </script>
    <script src="../../ajax/script.js?v=<?php echo time(); ?>"></script>
</body>

</html>