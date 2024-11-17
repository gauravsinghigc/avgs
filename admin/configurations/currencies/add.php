<?php

//required files
require "../../../require/auto/admin-auto-load.php";

//page variables
$PageName = "Currencies";
$RequestedCurrenciy = IfRequested("GET", "currencycode", false);
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
              <h4 class="app-heading">Add New <?php echo $PageName; ?></h4>
              <form action="" method="GET">
                <div class="row">
                  <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                    <label>Currency Code <?php echo $req; ?></label>
                    <input type="text" list="currencycodes" value="<?php echo CurrencyDisplay($RequestedCurrenciy, "code"); ?>" onchange="form.submit()" name="currencycode" class="form-control-2" required="">
                    <datalist id="currencycodes">
                      <?php CurrencyOptions($RequestedCurrenciy); ?>
                    </datalist>
                  </div>
                </div>
              </form>
              <form action="../../../controller/currencycontroller.php" method="POST">
                <?php FormPrimaryInputs(true); ?>
                <?php if (isset($_GET['currencycode'])) {
                  ProvideInput("GET", "text", "currencycode", true, false, true, null);
                } ?>
                <div class="row">
                  <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                    <label>Currency Symbol <?php echo $req; ?></label>
                    <input type="text" name="currencysymbole" value="<?php echo CurrencyDisplay($RequestedCurrenciy, "symbol"); ?>" class="form-control-2" required="">
                  </div>
                </div>

                <div class="row">
                  <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                    <label>Currency name <?php echo $req; ?></label>
                    <input type="text" name="currencyname" value="<?php echo CurrencyDisplay($RequestedCurrenciy, "name"); ?>" class="form-control-2 text-transform-uppercase" required="">
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

                <div class="col-md-12 m-t-20">
                  <button class="btn btn-lg app-btn" name="createnewcurrencies">Save Details</button>
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