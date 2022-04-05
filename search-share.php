<?php
require_once('./database/database.php');
$data = new Database;
$id = $_COOKIE['id'];
$search = $_POST['search'];
$data->select('user', 'username,fullname,profileImg', null, "username LIKE '%{$search}%'  AND username !='{$id}'");
$result = $data->getResult();
if (!empty($search)) {

    if (count($result) > 0) {
        foreach ($result as $row) {
            $data->select('sendcheckbox', '	checked,checkName,sendUser', null, "checked = 0 AND checkName='{$row['username']}' AND sendUser='{$id}'");
            $result1 = $data->getResult();
            if (count($result1) > 0) {
                foreach ($result1 as $row1) {
?>
                    <div class='sendPostUser'>
                        <div class='userImg'>
                            <img src='./users/<?= $row['username'] ?>/profileImg/<?= $row['profileImg'] ?>' alt='User Profile' id='foo'>
                        </div>
                        <div class='userDetail'>
                            <div class='ues'>
                                <div class='username'>
                                    <h4 style='cursor: auto;'><?= $row['username'] ?></h4><span><?= $row['fullname'] ?></span>
                                </div>
                            </div>
                            <label class='container'>
                                <input type='checkbox' class="check" name='sharePost[]' value='<?= $row['username'] ?>' checked>
                                <span class='checkmark'></span>
                            </label>
                        </div>
                    </div>
                <?php
                }
            } else {
                ?>
                <div class="sendPostUser">
                    <div class="userImg">
                        <img src="./users/<?= $row['username'] ?>/profileImg/<?= $row['profileImg'] ?>" alt="User Profile" id="foo">
                    </div>
                    <div class="userDetail">
                        <div class="ues">
                            <div class="username">
                                <h4 style="cursor: auto;"><?= $row['username'] ?></h4><span><?= $row['fullname'] ?></span>
                            </div>
                        </div>
                        <label class="container">
                            <input type="checkbox" class="check" name="sharePost[]" value="<?= $row['username'] ?>">
                            <span class="checkmark"></span>
                        </label>
                    </div>
                </div>
        <?php
            }
        }
    } else {
        ?>
        <h4 style="padding: 10px;">No Found</h4>
        <?php

    }
} else {

    $data->select('user', 'user.username,user.fullname,user.profileImg', 'sendcheckbox ON user.username = sendcheckbox.checkName', "sendcheckbox.checked=0 AND sendcheckbox.sendUser='{$id}'");
    $result6 = $data->getResult();
    if (count($result6) > 0) {
        foreach ($result6 as $row4) {
        ?>
            <div class='sendPostUser'>
                <div class='userImg'>
                    <img src='./users/<?= $row4['username'] ?>/profileImg/<?= $row4['profileImg'] ?>' alt='User Profile' id='foo'>
                </div>
                <div class='userDetail'>
                    <div class='ues'>
                        <div class='username'>
                            <h4 style='cursor: auto;'><?= $row4['username'] ?></h4><span><?= $row4['fullname'] ?></span>
                        </div>
                    </div>
                    <label class='container'>
                        <input type='checkbox' class="check" name='sharePost[]' value='<?= $row4['username'] ?>' checked>
                        <span class='checkmark'></span>
                    </label>
                </div>
            </div>
        <?php
        }
    } else {
        ?>
        <h4 style="padding: 10px;cursor:auto;">No Found</h4>
<?php

    }
}
?>


<script>
    $(document).ready(function() {
        $(".check").click(function(e) {
            var check = $(this).val();
            $.ajax({
                type: "POST",
                url: "./php_files/check.php",
                data: {
                    checked: check
                },
                success: function(data) {
                    console.log(data);
                }
            });
        });
    });
</script>