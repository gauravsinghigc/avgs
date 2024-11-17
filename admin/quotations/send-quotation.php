<?php

//required files
require '../../require/modules.php';
require '../../require/admin/access-control.php';
require '../../require/admin/sessionvariables.php';

//page variables
$PageName = "Send Quotation On Mail";
if (isset($_GET['qid'])) {
 $invoiceid = SECURE($_GET['qid'], "d");
 $_SESSION['qid'] = $invoiceid;
} else {
 $invoiceid = $_SESSION['qid'];
}

$quotationquotoid = $invoiceid;
$QuotationId = $quotationquotoid;
$QuotationReceiver = FETCH("SELECT * from quotations where QuotationId='" . $quotationquotoid . "'", "QuotationReceiver");
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
        <div class="col-md-6">
         <form action="../../controller/quotationcontroller.php" method="POST">
          <?php FormPrimaryInputs(true); ?>
          <input type="text" name="invoiceid" value="<?php echo SECURE($invoiceid, "e"); ?>" hidden="">
          <div class="form-group">
           <label>Select Available Emails of Customer</label>
           <?php
           $GetCustomerEmails = SELECT("SELECT * FROM customers where CustomerId='$QuotationReceiver'");
           while ($FetchEmails = mysqli_fetch_array($GetCustomerEmails)) { ?>
            <span>
             <input type="checkbox" name="emails[]" value="<?php echo $FetchEmails['CustomerEmailId']; ?>"> <?php echo $FetchEmails['CustomerEmailId']; ?> @ <?php echo $FetchEmails['CustomerDisplayName']; ?><br>
             <input type="checkbox" name="emails[]" value="<?php echo $FetchEmails['CustomerSecondaryEmail']; ?>"> <?php echo $FetchEmails['CustomerSecondaryEmail']; ?> @ <?php echo $FetchEmails['CustomerDisplayName']; ?><br>
             <input type="checkbox" name="emails[]" value="<?php echo $FetchEmails['CustomerOtherEmail']; ?>"> <?php echo $FetchEmails['CustomerOtherEmail']; ?> @ <?php echo $FetchEmails['CustomerDisplayName']; ?><br>
            </span>
           <?php   } ?>
           <?php
           $GetCustomerEmails = SELECT("SELECT * FROM customer_contact_person where CustomerId='$QuotationReceiver'");
           while ($FetchEmails = mysqli_fetch_array($GetCustomerEmails)) { ?>
            <span>
             <input type="checkbox" name="emails[]" value="<?php echo $FetchEmails['CustomerContactPersonEmailId']; ?>"> <?php echo $FetchEmails['CustomerContactPersonEmailId']; ?> @ <?php echo $FetchEmails['CustomerContactPersonName']; ?><br>
             <input type="checkbox" name="emails[]" value="<?php echo $FetchEmails['CustomerContactPersonWorkEmailId']; ?>"> <?php echo $FetchEmails['CustomerContactPersonWorkEmailId']; ?> @ <?php echo $FetchEmails['CustomerContactPersonName']; ?><br>
            </span>
           <?php   } ?>
          </div>
          <div class="form-group">
           <p class="text-danger"><b>*</b> Quotation file is already attached with the mails. No need to search and attach invoice</p>
           <span class="btn bt-lg btn-info"><i class="fa fa-check-circle-o"></i> Attahced Quotation No : <?php echo FETCH("SELECT * FROM quotations where QuotationId='$QuotationId'", "QuotationNo"); ?></span>
          </div>
          <div class="form-group">
           <label>Email Message Body</label>
           <textarea name="mailbody" value="" class="form-control" rows="5"></textarea>
          </div>
          <div class="">
           <button type="submit" name="SendQuototationOnMail" class="btn app-btn">Send Mail</button>

           <a href="index.php" class="btn btn-lg btn-default">Back to All</a>
          </div>
         </form>
        </div>
        <div class="col-md-6">
         <h4 class="app-heading">Add More Person</h4>
         <form action="../../../controller/customercontroller.php" method="POST">
          <?php FormPrimaryInputs(true); ?>
          <div class="row">
           <div class="col-md-12">
            <h4>Contact Person</h4>
           </div>
           <div id="contactperson" class="border-bottom">
            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-6">
             <label>Person Name</label>
             <input name="CustomerContactPersonName" type="text" value="" class="form-control-2">
            </div>
            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-6">
             <label>Person Phone</label>
             <input name="CustomerContactPersonPhone" type="text" value="" class="form-control-2">
            </div>
            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-6">
             <label>Person Email</label>
             <input name="CustomerContactPersonEmailId" type="email" value="" class="form-control-2">
            </div>
            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-6">
             <label>Person Work Email</label>
             <input name="CustomerContactPersonWorkEmailId" type="email" value="" class="form-control-2">
            </div>
            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-6">
             <label>Person Designation</label>
             <input name="CustomerContactPersonDesignation" type="text" value="" class="form-control-2">
            </div>
            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-6">
             <label>Person Department</label>
             <input name="CustomerContactPersonDepartment" type="text" value="" class="form-control-2">
            </div>
            <div class="col-md-12">
             <hr>
            </div>
            <div class="col-md-12">
             <button class="btn app-btn" type="submit" name="SaveNewPerson" value="<?php echo SECURE($QuotationReceiver, "e"); ?>">Save Details</button>
             <a href="index.php" class="btn btn-lg btn-default">Back to Profile</a>
            </div>
           </div>
          </div>
         </form>
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