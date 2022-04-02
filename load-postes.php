<?php
require_once("./database/database.php");
$id = $_COOKIE['id'];
$data = new Database;
$following_tbl = $id . 'following';

$sql =  "SELECT user.username,user.profileImg,userpost.* FROM user 
LEFT JOIN `$following_tbl` ON `$following_tbl`.following = user.username 
LEFT JOIN `userpost` ON userpost.usernames = user.username 
WHERE (user.username = '{$id}' OR `$following_tbl`.following IS NOT NULL) ORDER BY `userpost`.`posttime` DESC";
$data->sql($sql);

$result = $data->getResult();
$output = '';
$i = 0;
if (count($result) > 0) {
    foreach ($result as $row) {
        $output .= "
        <div class='posts' >
        <div class='header'>
            <div class='userContender'>
                <div class='userImg'>";
        if (!empty($row['profileImg'])) {
            $output .= "<img src='./users/{$row['username']}/profileImg/{$row['profileImg']}' alt='User Profile' id='foo'>";
        } else {
            $output .= "<img src='./img/icon/user.jpg' alt=''>";
        }

        $output .= "</div>
                <div class='AccountName'>
                    {$row['username']}
                </div>
            </div>
            <div class='more'>
                <a href='' class='moreOption'>...</a>
            </div>
        </div>

        <div class='middle'>";

        $output .= "<img class='likePost_0' src='./users/{$row['username']}/upload/{$row['posts']}' data-id='{$i}'>
        <div class='heart_{$i}' style='display:none;
        cursor: pointer;
                position: absolute;
                height: 100px;
                width: 100px;
                background-image: url(https://abs.twimg.com/a/1446542199/img/t1/web_heart_animation.png);
                background-position: left;
                background-repeat: no-repeat;
                background-size: 2900%;
                animation: heart-burst .8s steps(28) 1;
                filter: drop-shadow(rgb(255, 255, 255) 0px 0px 0.75rem);' data-id='{$row['username']}' data-img-id='{$row['id']}'></div>";

        $output .= "
        </div>
        <div class='footer'>
        <div class='lms'>";

        $likeTbl = 'postlike';
        $data->select($likeTbl, 'likes', null, "likes='{$id}' AND postId = {$row['id']}");
        $likeResult = $data->getResult();

        $likeCount = count($likeResult);
        if ($likeCount == 1) {
            $output .= "<i class='bx bxs-heart likeHeart_{$i} likeUnIndex' data-id='{$row['username']}' data-img-id='{$row['id']}' style='color:#000;'></i>";
        } else {
            $output .= "<i class='bx bxs-heart likeHeart_{$i} likeUIndex' data-id='{$row['username']}' data-img-id='{$row['id']}'></i>";
        }

        $output .= " <i class='bx bxs-message' data-username = '{$row['username']}' data-img-id='{$row['id']}' data-id='{$i}'></i>
                <i class='bx bxs-share bx-flip-horizontal'></i>
            </div>";
        $data->select($likeTbl, 'likes', null, "postId = {$row['id']}");
        $likeResult1 = count($data->getResult());


        $postTbl =  'postcomment';
        $data->select($postTbl, "`{$postTbl}`.usernames,`{$postTbl}`.comment,user.username,user.profileImg", "`user` ON `{$postTbl}`.usernames = user.username", "postId ={$row['id']}", "`{$postTbl}`.id DESC");
        $result2 = $data->getResult();
        $commentResult = count($result2);

        $output .= "
            <div class='likeComments'>
                Like {$likeResult1} and Comments  {$commentResult}
            </div>";
        if (!empty($row['caption'])) {
            $output .= "<div class='caption'><span style='color:#000;font-weight: bold;'>@{$row['username']}</span> {$row['caption']}</div>";
        }

        $output .= "
            <div class='comments comments-{$i}' style='display:none;'>";

        if ($commentResult > 0) {

            foreach ($result2 as $row2) {
                $output .= " 
            <div class='cUser'>
                <div class='cImg'>";
                if (!empty($row2['profileImg'])) {
                    $output .= "<img src='./users/{$row2['username']}/profileImg/{$row2['profileImg']}'>";
                } else {
                    $output .= "<img src='./img/icon/user.jpg'>";
                }
                $output .= " </div>
                <div class='cusername'>{$row2['username']}</div>
                <div class='userComments'>{$row2['comment']}</div>
            </div>
        ";
            }
        }
        $output .= "  
                </div>
            <div class='comment_post'>
                <form action='' method='post'>
                    <input type='text' name='post_com' class='post_com' id='post_com_{$i}' autocomplete='off' placeholder='Add comment...'>
                    <input type='submit' value='Post' data-username = '{$row['username']}' data-img-id='{$row['id']}'  data-id='{$i}' class='postBtn'>
                </form>
            </div>
        </div>

    </div>
        ";
        $i++;
    }

    echo $outpu = "<div class='len' data-length = '{$i}' style='display:none;'></div>";
    echo $output;
}
