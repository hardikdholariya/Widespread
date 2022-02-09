<?php
require_once("../database/database.php");
$data = new Database();
$result = $data->select('user');
// $result = mysqli_query($connection, "SELECT * FROM tbl_user WHERE email='" . $email . "' ");

echo $data->num_rows;
if (isset($_POST['email'])) {
    $email = $_POST['email'];

    // $result = $data->select('user');
    // $result = mysqli_query($connection, "SELECT * FROM tbl_user WHERE email='" . $email . "' ");

    // echo $count = $data->num_rows;


    if ($count > 0) {
        $otp = rand(11111, 99999); //generate otp randomly
        $sql = "UPDATE tbl_user SET otp='$otp' WHERE email='$email'";
        mysqli_query($connection, $sql);

        $otp_code = "Your otp verification code is " . $otp;

        $_SESSION["USER_EMAIL"] = $email; //set current user email in $_SESSION[] method

        require_once('../smtp/PHPMailerAutoload.php');

        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 587;
        $mail->SMTPSecure = "tls";
        $mail->SMTPAuth = true;
        $mail->Username = "widespreadmedia2@gmail.com"; //Enter your gmail id
        $mail->Password = "ffngvpoqpdnfrwji";
        $mail->SetFrom("widespreadmedia2@gmail.com"); //Enter your gmail id
        $mail->addAddress($email); //paste user email 
        $mail->IsHTML(true);
        $mail->Subject = "OTP Verification";
        $mail->Body = ($otp_code);
        $mail->SMTPOptions = array('ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => false
        ));

        if ($mail->send()) {
            echo "send";
        } else {
            echo "Mailer Error" . $mail->ErrorInfo;
        }
    } else {
        echo "wrong_email";
    }
}
