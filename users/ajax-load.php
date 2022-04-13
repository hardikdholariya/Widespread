<?php
require_once("../database/database.php");
$data = new Database;
$loc = basename($_POST['loc']);
$data->select('user', 'username,profileImg,fullname', null, "username = '{$loc}'", null, null);
$result = $data->getResult();
$folder = $_COOKIE['id'];
if (count($result) > 0) {
    foreach ($result as $row) {
?>
        <div class='profileDetail'>
            <label for='file' class='userimg'>
                <?php
                $profileImg = $row['profileImg'];
                if (!empty($profileImg)) {
                ?>
                    <img src='../<?= $loc ?>/profileImg/<?= $profileImg ?>' alt='User Profile' id='foo'>
                <?php
                    $src = "../{$loc}/profileImg/{$profileImg}";
                } else {
                ?>
                    <img src='../../img/icon/user.jpg' alt='User Profile' id='foo'>
                <?php
                    $src = "../../img/icon/user.jpg";
                }
                if ($loc == $_COOKIE['id']) {
                ?>
                    <input type='file' name='file' id='file' accept='image/*' style='display: none;'>
                <?php
                }
                ?>
            </label>
            <div class='userDetail'>
                <div class='ues'>
                    <div class='username'>
                        <?php $username = $row['username'] ?>
                        <h2 class='username_ff'><?= $username ?></h2>
                    </div>
                    <div class='editProfile'>
                        <?php
                        if ($loc == $folder) {
                        ?>
                            <button class='edit'>Edit Profile</button>
                            <?php
                        } else if ($username == $loc) {
                            $following_name = $folder . 'following';
                            $data->select($following_name, '*', null, "following='{$loc}'");
                            $following_result = $data->getResult();
                            if (count($following_result) == 1) {
                            ?>
                                <button class='messageBtn' data-id="<?= $row['username'] ?>">Message</button>
                                <button class='followingBtn' data-item-id='<?= $row['username'] ?>' data-src='<?= $src ?>'>following</button>
                            <?php
                            } else {
                            ?>
                                <button class='follow' data-item-id='<?= $row['username'] ?>'>follow</button>
                        <?php
                            }
                        }
                        ?>
                    </div>
                    <?php
                    if ($loc == $folder) {
                    ?>
                        <div class='setting'>
                            <a href=''>
                                <img src='../../img/icon/settings.svg' />
                            </a>
                        </div>
                    <?php
                    }
                    ?>
                </div>
                <div class='pff'>
                    <div class='imgPost'>
                        <?php
                        $posts = $data->count('userpost', 'posts', null, "usernames = '{$username}'");
                        ?>
                        <span> <?= $posts ?></span>
                        <p>Posts</p>
                    </div>
                    <div class='followers'>
                        <?php
                        $following_table = $loc . "followers";
                        $followers = $data->count($following_table, 'followers');
                        ?>
                        <span> <?= $followers ?></span>
                        <p>followers</p>
                    </div>
                    <div class='following'>
                        <?php
                        $following_table = $loc . "following";
                        $following = $data->count($following_table, 'following');
                        ?>
                        <span> <?= $following ?></span>
                        <p>following</p>
                    </div>
                </div>
                <div class='userFullName'>
                    <?php
                    $userFullName = $result[0]['fullname'];
                    ?>
                    <h3><?= $userFullName ?></h3>
                </div>
            </div>
        </div>
        <div class='postIcon'>
            <i class='bx bx-folder' style='color:#ffffff'></i>
            <span>POSTS</span>
        </div>
        <div class='postImg'>
            <?php
            $data->select('userpost', 'posts,id', null, "usernames = '{$username}'", 'posttime DESC');
            $result = $data->getResult();
            foreach ($result as $row) {
            ?>
                <div class='pImg' data-postImg='<?= $row['id'] ?>'>
                    <img src='../<?= $loc ?>/upload/<?= $row['posts'] ?>' alt='post'>
                </div>
            <?php
            }
            ?>
        </div>
        <div id='unfollow_pop' style='display: none'>
            <div id='upop'>
                <div class='unfollowimg'>
                    <img src='../../img/icon/user.jpg' alt='User Profile' class='popImg'>
                    <div class='unfollow_username'>@<?= $username ?></div>
                </div>
                <div class='cu'>
                    <button id='unfollow_user' data-id=''>Unfollow</button>
                    <button id='cancel_user'>Cancel</button>
                </div>
            </div>
        </div>
    <?php
    }
} else {
    ?>
    <div class='text-pop-up'>
        <div class='textNot'>
            <div class='notFound'>
                404
            </div>
            <p> Not Found</p>
        </div>
    </div>
<?php
}
?>
<script>
    $(document).ready(function() {
        $(".messageBtn").click(function(e) {
            e.preventDefault();
            var user = $(this).data('id');
            window.location.href = "../../chat.php?r=" + user;
        });
    });
</script>