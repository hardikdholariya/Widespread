<?php

if (isset($_POST['email'])) {
    $email = $_POST['email'];
    // $email = "hardikdholariya05@gmail.com";

    $count = $data->count('user', '*', null, "email='{$email}'");

    if ($count > 0) {
        $otp = rand(11111, 99999); //generate otp randomly

        $send_otp = ['otp' => $otp];
        $data->update('user', $send_otp, "email = '{$email}'");

        $otp_code = "Your otp verification code is " . $otp;

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
            array_push($error, "Send OTP Your Email");
        } else {
            array_push($error, "Sorry, Mailer Error");
        }
    } else {
        array_push($error, "Wrong Email");
    }
} else {
    array_push($error, "wrong Email");
}
