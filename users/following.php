</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $loc; ?></title>

    <link rel="icon" type="image/x-icon" href="./logo.ico?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&family=Padauk&family=Passion+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <!-- or -->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css" crossorigin="anonymous">
    <style>
        body,
        html {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-color: #f88077;
            overflow-x: hidden;
        }

        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(#f00, #f0f);
            clip-path: circle(20% at right 70%);
        }

        body::after {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(#2196f2, #e91e63);
            clip-path: circle(20% at 10% 10%);
        }

        * {
            box-sizing: border-box;
            font-family: 'Padauk', sans-serif;
        }

        .group {
            position: relative;
            z-index: 1;
        }

        .sfy h3 {
            margin: 0 auto;
            padding: 5px;
            width: 614px;
            z-index: 3;
        }

        .suggestions {
            width: 614px;
            margin: 0 auto;
            border-radius: 20px;
            background: linear-gradient(316deg, #0059ffb8, #df00cdd9);
            box-shadow: 20px 20px 15px rgb(0 0 0 / 50%);
            backdrop-filter: blur(5px);
            margin-bottom: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            align-content: center;
            flex-direction: column;
            color: #fff;
            z-index: 2;
        }

        .suggestions .profileDetail {
            display: flex;
            flex-direction: row;
            align-content: center;
            justify-content: flex-start;
            align-items: center;
            width: 100%;
            padding: 10px;
        }

        .suggestions .profileDetail .userImg {
            width: 54px;
            height: 54px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: auto 8px;
        }

        .suggestions .profileDetail .userImg img {
            object-fit: cover;
            object-position: center;
            height: 44px;
            width: 44px;
            border-radius: 50%;
        }

        .suggestions .userDetail {
            display: flex;
            align-items: center;
            justify-content: space-between;
            align-content: center;
            width: 100%;
            flex-direction: row;
        }

        .suggestions .userDetail .ues {
            padding: 0 10px;
        }

        h4,
        h5 {
            margin: 0;
        }

        h4 {
            font-weight: 500;
        }

        h5 {
            font-weight: 100;
        }

        .suggestions .userDetail .followGroup button {
            margin: auto 10px;
            border: none;
            /* background: #00e8ffd1; */
            height: 35px;
            width: 105px;
            font-size: 16px;
            font-weight: bold;
            border-radius: 10px;
            cursor: pointer;
        }

        .follow {
            background: #00e8ffd1;
        }

        #unfollow_pop {
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            background-color: hsl(0deg 0% 24% / 30%);
            z-index: 20;
            /* width: 120%; */
        }

        #unfollow_pop #upop {
            margin: 20px auto;
            padding: 20px;
            width: 370px;
            min-height: 270px;
            max-height: 430px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-direction: column;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            border-radius: 20px;
            background: linear-gradient(316deg, hsl(219deg 100% 50%), rgb(223 0 205));
            box-shadow: 20px 20px 50px rgb(0 0 0 / 50%);
            backdrop-filter: blur(5px);
            font-family: 'Padauk', sans-serif;
            font-weight: bold;
        }

        #upop .unfollowimg {
            display: flex;
            align-items: center;
            justify-content: center;
            align-content: center;
            flex-direction: column;
        }

        #upop .unfollowimg img {
            object-fit: cover;
            object-position: center;
            height: 130px;
            width: 130px;
            border: 2px solid #fff;
            border-radius: 50%;
        }

        #upop .unfollowimg .unfollow_username {
            margin: 20px auto;
            color: #fff;
            font-weight: 100;
        }

        #upop .cu button {
            margin-left: 10px;
            border: none;
            background: #fff;
            height: 35px;
            width: 95px;
            font-size: 16px;
            font-weight: bold;
            border-radius: 10px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="group">
    </div>

    <script src="../../js/jquery.js"></script>
    <script>
        $(document).ready(function() {
            var location = window.location.href;
            var loc = location.substring(0, location.lastIndexOf("/") + 1)
            console.log(location);
            console.log(loc);
            $("#unfollow_pop").hide();

            var d = $("button").attr("data-item-id");
            // console.log(d);
            // console.log(loc);

            function peopleLoad() {
                $.ajax({
                    url: "../following-load.php",
                    type: "POST",
                    data: {
                        loc: loc
                    },
                    success: function(data) {
                        $(".group").html(data);
                    }
                });
            }
            peopleLoad();
            $(document).on('click', '.follow', function(e) {
                e.preventDefault();
                var location = loc;
                var username_ff = $(this).data('itemId');
                console.log(username_ff);
                $.ajax({
                    type: "POST",
                    url: "../php_files/following.php",
                    data: {
                        location: location,
                        username_ff: username_ff
                    },
                    success: function(data) {
                        if (data == 'yes') {
                            peopleLoad();
                        }

                    }
                });
            });

            $(document).on('click', '#unfollow_user', function(e) {
                e.preventDefault();
                var location = loc;
                var username_ff = $(".unfollow_username").text();
                console.log(username_ff);
                $.ajax({
                    type: "POST",
                    url: "../php_files/unfollow.php",
                    data: {
                        location: location,
                        username_ff: username_ff
                    },
                    success: function(data) {
                        if (data == 'yes') {
                            peopleLoad();
                            console.log(data);
                        }
                    }
                });
            });
            $(document).on('click', '.followingBtn', function(e) {
                e.preventDefault();
                $("#unfollow_pop").fadeIn("slow");
                $("#unfollow_pop").show();
                var username_ff = $(this).data('itemId');
                $(".unfollow_username").html(username_ff);
            });

            $(document).on('click', '#cancel_user', function(e) {
                e.preventDefault();
                $("#unfollow_pop").hide();
            });
        });
    </script>
</body>

</html>