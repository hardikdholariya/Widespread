<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=".././header.css?v=<?php time() ?>">
    <link rel="icon" type="image/x-icon" href="./../../img/logo.svg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&family=Padauk&family=Passion+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <!-- or -->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css" crossorigin="anonymous">
</head>

<body>
    <div class="animation"> </div>

    <div class="img"></div>
    <div class="nva_bar">
        <header>
            <div class="logo">
                <p>Widespread</p>
            </div>
            <div class="search">
                <input type="text" name="search" id="search" placeholder="Search..">
            </div>
        </header>
        <div class="menu">
            <a href="../../" id="Widespread"><i class='bx bx-home'></i></a>

            <a href="../../message.php" id="message"><i class='bx bx-message'></i></a>

            <a href="../../notification.php" id="notification"><i class='bx bx-heart' style='color:#ffffff'></i></a>

            <a href="" class="post" id="post"><i class='bx bx-plus-medical' style='color:#ffffff'></i></a>
            <?php
            $id =  $_COOKIE['id'];
            ?>
            <a href="../<?php echo $id; ?>" id="<?php echo $id; ?>"><i class='bx bx-user' style='color:#ffffff'></i></a>
        </div>
    </div>
    <div class="empty"></div>
</body>

<?php
$loc = basename($_SERVER['REQUEST_URI'], '.php');
?>
<script src="../../js/jquery.js"></script>
<script>
    $(document).ready(function() {
        $("img").on("contextmenu", function() {
            return false;
        })
    });
</script>
<script>
    const loc = "<?= $loc ?>";
    const animation = document.querySelector(".animation");
    for (i = 0; i < 5; i++) {
        var target = document.querySelectorAll(".menu a")[i];
        // console.log(loc);
        if (target.id == loc) {
            target.className = "active_link";
            setTimeout(() => {
                $(".animation").addClass('is-active');
            }, 500);
        } else if (loc == 'index') {

        } else {
            setTimeout(() => {
                $(".animation").addClass('is-active');
            }, 500);
        }
    }
    $(document).ready(function() {

        $(".close").on('click', function(e) {
            // e.preventDefault();

            $('.post').removeClass('active_link');
            for (i = 0; i < 5; i++) {
                var target = document.querySelectorAll(".menu a")[i];
                if (target.id == loc) {
                    $(target).addClass("active_link");
                    console.log(target);
                }
            }
        });
        var target = document.querySelectorAll(".menu a");
        $(".post").on('click', function(e) {
            e.preventDefault();
            for (i = 0; i < 5; i++) {
                if (target[i].id == loc) {
                    $(target).removeClass("active_link");
                }
            }
        });
    });
</script>

</html>