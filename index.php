<?php
session_start();
if(empty($_SESSION['user_id']) && $_SESSION['user_type']==''){
    header("Location:login.php");
    exit();
}
include 'dbconnection/dbconnection.php';
include 'model/users.php';
include 'model/order.php';
include 'model/product.php';
include 'model/category.php';

$user =  new Users();
$users = $user->getUsers();
$order = new Orders();
$orders = $order->getOrders();
$product = new Product();
$products = $product->getProducts();
$category = new Category();
$categories = $category->getCategories();

?>
<!DOCTYPE html>
<html>
<head>
    <title>Welcome to weDevs</title>
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
                            <h4 class="pull-left page-title">Dashboard</h4>
                            <ol class="breadcrumb pull-right">
                                <li><a href="index.php">weDevs</a></li>
                                <li class="active">Dashboard</li>
                            </ol>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6 col-lg-3">
                        <div class="panel panel-primary text-center">
                            <div class="panel-heading">
                                <h4 class="panel-title">Total User</h4>
                            </div>
                            <div class="panel-body">
                                <h3 class=""><b><?= count($users)?></b></h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3">
                        <div class="panel panel-primary text-center">
                            <div class="panel-heading">
                                <h4 class="panel-title">Total Order</h4>
                            </div>
                            <div class="panel-body">
                                <h3 class=""><b><?= count($orders)?></b></h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3">
                        <div class="panel panel-primary text-center">
                            <div class="panel-heading">
                                <h4 class="panel-title">Total Product</h4>
                            </div>
                            <div class="panel-body">
                                <h3 class=""><b><?= count($products)?></b></h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3">
                        <div class="panel panel-primary text-center">
                            <div class="panel-heading">
                                <h4 class="panel-title">Total Category</h4>
                            </div>
                            <div class="panel-body">
                                <h3 class=""><b><?= count($categories)?></b></h3>
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
<?php
    require_once "includes/_footerLink.php";
?>

</body>
</html>