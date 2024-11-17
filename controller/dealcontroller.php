<?php
//add controller helper files
require 'helper.php';

//add aditional requirements
require '../require/admin/sessionvariables.php';

//create new deals
if (isset($_POST['CreateNewDeals'])) {
 $DealsName = $_SESSION['DealsName'];
 $DealCustomerId = SECURE($_SESSION['DealCustomerId'], "d");
 $DealsStage = $_SESSION['DealsStage'];
 $DealClosingDate = $_SESSION['DealClosingDate'];
 $DealDescriptions = $_SESSION['DealDescriptions'];
 $DealCreatedBy = $_SESSION['DealCreatedBy'];
 $DealPrintType = $_SESSION['DealPrintType'];
 $DealCreatedAt = date("Y-m-d H:i:s");
 $DealUpdatedAt = date("Y-m-d");

 //get deal amount
 $DealAmount = 0;
 $Totaltaxes = 0;
 foreach ($_POST['DealProductProductId'] as $key => $PostValue) {
  $DealProductSalePrice = $_POST['DealProductSalePrice'][$key];
  $DealProductQuantity = $_POST['DealProductQuantity'][$key];
  $ProductTaxPercentage = $_POST['ProductTaxPercentage'][$key];
  $DealProductTotalPrice = round((int)$DealProductSalePrice * (int)$DealProductQuantity);
  $DealProductChargeType = $ProductTaxPercentage;
  if ($DealProductChargeType == 0 || $DealProductChargeType == "") {
   $Totaltaxes +=  0;
  } else {
   $Totaltaxes += round($DealProductTotalPrice * ($ProductTaxPercentage / 100));
  }
  $DealAmount += $DealProductTotalPrice;
 }

 //get deal amount
 $DealAmount = $DealAmount + $Totaltaxes;

 //get customer company name
 $DealCustomerCompanyName = FETCH("SELECT * FROM customers where CustomerId='$DealCustomerId'", "CompanyName");

 //create deals
 $Save = SAVE("deals", ["DealsName", "DealUpdatedAt", "DealCustomerId", "DealCustomerCompanyName", "DealsStage", "DealAmount", "DealClosingDate", "DealDescriptions", "DealCreatedAt", "DealCreatedBy", "DealPrintType"]);
 if ($Save == true) {
  //get deals id
  $DealDealId = FETCH("SELECT * FROM deals ORDER BY DealsId DESC LIMIT 1", "DealsId");
  $DealProductAddedDate = date("Y-m-d H:i:s");
  $DealProductStatus = 1;
  $ProductAddedBy = LOGIN_UserId;

  //get product details
  foreach ($_POST['DealProductProductId'] as $key => $PostValue) {
   $DealProductProductId = $_POST['DealProductProductId'][$key];
   $DealProductMrp = $_POST['DealProductMrp'][$key];
   $DealProductDescriptions = $_POST['DealProductDescriptions'][$key];
   $DealProductName = $_POST['DealProductName'][$key];
   $ProductRefernceCode = $_POST['ProductRefernceCode'][$key];
   $DealProductSalePrice = $_POST['DealProductSalePrice'][$key];
   $DealProductQuantity = $_POST['DealProductQuantity'][$key];
   $DealProductTotalPrice = (int)$DealProductSalePrice * (int)$DealProductQuantity;
   $DealProductChargeName = "Taxes";
   $ProductTaxPercentage = $_POST['ProductTaxPercentage'][$key];
   $DealProductChargeType = $ProductTaxPercentage;
   if ($DealProductChargeType == 0 or $DealProductChargeType == null) {
    $DealProductChargeAmount = 0;
   } else {
    $DealProductChargeAmount = round($DealProductTotalPrice * ($ProductTaxPercentage / 100));
   }
   $DealProductNetTotalAmount = $DealProductTotalPrice + $DealProductChargeAmount;

   //save product details to deals products
   $SaveProducts = SAVE("deal_products", ["DealDealId", "DealProductChargeAmount", "DealProductChargeType", "DealProductChargeName", "DealProductProductId", "DealProductMrp", "DealProductSalePrice", "DealProductQuantity", "DealProductTotalPrice", "DealProductNetTotalAmount", "DealProductAddedDate", "DealProductStatus", "DealProductDescriptions", "DealProductName", "ProductRefernceCode", "ProductAddedBy"]);
  }

  //back to deals
  if ($SaveProducts == true) {
   $access_url = DOMAIN . "/admin/deals";
  } else {
   $access_url = $access_url;
  }
  RESPONSE($SaveProducts, "Deal Created Successfully!", "Unable to create new deal");

  //in case deal not created!
 } else {
  LOCATION("warning", "Unable to Create Deals at the moments, please try again later", $access_url);
 }

 //update deals 
} else if (isset($_POST['UpdateDeals'])) {
 $DealsId = SECURE($_POST['UpdateDeals'], "d");
 $DealsName = POST("DealsName");
 $DealCustomerId = $_POST['DealCustomerId'];
 $DealCustomerCompanyName = FETCH("SELECT * FROM customers where CustomerId='$DealCustomerId'", "CompanyName");
 $DealsStage = POST("DealsStage");
 $DealClosingDate = $_POST['DealClosingDate'];
 $DealDescriptions = POST("DealDescriptions");
 $DealPrintType = POST("DealPrintType");
 $DealUpdatedAt = date("Y-m-d H:i:s");
 $DealCreatedBy = $_POST['DealCreatedBy'];

 //update into db tables
 $Update = UPDATE_TABLE("deals", ["DealsName", "DealCustomerId", "DealCustomerCompanyName", "DealsStage", "DealClosingDate", "DealDescriptions", "DealPrintType", "DealUpdatedAt", "DealCreatedBy"], "DealsId='$DealsId'");
 RESPONSE($Update, "Deal Updated Successfully!", "Unable to update deal");

 //delete deals 
} else if (isset($_GET['delete_deals'])) {
 $DealsId = SECURE($_GET['control_id'], "d");
 $access_url = SECURE($_GET['access_url'], "d");

 //check request & delete
 $CheckRequest = CheckRequestsAndDelete("delete_deals", "deals", "DealsId='$DealsId'");
 if ($CheckRequest == true) {
  $DeleteDealsProducts = CheckRequestsAndDelete("delete_deals", "deal_products", "DealDealId='$DealsId'");
 } else {
  $DeleteDealsProducts = false;
 }

 //return Request Results to the sender
 ReturnRequestResultsToSender($DeleteDealsProducts, "Deal Deleted Successfully!", "Unable to delete deal", "Delete Request is not Valid! Please Try Again!");

 //udpate deal product details
} elseif (isset($_POST['UpdateDateDeals'])) {
 $DealsId = SECURE($_POST['UpdateDateDeals'], "d");

 //get deal amount
 $DealAmount = 0;
 $Totaltaxes = 0;
 foreach ($_POST['DealProductProductId'] as $key => $PostValue) {
  $DealProductSalePrice = $_POST['DealProductSalePrice'][$key];
  $DealProductQuantity = $_POST['DealProductQuantity'][$key];
  $ProductTaxPercentage = $_POST['ProductTaxPercentage'][$key];
  $DealProductTotalPrice = round((int)$DealProductSalePrice * (int)$DealProductQuantity);
  $DealProductChargeType = $ProductTaxPercentage;
  if ($DealProductChargeType == 0 || $DealProductChargeType == "") {
   $Totaltaxes +=  0;
  } else {
   $Totaltaxes += round($DealProductTotalPrice * ($ProductTaxPercentage / 100));
  }
  $DealAmount += $DealProductTotalPrice;
 }

 //get deal amount
 $DealAmount = $DealAmount + $Totaltaxes;

 //update deal amounts
 $Update = UPDATE_TABLE("deals", ["DealAmount"], "DealsId='$DealsId'");

 //update deal products
 foreach ($_POST['DealProductProductId'] as $key => $Values) {
  $DealProductProductId = $_POST['DealProductProductId'][$key];
  $DealProductMrp = $_POST['DealProductMrp'][$key];
  $DealProductDescriptions = $_POST['DealProductDescriptions'][$key];
  $DealProductName = $_POST['DealProductName'][$key];
  $ProductRefernceCode = $_POST['ProductRefernceCode'][$key];
  $DealProductSalePrice = $_POST['DealProductSalePrice'][$key];
  $DealProductQuantity = $_POST['DealProductQuantity'][$key];
  $DealProductTotalPrice = (int)$DealProductSalePrice * (int)$DealProductQuantity;
  $DealProductChargeName = "Taxes";
  $ProductTaxPercentage = $_POST['ProductTaxPercentage'][$key];
  $DealProductChargeType = $ProductTaxPercentage;
  if ($DealProductChargeType == 0 || $DealProductChargeType == "") {
   $DealProductChargeAmount = 0;
  } else {
   $DealProductChargeAmount = round($DealProductTotalPrice * ($ProductTaxPercentage / 100));
  }
  $DealProductNetTotalAmount = $DealProductTotalPrice + $DealProductChargeAmount;
  $DealProductid = SECURE($_POST['DealProductid'][$key], "d");

  $Update = UPDATE_TABLE("deal_products", ["DealProductProductId", "DealProductMrp", "DealProductSalePrice", "DealProductQuantity", "DealProductTotalPrice", "DealProductNetTotalAmount", "DealProductDescriptions", "DealProductName", "ProductRefernceCode"], "DealProductid='$DealProductid'");
 }

 RESPONSE($Update, "Deal Updated Successfully!", "Unable to update deal");

 //remove products from deals
} elseif (isset($_GET['remove_products_from_deal'])) {
 $access_url = SECURE($_GET['access_url'], "d");
 $DealProductid = SECURE($_GET['control_id'], "d");
 $DealDealId = SECURE($_GET['deal_id'], "d");

 $DeleteDealsProducts = CheckRequestsAndDelete("remove_products_from_deal", "deal_products", "DealProductid='$DealProductid'");
 if ($DeleteDealsProducts == true) {
  $DealAmount = AMOUNT("SELECT * FROM deal_products WHERE DealDealId='$DealDealId'", "DealProductNetTotalAmount");
  $Update = UPDATE_TABLE("deals", ["DealAmount"], "DealsId='$DealDealId'");
  RESPONSE($Update, "Product Deleted & Deal Amount Updated Successfully!", "Unable to delete product from deal");
 } else {
  echo "null";
  RESPONSE($DeleteDealsProducts, "Deal Product Deleted Successfully!", "Unable to delete deal product");
 }

 //add product to dealstages
} elseif (isset($_POST['AddProductstoDeals'])) {
 $DealDealId = SECURE($_POST['AddProductstoDeals'], "d");

 //get product details
 foreach ($_POST['DealProductProductId'] as $key => $PostValue) {
  $DealProductProductId = $_POST['DealProductProductId'][$key];
  $DealProductMrp = $_POST['DealProductMrp'][$key];
  $DealProductDescriptions = $_POST['DealProductDescriptions'][$key];
  $DealProductName = $_POST['DealProductName'][$key];
  $ProductRefernceCode = $_POST['ProductRefernceCode'][$key];
  $DealProductSalePrice = $_POST['DealProductSalePrice'][$key];
  $DealProductQuantity = $_POST['DealProductQuantity'][$key];
  $DealProductTotalPrice = (int)$DealProductSalePrice * (int)$DealProductQuantity;
  $DealProductChargeName = "Taxes";
  $ProductTaxPercentage = $_POST['ProductTaxPercentage'][$key];
  $DealProductChargeType = $ProductTaxPercentage;
  if ($DealProductChargeType == 0 || $DealProductChargeType == "") {
   $DealProductChargeAmount = 0;
  } else {
   $DealProductChargeAmount = round($DealProductTotalPrice * ($ProductTaxPercentage / 100));
  }
  $DealProductNetTotalAmount = $DealProductTotalPrice + $DealProductChargeAmount;

  //save product details to deals products
  $SaveProducts = SAVE("deal_products", ["DealDealId", "DealProductChargeAmount", "DealProductChargeType", "DealProductChargeName", "DealProductProductId", "DealProductMrp", "DealProductSalePrice", "DealProductQuantity", "DealProductTotalPrice", "DealProductNetTotalAmount", "DealProductAddedDate", "DealProductStatus", "DealProductDescriptions", "DealProductName", "ProductRefernceCode", "ProductAddedBy"]);
 }

 //update deal amount
 $GetNewDealAmount = AMOUNT("SELECT * FROM deal_products WHERE DealDealId='$DealDealId'", "DealProductNetTotalAmount");
 $DealAmount = $GetNewDealAmount;
 $Update = UPDATE_TABLE("deals", ["DealAmount"], "DealsId='$DealDealId'");
 if ($Update == true) {
  $access_url = DOMAIN . "/admin/deals/";
 } else {
  $access_url = $access_url;
 }


 //response to request submitter
 RESPONSE($Update, "Products Added Successfully!", "Unable to add products to deal");

 //unknow request 
} else {
 LOCATION("warning", "Invalid Requests is Received at System Controllers!", $access_url);
}
