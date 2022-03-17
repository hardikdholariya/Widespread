<?php
//     include_once("../database/database.php");
//     $data = new Database;
//     $loc = basename($_POST['loc']);
//     $following_p = $loc . "following";
//     $join = "`{$following_p}` ON user.username = `{$following_p}`.following";
//     $data->select('user', 'user.username,user.fullname,user.profileImg', $join);
//     $result = $data->getResult();
//     $output = "";
//     if (count($result) == 0) {

//         $output .= "
//     <div class='addP'>
//         <i class='fa-solid fa-user-plus'></i>
//     </div>";

//         echo $output;
//     } else {

//         foreach ($result as $row) {
//             $output = "
//     <div class='profileDetailp'>";
//             if (!empty($row['profileImg'])) {
//                 $output .= "

//         <div class='userImgp'>

//             <img src='../{$row['username']}/profileImg/{$row['profileImg']}' alt='User Profile' id='foo'>

//         </div>";
//             } else {
//                 $output .= "
//         <div class='userImgp'>

//             <img src='../../img/icon/user.jpg' alt='User Profile' id='foo'>

//         </div>";
//             }
//             $output .= "
//         <div class='userDetailp'>

//             <div class='uesp'>

//                 <div class='usernamep'>

//                 <h4 class='username_ffp' data-id='{$row['username']}'>{$row['username']}</h4>

//                 </div>

//                 <div class='userFullNamep'>

//                     <h5>{$row['fullname']}</h5>

//                 </div>

//             </div>

//             <div class='followGroupp'>";
//             $following_name = $loc . 'following';

//             $data->select($following_name, '*', null, "following='{$row['username']}'");
//             $following_result = $data->getResult();

//             if (count($following_result) == 1) {
//                 $output .= "<button class='followingBtnP' data-item-id='{$row['username']}'>following</button>";
//             } else {
//                 $output .= "<button class='followP' data-item-id='{$row['username']}'>Follow</button>";
//             }
//             $output .= " 
//             </div>
//         </div>
//     </div>";
//             // $i++;
//             echo $output;
//         }
//         $outputP = "
// <h4 class='h4'>Suggestions For You</h4>
// <div class='profileDetailp'>
//     <div class='userImgp'>
//         <img src='../../img/icon/user.jpg' alt='User Profile' id='foo'>
//     </div>
//     <div class='userDetailp'>
//         <div class='uesp'>
//             <div class='usernamep'>
//                 <h4 class='username_ffp' data-id='_.i.m.h.a.r.d.i.k._'>_.i.m.h.a.r.d.i.k._</h4>
//             </div>
//             <div class='userFullNamep'>
//                 <h5>Hardikd dholairy </h5>
//             </div>
//         </div>
//         <div class='followGroupp'>
//             <button class='followP' data-item-id='_.i.m.h.a.r.d.i.k._'>Follow</button>
//         </div>
//     </div>
// </div>
// ";
//         echo $outputP;
//     }

// echo $output; 
?>

<?php
include_once("../database/database.php");
// echo dirname(__FILE__);

$data = new Database;

$folder = basename($_POST['loc']);
echo $loc = basename($_POST['loc']);
$following_p = $folder . "following";
$join = "`{$following_p}` ON user.username = `{$following_p}`.following";
$data->select('user', 'user.username,user.fullname,user.profileImg', $join);
$result = $data->getResult();
// $data->select('user', 'username,fullname,profileImg', null, "not(username = '{$folder}')", "`id` DESC", 20);
// $result = $data->getResult();
$output = "";
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
            <img src='../{$row['username']}/profileImg/{$row['profileImg']}' alt='User Profile' id='foo'>";
        } else {

            $output .= "
            <img src='../../img/icon/user.jpg' alt='User Profile' id='foo'>";
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
            $output .= "<button class='followingBtn' data-item-id='{$row['username']}'>following</button>";
        } else {
            $output .= "<button class='follow' data-item-id='{$row['username']}'>Follow</button>";
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

                <img src='../../img/icon/user.jpg' alt='User Profile'>

                <div class='unfollow_username'>@</div>

            </div>

            <div class='cu'>

                <button id='unfollow_user' >Unfollow</button>

                <button id='cancel_user'>Cancel</button>

            </div>

        </div>

    </div>";
} else {
    // header("location: ./");
}

echo $output;
