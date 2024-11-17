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
$PageSqls = "SELECT * FROM quotations where quotations.QuotationId='$Orderid' ORDER BY QuotationId DESC";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo GET_DATA("QuotationNo"); ?>@<?php echo APP_NAME; ?></title>
</head>

<body onload="doConvert()" style="padding:1rem;font-size:14px;color: black;margin:auto;font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif !important;">

  <section style="padding:1rem;border-style:groove; border-width:thin;margin: auto; width: 800px;border: 1px solid green;height:max-content;display:block;border-radius:1rem;">
    <center>
      <img src="<?php echo $MAIN_LOGO; ?>" style="width: 100px;">
      <h5 style="margin-bottom: 0px;margin-top: -6px;font-size:20px !important;"><?php echo APP_NAME; ?></h5>
      <p style="margin-bottom: 0px;margin-top: -2px;"><b>Office Address</b> <?php echo SECURE(PRIMARY_ADDRESS, "d"); ?></p>
      <p style="margin-bottom: 0px;margin-top: -2px;">
        <b>Phone:</b> <?php echo PRIMARY_PHONE; ?>
        <b>Email:</b> <?php echo PRIMARY_EMAIL; ?>
        <b>Website:</b> <?php echo HOST; ?>
      </p>
      <p style="margin-bottom: 0px;margin-top: -2px;"><b>GST No:</b> <?php echo PRIMARY_GST; ?></p>
      <hr style="margin-bottom: 2px;margin-top: 2px;background-color: #80808024;color: aquamarine;height: 1px;border: none;">
      <p style="margin-bottom: 3px;margin-top: -2px;font-size:17px !important;background-color:#80808024;"><b>QUOTATION : <?php echo GET_DATA("QuotationNo"); ?></b></p>
    </center>
    <div style="display: flex;justify-content: space-between;">
      <p style="margin-bottom: 0px;margin-top: -2px;width: 35%;"><b>Shipping Address</b><br>
        <?php echo SECURE(GET_DATA("QuotationShippingAddress"), "d"); ?>
      </p>
      <p style="margin-bottom: 0px;margin-top: -2px;width: 35%;"><b>Billing Address</b><br>
        <?php echo SECURE(GET_DATA("QuotationBillingAddress"), "d"); ?>
      </p>
      <p style="margin-bottom: 0px;margin-top: -2px;width: 30%;">
        <span style="display: flex;justify-content: space-between;">
          <span><b>InvoiceNo:</b></span>
          <span> <?php echo GET_DATA("QuotationNo"); ?></span>
        </span>
        <span style="display: flex;justify-content: space-between;">
          <span><b>Ref Id:</b></span>
          <span> <?php echo $Orderid; ?></span>
        </span>
        <span style="display: flex;justify-content: space-between;">
          <span><b>Order Date:</b></span>
          <span> <?php echo GET_DATA("QuotationDate"); ?></span>
        </span>
        <span style="display: flex;justify-content: space-between;">
          <span><b>Invoice Amount:</b></span>
          <span><?php echo Price(GET_DATA("QuotationAmount")); ?></span>
        </span>
      </p>
    </div>
    <p style="margin-bottom: 0px;margin-top: 10px;text-align:center;text-transform:uppercase;background-color:#80808024;"><b>ITEM DETAILS</b></p>
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
        $QuotationId = GET_DATA("QuotationId");
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
        <th>Total Amount</th>
        <td style="font-size:13px;">Rs.<?php echo $NetTotal; ?></td>
      </tr>
      <tr>
        <th>Tax & Charges</th>
        <td style="font-size:13px;">
          <?php echo Price($QuotationProTaxValue); ?>
        </td>
      </tr>
      <tr>
        <th>Net Payable Amount</th>
        <td style="font-size:15px;">
          <b><?php echo Price($QuotationProPricewithTaxation); ?></b>
        </td>
      </tr>
    </table>
    <hr style="margin-bottom: 3px;margin-top: 3px;background-color: #80808024;color: aquamarine;height: 1px;border: none;">
    <p style="font-size: 13px;margin-bottom: 0px;margin-top: -2px;text-align:right;"><b>Amount in Words: </b> <span id="priceinwords"></span> Only</p>
    <p style="font-size: 13px;margin-bottom: 0px;margin-top: 50px;text-align:center;">
      This is a computer generated invoice no need of physical signature
    </p>
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
      //	window.print();
    });
  </script>
</body>

</html>