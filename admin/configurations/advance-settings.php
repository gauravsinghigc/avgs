<?php

//required files
require "../../require/auto/admin-auto-load.php";

//page variables
$PageName = "Advance Settings";
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
                <div class="col-md-4 col-lg-4 col-sm-6 col-12">
                  <div class="shadow-lg br10 p-2">
                    <h4 class="app-sub-heading">Mailing Configurations</h4>
                    <form class="form row" action="../../controller/configcontroller.php" method="POST">
                      <?php FormPrimaryInputs(true); ?>
                      <div class="form-group form-group-2 col-md-12">
                        <label>Mail Function</label>
                        <select name="CONTROL_MAILS" onchange="enablemails()" id="mailingstatus" class="form-control-2" required="">
                          <?php
                          $mailstatus = CONTROL_MAILS;
                          if ($mailstatus == "true") { ?>
                            <option value="false">Disabled</option>
                            <option value="true" selected="">Enabled</option>
                          <?php } else { ?>
                            <option value="false" selected="">Disabled</option>
                            <option value="true">Enabled</option>
                          <?php  } ?>

                        </select>
                      </div>
                      <?php if ($mailstatus == "true") {
                        $mailstatus = ""; ?>
                      <?php } else {
                        $mailstatus = "style='display:none;'";  ?>
                      <?php } ?>
                      <div id="showemailoptions" <?php echo $mailstatus; ?>>
                        <div class="form-group form-group-2 col-md-12">
                          <label for="SENDER_MAIL_ID">Sender Mail-ID</label>
                          <input type="email" name="SENDER_MAIL_ID" value="<?php echo SENDER_MAIL_ID; ?>" class="form-control-2">
                        </div>
                        <div class="form-group form-group-2 col-md-12">
                          <label for="SENDER_MAIL_ID">Receiver Mail-ID</label>
                          <input type="email" name="RECEIVER_MAIL" value="<?php echo RECEIVER_MAIL; ?>" class="form-control-2">
                        </div>
                        <div class="form-group form-group-2 col-md-12">
                          <label for="SENDER_MAIL_ID">Customer Support Mail-ID</label>
                          <input type="email" name="SUPPORT_MAIL" value="<?php echo SUPPORT_MAIL; ?>" class="form-control-2">
                        </div>
                        <div class="form-group form-group-2 col-md-12">
                          <label for="SENDER_MAIL_ID">Enquiry Mail-ID</label>
                          <input type="email" name="ENQUIRY_MAIL" value="<?php echo ENQUIRY_MAIL; ?>" class="form-control-2">
                        </div>
                        <div class="form-group form-group-2 col-md-12">
                          <label for="SENDER_MAIL_ID">Admin Mail-ID</label>
                          <input type="email" name="ADMIN_MAIL" value="<?php echo ADMIN_MAIL; ?>" class="form-control-2">
                        </div>
                      </div>
                      <div class="col-md-12 m-t-10">
                        <button type="Submit" name="UpdateMailConfigs" class="btn btn-md app-btn">Update Details</button>
                      </div>
                    </form>
                  </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                  <div class="shadow-lg br10 p-2">
                    <h4 class="app-sub-heading">Payment Gateway Setup</h4>
                    <form class="form row" action="../../controller/configcontroller.php" method="POST">
                      <?php FormPrimaryInputs(true); ?>
                      <div class="form-group form-group-2 col-md-12">
                        <label>Online Payment Gateway</label>
                        <select name="ONLINE_PAYMENT_OPTION" onchange="enablepaymentgateway()" id="pgstatus" class="form-control-2" required="">
                          <?php
                          $pgstatus = ONLINE_PAYMENT_OPTION;
                          if ($pgstatus == "true") { ?>
                            <option value="false">Disabled</option>
                            <option value="true" selected="">Enabled</option>
                          <?php } else { ?>
                            <option value="false" selected="">Disabled</option>
                            <option value="true">Enabled</option>
                          <?php  } ?>

                        </select>
                      </div>
                      <?php if ($pgstatus == "true") {
                        $pgstatus = ""; ?>
                      <?php } else {
                        $pgstatus = "style='display:none;'";  ?>
                      <?php } ?>
                      <div id="pgoptions" <?php echo $pgstatus; ?>>
                        <div class="form-group form-group-2 col-md-12">
                          <label>Select Payment Gateway Provider</label>
                          <select name="PG_PROVIDER" class="form-control-2" required="">
                            <?php foreach (PG_OPTIONS as $pgoptions) { ?>
                              <option value="<?php echo $pgoptions; ?>"><?php echo $pgoptions; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                        <div class="form-group form-group-2 col-md-12">
                          <label for="PG_MODE">PG Mode <small><i class="fa fa-angle-right"></i> eg: prod, test, dev, live</small></label>
                          <input type="text" name="PG_MODE" value="<?php echo PG_MODE; ?>" class="form-control-2 text-uppercase">
                        </div>
                        <div class="form-group form-group-2 col-md-12">
                          <label for="MERCHENT_ID">Merchant ID</label>
                          <input type="text" name="MERCHENT_ID" value="<?php echo MERCHENT_ID; ?>" class="form-control-2">
                        </div>
                        <div class="form-group form-group-2 col-md-12">
                          <label for="MERCHANT_KEY">Merchant Key</label>
                          <input type="text" name="MERCHANT_KEY" value="<?php echo MERCHANT_KEY; ?>" class="form-control-2">
                        </div>
                      </div>
                      <div class="col-md-12 m-t-10">
                        <button type="Submit" name="UpdatePgDetails" class="btn btn-md app-btn">Update Details</button>
                      </div>
                    </form>
                  </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                  <div class="shadow-lg br10 p-2">
                    <h4 class="app-sub-heading">Enable & Disable features</h4>
                    <form class="form row" action="../../controller/configcontroller.php" method="POST">
                      <?php FormPrimaryInputs(true); ?>
                      <div class="form-group form-group-2 col-md-12">
                        <label>Work Environment</label>
                        <?php if (CONTROL_WORK_ENV == "PROD") { ?>
                          <div class="flex-s-b">
                            <span>
                              <input type="radio" name="CONTROL_WORK_ENV" Value="PROD" checked=""> <span class="fs-17">Production</span>
                            </span>
                            <span>
                              <input type="radio" name="CONTROL_WORK_ENV" Value="DEV"> <span class="fs-17">Development</span>
                            </span>
                          </div>
                        <?php } else { ?>
                          <div class="flex-s-b">
                            <span>
                              <input type="radio" name="CONTROL_WORK_ENV" Value="PROD"> <span class="fs-17">Production</span>
                            </span>
                            <span>
                              <input type="radio" name="CONTROL_WORK_ENV" Value="DEV" checked=""> <span class="fs-17">Development</span>
                            </span>
                          </div>
                        <?php } ?>
                      </div>
                      <div class="form-group form-group-2 col-md-12">
                        <label>Desktop Notifications</label>
                        <?php if (CONTROL_NOTIFICATION == "true") { ?>
                          <div class="flex-s-b">
                            <span>
                              <input type="radio" name="CONTROL_NOTIFICATION" Value="true" checked=""> <span class="fs-17">Enable</span>
                            </span>
                            <span>
                              <input type="radio" name="CONTROL_NOTIFICATION" Value="false"> <span class="fs-17">Disabled</span>
                            </span>
                          </div>
                        <?php } else { ?>
                          <div class="flex-s-b">
                            <span>
                              <input type="radio" name="CONTROL_NOTIFICATION" Value="true"> <span class="fs-17">Enable</span>
                            </span>
                            <span>
                              <input type="radio" name="CONTROL_NOTIFICATION" Value="false" checked=""> <span class="fs-17">Disabled</span>
                            </span>
                          </div>
                        <?php } ?>
                      </div>
                      <div class="form-group form-group-2 col-md-12">
                        <label>Desktop Notifications Sound</label>
                        <?php if (CONTROL_NOTIFICATION_SOUND == "true") { ?>
                          <div class="flex-s-b">
                            <span>
                              <input type="radio" name="CONTROL_NOTIFICATION_SOUND" Value="true" checked=""> <span class="fs-17">Enable</span>
                            </span>
                            <span>
                              <input type="radio" name="CONTROL_NOTIFICATION_SOUND" Value="false"> <span class="fs-17">Disabled</span>
                            </span>
                          </div>
                        <?php } else { ?>
                          <div class="flex-s-b">
                            <span>
                              <input type="radio" name="CONTROL_NOTIFICATION_SOUND" Value="true"> <span class="fs-17">Enable</span>
                            </span>
                            <span>
                              <input type="radio" name="CONTROL_NOTIFICATION_SOUND" Value="false" checked=""> <span class="fs-17">Disabled</span>
                            </span>
                          </div>
                        <?php } ?>
                      </div>
                      <div class="form-group form-group-2 col-md-12">
                        <label>Alert Display Time (eg: 2000 for 2sec)</label>
                        <input type="text" name="CONTROL_MSG_DISPLAY_TIME" class="form-control-2" required="" value="<?php echo CONTROL_MSG_DISPLAY_TIME; ?>">
                      </div>
                      <div class="form-group form-group-2 col-md-12">
                        <label>Activity Logs</label>
                        <?php if (CONTROL_APP_LOGS == "true") { ?>
                          <div class="flex-s-b">
                            <span>
                              <input type="radio" name="CONTROL_APP_LOGS" Value="true" checked=""> <span class="fs-17">Enable</span>
                            </span>
                            <span>
                              <input type="radio" name="CONTROL_APP_LOGS" Value="false"> <span class="fs-17">Disabled</span>
                            </span>
                          </div>
                        <?php } else { ?>
                          <div class="flex-s-b">
                            <span>
                              <input type="radio" name="CONTROL_APP_LOGS" Value="true"> <span class="fs-17">Enable</span>
                            </span>
                            <span>
                              <input type="radio" name="CONTROL_APP_LOGS" Value="false" checked=""> <span class="fs-17">Disabled</span>
                            </span>
                          </div>
                        <?php } ?>
                      </div>
                      <div class="col-md-12 m-t-10">
                        <button type="Submit" name="UpdateFeatures" class="btn btn-md app-btn">Update Details</button>
                      </div>
                    </form>
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
    <script>
      function enablemails() {
        var mailingstatus = document.getElementById("mailingstatus");
        if (mailingstatus.value == "true") {
          document.getElementById("showemailoptions").style.display = "block";
        } else {
          document.getElementById("showemailoptions").style.display = "none";
        }
      }
    </script>
    <script>
      function enablepaymentgateway() {
        var pgstatus = document.getElementById("pgstatus");
        if (pgstatus.value == "true") {
          document.getElementById("pgoptions").style.display = "block";
        } else {
          document.getElementById("pgoptions").style.display = "none";
        }
      }
    </script>
    <?php include '../../include/admin/footer_files.php'; ?>
</body>

</html>