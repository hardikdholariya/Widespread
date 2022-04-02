<?php
require_once('./database/database.php');
$data = new Database;
$id = $_COOKIE['id'];
?>
<?php
$rows = "postlike.postId,postlike.likes,userpost.posts,user.profileImg";

$join = "`userpost` ON userpost.id = postlike.postId JOIN `user` ON user.username = postlike.likes";

$data->select('postlike', $rows, $join, "userpost.usernames = '{$id}'", "postlike.id DESC", 20);
$result = $data->getResult();

if (count($result) > 0) {
?>
    <div class="LikePost">
        <h3>Likes</h3>
    </div>
    <div class="notification">
        <?php
        foreach ($result as $row) {
        ?>
            <div class="like">
                <div class="userImg">

                    <?php
                    if (!empty($row['profileImg'])) {
                    ?>
                        <img src="./users/<?= $row['likes'] ?>/profileImg/<?= $row['profileImg'] ?>" alt="User Profile" id="foo">
                    <?php
                    } else { ?>
                        <img src="./users/<?= $row['likes'] ?>/profileImg/<?= $row['profileImg'] ?>" alt="User Profile" id="foo">
                    <?php
                    }
                    ?>

                </div>
                <div class="userDetail">
                    <div class="ues">
                        <div class="username">
                            <h4 class="username_ffp"><?= $row['likes'] ?></h4><span>like your post</span>
                        </div>
                    </div>

                    <div class=" userPost">
                        <img src="./users/<?= $id ?>/upload/<?= $row['posts'] ?>" alt="">
                    </div>
                </div>
            </div>

        <?php
        }
        ?>
    </div>

<?php
}
$rows1 = "postcomment.postId,postcomment.comment,postcomment.usernames,userpost.posts,user.profileImg";

$join1 = "`userpost` ON userpost.id = postcomment.postId JOIN `user` ON user.username = postcomment.usernames";

$data->select('postcomment', $rows1, $join1, "userpost.usernames = '{$id}'", "postcomment.id DESC", 20);
$result1 = $data->getResult();
if (count($result1) > 0) {
?>
    <div class="LikePost">
        <h3>Comments</h3>
    </div>
    <div class="notification">
        <?php
        foreach ($result1 as $row2) {
        ?>
            <div class="comment">
                <div class="userImg">
                    <img src="./users/<?= $row2['usernames'] ?>/profileImg/<?= $row2['profileImg'] ?>" alt="User Profile" id="foo">
                </div>
                <div class="userDetail">
                    <div class="ues">
                        <div class="username">
                            <h4 class="username_ffp"><?= $row2['usernames'] ?></h4><span>Comment: <?= $row2['comment'] ?> </span>
                        </div>
                    </div>

                    <div class="userPost">
                        <img src="./users/<?= $id ?>/upload/<?= $row2['posts'] ?>" alt="">
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
<?php
}
?>