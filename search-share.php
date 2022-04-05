<?php
require_once('./database/database.php');
$data = new Database;
$id = $_COOKIE['id'];
$search = '%' . $_POST['search'] . '%';
$data->select('user', 'username,fullname,profileImg', null, "username LIKE '{$search}'  AND username !='{$id}'");
$result = $data->getResult();
if (count($result) > 0) {
    foreach ($result as $row) {
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
                    <input type="checkbox" name="sharePost" value="<?= $row['username'] ?>">
                    <span class="checkmark"></span>
                </label>
            </div>
        </div>
<?php
    }
}
?>