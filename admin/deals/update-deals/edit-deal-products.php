<?php

//required files
$PageDirLevel = "../../../";
require $PageDirLevel . "require/auto/admin-auto-load.php";

//page variables
$PageName = "Update Deal Products";

if (isset($_GET['viewid'])) {
  $RequestedDealsId = SECURE($_GET['viewid'], "d");
  $_SESSION['RequestedDealsId'] = $RequestedDealsId;
} else {
  $RequestedDealsId = $_SESSION['RequestedDealsId'];
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

              <form action="../../../controller/dealcontroller.php" method="POST">
                <?php FormPrimaryInputs(true); ?>
                <div class="row">
                  <div class="col-md-12">
                    <table class="table table-striped">

                      <thead>
                        <tr>
                          <th>#</th>
                          <th>ItemDetail</th>
                          <th width="25%">SalePrice & Qty</th>
                          <th width="20%" align="right" class="text-right">Total</th>
                        </tr>
                      </thead>

                      <?php
                      $SQLproducts = SELECT("SELECT * FROM deal_products WHERE DealDealId='$RequestedDealsId'");
                      while ($fetchpro_brands = mysqli_fetch_array($SQLproducts)) {
                        $DealProductid = $fetchpro_brands['DealProductid'];
                        $ProductName = $fetchpro_brands['DealProductName'];
                        $DealProductQuantity = $fetchpro_brands['DealProductQuantity'];
                        $ProductRefernceCode = $fetchpro_brands['ProductRefernceCode'];
                        $ProductSellPrice = $fetchpro_brands['DealProductSalePrice'];
                        $ProductMrpPrice = $fetchpro_brands['DealProductMrp'];
                        $ProductDescriptions = html_entity_decode($fetchpro_brands['DealProductDescriptions']);
                        $ProductStatus = StatusView($fetchpro_brands['DealProductStatus']);
                        $ProductCreatedBy = $fetchpro_brands['ProductAddedBy'];
                        $ProductId = $fetchpro_brands['DealProductProductId'];
                        $ProductTaxPercentage = $fetchpro_brands['DealProductChargeType'];
                        $DealProductTotalPrice = $fetchpro_brands['DealProductTotalPrice'];
                      ?>
                        <input type="text" name="DealProductProductId[]" value="<?php echo $ProductId; ?>" hidden="">
                        <input type="text" name="DealProductMrp[]" value="<?php echo $ProductMrpPrice; ?>" hidden="">
                        <input type="text" name="ProductRefernceCode[]" value="<?php echo $ProductRefernceCode; ?>" hidden="">
                        <input type="text" name="DealProductDescriptions[]" value="<?php echo $ProductDescriptions; ?>" hidden="">
                        <input type="text" name="DealProductName[]" value="<?php echo $ProductName; ?>" hidden="">
                        <input type="text" name="ProductTaxPercentage[]" value="<?php echo $ProductTaxPercentage; ?>" hidden="">
                        <input type="text" name="DealProductid[]" value="<?php echo SECURE($DealProductid, "e"); ?>" hidden="">
                        <tr>
                          <td>
                            <?php CONFIRM_DELETE_POPUP(
                              "deal_products_" . $DealProductid,
                              [
                                "remove_products_from_deal" => true,
                                "control_id" => $DealProductid,
                                "deal_id" => $RequestedDealsId,
                              ],
                              "dealcontroller"
                            ); ?>
                          </td>
                          <td class="lh-1-0">
                            <span class="fs-15 m-t-3 bold"><?php echo $ProductName; ?> <span class="text-grey">(<?php echo $ProductRefernceCode; ?>)</span></span><br>
                            <span class="fs-11 text-grey">
                              <?php echo SECURE($ProductDescriptions, "d"); ?>
                            </span>
                          </td>
                          <td class="flex-s-b">
                            <span class="fs-15 p-1r">Rs.</span>
                            <input type="text" name="DealProductSalePrice[]" oninput="Calculate_<?php echo $ProductId; ?>()" id="pro_sale_<?php echo $ProductId; ?>" value="<?php echo $ProductSellPrice; ?>" class="form-control-2">
                            <span class="fs-15 p-1r">x</span>
                            <input type="number" name="DealProductQuantity[]" oninput="Calculate_<?php echo $ProductId; ?>()" id="pro_qty_<?php echo $ProductId; ?>" value="<?php echo $DealProductQuantity; ?>" class="form-control-2">
                          </td>
                          <td>
                            <div class="flex-s-b">
                              <span class="fs-15 p-1r">=</span>
                              <span class="fs-15 p-1r">Rs.</span>
                              <input type="number" readonly="" name="DealProductTotalPrice[]" id="pro_total_<?php echo $ProductId; ?>" value="<?php echo (int)$DealProductTotalPrice; ?>" class="form-control-2 text-right">
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
                      ?>
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
                  <div class="col-md-12 flex-s-b">
                    <a href="add-products.php?viewid=<?php echo SECURE($RequestedDealsId, "e"); ?>" class="btn btn-primary">Add Products</a>
                    <button class="btn app-btn" type="submit" name="UpdateDateDeals" value="<?php echo SECURE($RequestedDealsId, "e"); ?>"><i class="fa fa-check-circle"></i> Update Deal Products Details</button>
                    <a href="index.php" class="btn btn-default">Back to Deal</a>
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
        if (+ProductTaxPercentage[i].value == 0) {
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