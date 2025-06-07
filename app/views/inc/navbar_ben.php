<?php require APPROOT . '/views/inc/header.php'; ?>

<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/benificiary/ben_dashboard.css">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.js"></script>
<body>
<!-- =============== Navigation ================ -->
<div class="container">
    <div class="navigation">
        <ul>
            <li>
                <a href="#">
                        <span class="icon">
                            <img src="<?php echo URLROOT; ?>/img/logo_white.png">
                        </span>
                    <span class="title"></span>
                </a>
            </li>

            <li>
                <a href="<?php echo URLROOT; ?>/request_bens/index">
                        <span class="icon">
                            <i class="fas fa-home"></i>
                        </span>
                    <span class="title">Dashboard</span>
                </a>
            </li>

            <li>
                <a href="<?php echo URLROOT; ?>/request_bens/requests">
                        <span class="icon">
                            <i class="fas fa-user"></i>
                        </span>
                    <span class="title">Requests</span>
                </a>
            </li>

<!-- <li>
                <a href="<?php echo URLROOT; ?>/eventreqbens/index">
                        <span class="icon">
                            <i class="fas fa-home"></i>
                        </span>
                    <span class="title">Events</span>
                </a>
            </li> -->

            <li>
                <a href="<?php echo URLROOT; ?>/stat_bens">
                        <span class="icon">
                          <i class="fas fa-file"></i>
                        </span>
                    <span class="title">Statistics</span>
                </a>
            </li>

            <li>
                <a href="<?php echo URLROOT?>/schedulereqbens/index">
                        <span class="icon">
                            <i class="fas fa-calendar"></i>
                        </span>
                    <span class="title">Calender</span>
                </a>
            </li>

            <li>
                <a href="<?php echo URLROOT ?>/SettingBens/viewProfile">
                        <span class="icon">
                            <i class="fas fa-cog"></i>
                        </span>
                    <span class="title">Settings</span>
                </a>
            </li>
            <?php if(isset($_SESSION['user_id'])) : ?>
<!--            <br>-->
<!--            <br>-->
<!--            <br>-->
<!--            <br>-->
<!--            <br>-->
<!--            <br>-->
<!--            <br>-->
                <li style="margin-top: 200px;">
                    <a href="<?php echo URLROOT;?>/users/logout" onclick="logout(event)">
                        <span class="icon">
                            <i class="fas fa-sign-out-alt"></i>
                        </span>
                        <span class="title">Logout</span>
                    </a>
                </li>
            <?php endif; ?>

        </ul>
    </div>
<script>
    function logout(ev) {
        ev.preventDefault();
        var urlToRedirect = ev.currentTarget.getAttribute('href');
        console.log(urlToRedirect);
        swal.fire({
            title: "Confirm Logout",
            text: "Are you sure you want to log out?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#395B64",
            confirmButtonText: "Logout",
            cancelButtonText: "Cancel",
        })
            .then((result) => {
                if (result.isConfirmed) {
                    window.location.href = urlToRedirect;
                }
            });
    }
</script>
    <!-- ========================= Main ==================== -->
    <div class="main">
        <div class="topbar">
            <div class="toggle">
                <i class="fas fa-bars"></i>
            </div>


             <div class="user">
                <img src="<?php echo URLROOT?>/img/profileImgs/<?php echo $_SESSION['user_image'] ?>" alt="">
                 <p><?php echo $_SESSION['user_id'] ?></p>

            </div>
        </div>


