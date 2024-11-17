<?php
//require
require '../../require/modules.php';
require '../../require/admin/sessionvariables.php';

$PageName = "All Invoices";
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
          if (isset($_GET['filtered'])) {
            $InvoiceDate = $_GET['InvoiceDate'];
            $Quotations = FetchConvertIntoArray("SELECT * FROM quotations, invoices where quotations.QuotationId=invoices.quotationquotoid and InvoiceDate='$InvoiceDate'  ORDER BY QuotationId DESC", true);
          } else {
            $Quotations = FetchConvertIntoArray("SELECT * FROM quotations, invoices where quotations.QuotationId=invoices.quotationquotoid  ORDER BY QuotationId DESC", true);
          }
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
                <td><?php echo $InvoiceNumber; ?></td>
                <td><?php echo FETCH("SELECT * FROM customers where CustomerId='" . $Data->QuotationReceiver . "'", "CustomerDisplayName"); ?></td>
                <td><?php echo Price($Data->QuotationAmount); ?></td>
                <td><?php echo date("d M, Y", strtotime($Data->QuotationCreatedAt)); ?></td>
                <td><?php echo $InvoiceStatus; ?></td>
                <td width="20%">
                  <div class="flex-s-b">
                    <span class="btn btn-sm btn-success"><i class="fa fa-check-circle"></i> <?php echo $InvoiceStatus; ?></span>
                  </div>
                </td>
              </tr>
          <?php }
          } ?>
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