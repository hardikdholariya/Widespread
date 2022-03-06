<?php
require_once("./database/database.php");
$data = new Database();

if ($data->session()) {
    header("location: ./");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="icon" type="image/x-icon" href="./img/ioc/logo.ico?v=<?php echo time(); ?>">
    <link rel="stylesheet" type="text/css" href="./css/themes/dark.css">
    <link rel="stylesheet" href="./css/style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./css/media.css?v=<?php echo time(); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&family=Padauk&family=Passion+One&display=swap" rel="stylesheet">
</head>

<body>
    <div class="img"></div>
    <div>
        <div class="contaner-2">
            <div class="big-circle"></div>
            <div class="small-circle"></div>

            <form action="" method="POST" autocomplete="off">
                <div class="card-2">
                    <div class="formgroup-1">
                        <p>Widespread</p>
                    </div>
                    <div class="formgroup-2 blur">
                        <input type="text" name="email" id="email" placeholder="email" autocomplete="off">
                        <span class="verror"><img id="error-0" src="" alt=""></span>
                    </div>
                    <div class="formgroup-3 blur">
                        <input type="text" name="fullname" id="fullname" placeholder="Full name" autocomplete="off">
                        <span class="verror"><img id="error-1" src="" alt=""></span>
                    </div>
                    <div class="formgroup-4 blur">
                        <input type="text" name="username" id="username" placeholder="Username" autocomplete="off">
                        <span class="verror"> <img id="error-2" src="" alt=""></span>
                    </div>
                    <div class="formgroup-5 blur">
                        <input type="password" name="password" id="password" placeholder="Password" autocomplete="off">
                        <span class="verror"><img id="error-3" src="" alt=""></span>
                    </div>

                    <div class="formgroup-6 blur">
                        <input type="submit" name="save-user" value="submit" id="save-user">
                    </div>
                    <div class="formgroup-7">
                        <hr>
                        <p>Have an account?<a href="./"><span> Log in</span></a>
                        </p>
                    </div>
                </div>
            </form>
        </div>

        <div class="dob">
            <div class="circle-dob"></div>
            <form action="" method="post" class="dobsubmit">
                <img src="./img/cake.svg" alt="">
                <div class="errordob">
                    <input type="datetime-local" placeholder="Date of Birth" name="dob" id="dob">
                    <span class="verror"><img id="error-4" src="" alt=""></span>
                </div>
                <input type="submit" name="subimtdob" id="subimtdob" value="submit">
            </form>
        </div>

        <div class="otp_verification">
            <div class="circle-otp"></div>
            <form action="" method="post" class="dobsubmit">
                <img src="./img/mail.png" alt="">
                <p id="emailError"></p>
                <div class="errordob">
                    <input type="number" placeholder="OTP" name="otp" id="otp">
                    <span class="verror"><img id="error-5" src="" alt=""></span>
                </div>
                <input type="submit" name="subimtotp" id="subimtotp" value="submit">
                <a href="" class="resend">Resend OTP</a>
            </form>

        </div>
    </div>

    <script src="./js/jquery.js"></script>
    <script src="./ajax/script.js"></script>
    <script src="./js/flatpickr.js"></script>
    <script>
        flatpickr("input[type=datetime-local]", {});
    </script>
</body>

</html>