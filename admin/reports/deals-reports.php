<?php
//require
require '../../require/modules.php';
require '../../require/admin/sessionvariables.php';

$PageName = "All Customers";
?>
<html>

<head>
  <title><?php echo $PageName; ?>@<?php echo date("d_M_Y"); ?></title>
  <?php require '../../include/admin/header_files.php'; ?>
  <style>
    table.table .table-striped,
    table.table .table-striped tr,
    table.table .table-striped th,
    table.table .table-striped td {
      font-size: 10px !important;
      padding: 0px !important;
    }
  </style>
</head>

<body onload="window.print()">
  <center>
    <div class="printable-area m-t-3" style="box-shadow:0px 0px 2px grey !important;width:1300px !important;">
      <?php
      include '../../include/admin/export-header.php'; ?>
      <h4 class="text-center m-t-0 bg-dark p-1" style="background-color:black !important;color:white !important;padding:5px !important;"><?php echo $PageName; ?></h4>


      <table class="table table-striped">
        <thead>
          <tr>
            <th>SNo</th>
            <th>Name</th>
            <th>Customer</th>
            <th>Stage</th>
            <th>PrintType</th>
            <th>Amount</th>
            <th>Closing</th>
            <th>CreatedAt</th>
            <th>CreatedBy</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $NetDealAmount = 0;
          if (isset($_GET['export-reports'])) {
            if (isset($_GET['export-all']) != true) {
              $DealsName = SECURE($_GET['DealsName'], "e");
              $DealCustomerCompanyName = $_GET['DealCustomerCompanyName'];
              $DealsStage = SECURE($_GET['DealsStage'], "e");
              $DealAmount = $_GET['DealAmount'];
              $DealPrintType = SECURE($_GET['DealPrintType'], "e");
              $DealCreatedBy = $_GET['DealCreatedBy'];
              $DealClosingDate1 = $_GET['DealClosingDate1'];
              $DealClosingDate2 = $_GET['DealClosingDate2'];
              $DealCreatedAt1 = $_GET['DealCreatedAt1'];
              $DealCreatedAt2 = $_GET['DealCreatedAt2'];
              $SelectDeals = FetchConvertIntoArray("SELECT * from deals where DATE(DealCreatedAt)>='$DealCreatedAt1' and DATE(DealCreatedAt)<='" . $DealCreatedAt2 . "' and DATE(DealClosingDate)>='$DealClosingDate1' and DATE(DealClosingDate)<='" . $DealClosingDate2 . "' and DealCustomerCompanyName='$DealCustomerCompanyName' and DealsStage='$DealsStage' and DealCreatedBy='$DealCreatedBy' and DealAmount='$DealAmount' and DealPrintType='$DealPrintType' ORDER BY DealsId DESC", true);
            } else {
              $SelectDeals = FetchConvertIntoArray("SELECT * from deals ORDER BY DealsId DESC", true);
            }

            if ($SelectDeals != null) {
              $Count = 0;
              $NetDealAmount = 0;
              foreach ($SelectDeals as $Deals) {
                $Count++;
                $NetDealAmount += (int)$Deals->DealAmount; ?>
                <tr>
                  <td><?php echo $Count; ?></td>
                  <td>
                    <?php echo SECURE($Deals->DealsName, "d"); ?>
                  </td>
                  <td>
                    <?php echo FETCH("SELECT * FROM customers where CustomerId='" . $Deals->DealCustomerId . "'", "CustomerDisplayName"); ?>
                  </td>
                  <td>
                    <?php echo SECURE($Deals->DealsStage, "d"); ?>
                  </td>
                  <td>
                    <?php echo SECURE($Deals->DealPrintType, "d"); ?>
                  </td>
                  <td class="text-center">
                    <?php echo Price($Deals->DealAmount); ?>
                  </td>
                  <td>
                    <?php echo DATE_FORMATE2("d M, Y", $Deals->DealClosingDate); ?>
                  </td>
                  <td>
                    <?php echo DATE_FORMATE2("d M, Y", $Deals->DealCreatedAt); ?>
                  </td>
                  <td>
                    <?php echo FETCH("SELECT * FROM users where UserId='" . $Deals->DealCreatedBy . "'", "UserName"); ?>
                  </td>

                </tr>
          <?php }
            }
          }
          ?>
          <tr>
            <td colspan="5" class="text-right">Total Deal Amount:</td>
            <td class="text-center fs-20"><?php echo Price($NetDealAmount); ?></td>
            <td colspan="3"></td>
          </tr>
        </tbody>
      </table>


      <?php include '../../include/admin/export-footer.php'; ?>
    </div>
    <?php
    require '../../include/admin/footer_files.php';
    ?>
  </center>
</body>

</html>