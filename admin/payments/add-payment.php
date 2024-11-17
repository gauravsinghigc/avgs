<?php

//required files
require '../../require/modules.php';
require '../../require/admin/access-control.php';
require '../../require/admin/sessionvariables.php';

//page variables
$PageName = "ADD Payments";
if (isset($_GET['CustomerId'])) {
   $CustomerId = $_GET['CustomerId'];
   $_SESSION['CustomerId'] = $CustomerId;
} elseif (isset($_SESSION['CustomerId'])) {
   $CustomerId = $_SESSION['CustomerId'];
} else {
   $CustomerId = null;
}
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
                        <a href="add-payment.php" class="btn btn-sm btn-danger">Add Payments</a>
                     </div>
                     <div class="row m-t-10">
                        <div class="col-md-12">
                           <form action="" METHOD="GET">
                              <div class="form-group">
                                 <label>Select Customer</label>
                                 <select name="CustomerId" onchange="form.submit()" class="form-control-2" required="">
                                    <option value="">Select Customer</option>
                                    <?php
                                    $result = SELECT("SELECT * FROM customers ORDER BY CustomerDisplayName");
                                    while ($row = mysqli_fetch_assoc($result)) {
                                       echo '<option value="' . $row['CustomerId'] . '">' . $row['CustomerDisplayName'] . '</option>';
                                    }
                                    ?>
                                 </select>
                              </div>
                           </form>
                        </div>
                     </div>
                     <br>
                     <?php if (isset($_SESSION['CustomerId'])) { ?>
                        <div class="row">
                           <div class="col-lg-4 col-md-4 col-sm-5 col-12">
                              <h4 class="app-sub-heading">Customer Details</h4>
                              <?php
                              $CustomerId = $_SESSION['CustomerId'];
                              $PageSqls = "SELECT * FROM customers where CustomerId='$CustomerId'"; ?>
                              <table class="table table-striped">
                                 <tr>
                                    <th>
                                       CustomerId
                                    </th>
                                    <td>
                                       C00<?php echo GET_DATA("CustomerId"); ?>
                                    </td>
                                 </tr>
                                 <tr>
                                    <th>
                                       Company Name
                                    </th>
                                    <td>
                                       <?php echo GET_DATA("CompanyName"); ?>
                                    </td>
                                 </tr>
                                 <tr>
                                    <th>
                                       Display Name
                                    </th>
                                    <td class="text-primary">
                                       <?php echo GET_DATA("CustomerDisplayName"); ?>
                                    </td>
                                 </tr>
                                 <tr>
                                    <th>
                                       Work Phone
                                    </th>
                                    <td class="text-info">
                                       <?php echo GET_DATA("CustomerWorkPhone"); ?>
                                    </td>
                                 </tr>
                                 <tr>
                                    <th>
                                       Mobile Phone
                                    </th>
                                    <td class="text-info">
                                       <?php echo GET_DATA("CustomerMobilePhone"); ?>
                                    </td>
                                 </tr>
                                 <tr>
                                    <th>
                                       Email Id
                                    </th>
                                    <td class="text-primary">
                                       <?php echo GET_DATA("CustomerEmailId"); ?>
                                    </td>
                                 </tr>
                                 <tr>
                                    <th>
                                       2nd Email Id
                                    </th>
                                    <td class="text-primary">
                                       <?php echo GET_DATA("CustomerSecondaryEmail"); ?>
                                    </td>
                                 </tr>
                                 <tr>
                                    <th>
                                       Other Email-ID
                                    </th>
                                    <td class="text-primary">
                                       <?php echo GET_DATA("CustomerOtherEmail"); ?>
                                    </td>
                                 </tr>
                                 <tr>
                                    <th>
                                       Website
                                    </th>
                                    <td class="text-info">
                                       <a href="<?php echo GET_DATA("CustomerWebsite"); ?>"><?php echo GET_DATA("CustomerWebsite"); ?></a>
                                    </td>
                                 </tr>
                                 <tr>
                                    <th>
                                       Remarks & Notes
                                    </th>
                                    <td class="text-info">
                                       <?php echo SECURE(GET_DATA("CustomerRemarks"), 'd'); ?>
                                    </td>
                                 </tr>
                                 <tr>
                                    <th>
                                       CreatedBy
                                    </th>
                                    <td class="text-info">
                                       <?php echo $Createdby = FETCH("SELECT * from users where UserId='" . GET_DATA("CustomerCreatedBy") . "'", "UserName"); ?> (UID<?php echo GET_DATA("CustomerCreatedBy"); ?>)
                                    </td>
                                 </tr>
                              </table>
                           </div>
                           <div class="col-md-4 col-lg-4 col-sm-4 col-12">
                              <h4 class="app-sub-heading">Available Invoices</h4>
                              <form action="" method="GET">
                                 <div class="form-group">
                                    <label>
                                       Select Invoice
                                    </label>
                                    <select name="PaidInvoiceId" onchange="form.submit()" class="form-control-2 fs-12" required="">
                                       <option value="0">Choose One Invoice</option>
                                       <?php
                                       $FetchQuotations = FetchConvertIntoArray("SELECT * FROM quotations where QuotationReceiver='" . $_SESSION['CustomerId'] . "'", true);
                                       if ($FetchQuotations != null) {
                                          foreach ($FetchQuotations as $Data) {
                                             $QuotationId = $Data->QuotationId;
                                             $InvoiceNumber = FETCH("SELECT * from invoices where quotationquotoid='$QuotationId'", "InvoiceNumber");
                                             if ($InvoiceNumber == null) {
                                             } else {
                                                $invoicesid = FETCH("SELECT * from invoices where quotationquotoid='$QuotationId'", "invoicesid");
                                                $InvoiceDate = FETCH("SELECT * from invoices where quotationquotoid='$QuotationId'", "InvoiceDate");
                                                $QuotationAmount = $Data->QuotationAmount;
                                                $InvoiceNumber = $InvoiceNumber . " : " . "Rs." . $QuotationAmount;
                                       ?>
                                                <option value="<?php echo $invoicesid; ?>"><?php echo $InvoiceNumber; ?></option>
                                       <?php
                                             }
                                          }
                                       } ?>
                                    </select>
                                 </div>
                              </form>
                           </div>

                           <div class="col-md-4 col-lg-4 col-sm-4 col-12">
                              <h4 class="app-sub-heading">Receive Payments</h4>
                              <form action="<?php echo CONTROLLER; ?>/paymentcontroller.php" method="POST">
                                 <?php
                                 if (isset($_GET['PaidInvoiceId'])) {
                                    $PaidInvoiceId = $_GET['PaidInvoiceId'];
                                    $quotationquotoid = FETCH("SELECT * from invoices where invoicesid='$PaidInvoiceId'", "quotationquotoid");
                                    $QuotationAmount = FETCH("SELECT * from quotations where QuotationId='$quotationquotoid'", "QuotationAmount");
                                 } else {
                                    $QuotationAmount = 0;
                                    $PaidInvoiceId = null;
                                 } ?>
                                 <?php FormPrimaryInputs(true); ?>
                                 <input type="text" name="PaidCustomerId" value="<?php echo SECURE($_SESSION['CustomerId'], "e"); ?>" hidden="">
                                 <input type="text" name="PaidInvoiceId" value="<?php echo $PaidInvoiceId; ?>" hidden="">
                                 <div class="form-group">
                                    <label>Paid Amount</label>
                                    <input type="text" name="PaidAmount" value="<?php echo $QuotationAmount; ?>" class="form-control-2" required="">
                                 </div>
                                 <div class="form-group">
                                    <label>Payment Mode</label>
                                    <select class="form-control-2" name="PaymentMode" required="">
                                       <option value="Cash"> Cash Payment</option>
                                       <option value="Cheque"> Cheque Payment</option>
                                       <option value="NetBanking"> Netbanking Payment</option>
                                       <option value="Wallet/Online"> Wallet/Online Payment</option>
                                    </select>
                                 </div>
                                 <div class="form-group">
                                    <label>Payment Date</label>
                                    <input type="date" value="<?php echo date("Y-m-d"); ?>" name="PaidDate" class="form-control-2" required="">
                                 </div>
                                 <div class="form-group">
                                    <label>Payment Reference Number</label>
                                    <input type="text" name="PaymentRefnumber" class="form-control-2" required="">
                                 </div>
                                 <div class="form-group">
                                    <label>Payment Notes</label>
                                    <textarea class="form-control-2" style="height:100% !important;" rows="5" name="PaymentDescriptions"></textarea>
                                 </div>
                                 <br><br>
                                 <button name="PaymentReceived" class="btn app-btn" type="submit">Receive Payment</button>
                              </form>
                           </div>
                        </div>
                     <?php } ?>
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