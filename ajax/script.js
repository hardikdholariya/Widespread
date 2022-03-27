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
    var path = document.location.pathname;
    var directory = path.substring(path.indexOf('/'), path.lastIndexOf('/'));

    function getCookie(name) {
        var cookieArr = document.cookie.split(";");
        for (var i = 0; i < cookieArr.length; i++) {
            var cookiePair = cookieArr[i].split("=");
            if (name == cookiePair[0].trim()) {
                return decodeURIComponent(cookiePair[1]);
            }
        }
        return null;
    }

    function followingLoad() {
        $.ajax({
            url: "../../users/following-load.php",
            type: "POST",
            data: {
                loc: directory
            },
            success: function(data) {
                $("#followingLoad").html(data);
                var thi = getCookie('id');
                var l = $(".follow").length;
                for (var i = 0; i < l; i++) {
                    dk = $(".follow")[i].dataset['itemId'];
                    if (dk == thi) {
                        $('.follow')[i].hidden = true;
                    }
                }
            }
        });
    }

    function followersPLoad() {

        $.ajax({
            url: "../../users/followers-load.php",
            type: "POST",
            data: {
                loc: directory
            },
            success: function(data) {
                $("#followersPLoad").html(data);
                var thi = getCookie('id');
                var l = $(".follow").length;
                for (var i = 0; i < l; i++) {
                    dk = $(".follow")[i].dataset['itemId'];
                    if (dk == thi) {
                        $('.follow')[i].hidden = true;
                    }
                }
            }
        });
    }

    function fullPostLoad() {
        windowLocation = document.location.href;
        index = windowLocation.indexOf("=") + 1;
        directoryLocation = windowLocation.substring(index);
        $.ajax({
            url: "../../users/load-fullPost.php",
            type: "POST",
            data: {
                loc: directory,
                postImg: directoryLocation
            },
            success: function(data) {
                $("#fullPostLoad").html(data);
            }
        });
    }

    function loadPost() {
        $.ajax({
            url: "./load-postes.php",
            type: "POST",
            success: function(data) {
                $("#posts").html(data);
                // console.log($('.len').data('length'));

            }
        });
    }

    loadPost();
    fullPostLoad();
    followersPLoad();
    followingLoad();
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
        var username_ff = $(this).data('itemId');
        $.ajax({
            type: "POST",
            url: "../../php_files/following.php",
            data: {
                username_ff: username_ff
            },
            success: function(data) {
                if (data == 'yes') {
                    loadTable();
                    followingLoad();
                    followersPLoad();
                    fullPostLoad();
                }
            }
        });
    });

    // on()

    $(document).on('click', '.followingBtn', function(e) {
        e.preventDefault();
        // $("#unfollow_pop").slideDown("slow");
        var username = $(this).data('itemId');
        var src = $(this).data('src');
        $('.popImg').attr('src', src);
        $('.unfollow_username').html(username);
        $('#unfollow_user').attr('data-id', username);
        $("#unfollow_pop").fadeIn("slow");
        $("#unfollow_pop").show();

    });
    $(document).on('click', '#unfollow_user', function(e) {

        e.preventDefault();
        var username_ff = $(this).data('id');

        $.ajax({
            type: "POST",
            url: "../../php_files/unfollow.php",
            data: {
                username_ff: username_ff
            },
            success: function(data) {
                if (data == 'yes') {
                    loadTable();
                    followingLoad();
                    followersPLoad();
                    // console.log(data);
                }
            }
        });
    });
    $(document).on('click', '.username_ffp', function(e) {
        e.preventDefault();
        $userId = $(this).data('id');
        console.log($userId);
        window.location.href = '../' + $userId;
    });
    $(document).on('click', '#cancel_user', function(e) {
        e.preventDefault();
        $("#unfollow_pop").hide();
    });
    $(document).on('click', '.pImg', function(e) {
        e.preventDefault();
        var postImg = $(this).data('postimg');
        window.location.href = "./post.php?p=" + postImg;
    });
    $(document).on('click', '.emojionearea', function(e) {
        e.preventDefault();
        $(this).removeClass("focused");
    });

    $(document).on('click', '.fullPostBtn', function(e) {
        e.preventDefault();
        var postComment = $("#post_com").val();
        $.ajax({
            type: "POST",
            url: "../../php_files/post-comments.php",
            data: {
                postComment: postComment,
                loc: directory,
                postImg: directoryLocation
            },
            success: function(data) {
                // if (data == 'yes') {
                fullPostLoad();
                loadTable();
                followingLoad();
                followersPLoad();
                // }
                console.log(data);
            }
        });
    });

    $(document).on('click', '.fullPostBtn', function(e) {
        e.preventDefault();
        var postComment = $("#post_com").val();
        $.ajax({
            type: "POST",
            url: "../../php_files/post-comments.php",
            data: {
                postComment: postComment,
                loc: directory,
                postImg: directoryLocation
            },
            success: function(data) {
                // if (data == 'yes') {
                fullPostLoad();
                loadTable();
                followingLoad();
                followersPLoad();
                // }
                console.log(data);
            }
        });
    });

    $(document).on('dblclick', '.likePost', function(e) {
        $(".heart").show();
    });

    $(document).on('animationend', ".heart", function() {
        $(this).toggleClass('is_animating');
        $(".bxs-heart").addClass('animate__animated animate__rubberBand');
        $(".bxs-heart").css('color', '#000');
        $(this).hide();
        console.log(this);
        likeUsername = $(this).data('id');
        setTimeout(function() {
            $.ajax({
                type: "POST",
                url: "../../php_files/like.php",
                data: {
                    likeUsername: likeUsername,
                    postImg: directoryLocation
                },
                success: function(data) {
                    fullPostLoad();
                    loadTable();
                    followingLoad();
                    followersPLoad();
                }
            });
        }, 900);
    });
    // middle = document.querySelectorAll(".middle");

    $(document).on('dblclick', '.likePost_' + 0, function(e) {
        var d = $(this).data('id');
        // console.log(d);
        $(".heart_" + d).show();
        $(document).on('animationend', ".heart_" + d, function() {
            $(this).toggleClass('is_animating');
            $(".likeHeart_" + d).addClass('animate__animated animate__rubberBand');
            $(".likeHeart_" + d).css('color', '#000');
            $(this).hide();
            likeUsername = $(this).data('id');
            postImg = $(this).data('imgId');

            setTimeout(function() {
                $.ajax({
                    type: "POST",
                    url: "./php_files/like.php",
                    data: {
                        likeUsername: likeUsername,
                        postImg: postImg
                    },
                    success: function(data) {
                        // fullPostLoad();
                        // loadTable();
                        // followingLoad();
                        // followersPLoad();
                        loadPost();
                    }
                });
            }, 900);
        });
    });

    $(document).on('click', '.likeUIndex', function(e) {
        e.preventDefault();
        $(".bxs-heart").addClass('animate__animated animate__rubberBand');
        $(".bxs-heart").css('color', '#000');
        likeUsername = $(this).data('id');
        postImg = $(this).data('imgId');
        console.log(likeUsername);
        console.log(postImg);
        setTimeout(function() {
            $.ajax({
                type: "POST",
                url: "./php_files/like.php",
                data: {
                    likeUsername: likeUsername,
                    postImg: postImg
                },
                success: function(data) {
                    loadPost();
                }
            });
        }, 900);
    });
    $(document).on('click', '.likeUnIndex', function(e) {
        e.preventDefault();
        likeUsername = $(this).data('id');
        postImg = $(this).data('imgId');
        console.log(likeUsername);
        console.log(postImg);
        $.ajax({
            type: "POST",
            url: "./php_files/dislike.php",
            data: {
                likeUsername: likeUsername,
                postImg: postImg
            },
            success: function(data) {
                loadPost();
            }
        });
    });

    $(document).on('click', '.likeU', function(e) {
        e.preventDefault();
        $(".bxs-heart").addClass('animate__animated animate__rubberBand');
        $(".bxs-heart").css('color', '#000');
        likeUsername = $(this).data('id');
        setTimeout(function() {
            $.ajax({
                type: "POST",
                url: "../../php_files/like.php",
                data: {
                    likeUsername: likeUsername,
                    postImg: directoryLocation
                },
                success: function(data) {
                    fullPostLoad();
                    loadTable();
                    followingLoad();
                    followersPLoad();
                }
            });
        }, 900);
    });
    $(document).on('click', '.likeUn', function(e) {
        e.preventDefault();
        likeUsername = $(this).data('id');
        $.ajax({
            type: "POST",
            url: "../../php_files/dislike.php",
            data: {
                likeUsername: likeUsername,
                postImg: directoryLocation
            },
            success: function(data) {
                fullPostLoad();
                loadTable();
                followingLoad();
                followersPLoad();
            }
        });
    });

    $(document).on('click', '.moreOption', function(e) {
        e.preventDefault();
        $(".deletePost").fadeIn("slow");
        $(".deletePost").show();
    });
    $(document).on('click', '.cancel', function(e) {
        e.preventDefault();
        $(".deletePost").hide();
    });
    $(document).on('click', '.unfollowpost', function(e) {
        e.preventDefault();
        var username_ff = $(this).data('id');
        $.ajax({
            type: "POST",
            url: "../../php_files/unfollow.php",
            data: {
                username_ff: username_ff
            },
            success: function(data) {
                if (data == 'yes') {
                    fullPostLoad();
                    loadTable();
                    followingLoad();
                    followersPLoad();
                }
            }
        });
    });

    //index
    document.addEventListener('mouseover', () => {
        var len = $('.len').data('length');
        for (var i = 0; i < len; i++) {
            $(document).on('mouseover', "#post_com_" + i, function(e) {
                $(this).emojioneArea({
                    autocomplete: false,
                    inline: true
                });
            });
        }
    });
    $(document).on('click', '.emojionearea', function(e) {
        e.preventDefault();
        $(this).removeClass("focused");
    });

    $(document).on('click', '.postBtn', function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        var postComment = $("#post_com_" + id).val();
        var loc = $(this).data('username');
        var postImg = $(this).data('imgId');
        $.ajax({
            type: "POST",
            url: "./php_files/post-comments.php",
            data: {
                postComment: postComment,
                loc: loc,
                postImg: postImg
            },
            success: function(data) {
                loadPost();
            }
        });
    });

});