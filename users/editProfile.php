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
            </div>
            <!-- <div class="setting">

            </div> -->
        </div>

    </div>

    <script src="../../js/jquery.js"></script>
    <script>
        $(document).ready(function() {

            function editProfile() {
                $.ajax({
                    url: "../edit-load.php",
                    type: "POST",
                    success: function(data) {
                        $(".editProfile").html(data);
                        $('.userDetail').show();

                    }
                });
            }
            editProfile();
            $(document).on('click', '.eProfile', function(e) {
                e.preventDefault();
                $('.userDetail').show();
                $('.password').hide();
                $(this).css("border-left", "2px solid");
                $(".cPassword").css("border", "");

            });
            $(document).on('click', '.cPassword', function(e) {
                e.preventDefault();
                $('.userDetail').hide();
                $('.password').show();
                $(this).css("border-left", "2px solid");
                $(".eProfile").css("border", "none");
            });
            $(document).on('click', '#btnCDetail', function(e) {
                e.preventDefault();
                var name = $('#cName').val();
                var username = $('#cUsername').val();
                var email = $('#cEmail').val();
                $.ajax({
                    type: "POST",
                    url: "../update-nue.php",
                    data: {
                        cName: name,
                        cUsername: username
                    },
                    success: function(data) {
                        let json = $.parseJSON(data);
                        if (json['cName'] == false) {
                            $("#error-10").attr('src', "../../img/false.svg");
                        } else {
                            $("#error-10").attr('src', "../../img/true.svg");
                        }
                        if (json['cUsername'] == false) {
                            $("#error-11").attr('src', "../../img/false.svg");
                        } else {
                            $("#error-11").attr('src', "../../img/true.svg");
                        }
                        if (json == '') {

                            window.location.href = "http://localhost/php/Widespread/users/" + username;
                            // editProfile();
                        }
                    }
                });
            });

            $(document).on('click', '#btnCPass', function(e) {
                e.preventDefault();
                var cOldPassword = $('#cOldPassword').val();
                var cNewPassword = $('#cNewPassword').val();
                var cConfirmPassword = $('#cConfirmPassword').val();
                var username = $('#cUsername').val();

                $.ajax({
                    type: "POST",
                    url: "../update-pass.php",
                    data: {
                        cOldPassword: cOldPassword,
                        cNewPassword: cNewPassword,
                        cConfirmPassword: cConfirmPassword
                    },
                    success: function(data) {
                        // console.log(data);
                        let json = $.parseJSON(data);
                        if (json['cOldPassword'] == false) {
                            $("#error-12").attr('src', "../../img/false.svg");
                        } else {
                            $("#error-12").attr('src', "../../img/true.svg");
                        }
                        if (json['cConfirmPassword'] == false) {
                            $("#error-13").attr('src', "../../img/false.svg");
                        } else {
                            $("#error-13").attr('src', "../../img/true.svg");
                        }
                        if (json.length == 0) {
                            // window.location.href = "http://localhost/php/Widespread/users/" + username;
                            editProfile();
                            $('.eProfile').css("border-left", "2px solid");
                            $(".cPassword").css("border", "");
                        }
                    }
                });
            });
        });
    </script>
    <script src="../../ajax/script.js?v=<?php echo time(); ?>"></script>

</body>

</html>