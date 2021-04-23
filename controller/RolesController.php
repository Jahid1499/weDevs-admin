<?php
session_start();
include("../dbconnection/dbconnection.php");
include("../model/roles.php");

$role = new Roles();

switch($_POST['action']){

    case "save_role":


        $role->name = $_POST['name'];

        $save = $role->save();

        if($save)
        {
            $_SESSION['message_success'] = "<div class='alert alert-success'>Save Role successfully!</div>";
        }
        else{
            $_SESSION['message_warning'] = "<div class='alert alert-danger'>Unable to save!</div>";
        }

        header("Location:../addRole.php");

        break;

    case "update_role":

        $role->name = $_POST['name'];
        $update = $role->update($_POST['id']);

        if(!empty($_FILES['logo']['name'])){

            $brand->logo = $brand->uploadLogo($_FILES);
            $update_logo = $brand->update_logo($_POST['id']);
            @unlink("../uploads/brand/".$_POST['old_logo']);
        }

        if($update){
            $_SESSION['message_success'] = "<div class='alert alert-success'>Update brand successfully!</div>";
        }
        else{
            $_SESSION['message_warning'] = "<div class='alert alert-danger'>Unable to Update!</div>";
        }
        header("Location:../updateRole.php?id=".$_POST['id']);

        break;

    case "delete_role":
        $delete = $role->delete($_POST['id']);
        if($delete)
        {
            $_SESSION['message_success'] = "<div class='alert alert-success'>Delete Role successfully!</div>";
        }
        else{
            $_SESSION['message_warning'] = "<div class='alert alert-danger'>Unable to delete!</div>";
        }
        header("Location:../roleList.php");



        break;

    default:

        /*header("Location:../login.php");*/
        echo "some thing wrong";

}

