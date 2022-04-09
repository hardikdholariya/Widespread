<?php
require_once('../../database/database.php');
$data = new Database;
$data->select('user', "id,username,fullname,DATE_FORMAT(dob, '%M, %d %Y') as dob,profileImg,email", null, null, "id DESC");
$result = $data->getResult();
if (count($result) > 0) {
    $i = 1;
    foreach ($result as $row) {
?>
        <tr>
            <th scope="row"><?= $i ?></th>
            <td><?= $row['username'] ?></td>
            <td><?= $row['fullname'] ?></td>
            <td><?= $row['dob'] ?></td>
            <td>
                <?php
                if (!empty($row['profileImg'])) {
                ?>
                    <img src="../users/<?= $row['username'] ?>/profileImg/<?= $row['profileImg'] ?>" class="img" alt="product img">
                <?php
                } else {
                ?>
                    <img src="./user.jpg" class="img" alt="">
                <?php
                }
                ?>
            </td>
            <td><?= $row['email'] ?></td>
            <td>
                <button type="button" class="btn btn-light btn-block delete-user" data-id="<?= $row['id'] ?>">delete</button>
            </td>
        </tr>
        <?= $i++ ?>
<?php
    }
}
?>