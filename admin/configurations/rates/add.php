<?php

//required files
require "../../../require/auto/admin-auto-load.php";

//page variables
$PageName = "Rate Configurations";
$RequestedCurrenciy = IfRequested("GET", "RateConfigCurrentId", false);
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
                    <input type="text" list="RateConfigCurrentId" value="<?php echo CurrencyDisplay($RequestedCurrenciy, "code"); ?>" onchange="form.submit()" name="RateConfigCurrentId" class="form-control-2" required="">
                    <datalist id="RateConfigCurrentId">
                      <?php CurrencyOptions($RequestedCurrenciy); ?>
                    </datalist>
                  </div>
                </div>
              </form>
              <form action="../../../controller/configcontroller.php" method="POST">
                <?php FormPrimaryInputs(true); ?>
                <?php if (isset($_GET['RateConfigCurrentId'])) {
                  ProvideInput("GET", "text", "RateConfigCurrentId", true, false, true, null);
                } ?>
                <div class="row">
                  <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                    <label>Select Rate Type<?php echo $req; ?></label>
                    <select name="RateConfigType" class="form-control-2" required="">
                      <?php InputOptions(["GOC RATE", "BANK RATE"], "GOC RATE"); ?>
                    </select>
                  </div>
                </div>

                <div class="row">
                  <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                    <label>Rate Date<?php echo $req; ?></label>
                    <input type="date" name="RateConfigDate" value="<?php echo date("Y-m-d"); ?>" class="form-control-2" required="">
                  </div>
                </div>

                <div class="row">
                  <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                    <label>Enter Value <?php echo $req; ?></label>
                    <input type="text" name="RateConfigValue" class="form-control-2" required="">
                  </div>
                </div>

                <div class="row">
                  <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                    <label>Select Status<?php echo $req; ?></label>
                    <select name="RateConfigStatus" class="form-control-2" required="">
                      <?php InputOptions(["Active", "Inactive"]); ?>
                    </select>
                  </div>
                </div>

                <div class="col-md-12 m-t-20">
                  <a href="index.php" class="btn btn-lg btn-default"><i class="fa fa-angle-left"></i> Back to All</a>
                  <button class="btn btn-lg app-btn" name="SaveNewRateConfigs">Save Details</button>
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