<?php

//required files
require '../../require/modules.php';
require '../../require/admin/access-control.php';
require '../../require/admin/sessionvariables.php';

//page variables
$PageName = "Create Quotations";
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
       <div class="row m-t-10">
        <div class="col-md-12">
         <h4>Select Deals that Qualify for Quotations & Create Quotation for it.</h4>
        </div>
       </div>
       <div class="row m-b-10">
        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
         <form action="" method="GET">
          <label>Select Deals</label>
          <select name="dealsid" class="form-control-2" onchange="form.submit()">
           <option value="">Select Deals</option>
           <?php
           $FetchAllDeals = FetchConvertIntoArray("SELECT * FROM deals", true);
           if ($FetchAllDeals != null) {
            foreach ($FetchAllDeals as $Deals) {
             echo '<option value="' . SECURE($Deals->DealsId, "e") . '">' . SECURE($Deals->DealsName, 'd') . ' : Rs.' . $Deals->DealAmount . '</option>';
            }
           } else {
            echo '<option value="">No Deals Found</option>';
           }  ?>
          </select>
         </form>
        </div>
       </div>
       <div class="row">
        <?php if (isset($_GET['dealsid'])) { ?>
         <div class="col-lg-6 col-md-6 col-sm-6 col-12">
          <h4 class="app-sub-heading">Deal Details</h4>
          <div class="row">
           <?php
           $DealsId = SECURE($_GET['dealsid'], 'd');
           $SelectDeals = FetchConvertIntoArray("SELECT * from deals where DealsId='$DealsId' ORDER BY DealsId DESC", true);
           if ($SelectDeals != null) {
            $Count = 0;
            foreach ($SelectDeals as $Deals) {
             $Count++; ?>
             <div class="col-lg-12 col-md-12 col-sm-12 col-12 col-12">
              <a href="<?php echo DOMAIN; ?>/admin/deals/update-deals/?dataid=<?php echo SECURE($Deals->DealsId, "e"); ?>">
               <div class="quato-area">
                <b class="fs-15"><?php echo SECURE($Deals->DealsName, "d"); ?></b>
                <span class="flex-s-b">
                 <span class="text-grey fs-12"> DEALID<?php echo $Count; ?> : <?php echo DATE_FORMATE2("d M, Y", $Deals->DealCreatedAt); ?></span>
                 <span class="text-grey fs-12"> Closing Date: <?php echo DATE_FORMATE2("d M, Y", $Deals->DealClosingDate); ?></span>
                </span>
                <hr>
                <p class="mb-0">
                 <i><b> Status:</b> <?php echo SECURE($Deals->DealsStage, "d"); ?></i><br>
                 <span><b> Type:</b> <?php echo SECURE($Deals->DealPrintType, "d"); ?></span><br>
                </p>
                <p class="">
                 <span class="price-box"> <?php echo Price($Deals->DealAmount); ?></span><br>
                 <span class="text-grey fs-12"> <?php echo html_entity_decode(SECURE($Deals->DealDescriptions, "d")); ?></span>

                </p>
               </div>
              </a>
             </div>
           <?php }
           } ?>
          </div>
          <div class="row">
           <div class="col-md-12">
            <h4 class="app-sub-heading">Deal Products</h4>
           </div>
           <div class="col-md-12">
            <table class="table table-striped">
             <thead>
              <tr>
               <th>SNo</th>
               <th>ProductName</th>
               <th>SalePrice</th>
               <th>Total</th>
               <th>Taxes</th>
               <th>Total</th>
              </tr>
             </thead>
             <tbody>
              <?php
              $Sno = 0;
              $TotalDealProductAmount = 0;
              $TotalTaxes = 0;
              $TotalNetPayable = 0;
              $FetchDealProducts = FetchConvertIntoArray("SELECT * FROM deal_products where DealDealId='$DealsId'", true);
              if ($FetchDealProducts == null) {
              } else {
               foreach ($FetchDealProducts as $Request) {
                $Sno++;
                $TotalDealProductAmount += $Request->DealProductTotalPrice;
                $TotalTaxes += $Request->DealProductChargeAmount;
                $TotalNetPayable += $Request->DealProductTotalPrice + $Request->DealProductChargeAmount;
              ?>
                <tr>
                 <td><?php echo $Sno; ?></td>
                 <td><?php echo $Request->DealProductName; ?></td>
                 <td><?php echo Price($Request->DealProductSalePrice); ?> x <?php echo $Request->DealProductQuantity; ?></td>
                 <td><?php echo Price($Request->DealProductTotalPrice); ?></td>
                 <td>+<?php echo Price($Request->DealProductChargeAmount); ?> (<?php echo $Request->DealProductChargeType; ?>%)</td>
                 <td><?php echo Price($Request->DealProductNetTotalAmount); ?></td>
                </tr>
              <?php }
              } ?>
             </tbody>
             <tr>
              <th colspan="5" class="text-right" align="right"><span class="m-r-20 fs-19">Sub Total </span></th>
              <td> <span class="text-black fs-19"> <?php echo Price($TotalDealProductAmount); ?></span></td>
             </tr>
             <tr>
              <th colspan="5" class="text-right" align="right"><span class="m-r-20 fs-19">Taxes Total </span></th>
              <td> <span class="text-black fs-19"> <?php echo Price($TotalTaxes); ?></span></td>
             </tr>
             <tr>
              <th colspan="5" class="text-right" align="right"><span class="m-r-20 fs-19">Net Payable Amount </span></th>
              <td> <span class="text-black fs-19"> <?php echo Price($TotalNetPayable); ?></span></td>
             </tr>
            </table>
           </div>
          </div>
         </div>
         <div class="col-md-6 col-lg-6 col-sm-6 col-12">
          <h4 class="app-sub-heading">Customer Details</h4>
          <?php
          $CustomerId = FETCH("SELECT * FROM deals where DealsId='$DealsId'", "DealCustomerId");
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
           <tr>
            <th>
             CreatedAt
            </th>
            <td class="text-info">
             <?php echo ReturnValue(GET_DATA("CustomerCreatedAt")); ?>
            </td>
           </tr>
           <tr>
            <th>
             UpdatedAt
            </th>
            <td class="text-info">
             <?php echo ReturnValue(GET_DATA("CustomerUpdatedAt")); ?>
            </td>
           </tr>
          </table>
          <div class="col-md-12 text-right">
           <a href="shipping-address.php?viewid=<?php echo SECURE($DealsId, "e"); ?>" class="btn btn-lg btn-primary">Continue</a>
          </div>
         </div>

        <?php } ?>
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