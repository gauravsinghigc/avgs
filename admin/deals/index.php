<?php

//required files
$PageDirLevel = "../../";
require $PageDirLevel . "require/auto/admin-auto-load.php";

//page variables
$PageName = "All Deals";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $PageName; ?> | <?php echo APP_NAME; ?></title>
  <?php include $PageDirLevel . 'include/admin/header_files.php'; ?>
  <script type="text/javascript">
    function SidebarActive() {
      document.getElementById("app_deals").classList.add("active");
    }
    window.onload = SidebarActive;
  </script>
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
                  <h4 class="app-heading flex-s-b">
                    <span class="p-t-5"><?php echo $PageName; ?></span>
                    <a href="add-deal.php" target="_blank" class="btn btn-sm btn-danger float-right"><i class="fa fa-plus"></i> Deals</a>
                  </h4>
                </div>
              </div>
              <form action="../reports/deals-reports.php" method="get" target="_blank">
                <div class="row">
                  <div class="form-group col-lg-4 col-md-4">
                    <label>Deal Name</label>
                    <input type="text" name="DealsName" list="DealsName" class="form-control">
                    <?php SUGGEST("deals", "DealsName", "ASC", "d"); ?>
                  </div>
                  <div class="form-group col-lg-4 col-md-4">
                    <label>Company/Customer Display Name</label>
                    <input type="text" name="DealCustomerCompanyName" list="DealCustomerCompanyName" class="form-control">
                    <?php SUGGEST("deals", "DealCustomerCompanyName", "ASC", null); ?>
                  </div>
                  <div class="form-group col-lg-4 col-md-4">
                    <label>Deal Stage</label>
                    <input type="text" name="DealsStage" list="DealsStage" class="form-control">
                    <?php SUGGEST("deals", "DealsStage", "ASC", "d"); ?>
                  </div>
                  <div class="form-group col-lg-4 col-md-4">
                    <label>Deal Amount</label>
                    <input type="text" name="DealAmount" list="DealAmount" class="form-control">
                    <?php SUGGEST("deals", "DealAmount", "ASC", null); ?>
                  </div>
                  <div class="form-group col-lg-4 col-md-4">
                    <label>Deal Type</label>
                    <input type="text" name="DealPrintType" list="DealPrintType" class="form-control">
                    <?php SUGGEST("deals", "DealPrintType", "ASC", "d"); ?>
                  </div>
                  <div class="form-group col-lg-4 col-md-4">
                    <label>Deal Created By</label>
                    <select name="DealCreatedBy" class="form-control">
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
                  <div class="form-group col-lg-3 col-md-3">
                    <label>Deal Closing Date From</label>
                    <input type="date" value="<?php echo date("Y-m-d", strtotime("-30 days")); ?>" name="DealClosingDate1" class="form-control">
                  </div>
                  <div class="form-group col-lg-3 col-md-3">
                    <label>Deal Closing Date To</label>
                    <input type="date" value="<?php echo date("Y-m-d"); ?>" name="DealClosingDate2" class="form-control">
                  </div>
                  <div class="form-group col-lg-3 col-md-3">
                    <label>Deal Created Date From</label>
                    <input type="date" value="<?php echo date("Y-m-d", strtotime("-30 days")); ?>" name="DealCreatedAt1" class="form-control">
                  </div>
                  <div class="form-group col-lg-3 col-md-3">
                    <label>Deal Created Date To</label>
                    <input type="date" value="<?php echo date("Y-m-d"); ?>" name="DealCreatedAt2" class="form-control">
                  </div>
                  <div class="col-md-12 text-right">
                    <label>
                      <input type="checkbox" name="export-all" value="true"> Check This if you want to export all deals with filters.
                    </label>
                    <button name="export-reports" class="app-btn btn-md btn">Export Deals</button>
                    <br>
                  </div>
                </div>
              </form>
              <hr>
              <div class="row">
                <div class="col-md-12">
                  <table class="table table-striped" id="example">
                    <thead>
                      <tr>
                        <th>SNo</th>
                        <th>Name</th>
                        <th>Customer</th>
                        <th>Stage</th>
                        <th>DealType</th>
                        <th>Amount</th>
                        <th>Closing</th>
                        <th>CreatedAt</th>
                        <th>CreatedBy</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      if (isset($_GET['search'])) {
                        $search = SECURE($_GET['search'], "e");
                        $SelectDeals = FetchConvertIntoArray("SELECT * FROM deals where DealsName LIKE '%$search%'", true);
                      } else {
                        if (LOGIN_UserRoles == "Admin") {
                          $SelectDeals = FetchConvertIntoArray("SELECT * from deals ORDER BY DealsId DESC", true);
                        } else {
                          $SelectDeals = FetchConvertIntoArray("SELECT * from deals where DealCreatedBy='" . LOGIN_UserId . "' ORDER BY DealsId DESC", true);
                        }
                      }

                      if ($SelectDeals != null) {
                        $Count = 0;
                        foreach ($SelectDeals as $Deals) {
                          $Count++; ?>
                          <tr>
                            <td><?php echo $Count; ?></td>
                            <td>
                              <a href="" class="text-primary"><?php echo SECURE($Deals->DealsName, "d"); ?></a>
                            </td>
                            <td>
                              <a target="_blank" href="<?php echo DOMAIN; ?>/admin/customers/details/?viewdataid=<?php echo SECURE($Deals->DealCustomerId, "e"); ?>" class="text-info"><?php echo FETCH("SELECT * FROM customers where CustomerId='" . $Deals->DealCustomerId . "'", "CustomerDisplayName"); ?></a>
                            </td>
                            <td>
                              <?php echo SECURE($Deals->DealsStage, "d"); ?>
                            </td>
                            <td>
                              <?php echo SECURE($Deals->DealPrintType, "d"); ?>
                            </td>
                            <td>
                              <?php echo Price($Deals->DealAmount); ?>
                            </td>
                            <td>
                              <?php echo DATE_FORMATE2("d M, Y", $Deals->DealClosingDate); ?>
                            </td>
                            <td>
                              <?php echo DATE_FORMATE2("d M, Y", $Deals->DealCreatedAt); ?>
                            </td>
                            <td>
                              <a target="_blank" href="<?php echo DOMAIN; ?>/users/details/?viewid=<?php echo SECURE($Deals->DealCreatedBy, "d"); ?>" class="text-danger italic">
                                <?php echo FETCH("SELECT * FROM users where UserId='" . $Deals->DealCreatedBy . "'", "UserName"); ?>
                              </a>
                            </td>
                            <td>
                              <div class="btn-group-sm">
                                <a target="_blank" href="<?php echo DOMAIN; ?>/admin/deals/details/?viewdataid=<?php echo SECURE($Deals->DealsId, "e"); ?>" class="btn btn-sm btn-info"><i class="fa fa-eye"></i></a>
                                <a target="_blank" href="<?php echo DOMAIN; ?>/admin/deals/update-deals/?dataid=<?php echo SECURE($Deals->DealsId, "e"); ?>" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                                <?php
                                if (LOGIN_UserRoles == "Admin") {
                                  CONFIRM_DELETE_POPUP(
                                    "deals_" . $Deals->DealsId,
                                    $Reqeusts = [
                                      "delete_deals" => true,
                                      "control_id" => $Deals->DealsId
                                    ],
                                    "dealcontroller"
                                  );
                                }; ?>
                              </div>
                            </td>
                          </tr>
                      <?php }
                      } ?>
                    </tbody>
                  </table>
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