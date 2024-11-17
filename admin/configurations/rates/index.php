<?php

//required files
require "../../../require/auto/admin-auto-load.php";

//page variables
$PageName = "Rate Configurations";
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
              <div class="row">
                <div class="col-md-3">
                  <h4 class="app-sub-heading">Search Rates By</h4>
                  <form>
                    <div class="form-group">
                      <label>Search Rate Type</label>
                      <select name="RateConfigType" class="form-control mb-1">
                        <?php InputOptions(["GOC RATE", "BANK RATE"]); ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Search For Date</label>
                      <input type="date" class="form-control mb-1" name="RateConfigDate" value="<?php echo date('Y-m-d'); ?>">
                    </div>
                    <div class="form-group">
                      <label>Enter Value</label>
                      <input type="text" class="form-control mb-1" name="RateConfigValue" value="">
                    </div>
                    <div class="form-group">
                      <br>
                      <button type="submit" name="SearchRateConfigs" class="btn btn-md btn-success"><i class="fa fa-search"></i> Search Rates</button>
                    </div>
                  </form>
                </div>
                <div class=" col-md-9">
                  <h4 class="app-heading"><?php echo $PageName; ?></h4>
                  <?php if (isset($_GET['RateConfigType'])) { ?>
                    <div class="flex-s-b bg-info p-1">
                      <p class="p-1r mb-0">
                        <span><b>Type:</b> <?php echo $_GET['RateConfigType']; ?></span>,
                        <span><b>Date:</b> <?php echo $_GET['RateConfigDate']; ?></span>,
                        <span><b>Value:</b> <?php echo $_GET['RateConfigValue']; ?></span>,
                      </p>
                      <a href="index.php" class="btn btn-md btn-primary">Clear <i class="fa fa-times"></i></a>
                    </div>
                    <BR>
                  <?php } ?>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>Sno</th>
                          <th>Currency</th>
                          <th>RateType</th>
                          <th>RateMonth</th>
                          <th>Value</th>
                          <th>CreatedAt</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <?php
                      if (isset($_GET['RateConfigType'])) {
                        $RateConfigType = $_GET['RateConfigType'];
                        $RateConfigDate = $_GET['RateConfigDate'];
                        $RateConfigValue = $_GET['RateConfigValue'];
                        $DB_Fetch = FetchConvertIntoArray("SELECT * FROM configs_rates where RateConfigType like '%$RateConfigType%' and DATE(RateConfigDate) like '%$RateConfigDate%' and RateConfigValue like '%$RateConfigValue%' ORDER BY DATE(RateConfigDate) DESC", true);
                      } else {
                        $DB_Fetch = FetchConvertIntoArray("SELECT * FROM configs_rates ORDER BY DATE(RateConfigDate) DESC", true);
                      }
                      if ($DB_Fetch == null) {
                        NoDataTableView("No Rate Configurations Found", "7");
                      } else {
                        $SNo = 0;
                        foreach ($DB_Fetch as $Data) {
                          $SNo++; ?>
                          <tr>
                            <td><?php echo $SNo; ?></td>
                            <td><?php echo $Data->RateConfigCurrentId; ?></td>
                            <td><?php echo $Data->RateConfigType; ?></td>
                            <td><?php echo DATE_FORMATE2("d M, Y", $Data->RateConfigDate); ?></td>
                            <td><?php echo $Data->RateConfigValue; ?></td>
                            <td><?php echo DATE_FORMATE2("d M, Y", $Data->RateConfigCreatedAt); ?></td>
                            <td><?php echo $Data->RateConfigStatus; ?></td>
                            <td>
                              <div class="btn-group btn-group-sm">
                                <a href="edit.php?viewid=<?php echo SECURE($Data->RateConfigId, "e"); ?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                <?php
                                if (LOGIN_UserRoles == "Admin") {
                                  CONFIRM_DELETE_POPUP(
                                    "config_rates",
                                    [
                                      "delete_rate_configs" => true,
                                      "control_id" => $Data->RateConfigId
                                    ],
                                    "configcontroller",
                                    "<i class='fa fa-trash'></i>",
                                    "btn btn-sm btn-danger"
                                  );
                                } ?>
                              </div>
                            </td>
                          </tr>
                      <?php }
                      } ?>
                    </table>
                  </div>
                </div>
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

  <?php include '../../../include/admin/footer_files.php'; ?>
</body>

</html>