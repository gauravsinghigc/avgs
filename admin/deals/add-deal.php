<?php

//required files
$PageDirLevel = "../../";
require $PageDirLevel . "require/auto/admin-auto-load.php";

//page variables
$PageName = "Create Deals";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $PageName; ?> | <?php echo APP_NAME; ?></title>
  <?php include $PageDirLevel . 'include/admin/header_files.php'; ?>

</head>

<body>
  <div id="container" class="effect mainnav-lg navbar-fixed mainnav-fixed">
    <?php include $PageDirLevel . 'include/admin/header.php'; ?>

    <div class="boxed">
      <!--CONTENT CONTAINER-->
      <!--===================================================-->
      <div id="content-container">
        <div id="page-content">
          <!--====start content===============================================-->

          <div class="panel">
            <div class="panel-body">
              <div class="row">
                <div class="col-md-12">
                  <h4 class="app-heading"><?php echo $PageName; ?></h4>
                </div>
              </div>

              <form action="select-products.php" method="POST">
                <div class="row p-1">
                  <div class="col-md-4 col-lg-4 col-sm-5 col-12 col-xs-12">
                    <h4 class="text-right">Deal Created By</h4>
                  </div>
                  <div class="col-md-5 col-lg-5 col-sm-5 col-12 col-xs-12">
                    <select name="DealCreatedBy" class="form-control-2 demo-chosen-select" required="">
                      <?php
                      $Fetchusers = FetchConvertIntoArray("SELECT * FROM users ORDER BY UserName ASC", true);
                      if ($Fetchusers != null) {
                        foreach ($Fetchusers as $Request) {
                          $RunningUserid = $Request->UserId;
                          if ($RunningUserid == LOGIN_UserId) {
                            $selected = "selected=''";
                          } else {
                            $selected = "";
                          } ?>
                          <option value="<?php echo $Request->UserId ?>" <?php echo $selected; ?>><?php echo $Request->UserName; ?> (<?php echo $Request->UserEmailId; ?>)</option>
                      <?php }
                      } ?>
                    </select>
                  </div>
                </div>
                <div class="row p-1">
                  <div class="col-md-4 col-lg-4 col-sm-5 col-12 col-xs-12">
                    <h4 class="text-right">Deal Name</h4>
                  </div>
                  <div class="col-md-5 col-lg-5 col-sm-5 col-12 col-xs-12">
                    <input type="text" name="DealsName" value="" class="form-control-2" required="">
                  </div>
                </div>
                <div class="row p-1">
                  <div class="col-md-4 col-lg-4 col-sm-5 col-12 col-xs-12 form-group">
                    <h4 class="text-right">Deal Type</h4>
                  </div>
                  <div class="col-md-5 col-lg-5 col-sm-5 col-12 col-xs-12">
                    <select name="DealPrintType" class="form-control-2" required="">
                      <option value="Printable Deal">Printable Deal</option>
                      <option value="Online Deal">Online Deal</option>
                    </select>
                  </div>
                </div>
                <div class="row p-1">
                  <div class="col-md-4 col-lg-4 col-sm-5 col-12 col-xs-12 form-group d-block">
                    <h4 class="text-right">Contact Name</h4>
                  </div>
                  <div class="col-md-5 col-lg-5 col-sm-5 col-12 col-xs-12">
                    <select name="DealCustomerId" class="form-control-2" required="">
                      <?php
                      $FetchAllCustomers = FetchConvertIntoArray("SELECT * FROM customers ORDER BY CompanyName ASC", true);
                      if ($FetchAllCustomers != null) {
                        foreach ($FetchAllCustomers as $Request) { ?>
                          <option value="<?php echo $Request->CustomerId; ?>"><?php echo $Request->CustomerDisplayName; ?></option>
                      <?php }
                      } ?>
                    </select>
                  </div>
                </div>
                <div class="row p-1">
                  <div class="col-md-4 col-lg-4 col-sm-5 col-12 col-xs-12 form-group d-block">
                    <h4 class="text-right">Deal Stages</h4>
                  </div>
                  <div class="col-md-5 col-lg-5 col-sm-5 col-12 col-xs-12">
                    <select name="DealsStage" class="form-control-2" required="">
                      <?php
                      $Fetchdealstages = FetchConvertIntoArray("SELECT * FROM dealstages ORDER BY DealStageId ASC", true);
                      if ($Fetchdealstages != null) {
                        foreach ($Fetchdealstages as $Request) { ?>
                          <option value="<?php echo $Request->DealStageName; ?>"><?php echo $Request->DealStageName; ?></option>
                      <?php }
                      } ?>
                    </select>
                  </div>
                </div>
                <div class="row p-1">
                  <div class="col-md-4 col-lg-4 col-sm-5 col-12 col-xs-12 form-group">
                    <h4 class="text-right">Closing Date</h4>
                  </div>
                  <div class="col-md-5 col-lg-5 col-sm-5 col-12 col-xs-12">
                    <input type="date" class="form-control-2" name="DealClosingDate" value="<?php echo date('Y-m-d'); ?>" required="">
                  </div>
                </div>
                <div class="row p-1">
                  <div class="col-md-4 col-lg-4 col-sm-5 col-12 col-xs-12 form-group">
                    <h4 class="text-right">Deal Descriptions</h4>
                  </div>
                  <div class="col-md-5 col-lg-5 col-sm-5 col-12 col-xs-12">
                    <textarea name="DealDescriptions" id="editor" class="form-control-2 height-auto" rows="4"></textarea>
                  </div>
                </div>
                <div class="row p-1">
                  <div class="col-md-12 text-center">
                    <button class="btn app-btn" type="Submit" name="SelectProducts">Select Products</button>
                  </div>
                </div>
              </form>
            </div>
          </div>

          <!--End page content-->
        </div>

        <?php include $PageDirLevel . 'include/admin/sidebar.php'; ?>
      </div>
      <?php include $PageDirLevel . 'include/admin/footer.php'; ?>
    </div>

    <?php include $PageDirLevel . 'include/admin/footer_files.php'; ?>
</body>

</html>