<?php

//required files
require '../../../require/modules.php';
require '../../../require/admin/access-control.php';
require '../../../require/admin/sessionvariables.php';

//page variables
$PageName = "Add Address";

if (isset($_GET['viewid'])) {
  $RequestCustomerId = SECURE($_GET['viewid'], "d");
  $_SESSION['RequestCustomerId'] = $RequestCustomerId;
} else {
  $RequestCustomerId = $_SESSION['RequestCustomerId'];
}

//page activities
$PageSqls = "SELECT * FROM customers WHERE CustomerId='$RequestCustomerId'";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo GET_DATA("CustomerDisplayName"); ?> | <?php echo APP_NAME; ?></title>
  <?php include '../../../include/admin/header_files.php'; ?>
</head>

<body>
  <div id="container" class="effect mainnav-lg navbar-fixed mainnav-fixed">
    <?php include '../../../include/admin/header.php'; ?>

    <div class="boxed">
      <!--CONTENT CONTAINER-->
      <!--===================================================-->
      <div id="content-container">
        <div id="page-content">
          <!--====start content===============================================-->

          <div class="panel">
            <div class="panel-heading">
              <div class="row">
                <div class="col-md-12 m-b-5">
                  <h4 class="m-b-0 app-heading"><?php echo $PageName; ?> : <?php echo GET_DATA("CustomerDisplayName"); ?></h4>
                </div>
              </div>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-6 m-t-10">
                  <form action="../../../controller/customercontroller.php" method="POST">
                    <?php FormPrimaryInputs(true); ?>
                    <div class="row">
                      <div class="form-group col-lg-12 col-md-12 col-sm-12 col-12">
                        <h4>Billing Address</h4>
                        <label>Street Address</label>
                        <textarea name="CustomerStreetAddress" id="Address1" class="form-control-2" style="height:100% !important;line-height:100% !important;" rows="4" required=""></textarea>
                      </div>
                      <div class="form-group col-lg-6 col-md-6 col-sm-6 col-6">
                        <label>City</label>
                        <input name="CustomerCity" id="Address2" class="form-control-2" type="text" required="" placeholder="">
                      </div>
                      <div class="form-group col-lg-6 col-md-6 col-sm-6 col-6">
                        <label>State</label>
                        <input name="CustomerState" id="Address3" list="states2" class="form-control-2" type="text" required="" placeholder="">
                        <datalist id="states2">
                          <?php foreach (STATES as $State) { ?>
                            <option value="<?php echo $State; ?>"></option>
                          <?php } ?>
                        </datalist>
                      </div>
                      <div class="form-group col-lg-6 col-md-6 col-sm-6 col-6">
                        <label>Country</label>
                        <input name="CustomerCountry" id="Address4" class="form-control-2" type="text" required="" placeholder="">
                      </div>
                      <div class="form-group col-lg-6 col-md-6 col-sm-6 col-6">
                        <label>Zip Code/Pincode</label>
                        <input name="CustomerPincode" id="Address5" class="form-control-2" type="text" required="" placeholder="">
                      </div>
                    </div>

                    <div class="row">
                      <div class="form-group col-lg-12 col-md-12 col-sm-12 col-12">
                        <h4>Shipping Address
                          <span class="float-right text-grey"><input type="checkbox" onclick="CopyAddress()" value="true" id="copyaddress"> Same As Above</span>
                        </h4>
                        <label>Street Address</label>
                        <textarea name="CustomerStreetAddress1" id="Address11" class="form-control-2" style="height:100% !important;line-height:100% !important;" rows="4" required=""></textarea>
                      </div>
                      <div class="form-group col-lg-6 col-md-6 col-sm-6 col-6">
                        <label>City</label>
                        <input name="CustomerCity1" list="city" id="Address22" class="form-control-2" type="text" required="" placeholder="">
                        <datalist id="city">
                          <?php foreach (STATE_AND_CITY as $key => $State) {
                            foreach ($State as $City) { ?>
                              <option value="<?php echo $City; ?>"></option>
                          <?php
                            }
                          } ?>
                        </datalist>
                      </div>
                      <div class="form-group col-lg-6 col-md-6 col-sm-6 col-6">
                        <label>State</label>
                        <input name="CustomerState1" id="Address33" list="states3" class="form-control-2" type="text" required="" placeholder="">
                        <datalist id="states3">
                          <?php foreach (STATES as $State) { ?>
                            <option value="<?php echo $State; ?>"></option>
                          <?php } ?>
                        </datalist>
                      </div>
                      <div class="form-group col-lg-6 col-md-6 col-sm-6 col-6">
                        <label>Country</label>
                        <input name="CustomerCountry1" id="Address44" class="form-control-2" type="text" required="" placeholder="">
                      </div>
                      <div class="form-group col-lg-6 col-md-6 col-sm-6 col-6">
                        <label>Zip Code/Pincode</label>
                        <input name="CustomerPincode1" id="Address55" class="form-control-2" type="text" required="" placeholder="">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12 m-t-10">
                        <button type="submit" name="AddNewAddress" value="<?php echo SECURE($RequestCustomerId, "e"); ?>" class="app-btn btn">Save Address</button>
                        <a href="index.php" class="btn btn-md btn-default">Back to Profile</a>
                      </div>
                    </div>
                  </form>
                </div>

              </div>
            </div>
          </div>

          <!--End page content-->
        </div>

        <?php include '../../../include/admin/sidebar.php'; ?>
      </div>
      <?php include '../../../include/admin/footer.php'; ?>
    </div>

    <!-- end of add section -->

    <!-- confirmation pop up form-->
    <script>
      function CopyAddress() {
        if (document.getElementById("copyaddress").checked) {
          document.getElementById("Address11").value = document.getElementById("Address1").value;
          document.getElementById("Address22").value = document.getElementById("Address2").value;
          document.getElementById("Address33").value = document.getElementById("Address3").value;
          document.getElementById("Address44").value = document.getElementById("Address4").value;
          document.getElementById("Address55").value = document.getElementById("Address5").value;
        } else {
          document.getElementById("Address11").value = "";
          document.getElementById("Address22").value = "";
          document.getElementById("Address33").value = "";
          document.getElementById("Address44").value = "";
          document.getElementById("Address55").value = "";
        }
      }
    </script>

    <?php include '../../../include/admin/footer_files.php'; ?>
</body>

</html>