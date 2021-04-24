<?php
 session_start();
/*  if(empty($_SESSION['user_id']) && $_SESSION['user_type']==''){
    header("Location:login.php");
    exit();
  }*/
  include("dbconnection/dbconnection.php");
  include("model/order.php");
  include("model/users.php");

  $order = new Orders();
  $user = new Users();
  $getOrder = $order->getOrdersById($_GET['id']);
  $getUser = $user->getUserById($getOrder['user_id']);
 ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Order Details</title>

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
                                    <h4 class="pull-left page-title">Order Details</h4>
                                    <ol class="breadcrumb pull-right">
                                        <li><a href="index.php">Dashboard</a></li>
                                        <li class="active">Order Details</li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="panel panel-primary">
                                    <div class="panel-heading"><h3 class="panel-title">Order Details</h3></div>
                                    <div class="panel-body">
                                        <form class="form-horizontal">
                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Order No.</label>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control" value="<?=$getOrder['id']?>" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-2 control-label">User Name</label>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control" value="<?=$getUser['name']?>" readonly>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-2 control-label">User Email</label>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control" value="<?=$getUser['email']?>" readonly>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Date</label>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control" value="<?=$getOrder['date']?>" readonly>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Quantity</label>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control" value="<?=$getOrder['quantity']?>" readonly>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Total amount</label>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control" value="<?=$getOrder['total']?>" readonly>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Payment Status</label>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control" value="<?php
                                                        if ($getOrder['payment_status'] == 0) {
                                                            echo "Due";
                                                        } else if ($getOrder['payment_status'] == 1) {
                                                            echo "Complete";
                                                        }
                                                        ?>
                                                    " readonly>
                                                </div>
                                            </div>



                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Order Status</label>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control" value="<?php
                                                    if ($getOrder['order_status'] == 0)
                                                    {
                                                        echo "Processing ";
                                                    }else if ($getOrder['order_status'] == 1)
                                                    {
                                                        echo "Shipped";
                                                    }else if ($getOrder['order_status'] == 2)
                                                    {
                                                        echo "Delivered";
                                                    }
                                                    ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-2 control-label"></label>
                                                <div class="col-md-10">
                                                    <a href="order_update.php?id=<?=$getOrder['id'] ?>" class="btn btn-success waves-effect waves-light">Update</a>
                                                    <!--<a href="update_order.php?id=<?/*=$order['id'] */?>" class="btn btn-success btn-sm">UPDATE</a>-->
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