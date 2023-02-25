<?php
require_once("./session.php");
require_once('../database/database.php');
$data = new Database;
$data->select('admin', 'username,profile');
$res = $data->getResult();
foreach ($res as $row) {
    $user = $row['username'];
    $profile = $row['profile'];
}
?>
<header class="topbar-nav">
    <nav class="navbar navbar-expand fixed-top">
        <ul class="navbar-nav mr-auto align-items-center">
            <li class="nav-item">
                <a class="nav-link toggle-menu" href="javascript:void();">
                    <i class="icon-menu menu-icon"></i>
                </a>
            </li>
        </ul>

        <ul class="navbar-nav align-items-center right-nav-link">
            <li class="nav-item">
                <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown" href="#">

                    <span class="user-profile">
                        <?php
                        if (!empty($profile)) {
                        ?>
                            <img src="./upload/<?= $profile ?>" class="img-circle img" alt="user avatar">
                        <?php
                        } else {
                        ?>
                            <img src="./user.jpg" class="img-circle img" alt="user avatar">
                        <?php
                        }
                        ?>
                    </span>
                </a>
                <ul class="dropdown-menu dropdown-menu-right">
                    <li class="dropdown-item user-details">
                        <a href="javaScript:void();">
                            <div class="media">
                                <div class="avatar">
                                    <?php
                                    if (!empty($profile)) {
                                    ?>
                                        <img class="align-self-start mr-3 img" src="./upload/<?= $profile ?>" alt="user avatar">
                                    <?php
                                    } else {
                                    ?>
                                        <img class="align-self-start mr-3 img" src="./user.jpg" alt="user avatar">
                                    <?php
                                    }
                                    ?>
                                </div>
                                <div class="media-body">
                                    <h6 class="mt-2 user-title">WIDESPREAD</h6>
                                    <p class="user-subtitle"><?= $user ?>
                                    </p>
                                </div>
                            </div>
                        </a>
                    </li>

                    <li class="dropdown-divider"></li>
                    <li class="dropdown-item" style="cursor: pointer;" id="logOut"><i class="icon-power mr-2"></i> Logout</li>
                </ul>
            </li>
        </ul>
    </nav>
</header>