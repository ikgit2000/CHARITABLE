<?php require APPROOT . '/views/inc/header.php'; ?>

<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/donor/style.css">

<body>
<div class="container">
    <div class="navigation">
        <ul>
            <li>
                <a href="#">
                        <span class="icon">
                            <img src="<?php echo URLROOT; ?>/public/img/logo_white.png">
                        </span>
                    <span class="title"></span>
                </a>
            </li>

            <li>

                <a href="<?php echo URLROOT; ?>/dashboard_ehs/index">

                        <span class="icon">
                            <i class="fas fa-home"></i>
                        </span>
                    <span class="title">Dashboard</span>
                </a>
            </li>

            <li>
                <a href="<?php echo URLROOT; ?>/request_ehs">
                        <span class="icon">
                            <i class="fas fa-users"></i>
                        </span>
                    <span class="title">Event Requests</span>
                </a>
            </li>

            <li>
                <a href="<?php echo URLROOT; ?>/posts">
                        <span class="icon">
                            <i class="fas fa-user-check"></i>
                        </span>
                    <span class="title">Forum</span>
                </a>
            </li>

            <!-- <li>

                <a href="<?php echo URLROOT; ?>/stat_ehs/index">

                        <span class="icon">
                            <i class="fas fa-home"></i>
                        </span>
                    <span class="title">Stats</span>
                </a>
            </li>
-->
            <li>
                <a href="<?php echo URLROOT; ?>/SettingsEhs/viewProfile">
                        <span class="icon">
                            <i class="fas fa-calendar"></i>
                        </span>
                    <span class="title">Settings</span>
                </a>
            </li>

            <li>

                <a href="<?php echo URLROOT; ?>/users/logout">

                        <span class="icon">
                            <i class="fas fa-heart"></i>
                        </span>
                    <span class="title">Logout</span>
                </a>
            </li>
        </ul>
    </div>


    <!-- ========================= Main ==================== -->
    <div class="main">
        <div class="topbar">
            <div class="toggle">
                <i class="fas fa-bars"></i>
            </div>


            <div class="user">
                <img src="../public/img/img_dons/customer01.jpg" alt="">
            </div>
        </div>


        <!-- =========== Scripts =========  -->
        <script src="../public/js/donor/main.js"></script>


