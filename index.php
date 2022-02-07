<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./css/style.css?v=<?php echo time(); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&family=Padauk&family=Passion+One&display=swap" rel="stylesheet">
</head>

<body>
    <div class="img"></div>
    <div class="logo">
        <img src="./img/logo.svg" alt="">
    </div>
    <div class="contaner">
        <div class="big-circle"></div>
        <div class="small-circle"></div>

        <form action="">
            <div class="card">
                <div class="formgroup">
                    <p>Widespread</p>
                </div>
                <div class="formgroup blur">
                    <input type="text" name="username" id="username" placeholder="Username" autocomplete="off">
                    <span class="verror"><img src="./img/times-circle-regular.svg" alt=""></span>
                </div>
                <div class="formgroup blur">
                    <input type="text" name="password" id="" placeholder="Password" autocomplete="off">
                    <span class="verror"><img src="./img/times-circle-regular.svg" alt=""></span>
                </div>
                <div class="formgroup blur">
                    <input type="submit" name="btnsummit" id="btnsubmit">
                </div>
                <div class="formgroup">
                    <a href="">Forget password?</a>
                    <hr>
                    <p>Don't have an account?<a href="./signup.php"><span> Sign up</span></a>
                    </p>
                </div>
            </div>
        </form>
    </div>
    <script src="./js/jquery.js"></script>
    <script src="./ajax/script.js"></script>
</body>

</html>