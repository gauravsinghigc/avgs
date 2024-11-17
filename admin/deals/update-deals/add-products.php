<?php

//required files
$PageDirLevel = "../../../";
require $PageDirLevel . "require/auto/admin-auto-load.php";

//page variables
$PageName = "Add Products to Deals";

if (isset($_GET['viewid'])) {
 $DealId = SECURE($_GET['viewid'], "d");
 $_SESSION['DealsId'] = $DealId;
} else {
 $DealId = $_SESSION['DealsId'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title><?php echo $PageName; ?> | <?php echo APP_NAME; ?></title>
 <?php include $PageDirLevel . 'include/admin/header_files.php'; ?>
 <style>
  .form-control-2 {
   font-size: 1rem !important;
  }
 </style>
 <script>
  var ProductSalePrices = 0;
  var ProductNetPayable = 0;
 </script>
</head>

<body>
 <div id="container" class="effect mainnav-lg navbar-fixed mainnav-fixed">
  <?php include $PageDirLevel . 'include/admin/header.php'; ?>

  <div class="boxed">
   <!--CONTENT CONTAINER-->
   <!--===================================================-->
   <div id="content-container">
    <div id="page-content">
     <!--====start content===============================================-->

     <div class="panel">
      <div class="panel-body">
       <div class="row">
        <div class="col-md-12">
         <h4 class="app-heading"><?php echo $PageName; ?></h4>
        </div>
       </div>

       <div class="row">
        <form action="" method="GET" class="p-2r">
         <table class="table table-striped" id="example">
          <thead>
           <tr>
            <th>#</th>
            <th>Image</th>
            <th>ProductName</th>
            <th>Price</th>
            <th>Type</th>
           </tr>
          </thead>
          <?php
          $SQLproducts = SELECT("SELECT * FROM products, pro_categories, pro_sub_categories, pro_brands where products.ProductCategoryId=pro_categories.ProCategoriesId and products.ProductSubCategoryId=pro_sub_categories.ProSubCategoriesId and products.ProductBrandId=ProBrandId ORDER BY products.ProductId ASC");
          while ($fetchpro_brands = mysqli_fetch_array($SQLproducts)) {
           $ProductName = $fetchpro_brands['ProductName'];
           $ProBrandName = $fetchpro_brands['ProBrandName'];
           $ProCategoryName = $fetchpro_brands['ProCategoryName'];
           $ProSubCategoryName = $fetchpro_brands['ProSubCategoryName'];
           $ProductRefernceCode = $fetchpro_brands['ProductRefernceCode'];
           $ProductImage = $fetchpro_brands['ProductImage'];
           $ProductCategoryId = $fetchpro_brands['ProductCategoryId'];
           $ProductSubCategoryId = $fetchpro_brands['ProductSubCategoryId'];
           $ProductBrandId = $fetchpro_brands['ProductBrandId'];
           $ProductSellPrice = $fetchpro_brands['ProductSellPrice'];
           $ProductMrpPrice = $fetchpro_brands['ProductMrpPrice'];
           $ProductDescriptions = SECURE($fetchpro_brands['ProductDescriptions'], "e");
           $ProductWeight = $fetchpro_brands['ProductWeight'];
           $ProductStatus = StatusView($fetchpro_brands['ProductStatus']);
           $ProductCreatedAt = $fetchpro_brands['ProductCreatedAt'];
           $ProductUpdatedAt = ReturnValue($fetchpro_brands['ProductUpdatedAt']);
           $ProductCreatedBy = $fetchpro_brands['ProductCreatedBy'];
           $ProductId = $fetchpro_brands['ProductId'];
           $ProductType = $fetchpro_brands['ProductType'];
           if (isset($_GET['ProductId'])) {
            if (in_array($ProductId, $_GET['ProductId'])) {
             $checked = "checked=''";
            } else {
             $checked = "";
            }
           } else {
            $checked = '';
           } ?>
           <tr>
            <td>
             <input type="checkbox" class="select-input" name="ProductId[]" value="<?php echo $ProductId; ?>" <?php echo $checked; ?> onchange="form.submit()">
            </td>
            <td>
             <img src="<?php echo STORAGE_URL; ?>/products/pro-img/<?php echo $ProductImage; ?>" alt="<?php echo $ProductName; ?>" title="<?php echo $ProductName; ?>" class="w-100 icon2">
            </td>
            <td class="lh-1-0">
             <span class="fs-15 bold m-t-3"><?php echo $ProductName; ?> <span class="text-grey">(<?php echo $ProductRefernceCode; ?>)</span></span><br>
             <span class="fs-12 text-grey">
              <span><b>Weight: </b><?php echo $ProductWeight; ?></span> |
              <span><b>Category: </b><?php echo $ProCategoryName; ?></span> |
              <span><b>Sub Category : </b><?php echo $ProSubCategoryName; ?></span> |
              <span><b>Publisher: </b><?php echo $ProBrandName; ?></span>
             </span>
            </td>
            <td>
             <span class="sell">Rs.<?php echo $ProductSellPrice; ?></span>
            </td>
            <td>
             <?php echo $ProductType; ?>
            </td>
           </tr>
          <?php } ?>
         </table>
        </form>
       </div>

       <form action="../../../controller/dealcontroller.php" method="POST">

        <?php FormPrimaryInputs(true); ?>
        <div class="row">
         <div class="col-md-12">
          <h4 class="app-sub-heading">Update Product Quantity & Price</h4>
         </div>
        </div>
        <div class="row">
         <div class="col-md-12">
          <table class="table table-striped">
           <?php if (isset($_GET['ProductId'])) { ?>
            <thead>
             <tr>
              <th>Image</th>
              <th>ItemDetail</th>
              <th width="15%">SalePrice</th>
              <th width="10%">Qty</th>
              <th width="17%" align="right" class="text-right">Total</th>
             </tr>
            </thead>
           <?php } ?>
           <?php
           if (isset($_GET['ProductId'])) {
            foreach ($_GET['ProductId'] as $ProductViewId) {
             $SQLproducts = SELECT("SELECT * FROM products, pro_categories, pro_sub_categories, pro_brands where products.ProductId='$ProductViewId' and products.ProductCategoryId=pro_categories.ProCategoriesId and products.ProductSubCategoryId=pro_sub_categories.ProSubCategoriesId and products.ProductBrandId=ProBrandId ORDER BY products.ProductId ASC");
             while ($fetchpro_brands = mysqli_fetch_array($SQLproducts)) {
              $ProductName = $fetchpro_brands['ProductName'];
              $ProBrandName = $fetchpro_brands['ProBrandName'];
              $ProCategoryName = $fetchpro_brands['ProCategoryName'];
              $ProSubCategoryName = $fetchpro_brands['ProSubCategoryName'];
              $ProductRefernceCode = $fetchpro_brands['ProductRefernceCode'];
              $ProductImage = $fetchpro_brands['ProductImage'];
              $ProductCategoryId = $fetchpro_brands['ProductCategoryId'];
              $ProductSubCategoryId = $fetchpro_brands['ProductSubCategoryId'];
              $ProductBrandId = $fetchpro_brands['ProductBrandId'];
              $ProductSellPrice = $fetchpro_brands['ProductSellPrice'];
              $ProductMrpPrice = $fetchpro_brands['ProductMrpPrice'];
              $ProductDescriptions = SECURE($fetchpro_brands['ProductDescriptions'], "e");
              $ProductWeight = $fetchpro_brands['ProductWeight'];
              $ProductStatus = StatusView($fetchpro_brands['ProductStatus']);
              $ProductCreatedAt = $fetchpro_brands['ProductCreatedAt'];
              $ProductUpdatedAt = ReturnValue($fetchpro_brands['ProductUpdatedAt']);
              $ProductCreatedBy = $fetchpro_brands['ProductCreatedBy'];
              $ProductId = $fetchpro_brands['ProductId'];
              $ProductType = $fetchpro_brands['ProductType'];
              $ProductTaxPercentage = $fetchpro_brands['ProductTaxPercentage'];
           ?>
              <input type="text" name="DealProductProductId[]" value="<?php echo $ProductId; ?>" hidden="">
              <input type="text" name="DealProductMrp[]" value="<?php echo $ProductMrpPrice; ?>" hidden="">
              <input type="text" name="ProductRefernceCode[]" value="<?php echo $ProductRefernceCode; ?>" hidden="">
              <input type="text" name="DealProductDescriptions[]" value="<?php echo SECURE("<span><b>Weight: </b>$ProductWeight</span><span><b>Category: </b>$ProCategoryName</span>,<span><b>Sub Category : </b>$ProSubCategoryName</span><span><b>Publisher: </b>$ProBrandName</span>", "e"); ?>" hidden="">
              <input type="text" name="DealProductName[]" value="<?php echo $ProductName; ?>" hidden="">
              <input type="text" name="ProductTaxPercentage[]" value="<?php echo $ProductTaxPercentage; ?>" hidden="">
              <tr>
               <td>
                <img src="<?php echo STORAGE_URL; ?>/products/pro-img/<?php echo $ProductImage; ?>" alt="<?php echo $ProductName; ?>" title="<?php echo $ProductName; ?>" class="w-100 icon2">
               </td>
               <td class="lh-1-0">
                <span class="fs-15 m-t-3 bold"><?php echo $ProductName; ?> <span class="text-grey">(<?php echo $ProductRefernceCode; ?>)</span></span><br>
                <span class="fs-11 text-grey">
                 <span><b>Weight: </b><?php echo $ProductWeight; ?></span> |
                 <span><b>Category: </b><?php echo $ProCategoryName; ?></span> |
                 <span><b>Sub Category : </b><?php echo $ProSubCategoryName; ?></span> |
                 <span><b>Publisher: </b><?php echo $ProBrandName; ?></span>
                </span>
               </td>
               <td class="flex-s-b">
                <span class="fs-15 p-1r">Rs.</span>
                <input type="text" name="DealProductSalePrice[]" oninput="Calculate_<?php echo $ProductId; ?>()" id="pro_sale_<?php echo $ProductId; ?>" value="<?php echo $ProductSellPrice; ?>" class="form-control-2">
                <span class="fs-15 p-1r">x</span>
               </td>
               <td>
                <input type="number" name="DealProductQuantity[]" oninput="Calculate_<?php echo $ProductId; ?>()" id="pro_qty_<?php echo $ProductId; ?>" value="1" class="form-control-2">
               </td>
               <td>
                <div class="flex-s-b">
                 <span class="fs-15 p-1r">=</span>
                 <span class="fs-15 p-1r">Rs.</span>
                 <input type="number" readonly="" name="DealProductTotalPrice[]" id="pro_total_<?php echo $ProductId; ?>" value="<?php echo (int)$ProductSellPrice * 1; ?>" class="form-control-2 text-right">
                </div>
               </td>
              </tr>

              <script>
               function Calculate_<?php echo $ProductId; ?>() {
                var pro_sale_<?php echo $ProductId; ?> = document.getElementById("pro_sale_<?php echo $ProductId; ?>").value;
                var pro_qty_<?php echo $ProductId; ?> = document.getElementById("pro_qty_<?php echo $ProductId; ?>").value;
                var pro_total_<?php echo $ProductId; ?> = document.getElementById("pro_total_<?php echo $ProductId; ?>").value = (+pro_sale_<?php echo $ProductId; ?> * +pro_qty_<?php echo $ProductId; ?>);

                if (pro_sale_<?php echo $ProductId; ?> == 0 || pro_qty_<?php echo $ProductId; ?> == 0) {
                 document.getElementById("pro_total_<?php echo $ProductId; ?>").value = <?php echo $ProductSellPrice; ?> * 1;
                }

                if (pro_sale_<?php echo $ProductId; ?> <= 0) {
                 document.getElementById("pro_sale_<?php echo $ProductId; ?>").value = "";
                }

                if (pro_qty_<?php echo $ProductId; ?> == "" || pro_qty_<?php echo $ProductId; ?> == 0) {
                 document.getElementById("pro_total_<?php echo $ProductId; ?>").value = pro_sale_<?php echo $ProductId; ?> * 1;
                 document.getElementById("pro_qty_<?php echo $ProductId; ?>").value = 1;
                }
               }
              </script>
           <?php }
            }
           } ?>
          </table>
          <table class="table text-right">
           <tr>
            <th class="text-right">Total Amount</th>
            <td width="15%" class="fs-20 text-success"><span class="fs-20">Rs.<span id="selltotal"></span></span></td>
           </tr>
           <tr>
            <th class="text-right">Taxes Total</th>
            <td><span class="fs-20">Rs.<span id="taxtotal"></span></span></td>
           </tr>
           <tr>
            <th class="text-right"><span class="fs-20">Net Payable Amount</span></th>
            <td><span class="fs-23 text-primary">Rs.<span id="netpayble"></span></span></td>
           </tr>
          </table>

         </div>
        </div>

        <div class="row p-1">
         <div class="col-md-12 text-center">
          <button class="btn app-btn btn-md" type="submit" value="<?php echo SECURE($DealId, "e"); ?>" name="AddProductstoDeals"><i class="fa fa-check-circle"></i> ADD Products to Deal</button>
          <a href="index.php" class="btn btn-md btn-default">Back to Deal Details</a>
         </div>
        </div>
       </form>
      </div>
     </div>
    </div>

    <!--End page content-->
   </div>

   <?php include $PageDirLevel . 'include/admin/sidebar.php'; ?>
  </div>
  <?php include $PageDirLevel . 'include/admin/footer.php'; ?>
 </div>

 <script>
  function calculatetaxes() {
   var TotalOfProductSalePrice = document.getElementsByName("DealProductSalePrice[]");
   var TotalOfProductQuantity = document.getElementsByName("DealProductQuantity[]");
   var TotalOfProductTotalPrice = document.getElementsByName("DealProductTotalPrice[]");
   var ProductTaxPercentage = document.getElementsByName("ProductTaxPercentage[]");

   let TotalPayableAmount = 0;
   for (let i = 0; i < TotalOfProductSalePrice.length; i++) {
    TotalPayableAmount += +TotalOfProductTotalPrice[i].value;
   }

   let TotalProductPrices = 0;
   for (let i = 0; i < TotalOfProductSalePrice.length; i++) {
    TotalProductPrices += +TotalOfProductSalePrice[i].value * +TotalOfProductQuantity[i].value;
   }

   let TotalTaxes = 0;
   for (let i = 0; i < ProductTaxPercentage.length; i++) {
    if (ProductTaxPercentage[i].value == 0 || ProductTaxPercentage[i].value == "") {
     TotalTaxes += 0;
    } else {
     TotalTaxes += +TotalOfProductTotalPrice[i].value / 100 * +ProductTaxPercentage[i].value;
    }
   }

   TotalTaxes = Math.round(TotalTaxes);

   document.getElementById("selltotal").innerHTML = TotalProductPrices;
   document.getElementById("taxtotal").innerHTML = TotalTaxes;
   document.getElementById("netpayble").innerHTML = TotalPayableAmount + TotalTaxes;
  }

  setInterval(function() {
   calculatetaxes();
  }, 100);
 </script>
 <?php include $PageDirLevel . 'include/admin/footer_files.php'; ?>
</body>

</html>