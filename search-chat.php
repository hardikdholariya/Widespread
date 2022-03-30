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
        <a href="chat.php?r=<?php echo $row['username']; ?>">
            <div class="chatWithUser">
                <div class="userImg">
                    <?php
                    if (!empty($row['profileImg'])) {
                    ?>
                        <img src="./users/<?= $row['username'] ?>/profileImg/<?= $row['profileImg'] ?>" alt="">
                    <?php
                    } else {
                    ?>
                        <img src="./img/icon/user.jpg" alt="">
                    <?php
                    }
                    ?>
                </div>
                <div class="name">
                    <div class="username">
                        <h4><?= $row['username'] ?></h4>
                    </div>
                    <div class="fullName">
                        <h5>
                            <?= $row['fullname'] ?>
                        </h5>
                    </div>

                </div>
            </div>
        </a>
    <?php
    }
} else { ?>
    <div class="notFound">
        <i class='bx bxs-user-x icon'></i>
        <p>Not Found User</p>
    </div>
<?php

}
