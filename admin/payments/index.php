<?php

//required files
require '../../require/modules.php';
require '../../require/admin/access-control.php';
require '../../require/admin/sessionvariables.php';

//page variables
$PageName = "All Payments";
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
      document.getElementById("app_transactions").classList.add("active");
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
              <div class="flex-s-b app-heading">
                <h4 class="m-b-0"><?php echo $PageName; ?></h4>
                <a target="_blank" href="add-payment.php" class="btn btn-sm btn-danger">Add Payments</a>
              </div>
              <div class="row m-t-10">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>Sno</th>
                      <th>CustomerName</th>
                      <th>PaidAmount</th>
                      <th>PaidDate</th>
                      <th>PaidMode</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <?php
                  $fetchPayments = FetchConvertIntoArray("SELECT * FROM payments ORDER BY PaymentId", true);
                  if ($fetchPayments != null) {
                    $Count = 0;
                    foreach ($fetchPayments as $Data) {
                      $Count++; ?>
                      <tr>
                        <td><?php echo $Count; ?></td>
                        <td><?php echo FETCH("SELECT * FROM customers where CustomerId='" . $Data->PaidCustomerId . "'", "CustomerDisplayName"); ?></td>
                        <td><?php echo Price($Data->PaidAmount); ?></td>
                        <td><?php echo $Data->PaidDate; ?></td>
                        <td><?php echo $Data->PaymentMode; ?></td>
                        <td>
                          <a target="_blank" href="<?php echo DOMAIN; ?>/pay-receipt.php?id=<?php echo SECURE($Data->PaymentId, "e"); ?>" target="blank" class="btn btn-sm btn-primary">View Receipt</a>
                          <?php CONFIRM_DELETE_POPUP(
                            "payments",

                            $Requests = [
                              "delelte_payment_records" => true,
                              "control_id" => $Data->PaymentId
                            ],
                            "paymentcontroller",
                            "<i class='fa fa-trash'></i>",
                            "btn btn-sm btn-danger"
                          ) ?>
                        </td>
                      </tr>
                  <?php }
                  }
                  ?>
                </table>
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