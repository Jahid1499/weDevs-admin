<?php
session_start();
?>


<!DOCTYPE html>
<html>
<head>

    <?php
    require_once "includes/_headerLink.php";
    ?>

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
                            <h4 class="pull-left page-title">Create Role</h4>
                            <ol class="breadcrumb pull-right">
                                <li><a href="index.php">weDevs</a></li>
                                <li class="active">Create Role</li>
                            </ol>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <?php if(isset($_SESSION['message_success'])){ ?>
                        <?= $_SESSION['message_success']; ?>
                    <?php }elseif (isset($_SESSION['message_warning'])){?>
                        <?= $_SESSION['message_warning']; ?>
                    <?php }
                    session_unset();
                    ?>
                </div>

                <!--Add role from-->
                <div class="row">
                    <!-- Basic example -->
                    <div class="col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading"><h3 class="panel-title">Create Role</h3></div>
                            <div class="panel-body">
                                <form action="controller/RolesController.php" method="post" role="form">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Role Name</label>
                                        <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter Role Name">
                                    </div>
                                    <input type="hidden" name="action" value="save_role">
                                    <button type="submit" class="btn btn-success waves-effect waves-light">Submit</button>
                                    <a href="roleList.php" class="btn btn-info waves-effect waves-light">Back</a>
                                </form>
                            </div><!-- panel-body -->
                        </div> <!-- panel -->
                    </div> <!-- col-->

                </div> <!-- End row -->


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
<?php
require_once "includes/_footerLink.php";
?>

</body>
</html>
