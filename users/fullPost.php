<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>post</title>
    <link rel="stylesheet" href="../fullPost.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../../css/emojionearea.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
</head>

<body>
    <div class="fullPost" id="fullPostLoad">
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

        $(document).on('mouseover', '#post_com', function(e) {
            $("#post_com").emojioneArea({
                autocomplete: false,
                inline: true
            });
        });
        $(document).on('click', '.delete', function(e) {
            e.preventDefault();
            var imgId = $(this).data('imgId');
            $.ajax({
                type: "POST",
                url: "../../php_files/delete_post.php",
                data: {
                    imgId: imgId
                },
                success: function(date) {
                    window.location.href = "./";
                }

            });
        });

    });
</script>

<script src="../../ajax/script.js?v=<?php echo time(); ?>"></script>

</html>