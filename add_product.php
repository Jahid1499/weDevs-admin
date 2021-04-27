<?php
 session_start();
  /*if(empty($_SESSION['user_id']) && $_SESSION['user_type']==''){
    header("Location:login.php");
    exit();
  }*/
  include("dbconnection/dbconnection.php");
  include("model/category.php");

  $category = new Category();
  $getCategories = $category->getCategories();

 ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Add New Product</title>

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
                                    <h4 class="pull-left page-title">Product</h4>
                                    <ol class="breadcrumb pull-right">
                                        <li><a href="index.php">Dashboard</a></li>
                                        <li class="active">Add new Product</li>
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
                                    <div class="panel-heading"><h3 class="panel-title">Add Product</h3></div>
                                    <div class="panel-body">
                                    <form class="form-horizontal" action="controller/ProductController.php" role="form" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Name</label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" name="name" value="" required>
                                            </div>
                                        </div>
              
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Category</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" name="category_id" required>
                                                <option value="">Select Category</option>
                                                <?php foreach($getCategories as $key=>$category): ?>
                                                    <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-2 control-label">SKU</label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" name="sku" value="" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Price</label>
                                            <div class="col-md-10">
                                                <input type="number" class="form-control" name="price" value="" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Quantity</label>
                                            <div class="col-md-10">
                                                <input type="number" min="1" class="form-control" name="quantity" value="" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Description</label>
                                            <div class="col-md-10">

                                                <textarea name="description" class="wysihtml5 form-control" rows="9"></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Image url</label>
                                            <div class="col-md-10">
                                                <input type="url" name="image" required>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Is Feature</label>
                                            <div class="col-md-10">
                                                <input type="radio" name="is_feature" value="1"> Yes
                                                <input type="radio" name="is_feature" value="0"> No
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Status</label>
                                            <div class="col-sm-10">
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
                                                    <a href="product_list.php" class="btn btn-info waves-effect waves-light">Back</a>
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


        <!-- jQuery  -->
        <?php
            require_once "includes/_footerLink.php";
        ?>


    </body>
</html>