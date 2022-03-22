<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>post</title>
    <link rel="stylesheet" href="../fullPost.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../../css/emojionearea.min.css" />
</head>

<body>
    <div class="fullPost" id="fullPostLoad">
        <div class='posts'>
            <div class='header'>
                <div class='userContender'>
                    <div class='userImg'>
                        <img src='' alt=''>
                    </div>
                    <div class='AccountName'>
                        _.i.m.h.a.r.d.i.k._
                    </div>
                </div>
                <div class='more'>
                    <a href=''>...</a>
                </div>
            </div>

            <div class='middle'>
                <img src='' alt=''>
            </div>

            <div class='footer'>
                <div class='lms'>
                    <i class='bx bxs-heart'></i>
                    <i class='bx bxs-message'></i>
                    <i class='bx bxs-share bx-flip-horizontal'></i>
                </div>
                <div class='comments'>
                    <a href=''>View all comments</a>
                </div>
                <div class='comment_post'>
                    <form action='' method='post'>
                        <input type='text' name='post_com' class='post_com'>
                        <input type='submit' value='Post' class='postBtn'>
                    </form>
                </div>
            </div>

        </div>
    </div>


</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="../../js/jquery.js"></script>
<script src="../../js/emojionearea.js"></script>
<script>
    $(document).ready(function() {
        $(window).on("load", function() {
            $("#post_com").emojioneArea({
                autocomplete: false,
                inline: true
            });
        });
        $(document).on('click', '.emojionearea', function(e) {
            e.preventDefault();
            $(this).removeClass("focused");
        });
        $(document).on('dblclick', '.likePost', function(e) {
            $(".heart").show();
        });
        $(document).on('dblclick', ".heart", function() {
            $(this).toggleClass('is_animating');
        });

        /*when the animation is over, remove the class*/
        $(document).on('animationend', ".heart", function() {
            $(this).toggleClass('is_animating');
            $(this).hide();

        });
    });
</script>

<script src="../../ajax/script.js?v=<?php echo time(); ?>"></script>

</html>