<?php
include_once("../database/database.php");
$data = new Database;
$loc = basename($_POST['loc']);
$id = $_COOKIE['id'];
$followers_btn = $id . "followers";
$following_btn = $id . "following";

$following_p = $loc . "following";
$join = "`{$following_p}` ON user.username = `{$following_p}`.following";
$data->select('user', 'user.username,user.fullname,user.profileImg', $join);
$result = $data->getResult();
$data->select('user', 'username,fullname,profileImg', null, "(NOT EXISTS (SELECT following FROM `{$following_btn}` WHERE following IN(username))) AND (NOT username = '{$id}')");
$result2 = $data->getResult();


if (count($result) > 0) {
    $output = "
    <div class='followingY'>
            <h3>Your Following</h3>
    </div>
    <div class='followingList'>
    ";
    foreach ($result as $row) {
        $output .= "
        <div class='profileDetailp'>
            <div class='userImgp'>";

        if (!empty($row['profileImg'])) {

            $output .= "
                <img src='../{$row['username']}/profileImg/{$row['profileImg']}'  alt='User Profile' id='foo'>";

            $src = "../{$row['username']}/profileImg/{$row['profileImg']}";
        } else {

            $output .= "
                <img src='../../img/icon/user.jpg' alt='User Profile' id='foo'>";
            $src = "../../img/icon/user.jpg";
        }
        $output .= " 
            </div>
            <div class='userDetailp'>
                <div class='uesp'>
                    <div class='usernamep'>
                        <h4 class='username_ffp' data-id = '{$row['username']}'>{$row['username']}</h4>
                    </div>
                    <div class='userFullNamep'>
                        <h5>{$row['fullname']} </h5>
                    </div>
                </div>

                <div class='followGroupp'>";
        $data->select($following_btn, 'following', null, "(EXISTS (select followers FROM `{$followers_btn}` WHERE following IN('{$row['username']}')))");
        $result3 = $data->getResult();
        if (count($result3) == 1) {
            $output .= " 
                    <button class='followingBtn' data-item-id='{$row['username']}' data-src='{$src}'>Following</button>";
        } else {
            $output .= "
            <button class='follow' data-item-id='{$row['username']}'>Follow</button>
            ";
        }

        $output .= "   
                </div>
            </div>
        </div>";
    }
    $output .= "
    </div>";
    $output .= "
    <div id='unfollow_pop' style='display: none'>

        <div id='upop'>

            <div class='unfollowimg'>

                <img src='../../img/icon/user.jpg' alt='User Profile' class = 'popImg'>

                <div class='unfollow_username'>@</div>

            </div>

            <div class='cu'>

                <button id='unfollow_user' data-id = ''>Unfollow</button>

                <button id='cancel_user'>Cancel</button>

            </div>

        </div>

    </div>";

    if (count($result2) > 0) {
        $output .= "
    <div class='followingY'>
    <h3>Suggestions For You</h3>
    </div>
    <div class='followingList'>";
        foreach ($result2 as $row2) {
            $output .= "<div class='profileDetailp'>
        <div class='userImgp'>";

            if (!empty($row2['profileImg'])) {

                $output .= "
                <img src='../{$row2['username']}/profileImg/{$row2['profileImg']}'  alt='User Profile' id='foo'>";

                $src = "../{$row2['username']}/profileImg/{$row2['profileImg']}";
            } else {

                $output .= "
                <img src='../../img/icon/user.jpg' alt='User Profile' id='foo'>";
                $src = "../../img/icon/user.jpg";
            }
            $output .= " 
            </div>
            <div class='userDetailp'>
                <div class='uesp'>
                    <div class='usernamep'>
                        <h4 class='username_ffp' data-id = '{$row2['username']}'>{$row2['username']}</h4>
                    </div>
                    <div class='userFullNamep'>
                        <h5>{$row2['fullname']} </h5>
                    </div>
                </div>
                <div class='followGroupp'>
                    <button class='follow' data-item-id='{$row2['username']}'>Follow</button>
                </div>
            </div>
        </div>";
        }
        $output .= "</div>
    ";
    }
} else {
    if (count($result2) > 0) {
        $output = "
    <div class='followingY'>
    <h3>Suggestions For You</h3>
    </div>
    <div class='followingList'>";
        foreach ($result2 as $row2) {
            $output .= "<div class='profileDetailp'>
        <div class='userImgp'>";

            if (!empty($row2['profileImg'])) {

                $output .= "
                <img src='../{$row2['username']}/profileImg/{$row2['profileImg']}'  alt='User Profile' id='foo'>";

                $src = "../{$row2['username']}/profileImg/{$row2['profileImg']}";
            } else {

                $output .= "
                <img src='../../img/icon/user.jpg' alt='User Profile' id='foo'>";
                $src = "../../img/icon/user.jpg";
            }
            $output .= " 
            </div>
            <div class='userDetailp'>
                <div class='uesp'>
                    <div class='usernamep'>
                        <h4 class='username_ffp'>{$row2['username']}</h4>
                    </div>
                    <div class='userFullNamep'>
                        <h5>{$row2['fullname']} </h5>
                    </div>
                </div>
                <div class='followGroupp'>
                    <button class='follow' data-item-id='{$row2['username']}'>Follow</button>
                </div>
            </div>
        </div>";
        }
        $output .= "</div>
    ";
    }
}
echo $output;
