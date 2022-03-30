<?php
require_once("./database/database.php");
$data = new Database;
?>
<?php
$receiver = $_POST['r'];
$sender = $_COOKIE['id'];

$sql = "SELECT username,text_message,curr_date,curr_time FROM message LEFT JOIN user ON user.username = message.outgoing_msg_id
WHERE incoming_msg_id='$receiver' AND outgoing_msg_id='$sender' || outgoing_msg_id='$receiver' AND incoming_msg_id='$sender' ORDER BY msg_id ASC";
$data->sql($sql);
$result = $data->getResult();
if (count($result) > 0) {
    foreach ($result as $row) {
        if ($receiver == $row['username']) {
?>
            <div class="user-1 message-user">
                <p><?= $row['text_message'] ?></p>
            </div>
        <?php

        } else { ?>
            <div class="user-2 message-user">
                <p><?= $row['text_message'] ?></p>
            </div>
    <?php
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
