<head>
    <style>
        * {
            scrollbar-width: auto;
            scrollbar-color: #5c5c5c #0b111e;
        }

        /* Chrome, Edge, and Safari */

        *::-webkit-scrollbar {
            width: 10px;
        }

        *::-webkit-scrollbar-track {
            background: #0b111e;
        }

        *::-webkit-scrollbar-thumb {
            background-color: #5c5c5c;
            border-radius: 20px;
            border: 2px solid #0b111e;
        }
    </style>
</head>
<div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
    <div class="brand-logo">
        <a href="./">
            <img src="assets/images/nav_bar-logo.png?v<?php time() ?>" class="logo-icon" alt="logo icon">
            <h5 class="logo-text">Widespread</h5>
        </a>
    </div>
    <ul class="sidebar-menu do-nicescrol">
        <li class="sidebar-header">MAIN NAVIGATION</li>
        <li>
            <a href="./">
                <i class="zmdi zmdi-view-dashboard"></i> <span>Dashboard</span>
            </a>
        </li>

        <li>
            <a href="recent.php">
                <i class="zmdi zmdi-format-list-bulleted"></i> <span>Recent User</span>
            </a>
        </li>

        <li>
            <a href="profile.php">
                <i class="zmdi zmdi-face"></i> <span>Profile</span>
            </a>
        </li>

        <li>
            <a href="forms.php">
                <i class="zmdi zmdi-grid"></i> <span>Change Password</span>
            </a>
        </li>

    </ul>

</div>