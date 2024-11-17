<?php

//require modolues
require '../../../require/modules.php';

//checklogin
if (isset($_SESSION['LOGIN_USER_ID'])) {
    header("location: " . DOMAIN . "/admin/dashboard");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Login Page | <?php echo APP_NAME; ?></title>

    <?php include '../../../include/admin/header_files.php'; ?>
</head>

<body>
    <div id="container" style="background-image:url('<?php echo LOGIN_BG_IMAGE; ?>');background-size:cover;">
        <!-- LOGIN FORM -->
        <!--===================================================-->
        <div class="lock-wrapper">
            <div class="row">
                <div class="col-xs-12">
                    <div class="lock-box">
                        <div class="main mb-1-pr pb-2">
                            <center>
                                <img src="<?php echo $MAIN_LOGO; ?>" class="config-logo rounded">
                            </center>
                            <h1 class="text-center m-t-0 m-b-0"><?php echo APP_NAME; ?></h1>
                            <h3 class="m-t-0 m-b-0 text-center"><?php echo $AdminLoginPageString; ?></h3>
                            <hr class="m-b-1 m-t-1">
                            <form role="form" action="../../../controller/authcontroller.php" method="POST">
                                <?php FormPrimaryInputs(true); ?>
                                <div class="form-group">
                                    <label for="inputUsernameEmail">Email Id</label>
                                    <input type="text" name="UserEmailId" value="" required="" class="form-control" id="inputUsernameEmail">
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword">Password</label>
                                    <input type="password" name="UserPassword" required="" class="form-control" id="inputPassword">
                                    <a class="pull-right p-2" href="<?php echo DOMAIN; ?>/auth/admin/forget/">Forgot password?</a>
                                </div>
                                <button type="submit" name="LoginRequest" class="btn app-btn btn-block p-2 fs-18">
                                    <i class="fa fa-lock fs-18 text-success"></i> Secured Login
                                </button>
                            </form>
                        </div>
                        <?php include '../../../include/admin/login-footer.php'; ?>
                    </div>
                </div>

            </div>
        </div>

        <?php include '../../../include/admin/footer_files.php'; ?>

</body>

</html>