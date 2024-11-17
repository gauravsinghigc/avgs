<?php

//required files
require '../../../require/modules.php';
require '../../../require/admin/access-control.php';
require '../../../require/admin/sessionvariables.php';

//page variables
$PageName = "Edit Shipping Address";

if (isset($_GET['addressid'])) {
  $addressid = SECURE($_GET['addressid'], "d");
  $_SESSION['addressid2'] = $addressid;
} else {
  $addressid = $_SESSION['addressid2'];
}

//page activities
$PageSqls = "SELECT * FROM customer_shipping_address WHERE CustomerShippingAddress='$addressid'";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Shipping Address | <?php echo APP_NAME; ?></title>
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
                  <h4 class="m-b-0 app-heading"><?php echo $PageName; ?> </h4>
                </div>
              </div>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-6 m-t-10">
                  <form action="../../../controller/customercontroller.php" class="p-1r" method="POST">
                    <?php FormPrimaryInputs(true); ?>
                    <div class="row">
                      <div class="form-group col-lg-12 col-md-12 col-sm-12 col-12">
                        <h4 class="app-sub-heading">Shipping Address</h4>
                        <label>Street Address</label>
                        <textarea name="CustomerStreetAddress1" id="Address1" class="form-control" style="height:100% !important;line-height:100% !important;" rows="4" required=""><?php echo SECURE(GET_DATA("CustomerStreetAddress1"), "d"); ?></textarea>
                      </div>
                      <div class="form-group col-lg-6 col-md-6 col-sm-6 col-6">
                        <label>City</label>
                        <input name="CustomerCity1" list="city" value="<?php echo GET_DATA("CustomerCity1"); ?>" id="Address2" class="form-control" type="text" required="" placeholder="">
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
                        <input name="CustomerState1" list="states3" value="<?php echo GET_DATA("CustomerState1"); ?>" id="Address3" class="form-control" type="text" required="" placeholder="">
                        <datalist id="states3">
                          <?php foreach (STATES as $State) {
                          ?>
                            <option value="<?php echo $State; ?>"></option>
                          <?php } ?>
                        </datalist>
                      </div>
                      <div class="form-group col-lg-6 col-md-6 col-sm-6 col-6">
                        <label>Country</label>
                        <input name="CustomerCountry1" value="<?php echo GET_DATA("CustomerCountry1"); ?>" id="Address4" class="form-control" type="text" required="" placeholder="">
                      </div>
                      <div class="form-group col-lg-6 col-md-6 col-sm-6 col-6">
                        <label>Zip Code/Pincode</label>
                        <input name="CustomerPincode1" value="<?php echo GET_DATA("CustomerPincode1"); ?>" id="Address5" class="form-control" type="text" required="" placeholder="">
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12 m-t-10">
                        <button type="submit" name="UpdateShippingAddress" value="<?php echo SECURE($addressid, "e"); ?>" class="app-btn btn">Update Address</button>
                        <a href="index.php" class="btn btn-lg btn-default">Back to Profile</a>
                        <?php CONFIRM_DELETE_POPUP(
                          "delete_address",
                          [
                            "delete_shipping_Address" => true,
                            "control_id" => $addressid
                          ],
                          "customercontroller",
                          "<i class='fa fa-trash'></i> Delete Address",
                          "btn-lg pull-right"
                        ); ?>
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