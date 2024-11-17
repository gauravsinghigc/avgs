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
$PageSqls = "SELECT * FROM quotations where QuotationId='$Orderid' ORDER BY QuotationId DESC";
$QuotationReceiver = FETCH("SELECT * FROM quotations where QuotationId='$Orderid'", "QuotationReceiver");
$CustomerDisplayName = FETCH("SELECT * FROM customers where CustomerId='$QuotationReceiver'", "CustomerDisplayName");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title><?php echo FETCH("SELECT * FROM quotations where QuotationId='$Orderid'", "QuotationNo"); ?>@<?php echo APP_NAME; ?></title>
  <style type="text/css">
    html,
    body {
      font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    }

    section.print-area {
      width: 800px;
      height: 100%;
      display: block;
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

    .app-name {
      font-weight: 600;
    }

    .app-details {
      text-align: right;
      font-size: 0.9rem !important;
      line-height: 1rem;
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
      width: 45%;
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
  </style>
</head>

<body onload="doConvert()">
  <section class="print-area" style="display:block;">
    <div class="app-intro">
      <div class="app-logo">
        <img src="<?php echo MAIN_LOGO; ?>">
      </div>
      <div class="app-details">
        <p>
          <span class="app-name"><?php echo APP_NAME; ?></span><br>
          <span><?php echo SECURE(PRIMARY_ADDRESS, "d"); ?></span><br>
          <span><?php echo SECURE(PRIMARY_AREA, "d"); ?></span>, <?php echo SECURE(PRIMARY_CITY, "d"); ?><br>
          <span> <?php echo SECURE(PRIMARY_STATE, "d"); ?> - <?php echo SECURE(PRIMARY_PINCODE, "d"); ?></span><br>
          <span><?php echo PRIMARY_PHONE; ?></span><br>
          <span><?php echo PRIMARY_EMAIL; ?></span><br>
          <br>
          <span><b>GST No</b> <?php echo GST_NO; ?></span><br>
          <span><b>TAX No</b> <?php echo TAX_NO; ?></span><br>
        </p>
      </div>
    </div>
    <h3><span>PERFORMA INVOICE</span></h3>
    <hr>
    <div class="app-intro">
      <div class="billing-address">
        <p>
          <span>Bill To</span><br>
          <span><b><?php echo $CustomerDisplayName; ?></b></span><br>
          <?php echo GET_DATA("QuotationBillingAddress"); ?>
        </p>
      </div>
      <div class="proforma-details">
        <table>
          <tr>
            <th>Performa Inv #</th>
            <td><?php echo strip_tags(html_entity_decode(SECURE(GetInvoiceFeilds("PERFORM_INVOICE_PRE_FEILDS"), "d"))); ?>-<?php echo $Orderid; ?></td>
          </tr>
          <tr>
            <th>Date</th>
            <td><?php echo GET_DATA("QuotationDate"); ?></td>
          </tr>
          <tr>
            <th>Due Date </th>
            <td><?php echo GET_DATA("QuotationDate"); ?></td>
          </tr>
          <tr>
            <th>Reference </th>
            <td><?php echo html_entity_decode(SECURE(GET_DATA("QuotationDetails"), "d")); ?></td>
          </tr>
        </table>
      </div>
    </div>
    <div class="product-desc">
      <table>
        <thead>
          <tr>
            <th>Sno</th>
            <th>Product Name & Description</th>
            <th>Qty</th>
            <th>Rate</th>
            <th>Amount</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $QuotationId = $Orderid;
          $fetchItems = SELECT("SELECT * FROM quotation_products where QuotationId='$Orderid' ORDER BY QuotationId ASC");
          $CountSno = 0;
          $NetTotal = 0;
          $QuotationProTaxValue = 0;
          $QuotationProPricewithTaxation = 0;
          while ($fetch = mysqli_fetch_array($fetchItems)) {
            $NetTotal += (int)$fetch['QuotationProTotalPrice'];
            $QuotationProTaxValue += (int)$fetch['QuotationProTaxValue'];
            $QuotationProPricewithTaxation += (int)$fetch['QuotationProPricewithTaxation'];
            $CountSno++;
            $QuotationProId = $fetch['QuotationProId'];
            $ProducType = FETCH("SELECT * FROM products where ProductId='$QuotationProId'", "ProductType");
            $ProductRefernceCode = FETCH("SELECT * FROM products where ProductId='$QuotationProId'", "ProductRefernceCode");
            if ($ProducType == "Services") {
              $Type = "SAC";
            } else {
              $Type = "HSN";
            } ?>
            <tr style="box-shadow: 0px 1px 0px 0px #8080800f;">
              <td><?php echo $CountSno; ?></td>
              <td style="font-size: 12px;">
                <?php echo html_entity_decode($fetch['QuotationProductName']); ?><br>
                <span><?php echo SECURE($fetch['QuotationProNotes'], "d"); ?></span>
              </td>
              <td align="center">
                <?php echo $fetch['QuotationProQty']; ?>
              </td>
              <td align="center">
                Rs.<?php echo $fetch['QuotationProPrice']; ?>
              </td>
              <td align="right">
                <b>Rs.<?php echo $fetch['QuotationProTotalPrice']; ?></b>
              </td>
            <?php } ?>
        </tbody>
      </table>
      <p class="into-text">Looking forward to your valuable business.</p>
      <table style="width:100% !important;text-align:right;">
        <tr>
          <th>Sub Total</th>
          <td>Rs.<?php echo $NetTotal; ?></td>
        </tr>
        <tr>
          <th>Tax & Charges</th>
          <td>
            <?php echo Price($QuotationProTaxValue); ?>
          </td>
        </tr>
        <tr>
          <th>Total</th>
          <td>
            <b><?php echo Price($QuotationProPricewithTaxation); ?></b>
          </td>
        </tr>
      </table>
      <p style="text-align:right;"><i>Total in words: <b id="priceinwords"></b></i></p>
    </div>
    <p style="font-size:0.85rem;color:#000;">
      <?php echo SECURE(GetInvoiceFeilds("PERFORMA_INV_PAYMENT_OPTION_DETAILS"), "d"); ?>
    </p>
    <div class="app-intro">
      <div style="font-size:0.75rem !important;width:60%;">
        <?php echo html_entity_decode(SECURE(GetInvoiceFeilds("PERFORMA_INV_FOOTER_TNC"), "d")); ?>
      </div>
      <div style="font-size:0.75rem;width:40%;text-align:right;">
        <b>For <?php echo APP_NAME; ?></b>

        <br><br><br><br><br><br><br>
        Authorized Signature
      </div>
    </div>
  </section>

  <script>
    function doConvert() {
      var numberInput = <?php echo $QuotationProPricewithTaxation; ?>;


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
      window.print();
    });
  </script>
</body>

</html>