<?php

//required files
require '../../require/modules.php';
require '../../require/admin/access-control.php';
require '../../require/admin/sessionvariables.php';

//page variables
$PageName = "Select Billing Address";

if (isset($_GET['shippingat'])) {
 $ShippingAddressId = SECURE($_GET['shippingat'], "d");
 $_SESSION['BillingAddressId'] = $ShippingAddressId;
} else {
 $ShippingAddressId = $_SESSION['BillingAddressId'];
}
//page activity here
$SelectedDealId = $_SESSION['SelectedDealId'];
$CustomerId = FETCH("SELECT * FROM deals where DealsId='$SelectedDealId'", "DealCustomerId");
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
       <br>
       <div class="row">
        <div class="col-lg-4 col-md-4 col-12 col-sm-6">
         <h4 class="app-sub-heading">Select Billing Address</h4>
         <?php $SelectBillingAddress = FetchConvertIntoArray("SELECT * FROM customer_billing_address where CustomerId='$CustomerId'", true);
         if ($SelectBillingAddress != null) {
          foreach ($SelectBillingAddress as $Address) { ?>
           <div class="address">
            <p>
             <i class="fa fa-map-marker text-success"></i>
             <?php echo SECURE($Address->CustomerStreetAddress, "d"); ?> <?php echo $Address->CustomerCity; ?> <?php echo $Address->CustomerState; ?>
             <?php echo $Address->CustomerCountry; ?> - <?php echo $Address->CustomerPincode; ?>
            </p>
            <form action="../../controller/quotationcontroller.php" method="POST">
             <?php FormPrimaryInputs(true); ?>
             <input type="text" name="dealsid" value="<?php echo SECURE($SelectedDealId, "e"); ?>" hidden="">
             <input type="text" name="shippingat" value="<?php echo SECURE($ShippingAddressId, "e"); ?>" hidden="">
             <input type="text" name="billingat" value="<?php echo SECURE($Address->CustomerBillingAddress, "e"); ?>" hidden="">
             <button type="submit" name="CreateQuotations" class="btn btn-success btn-md">Select & Create Quotations</button>
            </form>
            <br>
           </div>
         <?php }
         } ?>
        </div>

        <div class="col-lg-8 col-md-8 col-12 col-sm-6">
         <h4 class="app-sub-heading">Add New Shippping Address</h4>

         <form action="../../controller/customercontroller.php" method="POST">
          <?php FormPrimaryInputs(true); ?>
          <div class="row">
           <div class="form-group col-lg-12 col-md-12 col-sm-12 col-12">
            <label>Street Address</label>
            <textarea name="CustomerStreetAddress1" id="Address11" class="form-control-2" style="height:100% !important;line-height:100% !important;" rows="4" required=""></textarea>
           </div>
           <div class="form-group col-lg-6 col-md-6 col-sm-6 col-6">
            <label>City</label>
            <input name="CustomerCity1" id="Address22" class="form-control-2" type="text" required="" placeholder="">
           </div>
           <div class="form-group col-lg-6 col-md-6 col-sm-6 col-6">
            <label>State</label>
            <input name="CustomerState1" id="Address33" class="form-control-2" type="text" required="" placeholder="">
           </div>
           <div class="form-group col-lg-6 col-md-6 col-sm-6 col-6">
            <label>Country</label>
            <input name="CustomerCountry1" id="Address44" class="form-control-2" type="text" required="" placeholder="">
           </div>
           <div class="form-group col-lg-6 col-md-6 col-sm-6 col-6">
            <label>Zip Code/Pincode</label>
            <input name="CustomerPincode1" id="Address55" class="form-control-2" type="text" required="" placeholder="">
           </div>
          </div>
          <div class="row">
           <div class="col-md-12 m-t-10">
            <button type="submit" name="AddNewBillingAddress" value="<?php echo SECURE($CustomerId, "e"); ?>" class="app-btn btn">Save Address</button>
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
 <script>
  function CopyAddress() {
   if (document.getElementById("copyaddress").checked) {
    document.getElementById("Address11").value = document.getElementById("Address1").value;
    document.getElementById("Address22").value = document.getElementById("Address2").value;
    document.getElementById("Address33").value = document.getElementById("Address3").value;
    document.getElementById("Address44").value = document.getElementById("Address4").value;
    document.getElementById("Address55").value = document.getElementById("Address5").value;
   } else {
    document.getElementById("Address11").value = "";
    document.getElementById("Address22").value = "";
    document.getElementById("Address33").value = "";
    document.getElementById("Address44").value = "";
    document.getElementById("Address55").value = "";
   }
  }
 </script>

 <?php include '../../include/admin/footer_files.php'; ?>
</body>

</html>