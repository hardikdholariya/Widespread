<?php
require_once('../database/database.php');
$data = new Database;
$id = $_COOKIE['id'];
$search = $_POST['search'];
$data->select('user', 'username,profileImg', null, "username LIKE '%{$search}%' AND username != '{$id}'");
$result = $data->getResult();

if (!empty($search)) {
    if (count($result) > 0) {
        foreach ($result as $row) {
?>
            <a href="../../users/<?= $row['username'] ?>/">
                <div class="like">
                    <div class="userImg">

                        <?php
                        if (!empty($row['profileImg'])) {
                        ?>
                            <img src="../../users/<?= $row['username'] ?>/profileImg/<?= $row['profileImg'] ?>" alt="User Profile" id="foo">
                        <?php
                        } else { ?>
                            <img src="../../img/icon/user.jpg" alt="">
                        <?php
                        }
                        ?>

                    </div>
                    <div class="userDetail">
                        <div class="ues">
                            <div class="username">
                                <h4 style="color: #000;"><?= $row['username'] ?>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        <?php
        }
    } else {
        ?>
        <h4 style="text-align: center;padding:30%">No Found</h4>

    <?php
    }
} else {
    ?>
    <h4 style="text-align: center;padding:30%">No Found</h4>
<?php
}
?>