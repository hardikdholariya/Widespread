<?php
require_once('./database/database.php');
$data = new Database;
$id = $_COOKIE['id'];
$user = $_POST['user'];
$following = $id . 'following';
$data->select($following, 'username,profileImg,story', "userstroy ON `{$following}`.following = userstroy.postStoryUsername JOIN user ON user.username = userstroy.postStoryUsername", "userstroy.postStoryUsername='{$user}'");
$result2 = $data->getResult();
if (count($result2) > 0) {

?>
    <div class="storyPopUser">
        <div data-slide="slide" class="slide">

            <div class="slide-items">
                <?php
                foreach ($result2 as $row2) {
                ?>
                    <div class="storyUserDetail">
                        <div class="userDetail">
                            <div class="userImg">
                                <img src="./users/<?= $row2['username'] ?>/profileImg/<?= $row2['profileImg'] ?>" alt="">
                            </div>
                            <div class="username">

                                <h4><span>@</span><?= $row2['username'] ?></h4>
                            </div>

                        </div>
                        <div class="userStory">
                            <img src="./users/<?= $row2['username'] ?>/story/<?= $row2['story'] ?>" alt="Img 1">
                        </div>

                    </div>
                <?php
                }
                ?>
            </div>
            <nav class="slide-nav">
                <div class="slide-thumb"></div>
                <button class="slide-prev">Prev</button>
                <button class="slide-next">Next</button>
                <div class="userStoryClose" style="z-index: 20;">
                    <svg aria-label="Close" class="_8-yf5 " color="#ffffff" fill="#ffffff" height="24" role="img" viewBox="0 0 24 24" width="24">
                        <polyline fill="none" points="20.643 3.357 12 12 3.353 20.647" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3"></polyline>
                        <line fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" x1="20.649" x2="3.354" y1="20.649" y2="3.354"></line>
                    </svg>
                </div>
            </nav>
        </div>
    </div>

    <script>
        <?php
        include_once("./js/slide-stories.js");
        ?>
    </script>
<?php
}
?>