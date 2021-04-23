<?php ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>All User List</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="Admin Dashboard" name="description" />
    <meta content="ThemeDesign" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <link rel="shortcut icon" href="assets/images/logo_sm.png">

    <!-- DataTables -->
    <link href="assets/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/datatables/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css"/>


    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="assets/css/style.css" rel="stylesheet" type="text/css">

</head>


<body class="fixed-left">

<!-- Begin page -->
<div id="wrapper">

    <!-- Top Bar Start -->
    <div class="topbar">
        <!-- LOGO -->
        <div class="topbar-left">
            <div class="text-center">
                <a href="index.php" class="logo"><img style="width: 100%; height: 100%;" src="assets/images/logo_white_2.png" height="28"></a>
                <a href="index.php" class="logo-sm"><img style="width: 100%; height: 100%;" src="assets/images/logo_sm.png" height="36"></a>
            </div>
        </div>
        <!-- Button mobile view to collapse sidebar menu -->
        <?php
        require_once "includes/_navigation.php";
        ?>
    </div>
    <!-- Top Bar End -->


    <!-- ========== Left Sidebar Start ========== -->
    <?php
    include "includes/_leftSideBar.php";
    ?>

    <!-- Left Sidebar End -->

    <!-- Start right Content here -->

    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-header-title">
                            <h4 class="pull-left page-title">All User List</h4>
                            <ol class="breadcrumb pull-right">
                                <li><a href="index.php">Dashboard</a></li>
                                <li class="active">All User</li>
                            </ol>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6 col-lg-3">
                        <div class="panel panel-primary text-center">
                            <div class="panel-heading">
                                <h4 class="panel-title">Total Subscription</h4>
                            </div>
                            <div class="panel-body">
                                <h3 class=""><b>2568</b></h3>
                                <p class="text-muted"><b>48%</b> From Last 24 Hours</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3">
                        <div class="panel panel-primary text-center">
                            <div class="panel-heading">
                                <h4 class="panel-title">Order Status</h4>
                            </div>
                            <div class="panel-body">
                                <h3 class=""><b>3685</b></h3>
                                <p class="text-muted"><b>15%</b> Orders in Last 10 months</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3">
                        <div class="panel panel-primary text-center">
                            <div class="panel-heading">
                                <h4 class="panel-title">Unique Visitors</h4>
                            </div>
                            <div class="panel-body">
                                <h3 class=""><b>25487</b></h3>
                                <p class="text-muted"><b>65%</b> From Last 24 Hours</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3">
                        <div class="panel panel-primary text-center">
                            <div class="panel-heading">
                                <h4 class="panel-title">Monthly Earnings</h4>
                            </div>
                            <div class="panel-body">
                                <h3 class=""><b>$2779.7</b></h3>
                                <p class="text-muted"><b>31%</b> From Last 1 month</p>
                            </div>
                        </div>
                    </div>
                </div>


            </div> <!-- container -->

        </div> <!-- content -->

        <?php
        require_once "includes/_footer.php";

        ?>

    </div>
    <!-- End Right content here -->

</div>
<!-- END wrapper -->


<!-- jQuery  -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/modernizr.min.js"></script>
<script src="assets/js/jquery.slimscroll.js"></script>

<script src="assets/js/detect.js"></script>
<script src="assets/js/fastclick.js"></script>
<script src="assets/js/jquery.blockUI.js"></script>
<script src="assets/js/waves.js"></script>
<script src="assets/js/wow.min.js"></script>
<script src="assets/js/jquery.nicescroll.js"></script>
<script src="assets/js/jquery.scrollTo.min.js"></script>

<script src="assets/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>


<script src="assets/pages/dashborad.js"></script>

<script src="assets/js/app.js"></script>

</body>
</html>