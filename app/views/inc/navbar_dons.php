
    <!--<link rel="stylesheet" href="../public/css/donor/style.css">-->
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/donor/style.css">
<body onload="initMap()">
    <!-- =============== Navigation ================ -->
    <div class="container-nav">
        <div class="navigation">
            <ul>
                <br>

                <li style="pointer-events: none">
                    <a href="#">
                        <span class="">
                            <img src="../public/img/img_dons/logo.svg">
<!--                             <img src="<?php /*echo URLROOT; */?>/img/logo_white.png">
-->                        </span>
                         <span class="title"></span> 
                    </a>
                </li>
                <br>

                <li>
                <a href="<?php echo URLROOT; ?>/dashboard_dons/index">
                        <span class="icon">
                            <i class="fas fa-home"></i>
                        </span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="<?php echo URLROOT; ?>/benreqdons/index">
                        <span class="icon">
                            <i class="fas fa-user"></i>
                        </span>
                        <span class="title">Requests</span>
                    </a>
                </li>

                <li>
                <a href="<?php echo URLROOT; ?>/schedulereq_dons/index">
                        <span class="icon">
                            <i class="fas fa-calendar"></i>
                        </span>
                        <span class="title">Schedule a request</span>
                    </a>
                </li>

                <!--<li>
                    <a href="#">
                        <span class="icon">
                            <i class="fas fa-signal"></i>
                        </span>
                        <span class="title">Stats</span>
                    </a>
                </li>-->

<!--                <li>-->
<!--                    <a href="--><?php //echo URLROOT; ?><!--/posts/index">-->
<!--                        <span class="icon">-->
<!--                            <i class="fas fa-columns"></i>-->
<!--                        </span>-->
<!--                        <span class="title">Forum</span>-->
<!--                    </a>-->
<!--                </li>-->

                <li>
                    <a href="<?php echo URLROOT; ?>/SettingsDons/viewProfile">
                        <span class="icon">
                            <i class="fas fa-cog"></i>
                        </span>
                        <span class="title">Settings</span>
                    </a>
                </li>

                <li style="margin-top: 200px">
                    <a href="<?php echo URLROOT; ?>/users/logout">
                        <span class="icon">
                            <i class="fas fa-sign-out-alt"></i>
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