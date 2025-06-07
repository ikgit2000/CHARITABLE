<link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/admin/navbar.css">

<body>
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <div class="nav">
                        <a href="#">
                            <span class="icon">
                                <img src="<?php echo URLROOT; ?>/public/img/logo_white.png">
                            </span>
                            <span class="title"></span>
                        </a>
                </li>

                <li>
                    <div class="nav">
                        <a href="<?php echo URLROOT; ?>/admin_dashs/dash_view">
                            <span class="icon">
                                <i class="fas fa-home"></i>
                            </span>
                            <span class="title">Dashboard</span>
                        </a>
                </li>

                <li>
                    <div class="nav">
                    <a href="<?php echo URLROOT; ?>/beneficiaries/registration_requests">


                        <span class="icon">
                            <i class="fas fa-users"></i>
                        </span>

                        <span class="title">  Beneficiaries
                            <i class="fas fa-caret-down"></i>
                        </span>
                        </a>
                    </div>




                </li>

                <li>
                    <div class="nav">
                        <a href="<?php echo URLROOT; ?>/donors/list_of_donors">
                            <span class="icon">
                                <i class="fas fa-user-check"></i>
                            </span>
                            <span class="title">Donors</span>
                        </a>
                    </div>
                </li>

<!--                <li>-->
<!--                    <div class="nav dropdown-btn">-->
<!---->
<!--                        <span class="icon">-->
<!--                            <i class="fas fa-users"></i>-->
<!--                        </span>-->
<!---->
<!--                        <span class="title">Event Hosters-->
<!--                            <i class="fas fa-caret-down"></i>-->
<!--                        </span>-->
<!--                    </div>-->
<!---->
<!--                    <div class="dropdown-container">-->
<!--                        <a href="--><?php //echo URLROOT; ?><!--/eventHosters/registration_requests">Registration requests</a>-->
<!--                        <a href="--><?php //echo URLROOT; ?><!--/eventHosters/list_of_eventHosters">Event Hosters' List</a>-->
<!--                    </div>-->
<!---->
<!---->
<!--                </li>-->

                <li>
                    <div class="nav">
                        <a href="<?php echo URLROOT; ?>/Donations/list_of_pending_donations">
                        <span class="icon">
                            <i class="fas fa-users"></i>
                        </span>

                        <span class="title">Donations
                            <i class="fas fa-caret-down"></i>
                        </span>
                        </a>
                    </div>




                </li>



                <li>
                    <div class="nav">
                        <a href="<?php echo URLROOT; ?>/adminReports">

                            <span class="icon">
                                <i class="fas fa-gift"></i>
                            </span>
                            <span class="title">Reports</span>
                        </a>
                </li>

                <li>
                    <div class="nav">
                        <a href="<?php echo URLROOT; ?>/settings/add_new_admin">
                            <span class="icon">
                                <i class="fas fa-signal"></i>
                            </span>
                            <span class="title">Settings</span>
                        </a>
                </li>
                <li>
                    <div class="nav">
                        <a href="<?php echo URLROOT; ?>/users/logout">
                            <span class="icon">
                                <i class="fas fa-sign-out-alt"></i>
                            </span>
                            <span class="title">Logout</span>
                        </a>
                </li>
            </ul>
        </div>
        <!-- =========== Scripts =========  -->
        <script src="<?php echo URLROOT ?>/public/js/toggle.js"></script>
        <script src="<?php echo URLROOT ?>/public/js/admin/navbar.js"></script>