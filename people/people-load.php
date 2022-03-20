<?php
include_once("../database/database.php");

$data = new Database;

$folder = $_COOKIE['id'];

$data->select('user', 'username,fullname,profileImg', null, "not(username = '{$folder}')", "`id` DESC", 20);
$result = $data->getResult();

if (count($result) > 0) {
    $output = "
    <div class='sfy'>

        <h3>Suggestions For You</h3>

    </div>

    <div class='suggestions'>";
    $i = 0;
    foreach ($result as $row) {

        $output .= "
        <div class='profileDetail' data-eid='1' data-item-id='stand-out'>

            <div class='userImg'>";

        if (!empty($row['profileImg'])) {

            $output .= "
            <img src='../users/{$row['username']}/profileImg/{$row['profileImg']}' alt='User Profile' id='foo'>";
            $src = "../users/{$row['username']}/profileImg/{$row['profileImg']}";
        } else {

            $output .= "
            <img src='../img/icon/user.jpg' alt='User Profile' id='foo'>";
            $src = "../img/icon/user.jpg";
        }
        $output .= " 
        </div>

            <div class='userDetail'>

                <div class='ues'>

                    <div class='username'>

                        <h4 class='username_ff' data-id='{$row['username']}'>{$row['username']}</h4>

                    </div>

                    <div class='userFullName'>

                        <h5>{$row['fullname']} </h5>

                    </div>

                </div>

                <div class='followGroup'>";
        $following_name = $folder . 'following';

        $data->select($following_name, '*', null, "following='{$row['username']}'");

        $following_result = $data->getResult();
        if (count($following_result) == 1) {
            $output .= "<button class='followingBtn' data-item-id='{$row['username']}' data-src='{$src}'>following</button>";
        } else {
            $output .= "<button class='follow' data-item-id='{$row['username']}' data-src='{$src}'>Follow</button>";
        }
        $output .= " </div>
            </div>
        </div>";

        $i++;
    }
    $output .= "
    </div>";
    $output .= "
    <div id='unfollow_pop' style='display: none'>

        <div id='upop'>

            <div class='unfollowimg'>

                <img src='../img/icon/user.jpg' alt='User Profile' class = 'popImg'>

                <div class='unfollow_username'>@</div>

            </div>

            <div class='cu'>

                <button id='unfollow_user' data-id = ''>Unfollow</button>

                <button id='cancel_user'>Cancel</button>

            </div>

        </div>

    </div>";
}
echo $output;
