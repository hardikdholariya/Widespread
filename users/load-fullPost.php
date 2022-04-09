<?php
require_once("../database/database.php");
$loc = basename($_POST['loc']);
$imgId = $_POST['postImg'];
$id = $_COOKIE['id'];
$data = new Database;
$data->select('user', "username,profileImg", null, "username ='{$loc}'");
$result = $data->getResult();
$data->select('userpost', '*', null, "id={$imgId}");
$result2 = $data->getResult();
if (count($result2) > 0) {
    if (count($result) > 0) {
        foreach ($result as $row) {
?>
            <div class='posts'>
                <div class='header'>
                    <div class='userContender'>
                        <div class='userImg'>
                            <?php
                            if (!empty($row['profileImg'])) {
                            ?>
                                <img src='../<?= $loc ?>/profileImg/<?= $row['profileImg'] ?>' alt=''>
                            <?php
                            } else {
                            ?>
                                <img src='../../img/icon/user.jpg' alt='User Profile' id='foo'>
                            <?php
                            }
                            ?>
                        </div>
                        <div class='AccountName'>
                            <?= $row['username'] ?>
                        </div>
                    </div>
                    <div class='more'>
                        <a href='' class='moreOption'>...</a>
                    </div>
                </div>
                <?php
                if (count($result2) > 0) {
                    foreach ($result2 as $row2) {

                ?>
                        <div class='middle'>
                            <img class='likePost' src='../<?= $row['username'] ?>/upload/<?= $row2['posts'] ?>' alt=''>
                            <div class='heart' style='display:none;' data-id='<?= $row['username'] ?>'></div>
                            <?php
                            $tableLike = 'postlike';
                            $data->select($tableLike, '*', null, "likes='{$id}' AND postId = {$imgId}");
                            $likeResult = $data->getResult();
                            ?>

                        </div>

                        <div class='footer'>
                            <div class='lms'>
                                <?php

                                if (count($likeResult) == 1) {
                                ?>
                                    <i class='bx bxs-heart likeUn' data-id='<?= $row['username'] ?>' style='color:#000;'></i>
                                <?php
                                } else {

                                ?>
                                    <i class='bx bxs-heart likeU' data-id='<?= $row['username'] ?>'></i>
                                <?php
                                }
                                ?>

                                <!-- <i class='bx bxs-message'></i> -->
                                <!-- <i class='bx bxs-share bx-flip-horizontal'></i> -->
                            </div>
                            <?php

                            $tablePost = 'postcomment';

                            $data->select($tablePost, "`{$tablePost}`.usernames,`{$tablePost}`.comment,user.username,user.profileImg", "`user` ON `{$tablePost}`.usernames = user.username", "postId ={$imgId}", "`{$tablePost}`.id DESC");

                            $result2 = $data->getResult();
                            $resultCount = count($result2);

                            $data->select($tableLike, '*', null, "postId = {$imgId}");
                            $likeResult1 = $data->getResult();
                            $result3 = count($likeResult1);

                            ?>

                            <div class='likeComments'>
                                Like <?= $result3 ?> and Comments <?= $resultCount ?>
                            </div>
                            <?php

                            if (!empty($row2['caption'])) {
                            ?>
                                <div class='caption'><span style='color:#000;font-weight: bold;'>@<?= $row['username'] ?></span> <?= $row2['caption'] ?></div>
                            <?php

                            }
                            ?>
                            <div class='comments'>
                                <?php
                                if ($resultCount > 0) {
                                    foreach ($result2 as $row2) {
                                ?>

                                        <div class='cUser'>
                                            <div class='cImg'>
                                                <?php

                                                if (!empty($row2['profileImg'])) {
                                                ?>
                                                    <img src='../<?= $row2['username'] ?>/profileImg/<?= $row2['profileImg'] ?>'>
                                                <?php

                                                } else {
                                                ?>
                                                    <img src='../../img/icon/user.jpg'>
                                                <?php

                                                }
                                                ?>
                                            </div>
                                            <div class='cusername'>
                                                <?= $row2['username'] ?>
                                            </div>
                                            <div class='userComments'>
                                                <?= $row2['comment'] ?>
                                            </div>
                                        </div>
                                <?php

                                    }
                                }
                                ?>

                            </div>
                            <div class='comment_post'>
                                <form action='' method='post'>
                                    <input type='text' name='post_com' class='post_com' id='post_com' autocomplete='off' placeholder='Add comment...'>
                                    <input type='submit' value='Post' class='fullPostBtn postBtn '>
                                </form>
                            </div>
                        </div>

            </div>
    <?php

                    }
                }
    ?>


    <div class='deletePost' style='display:none;'>
        <div class='delete_box'>
            <?php

            if ($loc == $id) {
            ?>
                <div class='delete' data-img-id='<?= $imgId ?>'>Delete</div>
                <?php

            } else {
                $followingUser = $id . 'following';
                $data->select($followingUser, 'following', null, "following='{$loc}'");
                $result4 = $data->getResult();
                if (count($result4) == 1) {
                ?>
                    <div class='unfollowpost' data-id='<?= $loc ?>'>Unfollow</div>
                <?php

                } else {
                ?>
                    <div class='follow' data-item-id='<?= $loc ?>'>Follow</div>
            <?php

                }
            }
            ?>
            <div class='cancel' style='border-top: 1px solid #c9c9c9;'>Cancel</div>
        </div>
    </div>
<?php

        }
    }
} else {
?>
<script>
    window.location.href = './';
</script>
<?php

}
?>