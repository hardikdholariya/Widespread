<?php
require_once("../database/database.php");
$data = new Database;
$id = $_COOKIE['id'];
$data->select('userpost', "id,usernames", null, "usernames ='{$id}'");
$result =  $data->getResult();
if (count($result) > 0) {
    foreach ($result as $row) {
        $data->select('postlike', "user.username,user.profileImg", " `user` ON `user`.`username` = `postlike`.`likes`", "postlike.notify=1 AND postlike.postId={$row['id']}");
        $result1 = $data->getResult();
        if (count($result1) > 0) {
            foreach ($result1 as $row1) {
?>
                <div class="notification_pop notify_like">
                    <div class="like">
                        <div class="userImg">
                            <?php
                            if (!empty($row['profileImg'])) {
                            ?>
                                <img src="./users/<?= $row['username'] ?>/profileImg/<?= $row['profileImg'] ?>" alt="User Profile" id="foo">
                            <?php
                            } else { ?>
                                <img src="./img/icon/user.jpg" alt="User Profile" id="foo">
                            <?php
                            }
                            ?>

                        </div>
                        <div class="userDetail">
                            <div class="ues">
                                <div class="username">
                                    <h4 class="username_ffp"><?= $row1['username'] ?></h4><span>like your post</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            $data->update('postlike', ['notify' => 0], "postId={$row['id']}");
        }

        $data->select('postcomment', "user.username,user.profileImg,postcomment.comment", "`user` ON `user`.`username` = `postcomment`.`usernames`", "`postcomment`.notify=1 AND `postcomment`.postId={$row['id']}");
        $result2 = $data->getResult();
        if (count($result2)) {
            foreach ($result2 as $row2) {
            ?>
                <div class="notification_pop notify_comment">
                    <div class="comment">
                        <div class="userImg">
                            <?php
                            if (!empty($row['profileImg'])) {
                            ?>
                                <img src="./users/<?= $row['username'] ?>/profileImg/<?= $row['profileImg'] ?>" alt="User Profile" id="foo">
                            <?php
                            } else { ?>
                                <img src="./img/icon/user.jpg" alt="User Profile" id="foo">
                            <?php
                            }
                            ?>
                        </div>
                        <div class="userDetail">
                            <div class="ues">
                                <div class="username">
                                    <h4 class="username_ffp"><?= $row2['username'] ?></h4><span>Comment: <?= $row2['comment'] ?> </span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
<?php
            }
            $data->update('postcomment', ['notify' => 0], "postId={$row['id']}");
        }
    }
}
