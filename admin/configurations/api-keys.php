<?php

//required files
require "../../require/auto/admin-auto-load.php";

//page variables
$PageName = "API & KEYS";
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
              <h4 class="app-heading">Update API & KEYS</h4>
              <p>If you don't aware of changes & configurations then leave it to default values.</p>
              <form class="form" action="../../controller/configcontroller.php" method="POST">
                <?php FormPrimaryInputs(true); ?>
                <div class="row">
                  <div class="form-group col-md-6 col-lg-6 col-sm-6 col-12">
                    <label>Enable SMS Configurations </label>
                    <select class="form-control-2" onchange="enablesms()" id="configsms" name="CONTROL_SMS" required="">
                      <?php
                      $smsstatus = CONTROL_SMS;
                      if ($smsstatus == "true") { ?>
                        <option value="false">Disabled</option>
                        <option value="true" selected="">Enabled</option>
                      <?php } else { ?>
                        <option value="false" selected="">Disabled</option>
                        <option value="true">Enabled</option>
                      <?php  } ?>

                    </select>
                  </div>
                </div>
                <div class="row">
                  <?php if ($smsstatus == "true") {
                    $status = ""; ?>
                  <?php } else {
                    $status = "style='display:none;'";  ?>
                  <?php } ?>
                  <div id="smsconfigs" <?php echo $status; ?>>
                    <div class="form-group col-md-6 col-lg-6 col-sm-6 col-12">
                      <label>Sender ID & API Key</label>
                      <textarea style="height: 100% !important;" class="form-control-2" name="SMS_SENDER_ID" required="" rows="2"><?php echo CONFIG_FIELDS("SMS_SENDER_ID", "configurationvalue"); ?></textarea>
                      <textarea style="height: 100% !important;" class="form-control-2" name="SMS_API_KEY" required="" rows="2"><?php echo SMS_API_KEY; ?></textarea>
                    </div>
                    <div class="form-group col-md-6 col-lg-6 col-sm-6 col-12">
                      <label>Registration Templated ID & SMS Template</label>
                      <textarea style="height: 100% !important;" class="form-control-2" name="SMS_OTP_TEMP_ID_VALUE" required="" rows="2"><?php echo CONFIG_FIELDS("SMS_OTP_TEMP_ID", "configurationvalue"); ?></textarea>
                      <textarea style="height: 100% !important;" class="form-control-2" name="SMS_OTP_TEMP_ID_SUPPORTIVE_TEXT" required="" rows="2"><?php echo CONFIG_FIELDS("SMS_OTP_TEMP_ID", "configurationsupportivetext"); ?></textarea>
                    </div>
                    <div class="form-group col-md-6 col-lg-6 col-sm-6 col-12">
                      <label>Password Reset Templated ID & SMS Template</label>
                      <textarea style="height: 100% !important;" class="form-control-2" name="PASS_RESET_OTP_TEMP_VALUE" required="" rows="2"><?php echo CONFIG_FIELDS("PASS_RESET_OTP_TEMP", "configurationvalue"); ?></textarea>
                      <textarea style="height: 100% !important;" class="form-control-2" name="PASS_RESET_OTP_TEMP_SUPPORTIVE_TEXT" required="" rows="2"><?php echo CONFIG_FIELDS("PASS_RESET_OTP_TEMP", "configurationsupportivetext"); ?></textarea>
                    </div>
                  </div>
                  <div class="col-md-12 m-t-10">
                    <button type="Submit" name="UpdateApi&Keys" class="btn btn-md app-btn m-l-10">Update Details</button>
                  </div>
                </div>
              </form>
            </div>
          </div>

          <!--End page content-->
        </div>

        <?php include '../../include/admin/sidebar.php'; ?>
      </div>
      <?php include '../../include/admin/footer.php'; ?>
    </div>
    <script>
      function enablesms() {
        var configsms = document.getElementById("configsms");
        if (configsms.value == "true") {
          document.getElementById("smsconfigs").style.display = "block";
        } else {
          document.getElementById("smsconfigs").style.display = "none";
        }
      }
    </script>
    <?php include '../../include/admin/footer_files.php'; ?>
</body>

</html>