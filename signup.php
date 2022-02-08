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

    <div class="contaner-2">
        <div class="big-circle"></div>
        <div class="small-circle"></div>

        <form action="" method="POST">
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
                    <input type="text" name="password" id="password" placeholder="Password" autocomplete="off">
                    <span class="verror"><img id="error-3" src="" alt=""></span>
                </div>

                <div class="formgroup-6 blur">
                    <input type="submit" name="save-user" id="save-user">
                </div>
                <div class="formgroup-7">
                    <hr>
                    <p>Have an account?<a href="./"><span> Log in</span></a>
                    </p>
                </div>
            </div>
        </form>
    </div>
    <script src="./js/jquery.js"></script>
    <script src="./ajax/script.js"></script>
</body>

</html>