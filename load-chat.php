<?php
require_once("./database/database.php");
$data = new Database;
?>
<?php

$receiver = $_POST['r'];
$sender = $_COOKIE['id'];

$sql = "SELECT `username`,`text_message`,`curr_date`,`curr_time`,`vi`,`link` FROM message LEFT JOIN user ON user.username = message.outgoing_msg_id
WHERE `incoming_msg_id`='$receiver' AND `outgoing_msg_id`='$sender' || `outgoing_msg_id`='$receiver' AND `incoming_msg_id`='$sender' ORDER BY `msg_id` ASC";
$data->sql($sql);
$result = $data->getResult();

if (count($result) > 0) {
    foreach ($result as $row) {
        $data->update('message', ['open' => 0], "(incoming_msg_id='{$sender}' and outgoing_msg_id='{$receiver}') and open = 1");
        $iv = hex2bin($row['vi']);
        $message = $data->str_openssl_dec($row['text_message'], $iv);

        if ($receiver == $row['username']) {
            if ($row['link'] != 0) {
?>
                <div class="user-1 message-user">
                    <p><?= $message ?></p>
                </div>
                <div class="time"><?= $row['curr_date'] . ' ' . $row['curr_time'] ?></div>
            <?php
            } else {
            ?>
                <div class="user-1 message-user">
                    <p><a href=".<?= $message ?>" class="sendpost"><img src="./img/post-black.png" alt="">Send Post...</a></p>
                </div>
                <div class="time"><?= $row['curr_date'] . ' ' . $row['curr_time'] ?></div>
            <?php
            }
        } else {
            if ($row['link'] != 0) {
            ?>

                <div class="user-2 message-user">
                    <p><?= $message ?></p>
                </div>
                <div class="time" style="text-align: right;">
                    <?= $row['curr_date'] . ' ' . $row['curr_time'] ?>
                </div>
            <?php
            } else {
            ?>
                <div class="user-2 message-user">
                    <p>
                        <a href=".<?= $message ?>" class="sendpost">
                            <img src="./img/post-white.png" alt="">
                            <span>Send Post...</span>
                        </a>
                    </p>
                </div>
                <div class="time" style="text-align: right;">
                    <?= $row['curr_date'] . ' ' . $row['curr_time'] ?>
                </div>
    <?php
            }
        }
    }
} else {
    ?>
    <div class="alert alert-info text-center" style="font-size: 20px;
    font-weight: bold; margin:40px 20px;display:flex;flex-direction:column">
        <i class="fa fa-comments d-block fs-big"></i>
        No messages yet, Start the conversation
    </div>
<?php
}
