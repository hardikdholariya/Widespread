<?php
include_once("../database/database.php");
$data = new Database;
$loc = $_POST['loc'];
$following_p = $loc . "following";
$join = "`{$following_p}` ON user.username = `{$following_p}`.following";
$data->select('user', 'user.username,user.fullname,user.profileImg', $join);
$result = $data->getResult();
$output;
if (count($result) == 0) {

    $output .= "
        <div class='addP'>
            <i class='fa-solid fa-user-plus'></i>
        </div>";
} else {
    $i = 0;

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
        $following_name = $loc . 'following';

        $data->select($following_name, '*', null, "following='{$row['username']}'");
        $following_result = $data->getResult();

        if (count($following_result) == 1) {
            $output .= "<button class='followingBtn' data-item-id='{$row['username']}'>following</button>";
        } else {
            $output .= "<button class='follow' data-item-id='{$row['username']}'>Follow</button>";
        }
        // <button class='follow'>Follow</button>
        $output .= " 
                </div>
            </div>
        </div>";
        $i++;
    }
}
$output .= "
<h4 class='h4'>Suggestions For You</h4>
<div class='profileDetailp'>
    <div class='userImgp'>
        <img src='../../img/icon/user.jpg' alt='User Profile' id='foo'>
    </div>
    <div class='userDetailp'>
        <div class='uesp'>
            <div class='usernamep'>
                <h4 class='username_ffp' data-id='_.i.m.h.a.r.d.i.k._'>_.i.m.h.a.r.d.i.k._</h4>
            </div>
            <div class='userFullNamep'>
                <h5>Hardikd dholairy </h5>
            </div>
        </div>
        <div class='followGroupp'>
            <button class='follow' data-item-id='_.i.m.h.a.r.d.i.k._'>Follow</button>
        </div>
    </div>
</div>
";
echo $output;
