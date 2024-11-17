<?php

//required files
require "../../require/auto/admin-auto-load.php";

//page variables
$PageName = "Configurations";
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
              <form class="form row" action="../../controller/configcontroller.php" method="POST" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-md-8 col-lg-8 col-sm-7 col-12">
                    <?php FormPrimaryInputs(true); ?>
                    <div class="row">
                      <div class="form-group col-md-6 col-lg-6 col-sm-6 col-12">
                        <label>Company Name</label>
                        <input type="text" name="APP_NAME" value="<?php echo APP_NAME; ?>" class="form-control-2" required="">
                      </div>
                      <div class="form-group col-md-6 col-lg-6 col-sm-6 col-12">
                        <label>Company Type</label>
                        <input type="text" name="COMPANY_TYPE" value="<?php echo COMPANY_TYPE; ?>" class="form-control-2" required="">
                      </div>
                      <div class="form-group col-md-6 col-lg-6 col-sm-6 col-12">
                        <label>Tagline</label>
                        <input type="text" name="TAGLINE" value="<?php echo TAGLINE; ?>" class="form-control-2" required="">
                      </div>
                      <div class="form-group col-md-6 col-lg-6 col-sm-6 col-12">
                        <label>Phone Number</label>
                        <input type="text" name="PRIMARY_PHONE" value="<?php echo PRIMARY_PHONE; ?>" class="form-control-2" required="">
                      </div>
                      <div class="form-group col-md-6 col-lg-6 col-sm-6 col-12">
                        <label>Email-ID</label>
                        <input type="text" name="PRIMARY_EMAIL" value="<?php echo PRIMARY_EMAIL; ?>" class="form-control-2" required="">
                      </div>
                      <div class="form-group col-md-6 col-lg-6 col-sm-6 col-12">
                        <label>Short Descriptions</label>
                        <textarea style="height: 100% !important;" class="form-control-2" name="SHORT_DESCRIPTION" required="" rows="1"><?php echo SECURE(SHORT_DESCRIPTION, "d"); ?></textarea>
                      </div>
                      <div class="col-md-12 m-t-10">
                        <h4 class="app-heading">Address Details</h4>
                      </div>
                      <div class="form-group col-md-6 col-lg-6 col-sm-6 col-12">
                        <label>Street Address</label>
                        <input type="text" name="PRIMARY_ADDRESS" value="<?php echo SECURE(PRIMARY_ADDRESS, "d"); ?>" class="form-control-2" required="">
                      </div>
                      <div class="form-group col-md-6 col-lg-6 col-sm-6 col-12">
                        <label>Sector & Area Locality</label>
                        <input type="text" name="PRIMARY_AREA" value="<?php echo SECURE(PRIMARY_AREA, "d"); ?>" class="form-control-2" required="">
                      </div>
                      <div class="form-group col-md-6 col-lg-6 col-sm-6 col-12">
                        <label>City</label>
                        <input type="text" name="PRIMARY_CITY" value="<?php echo SECURE(PRIMARY_CITY, "d"); ?>" class="form-control-2" required="">
                      </div>
                      <div class="form-group col-md-6 col-lg-6 col-sm-6 col-12">
                        <label>State</label>
                        <input type="text" name="PRIMARY_STATE" value="<?php echo SECURE(PRIMARY_STATE, "d"); ?>" class="form-control-2" required="">
                      </div>
                      <div class="form-group col-md-6 col-lg-6 col-sm-6 col-12">
                        <label>Country</label>
                        <input type="text" name="PRIMARY_COUNTRY" value="<?php echo SECURE(PRIMARY_COUNTRY, "d"); ?>" class="form-control-2" required="">
                      </div>
                      <div class="form-group col-md-6 col-lg-6 col-sm-6 col-12">
                        <label>Pincode</label>
                        <input type="text" name="PRIMARY_PINCODE" value="<?php echo SECURE(PRIMARY_PINCODE, "d"); ?>" class="form-control-2" required="">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="row">
                      <div class="col-md-12">
                        <h4 class="app-heading m-t-15">More Settings</h4>
                      </div>
                      <div class="form-group col-md-6 col-lg-6 col-sm-6 col-12">
                        <label>Financial Year</label>
                        <select class="form-control-2" name="FINANCIAL_YEAR" required="">
                          <?php InputOptions(["" . FINANCIAL_YEAR . "", "January - December", "february - January", "March - February", "April - March", "May - April", "June - May", "July - June", "August - July", "September - August", "October - September", "November - October"]); ?>
                        </select>
                      </div>
                      <div class="form-group col-md-6 col-lg-6 col-sm-6 col-12">
                        <label>GST_NO</label>
                        <input type="text" name="GST_NO" value="<?php echo GST_NO; ?>" class="form-control-2" required="">
                      </div>
                      <div class="form-group col-md-6 col-lg-6 col-sm-6 col-12">
                        <label>TAX NO</label>
                        <input type="text" name="TAX_NO" value="<?php echo TAX_NO; ?>" class="form-control-2" required="">
                      </div>

                      <div class="col-md-12">
                        <h4 class="app-heading m-t-15">Monthly GOC Rate Settings Reminder</h4>
                        <div class="form-group col-md-12 col-lg-12 col-sm-12 col-12">
                          <label>GOC Rate Reminder Day</label>
                          <p> Enter the no of day when you setup GOC Rate for whole month. for example if wants to get reminder of every 1st of month then simply enter 1. or on 5th of day of every month then simply enter 5.</p>
                          <input type="text" name="GOC_CONFIG_DATE" value="<?php echo GOC_CONFIG_DATE; ?>" class="form-control-2" required="">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12 m-t-10">
                    <button type="Submit" name="UpdatePrimaryConfigurations" class="btn btn-md app-btn m-l-5">Update Details</button>
                  </div>
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

  <?php include '../../include/admin/footer_files.php'; ?>
</body>

</html>