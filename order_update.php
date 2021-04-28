<?php
 session_start();
  if(empty($_SESSION['user_id']) && $_SESSION['user_type']==''){
    header("Location:login.php");
    exit();
  }
  include("dbconnection/dbconnection.php");
  include("model/order.php");

  $order = new Orders();
  $getOrder = $order->getOrdersById($_GET['id']);

 ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Order Update</title>

        <?php
        require_once "includes/_headerLink.php";
        ?>
    </head>


    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">
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

            <!-- Start right Content here -->

            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-header-title">
                                    <h4 class="pull-left page-title">Order Update</h4>
                                    <ol class="breadcrumb pull-right">
                                        <li><a href="index.php">Dashboard</a></li>
                                        <li class="active">Order Update</li>
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
                            <div class="col-sm-12">
                                <div class="panel panel-primary">
                                    <div class="panel-heading"><h3 class="panel-title">Order Update</h3></div>
                                    <div class="panel-body">
                                        <form class="form-horizontal" action="controller/OrderController.php" method="post">
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Payment Status</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control" name="payment_status" required>
                                                        <option value="">Select Status</option>
                                                        <option <?php if($getOrder['payment_status'] == "Due") echo "selected"?> value="Due">Due</option>
                                                        <option <?php if($getOrder['payment_status'] == "Done") echo "selected"?> value="Done">Done</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Order Status</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control" name="order_status" required>
                                                        <option value="">Select Status</option>
                                                        <option <?php if($getOrder['order_status'] == "Processing") echo "selected"?> value="Processing">Processing</option>
                                                        <option <?php if($getOrder['order_status'] == "Shipped") echo "selected"?> value="Shipped">Shipped</option>
                                                        <option <?php if($getOrder['order_status'] == "Delivered") echo "Delivered"?> value="2">Delivered</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-2 control-label"></label>
                                                <div class="col-md-10">
                                                    <input type="hidden" name="action" value="update">
                                                    <input type="hidden" name="id" value="<?=$getOrder['id'] ?>">
                                                    <button type="submit" class="btn btn-success waves-effect waves-light">Update</button>
                                                    <a href="order_list.php" class="btn btn-info waves-effect waves-light">Back</a>
                                                </div>
                                            </div>

                                        </form>
                                    </div> <!-- panel-body -->
                                </div> <!-- panel -->
                            </div> <!-- col -->
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


        <?php
        require_once "includes/_footerLink.php";
        ?>

        <script>

            /*jQuery(document).ready(function(){
                $('.wysihtml5').wysihtml5();

            
            });*/
        </script>

    </body>
</html>