<?php

//required files
require "../../../require/auto/admin-auto-load.php";

//page variables
$PageName = "Currencies";
$RequestedCurrenciy = SECURE(IfRequested("GET", "view", false), "d");

//page request
if (isset($_GET['viewid'])) {
  $ViewCurrencyid = SECURE($_GET['viewid'], "d");
  $_SESSION['VIEW_CUR_ID'] = $ViewCurrencyid;
} else {
  $ViewCurrencyid = $_SESSION['VIEW_CUR_ID'];
}

//page sql
$PageSqls = "SELECT * FROM currencies where currenciesid='$ViewCurrencyid'";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $PageName; ?> | <?php echo APP_NAME; ?></title>
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
              <div class="flex-s-b">
                <?php include 'common.php'; ?>
              </div>
            </div>
            <div class="panel-body">
              <h4 class="app-heading">Edit <?php echo $PageName; ?></h4>
              <form action="../../../controller/currencycontroller.php" method="POST">
                <?php FormPrimaryInputs(true); ?>

                <div class="row">
                  <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                    <label>Currency Code <?php echo $req; ?></label>
                    <input type="text" list="currencycodes" value="<?php echo GET_DATA('currencycode'); ?>" name="currencycode" class="form-control-2" required="">
                    <datalist id="currencycodes">
                      <?php CurrencyOptions(); ?>
                    </datalist>
                  </div>
                </div>

                <div class="row">
                  <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                    <label>Currency Symbole <?php echo $req; ?></label>
                    <input type="text" name="currencysymbole" value="<?php echo GET_DATA('currencysymbole'); ?>" class="form-control-2" required="">
                  </div>
                </div>

                <div class="row">
                  <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                    <label>Currency name <?php echo $req; ?></label>
                    <input type="text" name="currencyname" value="<?php echo GET_DATA('currencyname'); ?>" class="form-control-2 text-transform-uppercase" required="">
                  </div>
                </div>

                <div class="row">
                  <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                    <label>Currency Decimal Points <?php echo $req; ?></label>
                    <select name="currenciedecimalplaces" class="form-control-2" required="">
                      <?php InputOptions(["0", "2", "3"]); ?>
                    </select>
                  </div>
                </div>

                <div class="row">
                  <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                    <label>Currency Formate <?php echo $req; ?></label>
                    <select name="currencyformates" class="form-control-2" required="">
                      <?php InputOptions(["0, 000, 000.00", "00, 00, 000.00"]); ?>
                    </select>
                  </div>
                </div>

                <div class="row">
                  <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                    <label>Make Default </label><br>
                    <?php if (GET_DATA("currencydefault") == "true" or GET_DATA("currencydefault") == null) {
                      $checked = "checked=''";
                    } else {
                      $checked = "";
                    } ?>
                    <input type="checkbox" name="currencydefault" value="true" <?php echo $checked; ?>> Check to make this defualt currency.
                  </div>
                </div>

                <div class="col-md-12 m-t-20">
                  <button class="btn btn-lg app-btn" name="udpatecurrencies">Update Details</button>
                </div>
            </div>
            </form>
          </div>
        </div>
        <!--End page content-->
      </div>

      <?php include '../../../include/admin/sidebar.php'; ?>
    </div>
    <?php include '../../../include/admin/footer.php'; ?>
  </div>

  <?php include '../../../include/admin/footer_files.php'; ?>
</body>

</html>