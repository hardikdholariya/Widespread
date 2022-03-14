<?php
require_once("../database/database.php");

$data = new Database;

// $loc = basename($_POST['loc']);
$folder = $_COOKIE['id'];

$data->select('user', 'username,profileImg,fullname,email', null, "username = '{$folder}'", null, null);

$result = $data->getResult();

if (count($result) > 0) {
    foreach ($result as $row) {
        $output = "
        <div class='userDetail userProfileImg' style='display: none;'>
            <div class='profileFile'>
                <aside>
                    <label for='file' class='cImg'>";
        $profileImg = $row['profileImg'];
        if (!empty($profileImg)) {

            $output .= "<img src='../{$folder}/profileImg/{$profileImg}' alt='User Profile' id='foo'>";
        } else {

            $output .= "<img src='../../img/icon/user.jpg' alt='User Profile' id='foo'>";
        }
        $output .= "
                        <input type='file' name='file' id='file' accept='image/*' style='display: none;'>

                    </label>
                </aside>

                <div class='accountName'>

                    <h1>{$folder}</h1>
                    <label for='file'>Change Profile Photo</label>

                </div>
            </div>

            <form method='post' class='change'>
                <div class='cName c'>
                    <aside>
                        <label>Name</label>
                    </aside>";

        $output .= "<input type='text' name='cName' id='cName' value='{$row['fullname']}'>

                    <span class='verror'><img id='error-10' src='' alt=''></span>
                </div>
                <div class='cUsername c'>
                    <aside>
                        <label>Username</label>
                    </aside>
                        <input type='text' name='cUsername' id='cUsername' value='{$row['username']}'>
                        <span class='verror'><img id='error-11' src='' alt=''></span>
                </div>
                    <input type='hidden' name='cEmail' id='cEmail' value='{$row['email']}'>
                    
                <div class='submit c'>
                    <aside>
                        <label></label>
                    </aside>
                    <input type='submit' value='Submit' name='btnCDetail' id='btnCDetail'>
                </div>
            </form>
        </div>

        <div class='password userProfileImg' style='display: none;'>
            <div class='profileFile'>
                <aside>
                    <label class='cImg'>";
        if (!empty($profileImg)) {

            $output .= "<img src='../{$folder}/profileImg/{$profileImg}' alt='User Profile' id='foo'>";
        } else {

            $output .= "<img src='../../img/icon/user.jpg' alt='User Profile' id='foo'>";
        }
        $output .= "</label>
                </aside>
                <div class='accountName'>
                    <h1>
                    {$folder}
                    </h1>
                </div>
            </div>

            <form method='post' class='change'>
                <div class='cOldPassword c'>
                    <aside>
                        <label>Old Password</label>
                    </aside>
                    <input type='password' name='cOldPassword' id='cOldPassword'>
                    <span class='verror1'><img id='error-12' src='' alt=''></span>
                </div>
                <div class='cNewPassword c'>
                    <aside>
                        <label>New Password</label>
                    </aside>
                    <input type='password' name='cNewPassword' id='cNewPassword'>
                    
                </div>
                <div class='cConfirmPassword c'>
                    <aside>
                        <label>Confirm New Password</label>
                    </aside>
                    <input type='password' name='cConfirmPassword' id='cConfirmPassword'>
                    <span class='verror1'><img id='error-13' src='' alt=''></span>
                </div>

                <div class='submit c'>
                    <aside>
                        <label></label>
                    </aside>
                    <input type='submit' value='Submit' name='btnCPass' id='btnCPass'>
                </div>
            </form>
        </div>
        ";
    }
    echo $output;
}
