<?php
session_start();
/*if(empty($_SESSION['user_id']) && $_SESSION['user_type']==''){
    header("Location:login.php");
    exit();
}*/
include("dbconnection/dbconnection.php");
include("model/roles.php");
$role = new Roles();
$roles = $role->getRoles();
?>


<!DOCTYPE html>
<html>
<head>
    <title>Add New User</title>
    <?php
    require_once "includes/_headerLink.php";
    ?>

    <style>
    .margin
    {
         margin-bottom: 15px;
    }
    </style>

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
                            <h4 class="pull-left page-title">Create New User</h4>
                            <ol class="breadcrumb pull-right">
                                <li><a href="index.php">Dashboard</a></li>
                                <li class="active">Create User</li>
                            </ol>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <?php if(isset($_SESSION['message'])){ ?>
                        <?= $_SESSION['message']; ?>
                    <?php } ?>
                </div>

                <!--Add role from-->
                <div class="row">
                    <!-- Basic example -->
                    <div class="col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading"><h3 class="panel-title">Create User</h3></div>
                            <div class="panel-body">
                                <form action="controller/UserController.php" method="post" role="form">
                                   <div class="form-group">
                                        <label class="col-md-2 control-label">Name</label>
                                        <div class="col-md-10 margin">
                                            <input type="text" class="form-control" name="name" value="" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label" for="example-email">E-Mail</label>
                                        <div class="col-md-10 margin">
                                            <input type="email" id="example-email" name="email" class="form-control" placeholder="" value="" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Phone</label>
                                        <div class="col-md-10 margin">
                                            <input type="text" class="form-control" name="phone" value="">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Password</label>
                                        <div class="col-md-10 margin">
                                            <input type="password" class="form-control" value="" required name="password">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">User Type</label>
                                        <div class="col-sm-10 margin">
                                            <select class="form-control" name="user_type" required>
                                            <option value="">Select User-Type</option>
                                            <?php foreach($roles as $key=>$role): ?>

                                                <option value="<?= $role['id']; ?>"><?= $role['name']; ?></option>

                                            <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Status</label>
                                        <div class="col-sm-10 margin">
                                            <select class="form-control" name="status" required>
                                                <option value="">Select Status</option>
                                                <option value="1">Active</option>
                                                <option value="0">Inactive</option>

                                            </select>
                                        </div>
                                    </div>
                                    <input type="hidden" name="action" value="save">
                                    <div class="form-group m-b-0">
                                        <div class="col-sm-offset-2 col-sm-9">
                                          <button type="submit" class="btn btn-success waves-effect waves-light">Submit</button>
                                          <a href="userList.php" class="btn btn-info waves-effect waves-light">Back</a>
                                        </div>
                                    </div>

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
