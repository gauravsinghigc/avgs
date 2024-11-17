<?php

//required files
$PageDirLevel = "../../../";
require $PageDirLevel . "require/auto/admin-auto-load.php";

//page variables
$PageName = "Update Deal Details & Status";

//page activity
if (isset($_GET['dataid'])) {
  $RequestedDealsId = SECURE($_GET['dataid'], "d");
  $_SESSION['RequestedDealsId'] = $RequestedDealsId;
} else {
  $RequestedDealsId = $_SESSION['RequestedDealsId'];
}

//page sqls
$PageSqls = "SELECT * FROM deals WHERE DealsId='$RequestedDealsId'";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo SECURE(GET_DATA("DealsName"), "d"); ?> | <?php echo APP_NAME; ?></title>
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
                  <h4 class="app-heading"><?php echo $PageName; ?> : <?php echo SECURE(GET_DATA("DealsName"), "d"); ?></h4>
                </div>
              </div>

              <div class="row">

                <div class="col-md-6 col-lg-6 col-sm-6 col-12">
                  <div class="shadow-lg p-1 br10">
                    <h5 class="app-sub-heading">Update Deal Details</h5>
                    <form action="../../../controller/dealcontroller.php" method="POST">
                      <?php FormPrimaryInputs(true); ?>
                      <div class="row p-1">
                        <div class="col-md-4 col-lg-4 col-sm-5 col-12 col-xs-12">
                          <h4 class="text-left">Deal Created By</h4>
                        </div>
                        <div class="col-md-8 col-lg-8 col-sm-8 col-12 col-xs-12">
                          <select name="DealCreatedBy" class="form-control-2 demo-chosen-select" required="">
                            <?php
                            $Fetchusers = FetchConvertIntoArray("SELECT * FROM users ORDER BY UserName ASC", true);
                            if ($Fetchusers != null) {
                              foreach ($Fetchusers as $Request) {
                                $RunningUserid = $Request->UserId;
                                if ($RunningUserid == GET_DATA("DealCreatedBy")) {
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
                          <h4 class="text-left">Deal Name</h4>
                        </div>
                        <div class="col-md-8 col-lg-8 col-sm-8 col-12 col-xs-12">
                          <input type="text" name="DealsName" value="<?php echo SECURE(GET_DATA("DealsName"), "d"); ?>" class="form-control-2" required="">
                        </div>
                      </div>
                      <div class="row p-1">
                        <div class="col-md-4 col-lg-4 col-sm-5 col-12 col-xs-12 form-group">
                          <h4 class="text-left">Deal Type</h4>
                        </div>
                        <div class="col-md-8 col-lg-8 col-sm-8 col-12 col-xs-12">
                          <select name="DealPrintType" class="form-control-2" required="">
                            <?php if (GET_DATA("DealPrintType") == "Printable Deal") { ?>
                              <option value="Printable Deal" selected="">Printable Deal</option>
                              <option value="Online Deal">Online Deal</option>
                            <?php } else { ?>
                              <option value="Online Deal" selected="">Online Deal</option>
                              <option value="Printable Deal">Printable Deal</option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                      <div class="row p-1">
                        <div class="col-md-4 col-lg-4 col-sm-5 col-12 col-xs-12 form-group d-block">
                          <h4 class="text-left">Contact Name</h4>
                        </div>
                        <div class="col-md-8 col-lg-8 col-sm-8 col-12 col-xs-12">
                          <select name="DealCustomerId" class="form-control-2" required="">
                            <?php
                            $FetchAllCustomers = FetchConvertIntoArray("SELECT * FROM customers ORDER BY CompanyName ASC", true);
                            if ($FetchAllCustomers != null) {
                              foreach ($FetchAllCustomers as $Request) {
                                $RunningCustomerId = $Request->CustomerId;
                                if ($RunningCustomerId == GET_DATA("DealCustomerId")) {
                                  $selected = "selected=''";
                                } else {
                                  $selected = "";
                                } ?>
                                <option value="<?php echo $Request->CustomerId; ?>" <?php echo $selected; ?>><?php echo $Request->CustomerDisplayName; ?></option>
                            <?php }
                            } ?>
                          </select>
                        </div>
                      </div>
                      <div class="row p-1">
                        <div class="col-md-4 col-lg-4 col-sm-5 col-12 col-xs-12 form-group d-block">
                          <h4 class="text-left">Deal Stages</h4>
                        </div>
                        <div class="col-md-8 col-lg-8 col-sm-8 col-12 col-xs-12">
                          <select name="DealsStage" class="form-control-2" required="">
                            <?php
                            $Fetchdealstages = FetchConvertIntoArray("SELECT * FROM dealstages ORDER BY DealStageId ASC", true);
                            if ($Fetchdealstages != null) {
                              foreach ($Fetchdealstages as $Request) {
                                $RunningStage = $Request->DealStageName;
                                if ($RunningStage ==  SECURE(GET_DATA("DealsStage"), "d")) {
                                  $selected = "selected=''";
                                } else {
                                  $selected = "";
                                } ?>
                                <option value="<?php echo $Request->DealStageName; ?>" <?php echo $selected; ?>><?php echo $Request->DealStageName; ?></option>
                            <?php }
                            } ?>
                          </select>
                        </div>
                      </div>
                      <div class="row p-1">
                        <div class="col-md-4 col-lg-4 col-sm-5 col-12 col-xs-12 form-group">
                          <h4 class="text-left">Closing Date</h4>
                        </div>
                        <div class="col-md-8 col-lg-8 col-sm-8 col-12 col-xs-12">
                          <input type="date" class="form-control-2" name="DealClosingDate" value="<?php echo date('Y-m-d', strtotime(GET_DATA("DealClosingDate"))); ?>" required="">
                        </div>
                      </div>
                      <div class="row p-1">
                        <div class="col-md-4 col-lg-4 col-sm-5 col-12 col-xs-12 form-group">
                          <h4 class="text-left">Deal Descriptions</h4>
                        </div>
                        <div class="col-md-8 col-lg-8 col-sm-8 col-12 col-xs-12">
                          <textarea name="DealDescriptions" id="editor" class="form-control-2 height-auto" rows="4"><?php echo SECURE(GET_DATA("DealDescriptions"), "d"); ?></textarea>
                        </div>
                      </div>
                      <div class="row p-1">
                        <div class="col-md-12 text-center">
                          <button class="btn app-btn" type="Submit" name="UpdateDeals" value="<?php echo SECURE($RequestedDealsId, "e"); ?>">Update Deal Details</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>

                <div class="col-md-6 col-lg-6 col-sm-6 col-12">
                  <div class="shadow-lg p-1 br10">
                    <h5 class="app-sub-heading">Update Deal Products</h5>
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>SNo</th>
                          <th>ProductName</th>
                          <th>SalePrice</th>
                          <th>Total</th>
                          <th>Taxes</th>
                          <th>Total</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $Sno = 0;
                        $TotalDealProductAmount = 0;
                        $TotalTaxes = 0;
                        $TotalNetPayable = 0;
                        $FetchDealProducts = FetchConvertIntoArray("SELECT * FROM deal_products where DealDealId='$RequestedDealsId'", true);
                        if ($FetchDealProducts == null) {
                        } else {
                          foreach ($FetchDealProducts as $Request) {
                            $Sno++;
                            $TotalDealProductAmount += $Request->DealProductTotalPrice;
                            $TotalTaxes += $Request->DealProductChargeAmount;
                            $TotalNetPayable += $Request->DealProductTotalPrice + $Request->DealProductChargeAmount;
                        ?>
                            <tr>
                              <td><?php echo $Sno; ?></td>
                              <td><?php echo $Request->DealProductName; ?></td>
                              <td><?php echo Price($Request->DealProductSalePrice); ?> x <?php echo $Request->DealProductQuantity; ?></td>
                              <td><?php echo Price($Request->DealProductTotalPrice); ?></td>
                              <td>+<?php echo Price($Request->DealProductChargeAmount); ?> (<?php echo $Request->DealProductChargeType; ?>%)</td>
                              <td><?php echo Price($Request->DealProductNetTotalAmount); ?></td>
                            </tr>
                        <?php }
                        } ?>
                      </tbody>
                      <tr>
                        <th colspan="5" class="text-right" align="right"><span class="m-r-20 fs-19">Sub Total </span></th>
                        <td> <span class="text-black fs-19"> <?php echo Price($TotalDealProductAmount); ?></span></td>
                      </tr>
                      <tr>
                        <th colspan="5" class="text-right" align="right"><span class="m-r-20 fs-19">Taxes Total </span></th>
                        <td> <span class="text-black fs-19"> <?php echo Price($TotalTaxes); ?></span></td>
                      </tr>
                      <tr>
                        <th colspan="5" class="text-right" align="right"><span class="m-r-20 fs-19">Net Payable Amount </span></th>
                        <td> <span class="text-black fs-19"> <?php echo Price($TotalNetPayable); ?></span></td>
                      </tr>
                    </table>

                    <a href="edit-deal-products.php?viewid=<?php echo SECURE($RequestedDealsId, "e"); ?>" class="btn btn-md btn-primary"><i class="fa fa-edit"></i> Edit Products</a>
                    <a href="<?php echo DOMAIN; ?>/admin/customers/details/?viewdataid=<?php echo SECURE(GET_DATA("DealCustomerId"), "e"); ?>" class="btn btn-lg btn-default">Back to Profile</a>
                  </div>
                </div>

              </div>
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