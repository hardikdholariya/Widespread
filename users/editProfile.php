<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile • <?php echo $_COOKIE['id']; ?></title>
    <link rel="stylesheet" href="../edit.css?v=<?php echo time(); ?>">
    <link rel="icon" type="image/x-icon" href="../../img/ioc/logo.ico?v=<?php echo time(); ?>">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&family=Padauk&family=Passion+One&family=Syne+Mono&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <!-- or -->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
</head>

<body>
    <div class="edit_profile">
        <div class="edit_link">
            <div class="eProfile">Edit Profile</div>
            <div class="cPassword">Change Password</div>
        </div>

        <div class='changeFrom'>
            <div class='editProfile'>
                <div class='userProfileImg'>
                    <div class='profileFile'>
                        <aside>
                            <label for='file' class="cImg">
                                <img src='../../img/icon/user.jpg' alt='User Profile'>
                                <input type='file' name='file' id='file' accept='image/*' style='display: none;'>
                            </label>
                        </aside>
                        <div class='accountName'>
                            <h1>
                                <?php echo $_COOKIE['id']; ?>
                            </h1>
                            <label for='file'>Change Profile Photo</label>
                        </div>
                    </div>

                    <form method='post' class="change">
                        <div class='cName c'>
                            <aside>
                                <label>Name</label>
                            </aside>
                            <input type='text' name='cName' id='cName'>
                            <span class="verror"><img id="error-0" src="../../img/false.svg" alt=""></span>
                        </div>
                        <div class='cUsername c'>
                            <aside>
                                <label>Username</label>
                            </aside>
                            <input type='text' name='cUsername' id='cUsername'>
                            <span class="verror"><img id="error-0" src="../../img/false.svg" alt=""></span>
                        </div>
                        <div class='cEmail c'>
                            <aside>
                                <label>Email</label>
                            </aside>
                            <input type='text' name='cEmail' id='cEmail'>
                            <span class="verror"><img id="error-0" src="../../img/false.svg" alt=""></span>
                        </div>

                        <div class='submit c'>
                            <aside>
                                <label></label>
                            </aside>
                            <input type='submit' value='Submit'>
                        </div>
                    </form>
                </div>

                <div class='password userProfileImg' style="display: none;">
                    <div class='profileFile'>
                        <aside>
                            <label class="cImg">
                                <img src='../../img/icon/user.jpg' alt='User Profile'>
                            </label>
                        </aside>
                        <div class='accountName'>
                            <h1>
                                <?php echo $_COOKIE['id']; ?>
                            </h1>
                        </div>
                    </div>

                    <form method='post' class="change">
                        <div class='cOldPassword c'>
                            <aside>
                                <label>Old Password</label>
                            </aside>
                            <input type='text' name='cOldPassword' id='cOldPassword'>
                            <span class="verror1"><img id="error-0" src="../../img/false.svg" alt=""></span>
                        </div>
                        <div class='cNewPassword c'>
                            <aside>
                                <label>New Password</label>
                            </aside>
                            <input type='text' name='cNewPassword' id='cNewPassword'>
                            <span class="verror1"><img id="error-0" src="../../img/false.svg" alt=""></span>
                        </div>
                        <div class='cConfirmPassword c'>
                            <aside>
                                <label>Confirm New Password</label>
                            </aside>
                            <input type='text' name='cConfirmPassword' id='cConfirmPassword'>
                            <span class="verror1"><img id="error-0" src="../../img/false.svg" alt=""></span>
                        </div>

                        <div class='submit c'>
                            <aside>
                                <label></label>
                            </aside>
                            <input type='submit' value='Submit'>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</body>

</html>