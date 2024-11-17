<?php
//require files
require 'require/modules.php';

//page variables
if (isset($_GET['id'])) {
 $Orderid = SECURE($_GET['id'], "d");
 $_SESSION['VIEW_INVOICE_ID'] = $Orderid;
} else {
 $Orderid = $_SESSION['VIEW_INVOICE_ID'];
}

//invoice details;
$PageSqls = "SELECT * FROM invoices where invoicesid='$Orderid' ORDER BY invoicesid  DESC";
$quotationquotoid = FETCH("SELECT * FROM invoices where invoicesid='$Orderid'", "quotationquotoid");
$QuotationReceiver = FETCH("SELECT * FROM quotations where QuotationId='$quotationquotoid'", "QuotationReceiver");
$CustomerDisplayName = FETCH("SELECT * FROM customers where CustomerId='$QuotationReceiver'", "CustomerDisplayName");

?>
<?php
$NetPaybleAMount = AMOUNT("SELECT * FROM quotations, invoices where quotations.QuotationId=invoices.quotationquotoid and invoices.invoicesid='$Orderid'", "QuotationAmount");
$PaidAmountTotal = AMOUNT("SELECT * FROM payments where PaidCustomerId='$QuotationReceiver' ORDER BY PaymentId", "PaidAmount");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <title><?php echo FETCH("SELECT * FROM quotations where QuotationId='$Orderid'", "QuotationNo"); ?>@<?php echo APP_NAME; ?></title>
 <?php include "include/header_files.php"; ?>
 <style type="text/css">
  html,
  body {
   font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
  }

  section.print-area {
   width: 900px;
   height: 100%;
   display: block;
   box-shadow: 0px 0px 1px black;
   padding: 0.6rem;
  }

  .app-intro {
   display: flex;
   justify-content: space-between;
  }

  .app-intro .app-logo img {
   width: 200px;
   height: auto;
  }

  .app-logo {
   width: 50%;
  }

  .app-name {
   font-weight: 600;
  }

  .app-details {
   text-align: left;
   font-size: 0.85rem !important;
   line-height: 0.9rem;
  }

  h3 {
   font-weight: 500;
   text-align: center;
  }

  h3 span {
   background-color: white;
   padding: 0.2rem;
  }

  hr {
   margin-top: -2rem;
  }

  .billing-address {
   font-weight: 400;
   font-size: 0.9rem;
   line-height: 1rem;
   width: 45%;
  }

  .proforma-details {
   width: 100%;
   margin-top: 1rem;
  }

  .proforma-details table {
   width: 100%;
   border-collapse: collapse;
   margin-top: 0.5rem;
  }

  .proforma-details table thead th {
   background-color: aquamarine;
  }

  .proforma-details table th,
  .proforma-details table td {
   border: 1px solid #ccc;
   padding: 0.3rem;
   text-align: left;
  }

  .product-desc table {
   width: 100%;
   border-collapse: collapse;
   margin-top: 0.9rem;
  }

  .product-desc table thead th {
   padding: 0.2rem;
   text-align: left;
  }

  .product-desc table thead th {
   background-color: aquamarine;
  }

  .product-desc table td {
   padding: 0.35rem;
  }

  .into-text {
   font-size: 0.8rem;
   color: #000;
  }


  .invoice-data tr th {
   padding: 0.2rem;
   text-align: right !important;
   color: #000;
  }

  .invoice-data tr td {
   padding: 0.2rem;
   text-align: left !important;
   color: #000;
  }

  .invoice-data {
   width: 100%;
  }
 </style>
</head>

<body onload="doConvert()">
 <section class="print-area">
  <div class="app-intro">
   <div class="app-logo">
    <img src="<?php echo MAIN_LOGO; ?>">
    <p class="app-details">
     <span class="app-name"><b><?php echo APP_NAME; ?></b></span><br>
     <span><?php echo SECURE(PRIMARY_ADDRESS, "d"); ?></span><br>
     <span><?php echo SECURE(PRIMARY_AREA, "d"); ?></span>, <?php echo SECURE(PRIMARY_CITY, "d"); ?><br>
     <span> <?php echo SECURE(PRIMARY_STATE, "d"); ?> - <?php echo SECURE(PRIMARY_PINCODE, "d"); ?></span><br>
     <span><?php echo PRIMARY_PHONE; ?></span><br>
     <span><?php echo PRIMARY_EMAIL; ?></span><br>
     <br>
     <span>GST No <?php echo GST_NO; ?></span><br>
     <span>TAX No <?php echo TAX_NO; ?></span><br>
    </p>
    <p class="app-details">
     <span>Bill To</span><br>
     <b><?php echo $CustomerDisplayName; ?></b><br>
     <?php echo FETCH("SELECT * FROM quotations where QuotationId='$quotationquotoid'", "QuotationBillingAddress"); ?>
    </p>
   </div>
   <div class="performa-details">
    <h1 style="font-size:2rem;margin-bottom:0px;">TAX INVOICE</h1>
    <h3 style="margin-top:0px;text-align:right"><b>#</b> 2022-2023-0001</h3>

    <h4 style="text-align:right"><span style="font-size:0.9rem;color:grey;">Balance Due:</span> <br><b><i class="fa fa-inr"></i><?php echo $NetPaybleAMount - $PaidAmountTotal; ?></b></h4>
    <table class="invoice-data">
     <tr>
      <th>Invoice Date :</th>
      <td><?php echo GET_DATA("InvoiceDate"); ?></td>
     </tr>
     <tr>
      <th>Terms :</th>
      <td></td>
     </tr>
     <tr>
      <th>Due Date :</th>
      <td><?php echo GET_DATA("InvoiceDate"); ?></td>
     </tr>
     <tr>
      <th>P.O.# :</th>
      <td></td>
     </tr>
    </table>

   </div>
  </div>
  <table style="width:100%;">
   <thead style="font-size: 0.7rem !important;background-color: #8080803d;">
    <tr>
     <th>S.No</th>
     <th>ItemName</th>
     <th>SellPrice</th>
     <th>Quantity</th>
     <th>TotalPrice</th>
    </tr>
   </thead>
   <tbody>

    <?php
    $QuotationId = GET_DATA("quotationquotoid");
    $fetchItems = SELECT("SELECT * FROM quotation_products where QuotationId='$Orderid' ORDER BY QuotationId ASC");
    $CountSno = 0;
    $NetTotal = 0;
    $QuotationProTaxValue = 0;
    $QuotationProPricewithTaxation = 0;
    while ($fetch = mysqli_fetch_array($fetchItems)) {
     $NetTotal += (int)$fetch['QuotationProTotalPrice'];
     $QuotationProTaxValue += (int)$fetch['QuotationProTaxValue'];
     $QuotationProPricewithTaxation += (int)$fetch['QuotationProPricewithTaxation'];
     $CountSno++; ?>
     <tr style="box-shadow: 0px 1px 0px 0px #8080800f;">
      <td><?php echo $CountSno; ?></td>
      <td style="font-size: 12px;">
       <?php echo $fetch['QuotationProductName']; ?><br>
       <span>HSN: <?php echo SECURE($fetch['QuotationProNotes'], "d"); ?></span>
      </td>
      <td align="center">
       Rs.<?php echo $fetch['QuotationProPrice']; ?>
      </td>
      <td align="center">
       x <?php echo $fetch['QuotationProQty']; ?>
      </td>
      <td align="right">
       <b>Rs.<?php echo $fetch['QuotationProTotalPrice']; ?></b>
      </td>
     <?php } ?>
   </tbody>
  </table>
  <hr style="margin-bottom: 3px;margin-top: 3px;background-color: #80808024;color: aquamarine;height: 1px;border: none;">
  <table style="width:100% !important;font-size:13px;text-align:right;">
   <tr>
    <th>Sub Total</th>
    <td style="font-size:13px;">Rs.<?php echo $NetTotal; ?></td>
   </tr>
   <tr>
    <th>Total</th>
    <td style="font-size:13px;">Rs.<?php echo $NetTotal; ?></td>
   </tr>
   <tr>
    <th>Payment Made</th>
    <td style="font-size:15px;">
     <b>Rs.<?php
           $NetPaybleAMount = AMOUNT("SELECT * FROM quotations, invoices where quotations.QuotationId=invoices.quotationquotoid and invoices.invoicesid='$Orderid'", "QuotationAmount");
           $PaidAmountTotal = AMOUNT("SELECT * FROM payments where PaidCustomerId='$QuotationReceiver' ORDER BY PaymentId", "PaidAmount");
           echo $PaidAmountTotal; ?></b>

    </td>
   </tr>
   <tr>
    <th>Balance Due</th>
    <td><b>Rs.<?php echo $NetPaybleAMount - $PaidAmountTotal; ?></b></td>
   </tr>
  </table>
  </div>
  <p style="font-size:0.85rem;color:#000;">
   <b>Payment Options</b><br>
   Payment can be made by DD in favor of “Avags Information Systems” payable at New Delhi.<br>
   For Bank Transfer : <br>Beneficiary Name: AVAGS INFORMATION SYSTEMS, <br>Account no: 50200024216176, RTGS/NEFT <br>IFSC Code:
   HDFC0000249, <br>Bank Name : HDFC Bank Ltd., <br>Account Type : Current<br>
  </p>
  <p style="font-size:0.8rem;color:#000;">
   <b>Contact Details</b><br>
   For any further assistance, please feel free to contact: at +91 9899 8610 71 or send e-mail at: info@avags.in or mail.
   avags@gmail.com
  </p>
  <div class="app-intro">
   <p style="font-size:0.75rem;">
    <b>Terms & Conditions</b><br>
    Prepayment requires to activate online access.<br>
    Order once placed cannot be canceled, transferred, or refunded.<br>
    Invoice & payment receipt will send only on receipt of full payment.<br>
    The subscription period will be as per the publisher/database provider company policy.<br>
   </p>
   <p style="font-size:0.75rem;">
    <b>For Avags Infomation Systems</b>

    <br><br><br><br><br><br><br>
    Authorized Signature
   </p>
  </div>
 </section>


 <script>
  function doConvert() {
   var numberInput = 1000;


   var oneToTwenty = ['', 'one ', 'two ', 'three ', 'four ', 'five ', 'six ', 'seven ', 'eight ', 'nine ', 'ten ',
    'eleven ', 'twelve ', 'thirteen ', 'fourteen ', 'fifteen ', 'sixteen ', 'seventeen ', 'eighteen ', 'nineteen '
   ];
   var tenth = ['', '', 'twenty', 'thirty', 'forty', 'fifty', 'sixty', 'seventy', 'eighty', 'ninety'];

   if (numberInput.toString().length > 7) return myDiv.innerHTML = 'overlimit';
   console.log(numberInput);
   //let num = ('0000000000'+ numberInput).slice(-10).match(/^(\d{1})(\d{2})(\d{2})(\d{2})(\d{1})(\d{2})$/);
   var num = ('0000000' + numberInput).slice(-7).match(/^(\d{1})(\d{1})(\d{2})(\d{1})(\d{2})$/);
   console.log(num);
   if (!num) return;

   var outputText = num[1] != 0 ? (oneToTwenty[Number(num[1])] || `${tenth[num[1][0]]} ${oneToTwenty[num[1][1]]}`) + ' million ' : '';

   outputText += num[2] != 0 ? (oneToTwenty[Number(num[2])] || `${tenth[num[2][0]]} ${oneToTwenty[num[2][1]]}`) + 'hundred ' : '';
   outputText += num[3] != 0 ? (oneToTwenty[Number(num[3])] || `${tenth[num[3][0]]} ${oneToTwenty[num[3][1]]}`) + ' thousand ' : '';
   outputText += num[4] != 0 ? (oneToTwenty[Number(num[4])] || `${tenth[num[4][0]]} ${oneToTwenty[num[4][1]]}`) + 'hundred ' : '';
   outputText += num[5] != 0 ? (oneToTwenty[Number(num[5])] || `${tenth[num[5][0]]} ${oneToTwenty[num[5][1]]} `) : '';

   document.getElementById("priceinwords").innerHTML = outputText;
  }
 </script>
 <script>
  window.addEventListener("load", function() {
   //window.print();
  });
 </script>
</body>

</html>