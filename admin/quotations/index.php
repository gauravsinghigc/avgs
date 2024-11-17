<?php

//required files
require '../../require/modules.php';
require '../../require/admin/access-control.php';
require '../../require/admin/sessionvariables.php';

//page variables
$PageName = "All Quotations";
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
      document.getElementById("app_quotations").classList.add("active");
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
                  <a href="add-quotation.php" class="btn btn-md btn-danger"><i class="fa fa-plus"></i> Create Quotations</a>
                </div>
              </div>
              <div class="row m-t-10">
                <div class="col-md-12">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>Sno</th>
                        <th>QuotationNo</th>
                        <th>CustomerName</th>
                        <th>Amount</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      if (isset($_GET['search'])) {
                        $search = $_GET['search'];
                        $Quotations = FetchConvertIntoArray("SELECT * FROM quotations where QuotationNo LIKE '%$search%'", true);
                      } else {
                        if (LOGIN_UserRoles == "Admin") {
                          $Quotations = FetchConvertIntoArray("SELECT * FROM quotations ORDER BY QuotationId DESC", true);
                        } else {
                          $Quotations = FetchConvertIntoArray("SELECT * FROM quotations where QuotationCreatedBy='" . LOGIN_UserId . "' ORDER BY QuotationId DESC", true);
                        }
                      }
                      $Quotations = FetchConvertIntoArray("SELECT * FROM quotations ORDER BY QuotationId DESC", true);
                      if ($Quotations != null) {
                        $Count = 0;
                        foreach ($Quotations as $Data) {
                          $Count++; ?>
                          <tr>
                            <td><?php echo $Count; ?></td>
                            <td><?php echo $Data->QuotationNo; ?></td>
                            <td><?php echo FETCH("SELECT * FROM customers where CustomerId='" . $Data->QuotationReceiver . "'", "CustomerDisplayName"); ?></td>
                            <td><?php echo Price($Data->QuotationAmount); ?></td>
                            <td><?php echo date("d M, Y", strtotime($Data->QuotationCreatedAt)); ?></td>
                            <td><?php echo $Data->QuotationStatus; ?></td>
                            <td width="20%">
                              <div class="flex-s-b">
                                <?php

                                $CheckInvoice = CHECK("SELECT * FROM invoices where quotationquotoid='" . $Data->QuotationId . "' and InvoiceStatus='Ordered'");
                                if ($CheckInvoice == null) {
                                  if (LOGIN_UserRoles == "Admin") { ?>
                                    <form action="../../controller/ordercontroller.php" method="POST">
                                      <input type="text" name="QuotationId" value="<?php echo SECURE($Data->QuotationId, "e"); ?>" hidden="">
                                      <?php FormPrimaryInputs(true); ?>
                                      <button type="submit" name="generateorder" value="true" class="btn btn-sm btn-primary">Generate Invoice</button>
                                    </form>
                                    <form action=" ../../controller/quotationcontroller.php" method="POST">
                                      <input type="text" name="QuotationId" value="<?php echo SECURE($Data->QuotationId, "e"); ?>" hidden="">
                                      <?php FormPrimaryInputs(true); ?>
                                      <button type="submit" name="cancelquotations" value="true" class="btn btn-sm btn-warning">Cancel Quotation</button>
                                    </form>
                                  <?php
                                  }
                                } else { ?>
                                  <span class="btn btn-sm btn-success"><i class="fa fa-check-circle"></i> Ordered</span>
                                <?php } ?>
                                <a target="_blank" href="send-quotation.php?qid=<?php echo SECURE($Data->QuotationId, "e"); ?>" class="btn btn-sm btn-info">Send to Email</a>
                                <a target="_blank" href="<?php echo DOMAIN; ?>/pi-with-discount.php?id=<?php echo SECURE($Data->QuotationId); ?>" class="btn btn-sm btn-primary">View PI</a>
                                <?php
                                if (LOGIN_UserRoles == "Admin") {
                                  CONFIRM_DELETE_POPUP(
                                    "delete_quoto",
                                    $Requests = [
                                      "delete_quoto_records" => true,
                                      "control_id" => $Data->QuotationId
                                    ],
                                    "quotationcontroller"
                                  );
                                } ?>
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