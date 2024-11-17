<?php

//required files
require "../../require/auto/admin-auto-load.php";

//page variables
$PageName = "Image Settings";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $PageName; ?> | <?php echo APP_NAME; ?></title>
  <?php include '../../include/admin/header_files.php'; ?>
  <script type="text/javascript">
    function SidebarActive() {
      document.getElementById("configs").classList.add("active");
    }
    window.onload = SidebarActive;
  </script>
</head>

<body>
  <div id="container" class="effect mainnav-lg navbar-fixed mainnav-fixed">
    <?php include '../../include/admin/header.php'; ?>

    <div class="boxed">
      <!--CONTENT CONTAINER-->
      <!--===================================================-->
      <div id="content-container">

        <div id="page-content">
          <!--====start content===============================================-->

          <div class="panel">
            <div class="panel-body">
              <h4 class="app-heading"><?php echo $PageName; ?></h4>
              <div class="row">
                <div class="col-md-12">
                  <?php include 'common.php'; ?>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-5 col-12">
                  <h5 class="app-sub-heading">Update Logo</h5>
                  <div class="shadow-lg br10 p-2 border-success">
                    <div class="text-center br10 app-bg-light p-3">
                      <center>
                        <img src="<?php echo $MAIN_LOGO; ?>" class="w-25 mx-auto d-block rounded config-logo">
                      </center>
                      <form class="form m-t-3" action="../../controller/configcontroller.php" method="POST" enctype="multipart/form-data">
                        <input type="text" name="updatelogo" value="true" hidden="">
                        <?php echo CurrentFile(APP_LOGO); ?>
                        <?php FormPrimaryInputs(true); ?>
                        <label for="UploadAppLogo">
                          <img src="<?php echo STORAGE_URL_D; ?>/tool-img/img-upload.png" class="w-pr-10 upload-icon">
                        </label>
                        <input type="file" class="hidden" onchange="form.submit()" hidden="" name="APP_LOGO" id="UploadAppLogo" value="<?php echo APP_LOGO; ?>" accept="images/*">
                      </form>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-5 col-12">
                  <h5 class="app-sub-heading">Update Login Background</h5>
                  <div class="shadow-lg br10 p-2 border-success">
                    <div class="text-center br10 app-bg-light p-3">
                      <img src="<?php echo LOGIN_BG_IMAGE; ?>" class="w-100 br20">
                      <form class="form m-t-3" action="../../controller/configcontroller.php" method="POST" enctype="multipart/form-data">
                        <input type="text" name="Update_LOGIN_BG_IMAGE" value="true" hidden="">
                        <?php echo CurrentFile(LOGIN_BG_IMAGE); ?>
                        <?php FormPrimaryInputs(true); ?>
                        <label for="UpdateLoginBg">
                          <img src="<?php echo STORAGE_URL_D; ?>/tool-img/img-upload.png" class="w-pr-10 upload-icon">
                        </label>
                        <input type="file" class="hidden" onchange="form.submit()" hidden="" name="LOGIN_BG_IMAGE" id="UpdateLoginBg" value="<?php echo LOGIN_BG_IMAGE; ?>" accept="images/*">
                      </form>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>

          <!--End page content-->
        </div>

        <?php include '../../include/admin/sidebar.php'; ?>
      </div>
      <?php include '../../include/admin/footer.php'; ?>
    </div>

    <?php include '../../include/admin/footer_files.php'; ?>
</body>

</html>