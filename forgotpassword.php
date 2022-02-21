<?php
session_start();
require_once("./database/database.php");
$data = new Database();

if ($data->session()) {
    header("location:./");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./css/style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./css/media.css?v=<?php echo time(); ?>">

    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&family=Padauk&family=Passion+One&display=swap" rel="stylesheet">
</head>

<body>
    <div class="img"></div>
    <div class="contaner-4">
        <div class="small-circle"></div>

        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
            <div class="card">
                <div class="formgroup">
                    <img src="./img/password.png" alt="">
                </div>
                <p class="p">Enter your Email and Wait few <br> after will be send otp.</p>
                <div class="formgroup blur">
                    <input type="text" name="email" id="email" placeholder="Email">
                    <span class="verror"><img src="" id="error-6" alt=""></span>
                </div>
                <div class="formgroup blur">
                    <input type="number" name="fotp" id="fotp" placeholder="OTP" autocomplete="off">
                    <span class="verror"><img id="error-7" src="" alt=""></span>
                </div>
                <div class="formgroup blur">
                    <input type="submit" name="fbtnsummit" id="fbtnsubmit">
                </div>
                <div class="formgroup blur">
                    <hr>
                    <a href="" class="resend">Resend OTP</a>
                </div>
            </div>
        </form>
    </div>
    <div class="contaner-3">
        <div class="small-circle"></div>

        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
            <div class="card">
                <div class="formgroup">
                    <img src="./img/password.png" alt="">
                </div>
                <p class="p1">Trouble Logging In?</p>
                <div class="formgroup blur">
                    <input type="password" name="password" id="password" placeholder="Password">
                    <span class="verror"><img src="" id="error-8" alt=""></span>

                </div>
                <div class="formgroup blur">
                    <input type="password" name="cpassword" id="cpassword" placeholder="Confirm Password">
                    <span class="verror"><img src="" id="error-9" alt=""></span>

                </div>
                <div class="formgroup blur">
                    <input type="submit" name="fpassbtn" id="fpassbtn">
                </div>
            </div>
        </form>
    </div>
    <script src="./js/jquery.js"></script>
    <script src="./ajax/script.js"></script>
</body>

</html>