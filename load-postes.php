<?php
require_once("./database/database.php");
$id = $_COOKIE['id'];
$data = new Database;
$following_tbl = $id . 'following';
$sql =  "SELECT user.username,user.profileImg,userpost.posts,userpost.caption,userpost.id FROM user 
LEFT JOIN `$following_tbl` ON `$following_tbl`.following = user.username 
LEFT JOIN `userpost` ON userpost.usernames = user.username 
WHERE (user.username = '{$id}' OR `$following_tbl`.following IS NOT NULL) ORDER BY `userpost`.`posttime` DESC";
$data->sql($sql);
$result = $data->getResult();
$i = 0;
if (count($result) > 0) {
    foreach ($result as $row) {
        if ($row['id'] != null) {
?>
            <div class='posts'>
                <div class='header'>
                    <div class='userContender'>
                        <div class='userImg'>
                            <?php
                            if (!empty($row['profileImg'])) {
                            ?>
                                <img src='./users/<?= $row['username'] ?>/profileImg/<?= $row['profileImg'] ?>' alt='User Profile' id='foo'>
                            <?php
                            } else {
                            ?>
                                <img src='./img/icon/user.jpg' alt=''>
                            <?php
                            }
                            ?>

                        </div>
                        <div class='AccountName' data-id="<?= $row['username'] ?>">
                            <?= $row['username'] ?>
                        </div>
                    </div>
                    <div class='more'>
                        <a href='' class='moreOption1' data-id='<?= $i ?>'>...</a>
                    </div>
                </div>

                <div class='middle'>

                    <img class='likePost_0' src='./users/<?= $row['username'] ?>/upload/<?= $row['posts'] ?>' data-id='<?= $i ?>'>

                    <div class='heart_<?= $i ?>' style='display:none;cursor: pointer;position: absolute;height: 100px;width: 100px;background-image: url(https://abs.twimg.com/a/1446542199/img/t1/web_heart_animation.png);background-position: left;background-repeat: no-repeat;background-size: 2900%;animation: heart-burst .8s steps(28) 1;filter: drop-shadow(rgb(255, 255, 255) 0px 0px 0.75rem);' data-id='<?= $row['username'] ?>' data-img-id='<?= $row['id'] ?>'></div>


                </div>
                <div class='footer'>
                    <div class='lms'>
                        <?php

                        $likeTbl = 'postlike';
                        $data->select($likeTbl, 'likes', null, "likes='{$id}' AND postId = {$row['id']}");
                        $likeResult = $data->getResult();

                        $likeCount = count($likeResult);
                        if ($likeCount == 1) {
                        ?>
                            <i class='bx bxs-heart likeHeart_<?= $i ?> likeUnIndex' data-id='<?= $row['username'] ?>' data-img-id='<?= $row['id'] ?>' style='color:#000;'></i>
                        <?php
                        } else {
                        ?>
                            <i class='bx bxs-heart likeHeart_<?= $i ?> likeUIndex' data-id='<?= $row['username'] ?>' data-img-id='<?= $row['id'] ?>'></i>
                        <?php
                        }
                        ?>

                        <i class='bx bxs-message' data-username='<?= $row['username'] ?>' data-img-id='<?= $row['id'] ?>' data-id='<?= $i ?>'></i>
                        <i class='bx bxs-share bx-flip-horizontal sharePostUser' data-img-id="<?= $row['id'] ?>" data-id='<?= $row['username'] ?>'></i>
                    </div>
                    <?php
                    $data->select($likeTbl, 'likes', null, "postId = {$row['id']}");
                    $likeResult1 = count($data->getResult());


                    $postTbl =  'postcomment';
                    $data->select($postTbl, "`{$postTbl}`.usernames,`{$postTbl}`.comment,user.username,user.profileImg", "`user` ON `{$postTbl}`.usernames = user.username", "postId ={$row['id']}", "`{$postTbl}`.id DESC");
                    $result2 = $data->getResult();
                    $commentResult = count($result2);
                    ?>
                    <div class='likeComments'>
                        Like <?= $likeResult1 ?> and Comments <?= $commentResult ?>
                    </div>
                    <?php
                    if (!empty($row['caption'])) {
                    ?>
                        <div class='caption'><span style='color:#000;font-weight: bold;'>@<?= $row['username'] ?></span> <?= $row['caption'] ?></div>
                    <?php
                    }
                    ?>


                    <div class='comments comments-<?= $i ?>' style='display:none;'>
                        <?php
                        if ($commentResult > 0) {

                            foreach ($result2 as $row2) {
                        ?>


                                <div class='cUser'>
                                    <div class='cImg'>
                                        <?php

                                        if (!empty($row2['profileImg'])) {
                                        ?>
                                            <img src='./users/<?= $row2['username'] ?>/profileImg/<?= $row2['profileImg'] ?>'>
                                        <?php
                                        } else {
                                        ?>
                                            <img src='./img/icon/user.jpg'>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <div class='userComments'><?= $row2['comment'] ?></div>
                                    <div class='cusername'><?= $row2['username'] ?></div>
                                </div>

                        <?php
                            }
                        }
                        ?>

                    </div>
                    <div class='comment_post'>
                        <form action='' method='post'>
                            <input type='text' name='post_com' class='post_com' id='post_com_<?= $i ?>' autocomplete='off' placeholder='Add comment...'>
                            <input type='submit' value='Post' data-username='<?= $row['username'] ?>' data-img-id='<?= $row['id'] ?>' data-id='<?= $i ?>' class='postBtn'>
                        </form>
                    </div>
                </div>

            </div>

            <div class='deletePost' style='display:none;'>
                <div class='delete_box'>
                    <?php
                    if ($row['username'] == $id) {
                    ?>
                        <div class='delete' data-img-id='<?= $row['id'] ?>'>Delete</div>
                        <?php
                    } else {
                        $followingUser = $id . 'following';
                        $data->select($followingUser, 'following', null, "following='{$row['username']}'");
                        $result4 = $data->getResult();
                        if (count($result4) == 1) {
                        ?>
                            <div class='unfollowpost' data-id='<?= $row['username'] ?>'>Unfollow</div>
                    <?php

                        }
                    }
                    ?>
                    <div class='cancel' style='border-top: 1px solid #c9c9c9;'>Cancel</div>
                </div>
            </div>
    <?php

            $i++;
        }
    }
    // 
    ?>

    <div class='sharePost' style='display:none;'>
        <div class='share_box'>
            <div class='shareN'>
                <h4>share</h4>
                <div class='shareClose'>
                    <i class='bx bx-x'></i>
                </div>
            </div>
            <div class='shareSearch'>
                <input type='text' name='shareSearchUser' id='shareSearchUser' class='searchUser' placeholder='Search Account...' autocomplete="off">
            </div>
            <form method='post' name="myform">
                <div class='chatUser'>
                    <h4 style="padding: 10px;cursor:auto;">No Found</h4>
                </div>
                <div class='sendP'>
                    <input type='button' value='Send' name='sendPost' id='sendPost'>
                </div>
            </form>
        </div>
    </div>
    <div class='len' data-length='<?= $i ?>' style='display:none;'></div>
    <script>
        $(document).ready(function() {
            $("#shareSearchUser").keyup(function(e) {
                var search = $(this).val();
                $.ajax({
                    type: "POST",
                    url: "./search-share.php",
                    data: {
                        search: search
                    },
                    success: function(data) {
                        $(".chatUser").html(data);
                    }
                });
            });
            $(document).on('click', '.shareClose', function(e) {
                $.ajax({
                    type: "post",
                    url: "./php_files/close-share.php",
                    success: function(data) {
                        $(".sharePost").hide();
                        $(".sharePostUser").css('color', '#fff');
                        document.myform.reset();
                    }
                });
            });
            $(".check").click(function(e) {
                var check = $(this).val();
                $.ajax({
                    type: "POST",
                    url: "./php_files/check.php",
                    data: {
                        checked: check
                    }
                });
            });
            $('#sendPost').click(function(e) {
                e.preventDefault();
                var users = [];
                $("input[type='checkbox']").each(function() {
                    if ($(this).is(":checked")) {
                        users.push($(this).val());
                    }
                });
                var imgId = $(this).data('imgId');
                var folder = $(this).data('id');
                $.ajax({
                    type: "POST",
                    url: "./php_files/sher-post.php",
                    data: {
                        users,
                        imgId,
                        folder
                    },
                    success: function(data) {
                        $(this).attr('data-img-id', '');
                        $(this).attr('data-id', '');
                        $('.sharePost').hide();
                        $(".sharePostUser").css('color', "#fff");
                        document.myform.reset();
                        $("#shareSearchUser").val("");
                    }
                });
            });
            $(document).on('click', '.AccountName', function(e) {
                id = $(this).data('id');
                window.location.href = "./users/" + id;
            });
        });
    </script>
<?php
}
?>