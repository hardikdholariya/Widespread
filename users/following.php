<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>following</title>
    <link rel="stylesheet" href="../follwing-followers.css?v=<?php echo time(); ?>">
</head>

<body>
    <div class="following" id="followingLoad">
        <div class='followingY'>
            <h3>Your Following</h3>
        </div>
        <div class='followingList'>
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
        </div>
        <div id='unfollow_pop' style='display:none;'>
            <div id='upop'>
                <div class='unfollowimg'>
                    <img src='../../img/icon/user.jpg' alt='User Profile'>
                    <div class='unfollow_username'>dk_9089</div>
                </div>
                <div class='cu'>
                    <button id='unfollow_user'>Unfollow</button>
                    <button id='cancel_user'>Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            // $(document).on('click', '.followingBtn', function(e) {
            //     e.preventDefault();
            //     var username = $(this).data('itemId');
            //     var src = $(this).data('src');
            //     $('.popImg').attr('src', src);
            //     $('.unfollow_username').html(username);
            //     $('#unfollow_user').attr('data-id', username);
            // });
        });
    </script>
    <script src="../../ajax/script.js?v=<?php echo time(); ?>"></script>

</body>

</html>