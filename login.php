<?php
require_once("./database/database.php");
$data = new Database();

if ($data->session()) {
    header("location: ./");
}

$loginError = '';
$data = new Database();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_REQUEST['username'];
    $password = md5($_REQUEST['password']);

    $login = $data->login($username, $password);
    if ($login) {
        header("location:./");
    } else {
        $loginError = "<p id='errorLogin'>please Your check Username and password.</p>";
    }
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
    <link rel="icon" type="image/x-icon" href="./img/ioc/logo.ico?v=<?php echo time(); ?>">

    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&family=Padauk&family=Passion+One&display=swap" rel="stylesheet">
</head>

<body>
    <div class="img"></div>
    <div class="logo">
        <img src="./img/logo.svg" alt="">
    </div>
    <div class="contaner">
        <div class="big-circle"></div>
        <div class="big-circle-2"></div>
        <div class="small-circle"></div>

        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
            <div class="card">
                <div class="formgroup">
                    <p>Widespread</p>
                </div>
                <div class="formgroup blur">
                    <input type="text" name="username" id="username" placeholder="Username">
                </div>
                <div class="formgroup blur">
                    <input type="password" name="password" id="password" placeholder="Password">
                </div>
                <div class="formgroup blur">
                    <input type="submit" name="btnsummit" id="btnsubmit" value="submit">
                </div>
                <?php
                echo $loginError;
                ?>

                <div class="formgroup">
                    <a href="./forgotpassword.php">Forgot password?</a>
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