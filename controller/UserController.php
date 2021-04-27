<?php
session_start();
include("../dbconnection/dbconnection.php");
include("../model/users.php");
$user = new Users();

switch($_POST['action']){

   case "login_process":

   $getUser = $user->getUserByEmail($_POST['email']);

      if(count($getUser) > 0 && $getUser['email']!='')
      	 {
      	 	if($getUser['password']==md5($_POST['password']))
      	 	{
      	 	    if ($getUser['user_type']==1){
                    $_SESSION['user_id'] = $getUser['id'];
                    $_SESSION['email'] = $getUser['email'];
                    $_SESSION['name'] = $getUser['name'];
                    $_SESSION['user_type'] = $getUser['user_type'];
                    $_SESSION['status'] = $getUser['status'];

                    header("Location:../index.php");
                }else{
                    $_SESSION['message'] = "<div class='alert alert-danger'>You are not allow!!! You are Not admin</div>";
                    header("Location:../login.php");
                }

      	 	}else{
                 $_SESSION['message'] = "<div class='alert alert-danger'>Invalid Password!!</div>";
                 header("Location:../login.php");
            }
      	 }
      	 else{
             $_SESSION['message'] = "<div class='alert alert-danger'>Invalid E-Mail!!</div>";
      	 	header("Location:../login.php");
      	 }

     break;

   case "logout_process":
      session_destroy();
      header("Location:../login.php");
     break;

   case "save":

       $user->name = $_POST['name'];
       $user->email = $_POST['email'];
       $user->password = md5($_POST['password']);
       $user->phone = $_POST['phone'];
       $user->user_type = $_POST['user_type'];
       $user->status = $_POST['status'];
       $status = $user->save();
       
        if($status)
        	 {
        	 	$_SESSION['message_success'] = "<div class='alert alert-success'>Save user successfully!</div>";
        	 }
        	 else{
        	 	$_SESSION['message_warning'] = "<div class='alert alert-danger'>Unable to save!</div>";
        	 }

        	 header("Location:../addUser.php");

     break;

   case "update":
       $user->name = $_POST['name'];
       $user->email = $_POST['email'];
       $user->phone = $_POST['phone'];
       $user->user_type = $_POST['user_type'];
       $user->status = $_POST['status'];
       $status = $user->update($_POST['id']);

       if($status)
       {
           $_SESSION['message'] = "<div class='alert alert-success'>Update user successfully!</div>";
       }
       else{
           $_SESSION['message'] = "<div class='alert alert-danger'>Unable to Update!</div>";
       }
       header("Location:../userList.php");

     break;

   case "delete":
       $delete = $user->delete($_POST['id']);
       if($delete)
       {
           $_SESSION['message'] = "<div class='alert alert-success'>Delete User successfully!</div>";
       }
       else{
           $_SESSION['message'] = "<div class='alert alert-danger'>Unable to delete!</div>";
       }
       header("Location:../userList.php");

     break;

  default:
     header("Location:../login.php");


}





?>