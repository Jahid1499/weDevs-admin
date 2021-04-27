<?php
session_start();
include("../dbconnection/dbconnection.php");
include("../model/order.php");

$order = new Orders();
switch($_POST['action']){

    case "update":

        $order->order_status = $_POST['order_status'];
        $order->payment_status = $_POST['payment_status'];

        /*echo  $_POST['order_status'];
        exit();*/

        $update = $order->update($_POST['id']);

        if($update)
        {
            $_SESSION['message'] = "<div class='alert alert-success'>Update Order successfully!</div>";
        }
        else{
            $_SESSION['message'] = "<div class='alert alert-danger'>Unable to update!</div>";
        }
        header("Location:../order_update.php?id=".$_POST['id']);
        break;




    case "delete":

        $delete = $order->delete($_POST['id']);

        if($delete)
        {
            $_SESSION['message'] = "<div class='alert alert-success'>Delete order successfully!</div>";
        }
        else{
            $_SESSION['message'] = "<div class='alert alert-danger'>Unable to delete!</div>";
        }

        header("Location:../order_list.php");


        break;

    default:

        header("Location:../login.php");

}





?>