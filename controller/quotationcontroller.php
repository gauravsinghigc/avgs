<?php
//add controller helper files
require 'helper.php';

//add aditional requirements
require '../require/admin/sessionvariables.php';


//create new quotations
if (isset($_POST['CreateQuotations'])) {
 $dealsid = SECURE($_POST['dealsid'], "d");
 $shippingat = SECURE($_POST['shippingat'], "d");
 $billingat = SECURE($_POST['billingat'], "d");

 //get deal details for quotations
 $DealsName = FETCH("SELECT * FROM deals where DealsId='$dealsid'", "DealsName");
 $DealsCustomerId = FETCH("SELECT * FROM deals where DealsId='$dealsid'", "DealCustomerId");
 $DealCustomerCompanyName = FETCH("SELECT * FROM deals where DealsId='$dealsid'", "DealCustomerCompanyName");
 $DealsStage = FETCH("SELECT * FROM deals where DealsId='$dealsid'", "DealsStage");
 $DealAmount = FETCH("SELECT * FROM deals where DealsId='$dealsid'", "DealAmount");
 $DealCreatedBy = FETCH("SELECT * FROM deals where DealsId='$dealsid'", "DealCreatedBy");
 $DealPrintType = FETCH("SELECT * FROM deals where DealsId='$dealsid'", "DealPrintType");
 $DealDescriptions = FETCH("SELECT * FROM deals where DealsId='$dealsid'", "DealDescriptions");

 //save into quotations table
 $AvailableQuotations = TOTAL("SELECT * FROM quotations where QuotationCreatedAt LIKE '%" . date("Y") . "%'");
 $QuotationNo = $AvailableQuotations + 1;
 $QuotationNo = strtoupper(strip_tags(html_entity_decode(SECURE(GetInvoiceFeilds("PERFORM_INVOICE_PRE_FEILDS"), "d")))) . "-" . $QuotationNo;
 $QuotationDate = date("Y-m-d H:i:s");
 $QuotationSender = $DealCreatedBy;
 $QuotationReceiver = $DealsCustomerId;
 $QuotationDetails = $DealDescriptions;
 $QuotationType = $DealPrintType;
 $QuotationAmount = $DealAmount;
 $QuotationCreatedBy = LOGIN_UserId;
 $QuotationCreatedAt = date("Y-m-d H:i:s");
 $QuotationStatus = "Fresh";
 $dealid = $dealsid;

 //save quoation shipping addresss
 $CustomerStreetAddress1 = SECURE(FETCH("SELECT * FROM customer_shipping_address where CustomerShippingAddress='$shippingat'", "CustomerStreetAddress1"), "d");
 $CustomerCity1 = FETCH("SELECT * FROM customer_shipping_address where CustomerShippingAddress='$shippingat'", "CustomerCity1");
 $CustomerState1 = FETCH("SELECT * FROM customer_shipping_address where CustomerShippingAddress='$shippingat'", "CustomerState1");
 $CustomerCountry1 = FETCH("SELECT * FROM customer_shipping_address where CustomerShippingAddress='$shippingat'", "CustomerCountry1");
 $CustomerPincode1 = FETCH("SELECT * FROM customer_shipping_address where CustomerShippingAddress='$shippingat'", "CustomerPincode1");
 $QuotationShippingAddress = $CustomerStreetAddress1 . ", " . $CustomerCity1 . ", " . $CustomerState1 . ", " . $CustomerCountry1 . ", " . $CustomerPincode1;

 //save billing address for quotations
 $CustomerStreetAddress = SECURE(FETCH("SELECT * FROM customer_billing_address where CustomerBillingAddress='$billingat'", "CustomerStreetAddress"), "d");
 $CustomerCity = FETCH("SELECT * FROM customer_billing_address where CustomerBillingAddress='$billingat'", "CustomerCity");
 $CustomerState = FETCH("SELECT * FROM customer_billing_address where CustomerBillingAddress='$billingat'", "CustomerState");
 $CustomerCountry = FETCH("SELECT * FROM customer_billing_address where CustomerBillingAddress='$billingat'", "CustomerCountry");
 $CustomerPincode = FETCH("SELECT * FROM customer_billing_address where CustomerBillingAddress='$billingat'", "CustomerPincode");
 $QuotationBillingAddress = $CustomerStreetAddress . ", " . $CustomerCity . ", " . $CustomerState . ", " . $CustomerCountry . ", " . $CustomerPincode;

 //save into quotations table
 $SaveQuotations = SAVE("quotations", ["QuotationNo", "dealid", "QuotationBillingAddress", "QuotationShippingAddress", "QuotationDate", "QuotationSender", "QuotationReceiver", "QuotationDetails", "QuotationType", "QuotationAmount", "QuotationCreatedBy", "QuotationCreatedAt", "QuotationStatus"]);
 if ($SaveQuotations == true) {

  //get quotations id
  $QuotationId = FETCH("SELECT * FROM quotations where QuotationNo='$QuotationNo' ORDER BY QuotationId DESC LIMIT 1", "QuotationId");

  //get quotation product details from deals and
  $SelectDealProduct = FetchConvertIntoArray("SELECT * FROM deal_products where DealDealId='$dealsid'", true);
  if ($SelectDealProduct != null) {

   //get & store deal products into quotations
   foreach ($SelectDealProduct as $Products) {
    $DealProductProductId = $Products->DealProductProductId;
    $DealProductMrp = $Products->DealProductMrp;
    $DealProductSalePrice = $Products->DealProductSalePrice;
    $DealProductQuantity = $Products->DealProductQuantity;
    $DealProductTotalPrice = $Products->DealProductTotalPrice;
    $DealProductChargeName = $Products->DealProductChargeName;
    $DealProductChargeType = $Products->DealProductChargeType;
    $DealProductChargeAmount = $Products->DealProductChargeAmount;
    $DealProductDiscountName = $Products->DealProductDiscountName;
    $DealProductDiscountType = $Products->DealProductDiscountType;
    $DealProductDiscountAmount  = $Products->DealProductDiscountAmount;
    $DealProductNetTotalAmount = $Products->DealProductNetTotalAmount;
    $DealProductDescriptions = SECURE($Products->DealProductDescriptions, "d");
    $DealProductName = $Products->DealProductName;
    $ProductRefernceCode = $Products->ProductRefernceCode;

    //save into quotations_products table
    $QuotationProId = $DealProductProductId;
    $QuotationProQty = $DealProductQuantity;
    $QuotationProMrp = $DealProductMrp;
    $QuotationProPrice = $DealProductSalePrice;
    $QuotationProTotalPrice = $DealProductTotalPrice;
    $QuotationProNotes = SECURE($DealProductDescriptions, "e");
    $QuotationProTaxName = $DealProductChargeName;
    $QuotationProTaxValue = $DealProductChargeAmount;
    $QuotationProPricewithTaxation = $DealProductNetTotalAmount;
    $ProducType = FETCH("SELECT * FROM products where ProductId='$QuotationProId'", "ProductType");
    $ProductRefernceCode = FETCH("SELECT * FROM products where ProductId='$QuotationProId'", "ProductRefernceCode");
    if ($ProducType == "Services") {
     $Type = "SAC";
    } else {
     $Type = "HSN";
    }
    $QuotationProductName = $DealProductName . "<br> $Type : " . $ProductRefernceCode . "";

    //transfer deal product into quotations
    $Save = SAVE("quotation_products", ["QuotationId", "QuotationProId", "QuotationProQty", "QuotationProMrp", "QuotationProPrice", "QuotationProTotalPrice", "QuotationProNotes", "QuotationProTaxName", "QuotationProTaxValue", "QuotationProPricewithTaxation", "QuotationProductName"]);
   }

   //get quotation product details from deals and
   if ($Save == true) {
    $dealsid = null;
    $DealsCustomerId = null;
    $shippingat = null;
    $billingat = null;
    $Save = true;
    $access_url = DOMAIN . "/admin/quotations/";
   } else {
    $access_url = $access_url;
   }

   //send response to sender
   RESPONSE($Save, "Quotation Saved Successfully", "Quotation Not Saved");


   //product not found!
  } else {
   $Save = false;
  }

  //quotations not found!
 } else {
  LOCATION("warning", "Unable to Create Quotation at the moment!", $access_url);
 }

 //send quotation to mails
} elseif (isset($_POST['SendQuototationOnMail'])) {
 $invoiceid = SECURE($_POST['invoiceid'], "d");

 $InvoiceDate = FETCH("SELECT * FROM invoices where invoicesid='" . $invoiceid . "'", "InvoiceDate");
 $InvoiceStatus = FETCH("SELECT * FROM invoices where invoicesid='" . $invoiceid . "'", "InvoiceStatus");

 $quotationquotoid = FETCH("SELECT * FROM invoices where invoicesid='" . $invoiceid . "'", "quotationquotoid");
 $QuotationReceiver = FETCH("SELECT * from quotations where QuotationId='" . $quotationquotoid . "'", "QuotationReceiver");
 $CustomerName = FETCH("SELECT * from customers where CustomerId='" . $QuotationReceiver . "'", "CustomerDisplayName");
 $QuotationNo = FETCH("SELECT * from quotations where QuotationId='" . $quotationquotoid . "'", "QuotationNo");


 $InvoiceLinks = "<a href='" . DOMAIN . "/pi-with-discount.php?id=" . SECURE($invoiceid, "e") . "'>View Quotation</a>";
 $mailbody = $_POST['mailbody'] . "<br><br>" . $InvoiceLinks;

 foreach ($_POST['emails'] as $key => $emails) {
  SENDMAILS("Quotation Generated : $QuotationNo", "Dear, $CustomerName<br><br>", $emails, $mailbody);
 }

 RESPONSE(true, "Invoice sent successfully", "Invoice sending failed");

 //delete quotation records details

} elseif (isset($_GET['delete_quoto_records'])) {
 $delete_quoto_records = SECURE($_GET['delete_quoto_records'], "d");
 $access_url = SECURE($_GET['access_url'], "d");

 if ($delete_quoto_records == true) {
  $control_id = SECURE($_GET['control_id'], "d");
  $delete = DELETE_FROM("quotations", "QuotationId='$control_id'");
  if ($delete == true) {
   $delete_products = DELETE_FROM("quotation_products", "QuotationId='$control_id'");
   RESPONSE(true, "Quotation Deleted Successfully", "Quotation Not Deleted");
  } else {
   RESPONSE(false, "Unable to delete Quotation at the moment!", "Quotation Not Deleted");
  }
 } else {
  RESPONSE(false, "Unable to delete Quotation at the moment!", "Quotation Not Deleted");
 }
}
