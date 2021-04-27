<?php
session_start();
if(empty($_SESSION['user_id']) && $_SESSION['user_type']==''){
    header("Location:login.php");
    exit();
}
include("dbconnection/dbconnection.php");
include("model/users.php");
$user = new Users();
$getUsers = $user->getUsers();

?>

<!DOCTYPE html>
<html>
<head>

    <title>All User List</title>
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
                    <?php if(isset($_SESSION['message'])){ ?>
                        <?= $_SESSION['message']; ?>
                    <?php } ?>
                </div>


                <div class="row" style="margin: 10px;">
                    <a class="btn btn-info" style="padding: 10px;" href="addUser.php"><i class="fa fa-plus"></i> Add new User</a>
                </div>

                <div class="col-sm-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">All User</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-xs-12">
                                    <table class="table table-striped">
                                        <thead>
                                             <tr>
                                                <th>#SL</th>
                                                <th>Name</th>
                                                <th>E-Mail</th>
                                                <th>Phone</th>
                                                <th>User Type</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                             </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach($getUsers as $key=>$user): ?>
                                            <tr>
                                                <td><?= $key+1?></td>
                                                <td><?php echo $user['name']; ?></td>
                                                <td><?php echo $user['email']; ?></td>
                                                <td><?php echo $user['phone']; ?></td>
                                                <td><?php
                                                    if($user['user_type']==1){
                                                        echo "Admin";
                                                    }else{
                                                        echo "User";
                                                    }

                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    if($user['status'] == 1){
                                                        echo "Active";
                                                    }else{
                                                    echo "InActive";
                                                    }

                                                    ?>
                                                </td>
                                                <td>
                                                    <a href="updateUser.php?id=<?=$user['id'] ?>" class="btn btn-info btn-sm">UPDATE</a>

                                                    <form action="controller/UserController.php" method="post" style="display:inline-block">

                                                        <input type="hidden" name="action" value="delete" />
                                                        <input type="hidden" name="id" value="<?php echo $user['id']; ?>" />
                                                        <input class="btn btn-danger" type="submit" name="submit" value="DELETE" class="btn btn-danger btn-sm" onclick="return confirm('Are you conform to delete data')" />
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
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