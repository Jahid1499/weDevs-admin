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
  $getCategory = $category->getCategoryById($_GET['id']);
 ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Update Category</title>

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
                                    <h4 class="pull-left page-title">Category Update</h4>
                                    <ol class="breadcrumb pull-right">
                                        <li><a href="index.php">Dashboard</a></li>
                                        <li class="active">Category Update</li>
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

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="panel panel-primary">
                                    <div class="panel-heading"><h3 class="panel-title">Update Category</h3></div>
                                    <div class="panel-body">
                                    <form class="form-horizontal" action="controller/CategoryController.php" role="form" method="post">
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Name</label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" name="name" value="<?=$getCategory['name']?>" required>
                                            </div>
                                        </div>
              
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Parent</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" name="parent_id" required>
                                                <option value="0" >As Parent</option>
                                                <?php foreach($getCategories as $key=>$category): ?>
                                                    <option value="<?php echo $category['id']; ?>" <?php if($getCategory['parent_id']==$category['id']) echo "selected"; ?>><?php echo $category['name']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Status</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" name="status" required>
                                                    <option value="">Select Status</option>
                                                    <option value="1" <?php if($getCategory['status']==1) echo "selected"; ?> >Active</option>
                                                    <option value="0" <?php if($getCategory['status']==0) echo "selected"; ?>>Inactive</option>
                                                </select>
                                            </div>
                                        </div>
                                        <input type="hidden" name="action" value="update">
                                        <input type="hidden" name="id" value="<?=$getCategory['id']?>">

                                        <div class="form-group m-b-0">
                                            <div class="col-sm-offset-2 col-sm-9">
                                                <button type="submit" class="btn btn-success waves-effect waves-light">Update</button>
                                                <a href="category_list.php" class="btn btn-info waves-effect waves-light">Back</a>
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