</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>widespread</title>
    <link rel="stylesheet" href="./style.css?v=<?php time(); ?>">
    <link rel="icon" type="image/x-icon" href="./logo.ico?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&family=Padauk&family=Passion+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <!-- or -->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css" crossorigin="anonymous">
</head>

<body>
    <?php
    require_once("./header.php");
    require_once("./post.php");
    ?>
    <div class="group">
    </div>

    <script src="../js/jquery.js"></script>
    <script>
        $(document).ready(function() {
            $("#unfollow_pop").hide();

            var d = $("button").attr("data-item-id");
            console.log(d);

            function peopleLoad() {
                $.ajax({
                    url: "./people-load.php",
                    type: "POST",
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