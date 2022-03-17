<?php
include_once("../database/database.php");
$data = new Database;
$loc = basename($_POST['loc']);
$followers_p = $loc . "followers";
$join = "`{$followers_p}` ON user.username = `{$followers_p}`.followers";
$data->select('user', "user.username,user.fullname,user.profileImg,`{$followers_p}`.followers", $join);
$result = $data->getResult();
$output = "";
if (count($result) == 0) {

    $output .= "
        <div class='addP'>
            <i class='fa-solid fa-user-plus'></i>
        </div>";
    echo $output;
} else {

    foreach ($result as $row) {
        $output = "
        <div class='profileDetailp'>";
        if (!empty($row['profileImg'])) {
            $output .= "

            <div class='userImgp'>
                <img src='../{$row['username']}/profileImg/{$row['profileImg']}' alt='User Profile' id='foo'>
            </div>";
        } else {
            $output .= "
            <div class='userImgp'>

                <img src='../../img/icon/user.jpg' alt='User Profile' id='foo'>
                
            </div>";
        }
        $output .= "
            <div class='userDetailp'>

                <div class='uesp'>

                    <div class='usernamep'>

                        <h4 class='username_ffp' data-id='{$row['username']}'>{$row['username']}</h4>

                    </div>

                    <div class='userFullNamep'>

                        <h5>{$row['fullname']}</h5>

                    </div>

                </div>

                <div class='followGroupp'>";
        // $data->select($followers_name, '*', null, "followers='{$row['username']}'");
        $following_name = $loc . 'following';
        $data->select($followers_p, 'following,followers', "`{$following_name}` ON `{$followers_p}`.followers = `{$following_name}`.following");
        $followers_result = $data->getResult();
        // print_r($followers_result);
        if ($followers_result[0]['followers'] == $row['username']) {
            $output .= "<button class='followingBtnP' data-item-id='{$row['followers']}'>following</button>";
        } else {
            $output .= "<button class='followP' data-item-id='{$row['username']}'>Follow</button>";
        }
        $output .= " </div>

            </div>

        </div>
        ";
        echo $output;
    }
}
