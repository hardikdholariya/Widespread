$(document).ready(function() {
    // $(".contaner-2").hide();
    $(".dob").hide();
    $(".otp_verification").hide();
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
        var dob = $("#dob").val();
        var email = $("#email").val();
        $(this).val("Wait..");
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
});