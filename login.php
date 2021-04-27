<?php
session_start();

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="Admin Dashboard" name="description" />
    <meta content="ThemeDesign" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <link rel="shortcut icon" href="assets/images/logo_sm.png">

    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="assets/css/style.css" rel="stylesheet" type="text/css">

</head>


<body>

<!-- Begin page -->
<div class="accountbg"></div>
<div class="wrapper-page">
    <div class="panel panel-color panel-primary panel-pages">

        <div>
            <?php if(isset($_SESSION['message'])){ ?>
                <?= $_SESSION['message']; ?>
            <?php }

            ?>
        </div>

        <div class="panel-body">
            <h3 class="text-center m-t-0 m-b-30">
                <span class="">weDevs</span>
            </h3>
            <h4 class="text-muted text-center m-t-0"><b>Sign In</b></h4>

            <form class="form-horizontal m-t-20" action="controller/UserController.php" method="post">

                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control" name="email" type="text" required="" placeholder="Username">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control" name="password" type="password" required="" placeholder="Password">
                    </div>
                </div>

                <input type="hidden" name="action" value="login_process">


                <div class="form-group text-center m-t-20">
                    <div class="col-xs-12">
                        <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Log In</button>
                    </div>
                </div>

                <div class="form-group m-t-30 m-b-0">
                    <div class="col-sm-7">
                        <a href="3" class="text-muted"><i class="fa fa-lock m-r-5"></i> Forgot your password?</a>
                    </div>
                    <div class="col-sm-5 text-right">
                        <a href="#" class="text-muted">Create an account</a>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>
<?php
if(isset($_SESSION['message'])) {
    session_unset();
}
?>

</body>
</html>