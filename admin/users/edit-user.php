<?php

//required files
$PageDirLevel = "../../";
require $PageDirLevel . 'require/modules.php';
require $PageDirLevel . 'require/admin/access-control.php';
require $PageDirLevel . 'require/admin/sessionvariables.php';

//page variables
$PageName = "Create Users";
if (isset($_GET['userid'])) {
  $userid = SECURE($_GET['userid'], "d");
  $_SESSION['userid'] = $userid;
} else {
  $userid = $_SESSION['userid'];
}

$PageSqls = "SELECT * FROM users where UserId='$userid'";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo GET_DATA("UserName"); ?> | <?php echo APP_NAME; ?></title>
  <?php include $PageDirLevel . 'include/admin/header_files.php'; ?>
  <script type="text/javascript">
    function SidebarActive() {
      document.getElementById("app_users").classList.add("active");
    }
    window.onload = SidebarActive;
  </script>
</head>

<body>
  <div id="container" class="effect mainnav-lg navbar-fixed mainnav-fixed">
    <?php include $PageDirLevel . 'include/admin/header.php'; ?>

    <div class="boxed">
      <!--CONTENT CONTAINER-->
      <!--===================================================-->
      <div id="content-container">
        <div id="page-content">
          <!--====start content===============================================-->

          <div class="panel">
            <div class="panel-body">
              <div class="row">
                <div class="col-md-12">
                  <h4 class="app-heading"><?php echo $PageName; ?></h4>
                </div>
              </div>

              <form action="../../controller/usercontroller.php" method="POST">
                <?php FormPrimaryInputs(true); ?>
                <div class="row p-1">
                  <div class="col-md-4 col-lg-4 col-sm-5 col-12 col-xs-12">
                    <h4 class="text-right">Full Name</h4>
                  </div>
                  <div class="col-md-5 col-lg-5 col-sm-5 col-12 col-xs-12">
                    <input type="text" name="UserName" value="<?php echo GET_DATA("UserName"); ?>" class="form-control-2" required="">
                  </div>
                </div>

                <div class="row p-1">
                  <div class="col-md-4 col-lg-4 col-sm-5 col-12 col-xs-12">
                    <h4 class="text-right">Email ID</h4>
                  </div>
                  <div class="col-md-5 col-lg-5 col-sm-5 col-12 col-xs-12">
                    <input type="email" name="UserEmailId" value="<?php echo GET_DATA("UserEmailId"); ?>" class="form-control-2" required="">
                  </div>
                </div>

                <div class="row p-1">
                  <div class="col-md-4 col-lg-4 col-sm-5 col-12 col-xs-12">
                    <h4 class="text-right">Phone Number</h4>
                  </div>
                  <div class="col-md-5 col-lg-5 col-sm-5 col-12 col-xs-12">
                    <input type="text" name="UserPhone" value="<?php echo GET_DATA("UserPhone"); ?>" class="form-control-2" required="">
                  </div>
                </div>

                <div class="row p-1">
                  <div class="col-md-4 col-lg-4 col-sm-5 col-12 col-xs-12 form-group d-block">
                    <h4 class="text-right">User Roles</h4>
                  </div>
                  <div class="col-md-5 col-lg-5 col-sm-5 col-12 col-xs-12">
                    <select name="UserRoles" class="form-control-2" required="">
                      <?php if (GET_DATA("UserRoles") == "Admin") { ?>
                        <option value="Marketing">Marketing</option>
                        <option value="Admin" selected>Admin</option>
                      <?php } elseif (GET_DATA("UserRoles") == "Marketing") { ?>
                        <option value="Marketing" selected="">Marketing</option>
                        <option value="Admin">Admin</option>
                      <?php } else { ?>
                        <option value="Marketing">Marketing</option>
                        <option value="Admin">Admin</option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="row p-1">
                  <div class="col-md-4 col-lg-4 col-sm-5 col-12 col-xs-12 form-group d-block">
                    <h4 class="text-right">User Status</h4>
                  </div>
                  <div class="col-md-5 col-lg-5 col-sm-5 col-12 col-xs-12">
                    <select name="UserStatus" class="form-control-2" required="">
                      <?php if (GET_DATA("UserStatus") == 1) { ?>
                        <option value="1" selected="">Active</option>
                        <option value="2">Inactive</option>
                      <?php } else { ?>
                        <option value="1">Active</option>
                        <option value="2" selected="">Inactive</option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="row p-1">
                  <div class="col-md-4 col-lg-4 col-sm-5 col-12 col-xs-12">
                    <h4 class="text-right">Update Password</h4>
                  </div>
                  <div class="col-md-5 col-lg-5 col-sm-5 col-12 col-xs-12">
                    <input type="text" name="UserPassword" value="<?php echo GET_DATA("UserPassword"); ?>" class="form-control-2" required="">
                  </div>
                </div>
                <div class="row p-1">
                  <div class="col-md-12 text-center">
                    <button class="btn app-btn" type="Submit" name="UpdateUsers">Update User</button>
                    <a href="index.php" class="btn btn-lg btn-info">Back to All</a>
                  </div>
                </div>
              </form>
            </div>
          </div>

          <!--End page content-->
        </div>

        <?php include $PageDirLevel . 'include/admin/sidebar.php'; ?>
      </div>
      <?php include $PageDirLevel . 'include/admin/footer.php'; ?>
    </div>

    <?php include $PageDirLevel . 'include/admin/footer_files.php'; ?>
</body>

</html>