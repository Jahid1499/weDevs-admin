<?php
session_start();
if(empty($_SESSION['user_id']) && $_SESSION['user_type']==''){
header("Location:login.php");
exit();
}

include("dbconnection/dbconnection.php");
include("model/product.php");
$product = new Product();

$getProducts = $product->getProductWithCategory();

?>
<!DOCTYPE html>
<html>
<head>
    <title>All Product's</title>

    <?php
        require_once "includes/_headerLink.php";
    ?>

</head>


<body class="fixed-left">

<!-- Begin page -->
<div id="wrapper">

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
                <h4 class="pull-left page-title">Products</h4>
                <ol class="breadcrumb pull-right">
                    <li><a href="index.php">Dashboard</a></li>
                    <li class="active">Products List</li>
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
        <a class="btn btn-info" style="padding: 10px;" href="add_product.php"><i class="fa fa-plus"></i>Add new Product</a>
    </div>


    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">List of Product</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <table id="datatable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
									    <td>SL#</td>
                                        <th>Name</th>
                                        <th>Category</th>
                                        <th>SKU</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Image</th>
                                        <th>Is Feature</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>


                                <tbody>
                                <?php foreach($getProducts as $key=>$product): ?>
                                    <tr>
                                        <td><?php echo $key + 1; ?></td>
                                        <td><?php echo $product['name']; ?></td>
                                        <td><?php echo $product['category_name']; ?></td>
                                        <td><?php echo $product['sku']; ?></td>
                                        <td><?php echo $product['price']; ?></td>
                                        <td><?php echo $product['quantity']; ?></td>
                                        <td><img width="100" src="<?php echo $product['image']; ?>" /> </td>
                                        <td><?php echo $product['is_feature'] ? 'Yes' : 'No'; ?></td>
                                        <td><?php echo $product['status'] ? 'Active' : 'Inactive' ; ?></td>
                                        <td>
                                            <a href="update_product.php?id=<?=$product['id'] ?>" class="btn btn-info btn-sm">UPDATE</a>
                                            <form action="controller/ProductController.php" method="post" style="display:inline-block">
                                                <input type="hidden" name="action" value="delete" />
                                                <input type="hidden" name="id" value="<?php echo $product['id']; ?>" />
                                                <input type="submit" name="submit" value="DELETE" class="btn btn-danger btn-sm" onclick="return confirm('Are you confirm to Delete')" />
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

    <?php
        require_once "includes/_footerLink.php";
    ?>

</body>
</html>