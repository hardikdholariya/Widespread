<?php
include_once("../database/database.php");

$data = new Database;

$folder = $_COOKIE['id'];

$data->select('user', 'username,fullname,profileImg', null, "not(username = '{$folder}')", "`id` DESC", 20);
$result = $data->getResult();

if (count($result) > 0) {
?>
    <div class='sfy'>

        <h3>Suggestions For You</h3>

    </div>

    <div class='suggestions'>
        <?php

        $i = 0;
        foreach ($result as $row) {
        ?>


            <div class='profileDetail' data-eid='1' data-item-id='stand-out'>

                <div class='userImg'>
                    <?php

                    if (!empty($row['profileImg'])) {
                    ?>


                        <img src='../users/<?= $row['username'] ?>/profileImg/<?= $row['profileImg'] ?>' alt='User Profile' id='foo'>
                    <?php

                        $src = "../users/{$row['username']}/profileImg/{$row['profileImg']}";
                    } else {
                    ?>


                        <img src='../img/icon/user.jpg' alt='User Profile' id='foo'>
                    <?php

                        $src = "../img/icon/user.jpg";
                    }
                    ?>

                </div>

                <div class='userDetail'>

                    <div class='ues'>

                        <div class='username'>

                            <h4 class='username_ff' data-id='<?= $row['username'] ?>'><?= $row['username'] ?></h4>

                        </div>

                        <div class='userFullName'>

                            <h5><?= $row['fullname'] ?> </h5>

                        </div>

                    </div>

                    <div class='followGroup'>
                        <?php

                        $following_name = $folder . 'following';

                        $data->select($following_name, '*', null, "following='{$row['username']}'");

                        $following_result = $data->getResult();
                        if (count($following_result) == 1) {
                        ?>
                            <button class='followingBtn' data-item-id='<?= $row['username'] ?>' data-src='<?= $src ?>'>following</button>
                        <?php

                        } else {
                        ?>
                            <button class='follow' data-item-id='<?= $row['username'] ?>' data-src='<?= $src ?>'>Follow</button>
                        <?php

                        }
                        ?>
                    </div>
                </div>
            </div>
        <?php

            $i++;
        }
        ?>

    </div>

    <div id='unfollow_pop' style='display: none'>

        <div id='upop'>

            <div class='unfollowimg'>

                <img src='../img/icon/user.jpg' alt='User Profile' class='popImg'>

                <div class='unfollow_username'>@</div>

            </div>

            <div class='cu'>

                <button id='unfollow_user' data-id=''>Unfollow</button>

                <button id='cancel_user'>Cancel</button>

            </div>

        </div>

    </div>
<?php

} else {

?>
    <h2 style="margin: 20px auto;width: 106px;">Not Found</h2>
<?php

}
?>