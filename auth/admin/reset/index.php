<?php
//require modolues
require '../../../require/modules.php';

//CHECK authorization of password requested emails or user account!
if ($_SESSION['ACCOUNT_VERIFICATION_REQUEST'] == false && $_SESSION['ACCOUNT_VERIFICATION_REQUEST_EMAIL'] == null) {
    $access_url = DOMAIN . "/auth/admin/login/";
    LOCATION("warning", "You are not authorized to access this page!", "$access_url");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Reset Password | <?php echo APP_NAME; ?></title>

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
                            <h3 class="m-t-0 m-b-0 text-center"><?php echo $AdminResetPageString; ?></h3>
                            <hr class="m-b-1 m-t-1">
                            <form role="form" action="../../../controller/authcontroller.php" method="POST">
                                <?php FormPrimaryInputs(true); ?>
                                <div class="form-group">
                                    <label>New Password <span id="msg1"></span></label>
                                    <input type="password" name="Password1" value="" required="" class="form-control" id="Pass1">
                                </div>
                                <div class="form-group">
                                    <label>Re-Enter New Password <span id="msg2"></span></label>
                                    <input type="password" name="Password2" value="" oninput="CheckPassMatch()" required="" class="form-control" id="Pass2">
                                </div>
                                <button type="submit" id="btn" name="RequestForPasswordChange" class="btn btn btn-secondary btn-block p-2 fs-18 disabled">
                                    <i class="fa fa-edit fs-18 text-success"></i> Change Password
                                </button>
                            </form>
                        </div>
                        <?php include '../../../include/admin/login-footer.php'; ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script>
        function CheckPassMatch() {
            var Pass1 = document.getElementById("Pass1").value;
            var Pass2 = document.getElementById("Pass2").value;
            if (Pass1 != Pass2) {
                document.getElementById("msg1").innerHTML = "<span class='text-danger'><i class='fa fa-warning'></i> Password Mismatch</span>";
                document.getElementById("msg2").innerHTML = "<span class='text-danger'><i class='fa fa-warning'></i> Password Mismatch</span>";
                document.getElementById("Pass1").style.borderColor = "red";
                document.getElementById("Pass2").style.borderColor = "red";
                document.getElementById("Pass1").style.backgroundColor = "rgba(255, 0, 0, 0.1)";
                document.getElementById("Pass2").style.backgroundColor = "rgba(255, 0, 0, 0.1)";
                document.getElementById("Pass1").style.color = "red";
                document.getElementById("Pass2").style.color = "red";
                document.getElementById("Pass1").style.boxShadow = "0 0 0 0.2rem rgba(255, 0, 0, 0.5)";
                document.getElementById("Pass2").style.boxShadow = "0 0 0 0.2rem rgba(255, 0, 0, 0.5)";
                document.getElementById("Pass1").style.transition = "0.5s";
                document.getElementById("Pass2").style.transition = "0.5s";
                document.getElementById("Pass1").style.borderRadius = "0.25rem";
                document.getElementById("Pass2").style.borderRadius = "0.25rem";
                document.getElementById("Pass1").style.fontSize = "1rem";
                document.getElementById("btn").classList.add("disabled");
            } else {
                document.getElementById("msg1").innerHTML = "";
                document.getElementById("msg2").innerHTML = "";
                document.getElementById("Pass1").style.borderColor = "green";
                document.getElementById("Pass2").style.borderColor = "green";
                document.getElementById("Pass1").style.backgroundColor = "rgba(0, 255, 0, 0.1)";
                document.getElementById("Pass2").style.backgroundColor = "rgba(0, 255, 0, 0.1)";
                document.getElementById("Pass1").style.color = "green";
                document.getElementById("Pass2").style.color = "green";
                document.getElementById("Pass1").style.boxShadow = "0 0 0 0.2rem rgba(0, 255, 0, 0.5)";
                document.getElementById("Pass2").style.boxShadow = "0 0 0 0.2rem rgba(0, 255, 0, 0.5)";
                document.getElementById("Pass1").style.transition = "0.5s";
                document.getElementById("Pass2").style.transition = "0.5s";
                document.getElementById("Pass1").style.borderRadius = "0.25rem";
                document.getElementById("Pass2").style.borderRadius = "0.25rem";
                document.getElementById("Pass1").style.fontSize = "1rem";
                document.getElementById("btn").classList.remove("disabled");
            }
        }
    </script>
    <?php include '../../../include/admin/footer_files.php'; ?>

</body>

</html>