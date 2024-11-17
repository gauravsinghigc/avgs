<?php

//required files
require '../../../require/modules.php';
require '../../../require/admin/access-control.php';
require '../../../require/admin/sessionvariables.php';

//page variables
$PageName = "Edit Customer Details";

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
                <div class="col-md-12 m-t-10">
                  <form action="../../../controller/customercontroller.php" method="POST">
                    <?php FormPrimaryInputs(true); ?>
                    <div class="row">
                      <div class="col-lg-12 col-md-12 col-sm-12 col-12 p-1">
                        <div class="input-block">
                          <h4 class="app-heading">Customer Details</h4>
                          <div class="form-group form-group-2 flex-s-b">
                            <label>Customer type <?php echo $req; ?></label>
                            <div class="raw-inputs" onclick="tax()">
                              <?php if (GET_DATA("CustomerType") == "Individual") { ?>
                                <span>
                                  <input type="radio" name="CustomerType" id="taxationvalue1" value="Company"> Company
                                </span>
                                <span>
                                  <input type="radio" name="CustomerType" id="taxationvalue2" value="Individual" checked=""> Individual
                                </span>
                              <?php } else { ?>
                                <span>
                                  <input type="radio" name="CustomerType" id="taxationvalue1" value="Company" checked> Company
                                </span>
                                <span>
                                  <input type="radio" name="CustomerType" id="taxationvalue2" value="Individual"> Individual
                                </span>
                              <?php } ?>
                            </div>
                          </div>

                          <div class="form-group form-group-2 flex-s-b">
                            <label>Primay Contact Person <?php echo $req; ?></label>
                            <div class="raw-inputs">
                              <span>
                                <select class="form-control-3" id="salute" name="CustomerSalutation">
                                  <?php InputOptions([GET_DATA("CustomerSalutation"), "Mr.", "Mrs.", "Ms.", "Miss", "Dr."]) ?>
                                </select>
                              </span>
                              <span class="width-40-pr">
                                <input type="text" id="ifname" oninput="DisplayName()" value="<?php echo GET_DATA("CustomerFirstname"); ?>" name="CustomerFirstname" class="form-control-3" placeholder="First name">
                              </span>
                              <span class="width-40-pr">
                                <input type="text" id="ilname" oninput="DisplayName()" value="<?php echo GET_DATA("Customerlastname"); ?>" name="Customerlastname" class="form-control-3" placeholder="Last name">
                              </span>
                            </div>
                          </div>

                          <div class="form-group form-group-2 flex-s-b">
                            <label>Company Name <?php echo $req; ?></label>
                            <input type="text" name="CompanyName" oninput="DisplayName()" value="<?php echo GET_DATA("CompanyName"); ?>" id="icname" class="form-control-3">
                          </div>

                          <div class="form-group form-group-2 flex-s-b">
                            <label>Customer Display name <?php echo $req; ?></label>
                            <select name="CustomerDisplayName" onmouseover="DisplayName()" class="form-control-3" required="">
                              <option value="<?php echo GET_DATA("CustomerDisplayName"); ?>" selected=""><?php echo GET_DATA("CustomerDisplayName"); ?></option>
                              <option value="" id="fname"></option>
                              <option value="" id="c2name"></option>
                            </select>
                          </div>

                          <div class="form-group form-group-2 flex-s-b">
                            <label>Customer Phone <?php echo $req; ?></label>
                            <div class="raw-inputs">
                              <span>
                                <select class="p-inputs form-control-3" name="CountryPhoneCode">
                                  <?php InputCountryCodes(); ?>
                                </select>
                              </span>
                              <span>
                                <input type="text" name="CustomerWorkPhone" value="<?php echo GET_DATA('CustomerWorkPhone'); ?>" class="form-control-3" placeholder="Work">
                              </span>
                              <span>
                                <input type="text" name="CustomerMobilePhone" value="<?php echo GET_DATA('CustomerMobilePhone'); ?>" class="form-control-3" placeholder="Mobile">
                              </span>
                            </div>
                          </div>

                          <div class="form-group form-group-2 flex-s-b">
                            <label>Customer Email-ID <?php echo $req; ?></label>
                            <input type="email" name="CustomerEmailId" value="<?php echo GET_DATA('CustomerEmailId'); ?>" class="form-control-3 m-r-5" placeholder="email@domain.tld" required="">
                            <input type="email" name="CustomerSecondaryEmail" value="<?php echo GET_DATA('CustomerSecondaryEmail'); ?>" class="form-control-3 m-r-5" placeholder="secondary email">
                            <input type="email" name="CustomerOtherEmail" value="<?php echo GET_DATA('CustomerOtherEmail'); ?>" class="form-control-3 m-r-5" placeholder="other email">
                          </div>

                          <div class="form-group form-group-2 flex-s-b">
                            <label>Website </label>
                            <input type="text" name="CustomerWebsite" value="<?php echo GET_DATA('CustomerWebsite'); ?>" class="form-control-3">
                          </div>
                          <div class="form-group form-group-2 flex-s-b">
                            <label>Remarks & Notes </label>
                            <textarea type="text" name="CustomerRemarks" value="<?php echo SECURE(GET_DATA('CustomerRemarks'), "d"); ?>" class="form-control-3"><?php echo SECURE(GET_DATA("CustomerRemarks"), "d"); ?></textarea>
                          </div>
                          <br><br>
                          <div class="col-md-12 m-t-10">
                            <button class="app-btn btn" type="submit" name="UpdateCustomerDetails" value="<?php echo SECURE($RequestCustomerId, "e"); ?>">Update Details</button>
                            <a href="index.php" class="btn btn-lg btn-default">Back to Profile</a>
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

    <script>
      function DisplayName() {
        var salute = document.getElementById("salute");
        var ifname = document.getElementById("ifname");
        var ilname = document.getElementById("ilname");
        var icname = document.getElementById("icname");
        var fname = document.getElementById("fname");
        var lname = document.getElementById("lname");
        var cname = document.getElementById("cname");
        var fullname = document.getElementById("fullname");
        var c2name = document.getElementById("c2name");
        var c3name = document.getElementById("c3name");

        fname.value = salute.value + " " + ifname.value + " " + ilname.value;
        fname.innerHTML = salute.value + " " + ifname.value + " " + ilname.value;

        c2name.value = icname.value;
        c2name.innerHTML = icname.value;

      }
    </script>
    <!-- end of add section -->

    <!-- confirmation pop up form-->

    <?php include '../../../include/admin/footer_files.php'; ?>
</body>

</html>