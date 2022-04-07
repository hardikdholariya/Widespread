<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://www.cssscript.com/demo/sticky.css" rel="stylesheet" type="text/css">
    <title>story</title>
</head>

<body>
    <div class="scrollBtn">
        <button class="btn-scroll btn-1" id="btn-scroll-left" onclick="scrollHorizontally(1)"><i class="fa-solid fa-caret-left"></i></button>

        <button class="btn-scroll btn-2" id="btn-scroll-right" onclick="scrollHorizontally(-1)"><i class="fa-solid fa-caret-right"></i></button>
        <div class="horizontal-scroll">
            <div class="storys-container">
                <?php
                $id = $_COOKIE['id'];
                $data = new Database;
                $data->select('user', 'username,profileImg', null, "username='{$id}'");
                $result = $data->getResult();
                foreach ($result as $row) {
                ?>
                    <div class="story-circle">
                        <div class="story-img">
                            <label for="story" style="cursor: pointer;">
                                <?php
                                if (!empty($row['profileImg'])) {
                                ?>
                                    <img src="./users/<?php echo $row['username']; ?>/profileImg/<?php echo  $row['profileImg']; ?>" alt="">
                                    <input type="file" name="story" id="story" accept="image/*" style="display: none;">
                                <?php
                                } else { ?>
                                    <img src="./img/icon/user.jpg" alt="">

                                <?php

                                }
                                ?>
                            </label>
                        </div>
                        <div class="userName">
                            <?php echo $row['username']; ?>
                        </div>
                        <div id="addStory">
                            <svg aria-label="Plus icon" class="_8-yf5 " color="#0095f6" fill="#0095f6" height="17" role="img" viewBox="0 0 24 24" width="17">
                                <path d="M12.001.504a11.5 11.5 0 1011.5 11.5 11.513 11.513 0 00-11.5-11.5zm5 12.5h-4v4a1 1 0 01-2 0v-4h-4a1 1 0 110-2h4v-4a1 1 0 112 0v4h4a1 1 0 010 2z"></path>
                            </svg>
                        </div>
                    </div>
                <?php
                }
                ?>
                <?php
                $user_following = $id . 'following';
                $data->select($user_following, "`{$user_following}`.following,user.profileImg", "`user` ON user.username = `{$user_following}`.following");
                $result1 = $data->getResult();
                if (count($result1) > 0) {
                    foreach ($result1 as $row1) {
                        $data->select('userstroy', 'postStoryUsername', null, "postStoryUsername ='{$row1['following']}' GROUP BY `postStoryUsername`");
                        $result2 = $data->getResult();
                        if (count($result2) > 0) {
                            foreach ($result2 as $row2) {
                ?>
                                <div class="story-circle">
                                    <div class="story-img">
                                        <?php
                                        if (!empty($row1['profileImg'])) {
                                        ?>
                                            <img src="./users/<?php echo $row1['following']; ?>/profileImg/<?php echo  $row1['profileImg']; ?>" alt="">
                                        <?php
                                        } else { ?>
                                            <img src="./img/icon/user.jpg" alt="">

                                        <?php

                                        }
                                        ?>
                                    </div>
                                    <div class="userName">
                                        <?php echo $row1['following']; ?>
                                    </div>
                                </div>
                <?php
                            }
                        }
                    }
                }
                ?>
                <div class="story-circle">
                    <div class="story-img">
                        <img src="./img/login-background.png" alt="">
                    </div>
                    <div class="userName">
                        hardik
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="storyPop">
        <div class="storyClose">
            <svg aria-label="Close" class="_8-yf5 " color="#ffffff" fill="#ffffff" height="24" role="img" viewBox="0 0 24 24" width="24">
                <polyline fill="none" points="20.643 3.357 12 12 3.353 20.647" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3"></polyline>
                <line fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" x1="20.649" x2="3.354" y1="20.649" y2="3.354"></line>
            </svg>
        </div>
        <div class="preview">
            <img src="" alt="" id="storyImg">
            <input type="button" value="Add Story" id="uploadStory">
        </div>
    </div>
    <div class="storyPopUser">


        <div data-slide="slide" class="slide">
            <div class="slide-items">
                <div class="storyUserDetail">
                    <div class="userDetail">
                        <div class="userImg">
                            <img src="https://source.unsplash.com/V7IJzp_ElQc/1000x1500" alt="">
                        </div>
                        <div class="username">
                            <h4><span>@</span>_.i.m.h.a.r.d.i.k._</h4>
                        </div>

                    </div>
                    <div class="userStory">
                        <img src="https://source.unsplash.com/V7IJzp_ElQc/1000x1500" alt="Img 1">
                    </div>

                </div>
                <div class="storyUserDetail">
                    <div class="userDetail">
                        <div class="userImg">
                            <img src="https://source.unsplash.com/V7IJzp_ElQc/1000x1500" alt="">
                        </div>
                        <div class="username">
                            <h4><span>@</span>_.i.m.h.a.r.d.i.k._</h4>
                        </div>

                    </div>
                    <div class="userStory">
                        <img src="https://source.unsplash.com/V7IJzp_ElQc/1000x1500" alt="Img 1">
                    </div>

                </div>
                <div class="storyUserDetail">
                    <div class="userDetail">
                        <div class="userImg">
                            <img src="https://source.unsplash.com/V7IJzp_ElQc/1000x1500" alt="">
                        </div>
                        <div class="username">
                            <h4><span>@</span>_.i.m.h.a.r.d.i.k._</h4>
                        </div>

                    </div>
                    <div class="userStory">
                        <img src="https://source.unsplash.com/V7IJzp_ElQc/1000x1500" alt="Img 1">
                    </div>

                </div>
                <div class="storyUserDetail">
                    <div class="userDetail">
                        <div class="userImg">
                            <img src="https://source.unsplash.com/V7IJzp_ElQc/1000x1500" alt="">
                        </div>
                        <div class="username">
                            <h4><span>@</span>_.i.m.h.a.r.d.i.k._</h4>
                        </div>

                    </div>
                    <div class="userStory">
                        <img src="https://source.unsplash.com/V7IJzp_ElQc/1000x1500" alt="Img 1">
                    </div>

                </div>
                <div class="storyUserDetail">
                    <div class="userDetail">
                        <div class="userImg">
                            <img src="https://source.unsplash.com/V7IJzp_ElQc/1000x1500" alt="">
                        </div>
                        <div class="username">
                            <h4><span>@</span>_.i.m.h.a.r.d.i.k._</h4>
                        </div>

                    </div>
                    <div class="userStory">
                        <img src="https://source.unsplash.com/V7IJzp_ElQc/1000x1500" alt="Img 1">
                    </div>

                </div>
            </div>
            <nav class="slide-nav">
                <div class="slide-thumb"></div>

                <button class="slide-prev">Prev</button>
                <button class="slide-next">Next</button>
                <div class="userStoryClose" style="z-index: 20;">
                    <svg aria-label="Close" class="_8-yf5 " color="#ffffff" fill="#ffffff" height="24" role="img" viewBox="0 0 24 24" width="24">
                        <polyline fill="none" points="20.643 3.357 12 12 3.353 20.647" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3"></polyline>
                        <line fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" x1="20.649" x2="3.354" y1="20.649" y2="3.354"></line>
                    </svg>
                </div>
            </nav>
        </div>
    </div>
    <script src="./js/jquery.js"></script>
    <script>
        $(document).ready(function() {
            $(".storyPop").hide();
            $('.storyPopUser').hide();

            $("#story").change(function(e) {
                e.preventDefault();
                var src = $(this).val();
                if (src != '') {
                    $(".storyPop").show();
                    $("#storyImg").fadeIn("slow").attr('src', URL.createObjectURL(e.target.files[0]));
                }
            });
            $(".storyClose").click(function(e) {
                e.preventDefault();
                $(".storyPop").hide();
                $('.storyPopUser').hide();
                $("#storyImg").fadeIn("slow").attr('src', '');
            });
            $(".userStoryClose").click(function(e) {
                e.preventDefault();
                $('.storyPopUser').hide();
                clearInterval(scrollWindow);
            });
            const scrollWindow = setInterval(scrollbar, 100);

            function scrollbar() {
                window.scrollTo(0, 0);
            }
            $(document).on('click', '#uploadStory', function(e) {
                e.preventDefault();
                var form_data = new FormData();
                var f = document.getElementById("story").files[0];
                form_data.append("file", f);
                $.ajax({
                    url: "./uploadStory.php",
                    method: "POST",
                    data: form_data,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        $(".storyPop").hide();
                    }
                });
            });

            var storyL = $('.story-circle').length;
            if (storyL <= 6) {
                $(".btn-2").css('display', 'none');
            }

            var myInterval = setInterval(function() {
                $.ajax({
                    type: "post",
                    url: "./checkStory.php"
                });
            }, 2000);
        });
    </script>
    <script src="./js/slide-stories.js"></script>
</body>

</html>