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
        $output .= " <div class='middle'>";
        foreach ($result2 as $row2) {
            $output .= " <img src='../{$loc}/upload/{$row2['posts']}' alt=''>";
        }
        $output .= " </div>

            <div class='footer'>
                <div class='lms'>
                    <i class='bx bxs-heart'></i>
                    <i class='bx bxs-message'></i>
                    <i class='bx bxs-share bx-flip-horizontal'></i>
                </div>
                <div class='comments'>
                    <a href=''>View all comments</a>
                </div>
                <div class='comment_post'>
                    <form action='' method='post'>
                        <input type='text' name='post_com' class='post_com'>
                        <input type='submit' value='Post' class='postBtn'>
                    </form>
                </div>
            </div>

        </div>
    ";
    }
}
echo $output;
