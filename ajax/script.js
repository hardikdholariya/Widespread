$(document).ready(function() {

    // $(".contaner-2").hide();
    $(".dob").hide();
    $(".otp_verification").hide();
    $(".contaner-3").hide();


    $("#save-user").on("click", function(e) {
        e.preventDefault();
        var email = $("#email").val();
        var full_name = $("#fullname").val();
        var username = $("#username").val();
        var password = $("#password").val();

        $.ajax({
            type: "POST",
            url: "./php_files/add-user.php",
            data: {
                email_address: email,
                name: full_name,
                uname: username,
                pass: password,
            },
            success: function(data) {
                let json = $.parseJSON(data);
                let key = ['email_address', 'name', 'uname', 'pass'];
                if (key[0] in json) {
                    $("#error-0").attr("src", "./img/false.svg");
                } else {
                    $("#error-0").attr("src", "./img/true.svg");
                }
                if (key[1] in json) {
                    $("#error-1").attr("src", "./img/false.svg");
                } else {
                    $("#error-1").attr("src", "./img/true.svg");
                }
                if (key[2] in json) {
                    $("#error-2").attr("src", "./img/false.svg");
                } else {
                    $("#error-2").attr("src", "./img/true.svg");
                }
                if (key[3] in json) {
                    $("#error-3").attr("src", "./img/false.svg");
                } else {
                    $("#error-3").attr("src", "./img/true.svg");
                }
                if (json == "") {
                    $(".contaner-2").hide();
                    $(".dob").show();
                }
            }
        });
    });

    $("#subimtdob").on("click", function(e) {
        e.preventDefault();
        $(this).val("Wait..");
        var dob = $("#dob").val();
        var email = $("#email").val();
        $.ajax({
            type: "POST",
            url: "./php_files/datevalidation.php",
            data: {
                email: email,
                dob: dob
            },
            success: function(data) {
                let jsondob = $.parseJSON(data);
                if (jsondob[0] == 1) {
                    $("#error-4").attr("src", "./img/false.svg");
                } else {
                    $("#emailError").html(jsondob[1]);
                    $("#error-4").attr("src", "./img/true.svg");
                    $(".dob").hide();
                    $(".otp_verification").show();
                }
            }
        });
    });

    // otp
    $("#subimtotp").on("click", function(e) {
        e.preventDefault();
        var otp = $("#otp").val();
        var email = $("#email").val();
        $.ajax({
            type: "POST",
            url: "./php_files/check_otp.php",
            data: {
                email: email,
                otp: otp
            },
            success: function(data) {
                if (data == "invalid") {
                    $("#error-5").attr("src", "./img/false.svg");
                } else {
                    $("#error-5").attr("src", "./img/true.svg");
                    window.location = "./login.php";
                }
            }
        });
    });

    // resend
    $(".resend").on("click", function(e) {
        e.preventDefault();
        var email = $("#email").val();
        $.ajax({
            type: "POST",
            url: "./php_files/resendOtp.php",
            data: {
                email: email,
            },
            success: function(data) {
                let jsonresend = $.parseJSON(data);
                $("#emailError").html(jsonresend[0]);
            }
        });
    });

    // email
    $(".contaner-4 .card .blur #email").on("blur", function(e) {
        e.preventDefault();
        var email = $("#email").val();
        $.ajax({
            type: "POST",
            url: "./php_files/forgotpassemail.php",
            data: {
                email: email
            },
            success: function(data) {
                console.log(data);
                let jsonemail = $.parseJSON(data);

                console.log(jsonemail);
                if (jsonemail[0] != 1) {
                    $("#error-6").attr("src", "./img/false.svg");
                } else {
                    $(".p").html(jsonemail[1]);
                    $("#error-6").attr("src", "./img/true.svg");

                }
            }
        });
    });

    $("#fbtnsubmit").on("click", function(e) {
        e.preventDefault();
        var otp = $("#fotp").val();
        var email = $("#email").val();
        $.ajax({
            type: "POST",
            url: "./php_files/check_otp.php",
            data: {
                email: email,
                otp: otp
            },
            success: function(data) {
                console.log(data);
                if (data == "invalid") {
                    $("#error-7").attr("src", "./img/false.svg");
                    if (email == "") {
                        $("#error-6").attr("src", "./img/false.svg");
                    }
                } else {
                    $("#error-7").attr("src", "./img/true.svg");
                    // $(".contaner-4").hide();
                    // $(".contaner-3").show();
                }
            }
        });
    });

    $("#fpassbtn").on("click", function(e) {
        e.preventDefault();
        var pass = $("#password").val();
        var cPass = $("#cpassword").val();
        var email = $("#email").val();
        $.ajax({
            type: "POST",
            url: "./php_files/passConfirmPass.php",
            data: {
                password: pass,
                cPassword: cPass,
                email: email
            },
            success: function(data) {
                console.log(email);
                if (data == 1) {
                    $("#error-8").attr("src", "./img/true.svg");
                    $("#error-9").attr("src", "./img/true.svg");
                    window.location = "./";
                } else {
                    $("#error-8").attr("src", "./img/false.svg");
                    $("#error-9").attr("src", "./img/false.svg");
                }
            }
        });
    });
});