<?php

//required files
require '../../require/modules.php';
require '../../require/admin/access-control.php';
require '../../require/admin/sessionvariables.php';

//page variables
$PageName = "All Invoices";
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
      document.getElementById("app_invoices").classList.add("active");
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
              <div class="row m-t-10">
                <div class="col-md-12">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>Sno</th>
                        <th>InvoiceNo</th>
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
                        $Quotations = FetchConvertIntoArray("SELECT * FROM quotations, invoices where invoices.InvoiceNumber LIKE '%$search%' and quotations.QuotationId=invoices.quotationquotoid  ORDER BY QuotationId DESC", true);
                      } else {
                        if (LOGIN_UserRoles == "Admin") {
                          $Quotations = FetchConvertIntoArray("SELECT * FROM quotations, invoices where quotations.QuotationId=invoices.quotationquotoid  ORDER BY QuotationId DESC", true);
                        } else {
                          $Quotations = FetchConvertIntoArray("SELECT * FROM quotations, invoices where quotations.QuotationId=invoices.quotationquotoid  ORDER BY QuotationId DESC", true);
                        }
                      }
                      $Quotations = FetchConvertIntoArray("SELECT * FROM quotations, invoices where quotations.QuotationId=invoices.quotationquotoid  ORDER BY QuotationId DESC", true);
                      if ($Quotations != null) {
                        $Count = 0;
                        foreach ($Quotations as $Data) {
                          $Count++;
                          $InvoiceDate = FETCH("SELECT * FROM invoices where quotationquotoid='" . $Data->QuotationId . "'", "InvoiceDate");
                          $InvoiceNumber = FETCH("SELECT * FROM invoices where quotationquotoid='" . $Data->QuotationId . "'", "InvoiceNumber");
                          $InvoiceStatus = FETCH("SELECT * FROM invoices where quotationquotoid='" . $Data->QuotationId . "'", "InvoiceStatus");
                      ?>
                          <tr>
                            <td><?php echo $Count; ?></td>
                            <td><?php echo strip_tags($InvoiceNumber); ?></td>
                            <td><?php echo FETCH("SELECT * FROM customers where CustomerId='" . $Data->QuotationReceiver . "'", "CustomerDisplayName"); ?></td>
                            <td><?php echo Price($Data->QuotationAmount); ?></td>
                            <td><?php echo date("d M, Y", strtotime($Data->QuotationCreatedAt)); ?></td>
                            <td><?php echo $InvoiceStatus; ?></td>
                            <td>
                              <a target="_blank" href="send-invoice.php?invoiceid=<?php echo SECURE($Data->invoicesid, "e"); ?>" class="btn btn-sm btn-danger">Send Invoice on Mail</a>
                              <a target="_blank" href="invoice.php?orderid=<?php echo SECURE($Data->invoicesid, "e"); ?>" class="btn btn-sm btn-primary">View Invoice</a>
                              <?php CONFIRM_DELETE_POPUP(
                                "invoices",
                                $Requests = [
                                  "delete_invoices_records" => true,
                                  "control_id" => $Data->invoicesid
                                ],
                                "invoicecontroller"
                              ); ?>
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