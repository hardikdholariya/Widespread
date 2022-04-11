<?php
require_once("./session.php");
$id = $_COOKIE['id'];
$cTable = $id . 'following';
$data->select($cTable, 'id');
$result = $data->getResult();
if (count($result) == 0) {
    header("location: ./people/");
}
require_once("./header.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Widespread</title>
    <link rel="icon" type="image/x-icon" href="./img/ioc/logo.ico?v=<?php echo time(); ?>">

    <link rel="stylesheet" href="./css/main.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&family=Padauk&family=Passion+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <!-- or -->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/emojionearea.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <style>
        .black {
            color: black;
        }
    </style>
</head>

<body>

    <section>
        <?php
        require_once("./story.php");
        ?>
        <div id="posts" style='z-index: 1;'>
        </div>



        <div class="notify_pop">

        </div>

    </section>
    <?php
    include_once("./post.php");
    ?>

    <h1><a href="./logout.php"></a></h1>
    <script src="./js/jquery.js"></script>
    <script src="./js/notify.js?v=<?= time() ?>"></script>
    <script>
        $(document).ready(function() {
            $(document).on('click', '.bxs-message', function(e) {
                e.preventDefault();
                var id = $(this).data('id');
                $(".comments-" + id).toggle();
                $(this).toggleClass("black");
            });

            $(document).on('click', '.sharePostUser', function(e) {
                e.preventDefault();
                let imgId = $(this).data('imgId');
                var id = $(this).data('id');
                $("#sendPost").attr('data-img-id', imgId);
                $("#sendPost").attr('data-id', id);
                $(this).css('color', '#000');
                $(".sharePost").show();
            });

            setInterval(function() {
                $.ajax({
                    type: "POST",
                    url: "./php_files/birth_date.php",
                    success: function(data) {
                        console.log(data);
                        if (data == 1) {
                            window.location.href = "./birthday/";
                        }
                    }
                });
            }, 2000);
        });
    </script>
    <script src="./js/emojionearea.js"></script>
    <script src="./ajax/script.js?v=<?php echo time(); ?>"></script>
    <script src="./js/action.js?v=<?php echo time(); ?>"></script>
</body>

</html>