<?php
session_start();
include("../dbconnection/dbconnection.php");
include("../model/product.php");
$product = new Product();

switch($_POST['action']){

   case "save":
   
    $product->category_id = $_POST['category_id'];
    $product->name = $_POST['name'];
    $product->sku = $_POST['sku'];
    $product->price = $_POST['price'];
    $product->quantity = $_POST['quantity'];
    $product->description = $_POST['description'];
	$product->image = $_POST['image'];


	$product->status = $_POST['status'];
	$product->is_feature = $_POST['is_feature'];

	$product_id = $product->save();
	
    if($product_id) {
        $_SESSION['message'] = "<div class='alert alert-success'>Save product successfully!</div>";
    }
    else{
        $_SESSION['message'] = "<div class='alert alert-danger'>Unable to save!</div>";
    }
    header("Location:../add_product.php");

    break;

    case "update":

    $product->category_id = $_POST['category_id'];
    $product->name = $_POST['name'];
    $product->sku = $_POST['sku'];
    $product->price = $_POST['price'];
    $product->quantity = $_POST['quantity'];
    $product->description = $_POST['description'];

  
    $product->status = $_POST['status'];
    $product->is_feature = $_POST['is_feature'];
    $product->image = $_POST['image'];


    $update = $product->update($_POST['id']);

    if($update)
           {
            $_SESSION['message'] = "<div class='alert alert-success'>Update product successfully!</div>";
           }
           else{
            $_SESSION['message'] = "<div class='alert alert-danger'>Unable to update!</div>";
           }
           header("Location:../update_product.php?id=".$_POST['id']);
     break;

    case "delete":
   
     $delete = $product->delete($_POST['id']);
	 
	 if($delete)
        	 {
        	 	$_SESSION['message'] = "<div class='alert alert-success'>Delete product successfully!</div>";
        	 }
        	 else{
        	 	$_SESSION['message'] = "<div class='alert alert-danger'>Unable to delete!</div>";
        	 }

        	 header("Location:../product_list.php");
	 
    
     break;

    default:
      header("Location:../login.php");

}





?>