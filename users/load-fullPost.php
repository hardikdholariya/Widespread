<?php
require_once("../database/database.php");
$loc = basename($_POST['loc']);
$imgId = $_POST['postImg'];
$data = new Database;
$data->select('user', "username,profileImg", null, "username ='{$loc}'");
$result = $data->getResult();
if (count($result) > 0) {
    foreach ($result as $row) {
        $output = "
    <div class='posts'>
            <div class='header'>
                <div class='userContender'>
                    <div class='userImg'>
                        <img src='../{$loc}/profileImg/{$row['profileImg']}' alt=''>
                    </div>
                    <div class='AccountName'>
                       {$row['username']}
                    </div>
                </div>
                <div class='more'>
                    <a href=''>...</a>
                </div>
            </div>";
        $userPost = $row['username'];
        $data->select($userPost, '*', null, "id={$imgId}");
        $result2 = $data->getResult();
        foreach ($result2 as $row2) {
            $output .= " <div class='middle'>";
            $output .= " <img class='likePost' src='../{$loc}/upload/{$row2['posts']}' alt=''><div class='heart' style='display:none;'></div>";
            $output .= " </div>

            <div class='footer'>
                <div class='lms'>
                    <i class='bx bxs-heart'></i>
                    <i class='bx bxs-message'></i>
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
                </div>
                <div class='caption'>{$row2['caption']}</div>
                <div class='comments'>";

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
                        <input type='submit' value='Post' class='postBtn'>
                    </form>
                </div>
            </div>

        </div>
    ";
        }
    }
}
echo $output;
