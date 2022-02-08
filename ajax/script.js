$(document).ready(function() {

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
                pass: password
            },
            success: function(data) {
                let json = $.parseJSON(data);
                let key = ['email_address', 'name', 'uname', 'pass'];
                if (json == "") {
                    console.log("is empty");
                }
                if (key[0] in json) {
                    $("#error-0").attr("src", "./img/times-circle-regular.svg");
                } else {
                    $("#error-0").attr("src", "./img/check-circle-regular.svg");
                }

                if (key[1] in json) {
                    $("#error-1").attr("src", "./img/times-circle-regular.svg");
                } else {
                    $("#error-1").attr("src", "./img/check-circle-regular.svg");
                }

                if (key[2] in json) {
                    $("#error-2").attr("src", "./img/times-circle-regular.svg");
                } else {
                    $("#error-2").attr("src", "./img/check-circle-regular.svg");
                }

                if (key[3] in json) {
                    $("#error-3").attr("src", "./img/times-circle-regular.svg");
                } else {
                    $("#error-3").attr("src", "./img/check-circle-regular.svg");
                }

            }
        });
    });

});