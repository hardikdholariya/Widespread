<?php
require_once('../../database/database.php');
$data = new Database;
$data->select('user', "id,username,fullname,DATE_FORMAT(dob, '%M, %d %Y') as dob,profileImg,email", null, "CURDATE()=DATE(add_time)", "id DESC");
$result = $data->getResult();
if (count($result) > 0) {
    $i = 1;
?>
    <div class="col-12 col-lg-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Recent Users</h5>
                <div class="table-responsive">
                    <table class="table table-hover align-items-center table-flush table-borderless">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Username</th>
                                <th scope="col">Full Name</th>
                                <th scope="col">Date Of Birth</th>
                                <th scope="col">Profile Image</th>
                                <th scope="col">Email</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
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
                            <?php
                                $i++;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php
}

?>