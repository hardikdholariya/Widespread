$(document).ready(function() {

    // $(".contaner-2").hide();
    $(".dob").hide();
    $(".otp_verification").hide();
    $(".contaner-3").hide();
    $('.unfollow_pop').hide();

    const loc = window.location.href;

    function loadTable() {
        $.ajax({
            url: "../../users/ajax-load.php",
            type: "POST",
            data: {
                loc: loc
            },
            success: function(data) {
                $("#table-data").html(data);
            }
        });
    }
    loadTable();

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
        var username = $("#username").val();
        $.ajax({
            type: "POST",
            url: "./php_files/check_otp.php",
            data: {
                email: email,
                otp: otp,
                username: username
            },
            success: function(data) {
                // console.log(data);
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
    $(document).on('change', '#file', function(e) {

        // $('#file').change(function(e) {
        e.preventDefault();
        console.log("kd");
        var form_data = new FormData();
        var f = document.getElementById("file").files[0];
        form_data.append("file", f);
        $.ajax({
            url: "../upload.php",
            method: "POST",
            data: form_data,
            contentType: false,
            processData: false
        });
    });

    $(document).on('click', '.edit', function(e) {
        e.preventDefault();
        window.location.href = "./edit.php";
    });
    $(document).on('click', '.follow', function(e) {
        e.preventDefault();
        console.log("kd");
        var location = loc;
        var username_ff = $('.username_ff').text();
        $.ajax({
            type: "POST",
            url: "../../php_files/following.php",
            data: {
                location: location,
                username_ff: username_ff
            },
            success: function(data) {
                if (data == 'yes') {
                    loadTable();
                }
            }
        });
    });

    // on()

    $(document).on('click', '.followingBtn', function(e) {
        e.preventDefault();
        // $("#unfollow_pop").slideDown("slow");
        $("#unfollow_pop").fadeIn("slow");
        $("#unfollow_pop").show();

    });
    $(document).on('click', '#unfollow_user', function(e) {

        e.preventDefault();
        var location = loc;
        var username_ff = $('.username_ff').text();
        $.ajax({
            type: "POST",
            url: "../../php_files/unfollow.php",
            data: {
                location: location,
                username_ff: username_ff
            },
            success: function(data) {
                if (data == 'yes') {
                    loadTable();
                    console.log(data);
                }
            }
        });
    });

    $(document).on('click', '#cancel_user', function(e) {
        e.preventDefault();

        $("#unfollow_pop").hide();
    });
});