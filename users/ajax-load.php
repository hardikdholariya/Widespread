<?php
require_once("../database/database.php");

$data = new Database;

$loc = basename($_POST['loc']);

$data->select('user', 'username,profileImg,fullname', null, "username = '{$loc}'", null, null);

$result = $data->getResult();
$folder = $_COOKIE['id'];

if (count($result) > 0) {
    foreach ($result as $row) {
        $output = "<div class='profileDetail'>
        <label for='file' class='userimg'>";
        $profileImg = $row['profileImg'];
        if (!empty($profileImg)) {

            $output .= "<img src='../{$loc}/profileImg/{$profileImg}' alt='User Profile' id='foo'>";

            $src = "../{$loc}/profileImg/{$profileImg}";
        } else {

            $output .= "<img src='../../img/icon/user.jpg' alt='User Profile' id='foo'>";
            $src = "../../img/icon/user.jpg";
        }

        if ($loc == $_COOKIE['id']) {
            $output .= "<input type='file' name='file' id='file' accept='image/*' style='display: none;'>";
        }
        $output .= "</label>

        <div class='userDetail'>
            <div class='ues'>
                <div class='username'>";

        $username = $row['username'];

        $output .= "<h2 class='username_ff'>{$username}</h2>

            </div>

            <div class='editProfile'>";

        if ($loc == $folder) {
            $output .= "<button class='edit'>Edit Profile</button>";
        } else if ($username == $loc) {
            $following_name = $folder . 'following';

            $data->select($following_name, '*', null, "following='{$loc}'");

            $following_result = $data->getResult();
            if (count($following_result) == 1) {

                $output .= "<button class='messageBtn'>Message</button>
                        <button class='followingBtn' data-item-id='{$row['username']}' data-src='{$src}'>following</button>";
            } else {

                $output .= "<button class='follow' data-item-id='{$row['username']}'>follow</button>";
            }
        }


        $output .= "</div>";

        if ($loc == $folder) {

            $output .= "<div class='setting'>
                    <a href=''>
                        <img src='../../img/icon/settings.svg' />
                    </a>
                </div>";
        }

        $output .= "</div>

        <div class='pff'>
            <div class='imgPost'>";

        $posts = $data->count($username, 'posts');

        $output .= "<span> {$posts}</span>
                <p>Posts</p>
            </div>
            <div class='followers'>";
        $following_table = $loc . "followers";
        $followers = $data->count($following_table, 'followers');

        $output .= "<span> {$followers}</span>
                <p>followers</p>
            </div>
            <div class='following'>";

        $following_table = $loc . "following";
        $following = $data->count($following_table, 'following');

        $output .= "<span> {$following}</span>
                <p>following</p>
            </div>
        </div>
        <div class='userFullName'>";

        $userFullName = $result[0]['fullname'];

        $output .= "<h3>{$userFullName}</h3>
        </div>

        </div>
    </div>
    
    <div class='postIcon'>
            <i class='bx bx-folder' style='color:#ffffff'></i>
            <span>POSTS</span>
        </div>
    ";

        $output .= "<div class='postImg'>";

        $data->select($username, 'posts,id', null, null, 'id DESC');

        $result = $data->getResult();

        foreach ($result as $row) {
            $output .= "<div class='pImg' data-postImg = '{$row['id']}'>
                    <img src='../{$loc}/upload/{$row['posts']}' alt='post'>
                </div>";
        }

        $output .= "</div>";

        $output .= "<div id='unfollow_pop' style='display: none'>

            <div id='upop'>

                <div class='unfollowimg'>

                    <img src='../../img/icon/user.jpg' alt='User Profile' class = 'popImg'>

                    <div class='unfollow_username'>@{$username}</div>

                </div>

                <div class='cu'>

                    <button id='unfollow_user' data-id = ''>Unfollow</button>

                    <button id='cancel_user'>Cancel</button>

                </div>

            </div>

        </div>";
    }
    echo $output;
} else {
    $output = "
    <div class='text-pop-up'>
        <div class='textNot'>
            <div class='notFound'>
                404
            </div>
            <p> Not Found</p>
        </div>
    </div>
    ";
    echo $output;
}
