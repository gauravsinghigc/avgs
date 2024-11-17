<?php

//required files
require "../../require/auto/admin-auto-load.php";

//page variables
$PageName = "Invoice Settings";
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
                <?php
                $getinvoiceconfigs = FetchConvertIntoArray("SELECT * FROM config_invoices ORDER BY ConfigInvoiceId DESC", true);
                if ($getinvoiceconfigs != null) {
                  foreach ($getinvoiceconfigs as $configs) { ?>
                    <div class="col-md-6 m-t-10">
                      <form action="<?php echo CONTROLLER; ?>/configcontroller.php" method="POST">
                        <?php FormPrimaryInputs(true); ?>
                        <div class="col-md-12 col-lg-12">
                          <h3><?php
                              $ConfigInvoiceName = $configs->InvoiceConfigName;
                              $ConfigInvoiceName = str_replace("_", " ", $ConfigInvoiceName);
                              echo $ConfigInvoiceName; ?></h3>
                        </div>
                        <div class="col-md-12 col-lg-12">
                          <?php TextArea(
                            $name = "InvoiceConfigValue",
                            $value = SECURE($configs->InvoiceConfigValue, "d"),
                            $rows = 2,
                            $attributes = [
                              "class" => "form-control-2",
                              "placeholder" => "Enter " . $configs->InvoiceConfigName
                            ],
                            $id = $configs->InvoiceConfigName . "_" . $configs->ConfigInvoiceId
                          ); ?>
                        </div>
                        <div class="col-md-12 text-right">
                          <br>
                          <button type="submit" class="btn btn-md app-btn" name="UpdateInvoicefieldsDetails" value="<?php echo SECURE($configs->ConfigInvoiceId, "e"); ?>">Update Details</button>
                          <hr>
                        </div>
                      </form>
                    </div>
                <?php
                  }
                } ?>
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