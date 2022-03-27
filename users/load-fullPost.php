<?php
require_once("../database/database.php");
$loc = basename($_POST['loc']);
$imgId = $_POST['postImg'];
$id = $_COOKIE['id'];
$likeTbl = $loc . 'postlike_' . $imgId;

$data = new Database;
$data->select('user', "username,profileImg", null, "username ='{$loc}'");
$result = $data->getResult();
if (count($result) > 0) {
    foreach ($result as $row) {
        $output = "
    <div class='posts'>
            <div class='header'>
                <div class='userContender'>
                    <div class='userImg'>";
        if (!empty($row['profileImg'])) {

            $output .= "  <img src='../{$loc}/profileImg/{$row['profileImg']}' alt=''>";
        } else {
            $output .= "<img src='../../img/icon/user.jpg' alt='User Profile' id='foo'>";
        }
        $output .= " </div>
                    <div class='AccountName'>
                       {$row['username']}
                    </div>
                </div>
                <div class='more'>
                    <a href='' class='moreOption'>...</a>
                </div>
            </div>";
        $data->select('userpost', '*', null, "id={$imgId}");
        $result2 = $data->getResult();
        foreach ($result2 as $row2) {
            $output .= " <div class='middle'>";
            $output .= " <img class='likePost' src='../{$row['username']}/upload/{$row2['posts']}' alt=''><div class='heart' style='display:none;' data-id='{$row['username']}'></div>";


            $data->select($likeTbl, 'likes', null, "likes='{$id}'");
            $likeResult = $data->getResult();
            $output .= " </div>

            <div class='footer'>
                <div class='lms'>";

            if (count($likeResult) == 1) {
                $output .= "<i class='bx bxs-heart likeUn' data-id='{$row['username']}' style='color:#000;'></i>";
            } else {
                $output .= "<i class='bx bxs-heart likeU' data-id='{$row['username']}'></i>";
            }

            $output .= "<i class='bx bxs-message'></i>
                    <i class='bx bxs-share bx-flip-horizontal'></i>
                </div>";

            $tablePost = $loc . 'postcommentid_' . $imgId;

            $data->select($tablePost, "`{$tablePost}`.usernames,`{$tablePost}`.comment,user.username,user.profileImg", "`user` ON `{$tablePost}`.usernames = user.username", null, "`{$tablePost}`.id DESC");

            $result2 = $data->getResult();
            $resultCount = count($result2);

            $tableLike = $loc . 'postlike_' . $imgId;
            $data->select($tableLike);
            $result3 = count($data->getResult());

            $output .= " 
                <div class='likeComments'>
                    Like {$result3} and Comments {$resultCount}
                </div>";
            if (!empty($row2['caption'])) {
                $output .= "<div class='caption'><span style='color:#000;font-weight: bold;'>@{$row['username']}</span> {$row2['caption']}</div>";
            }
            $output .= "<div class='comments'>";

            if ($resultCount > 0) {
                foreach ($result2 as $row2) {
                    $output .= " 
                <div class='cUser'>
                    <div class='cImg'>";
                    if (!empty($row2['profileImg'])) {
                        $output .= "<img src='../{$row2['username']}/profileImg/{$row2['profileImg']}'>";
                    } else {
                        $output .= "<img src='../../img/icon/user.jpg'>";
                    }
                    $output .= " </div>
                    <div class='cusername'>
                    {$row2['username']}
                    </div>
                    <div class='userComments'>
                    {$row2['comment']}
                    </div>
                </div>
            ";
                }
            }
            $output .= " 
                </div>
                <div class='comment_post'>
                    <form action='' method='post'>
                        <input type='text' name='post_com' class='post_com' id='post_com' autocomplete='off' placeholder='Add comment...'>
                        <input type='submit' value='Post' class='fullPostBtn postBtn '>
                    </form>
                </div>
            </div>

        </div>
    ";
        }

        $output .= "
        <div class='deletePost' style='display:none;'>
            <div class='delete_box'>";
        if ($loc == $id) {
            $output .= "<div class='delete'>Delete</div>";
        } else {
            $followingUser = $id . 'following';
            $data->select($followingUser, 'following', null, "following='{$loc}'");
            $result4 = $data->getResult();
            if (count($result4) == 1) {
                $output .= "<div class='unfollowpost' data-id='{$loc}'>Unfollow</div>";
            } else {
                $output .= "<div class='follow' data-item-id='{$loc}'>Follow</div>";
            }
        }
        $output .= " <div class='cancel' style='border-top: 1px solid #c9c9c9;'>Cancel</div>
            </div>
        </div>
        ";
    }
}
echo $output;
