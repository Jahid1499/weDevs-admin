<?php
 session_start();
  if(empty($_SESSION['user_id']) && $_SESSION['user_type']==''){
    header("Location:login.php");
    exit();
  }
 include("dbconnection/dbconnection.php");
 include("model/order.php");
 $order = new Orders();
$orders = $order->getOrders();

 ?>
<!DOCTYPE html>
<html>
    <head>
        <title>All Order List</title>

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
                                    <h4 class="pull-left page-title">Order List</h4>
                                    <ol class="breadcrumb pull-right">
                                        <li><a href="index.php">Dashboard</a></li>
                                        <li class="active">Order List</li>
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

                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">List of Order</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <table id="datatable" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>#SL</th>
                                                            <th>Order_id</th>
                                                            <th>Product_id</th>
                                                            <th>User_id</th>
                                                            <th>Payment Status</th>
                                                            <th>Order Status</th>
                                                            <th>Total</th>
                                                            <th>Quantity</th>
                                                            <th>Date</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach($orders as $key=>$order): ?>
                                                        <tr>
                                                            <td><?= $key + 1; ?></td>
                                                            <td><?= $order['id']; ?></td>
                                                            <td><?= $order['product_id']; ?></td>
                                                            <td><?= $order['user_id']; ?></td>
                                                            <td><?= $order['payment_status'];?></td>
                                                            <td><?= $order['order_status'];?></td>
                                                            <td><?= $order['total']; ?></td>
                                                            <td><?= $order['quantity']; ?></td>
                                                            <td><?= $order['created_at']; ?></td>
                                                            <td>
                                                                <a href="order_details.php?id=<?=$order['id'] ?>" class="btn btn-success btn-sm">Details</a>
                                                                <a href="order_update.php?id=<?=$order['id'] ?>" class="btn btn-info btn-sm">UPDATE</a>
                                                                <form action="controller/OrderController.php" method="post" style="display:inline-block">
                                                                    <input type="hidden" name="action" value="delete" />
                                                                    <input type="hidden" name="id" value="<?php echo $order['id']; ?>" />
                                                                    <input type="submit" name="submit" value="DELETE" class="btn btn-danger btn-sm" onclick="return confirm('Delete all data from this row.')" />
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

                        </div> <!-- End Row -->


                        


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
	<?php /*unset($_SESSION['message']); */?>
</html>