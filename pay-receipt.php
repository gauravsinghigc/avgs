<?php
require 'require/modules.php';
?>
<?php
if (isset($_GET['id'])) {
  $PaymentId = SECURE($_GET['id'], "d");
  $_SESSION['VIEW_INVOICE_ID'] = $PaymentId;
} else {
  $PaymentId = $_SESSION['VIEW_INVOICE_ID'];
}

$PageSqls = "SELECT * FROM payments where PaymentId='$PaymentId' ORDER BY PaymentId DESC";
$PaidInvoiceId = GET_DATA("PaidInvoiceId");
$quotationquotoid = FETCH("SELECT * FROM invoices where invoicesid='$PaidInvoiceId'", "quotationquotoid");
$QuotationBillingAddress = FETCH("SELECT * FROM quotations where QuotationId='$quotationquotoid'", "QuotationBillingAddress");
$QuotationReceiver = FETCH("SELECT * FROM quotations where QuotationId='$quotationquotoid'", "QuotationReceiver");
$CustomerDisplayName = FETCH("SELECT * FROM customers where CustomerId='$QuotationReceiver'", "CustomerDisplayName");
$QuotationNo = FETCH("SELECT * FROM quotations where QuotationId='$quotationquotoid'", "QuotationNo");
$InvoiceNumber = FETCH("SELECT * FROM invoices where invoicesid='$PaidInvoiceId'", "InvoiceNumber");
$QuotationAmount = FETCH("SELECT * FROM quotations where QuotationId='$quotationquotoid'", "QuotationAmount");
$PaymentRefnumber = FETCH("SELECT * FROM payments where PaymentId='$PaymentId'", "PaymentRefnumber");
$PaidDate = FETCH("SELECT * FROM payments where PaymentId='$PaymentId'", "PaidDate");
$PaymentMode = FETCH("SELECT * FROM payments where PaymentId='$PaymentId'", "PaymentMode");
$PaidAmount = FETCH("SELECT * FROM payments where PaymentId='$PaymentId'", "PaidAmount");
$PaymentDescriptions = FETCH("SELECT * FROM payments where PaymentId='$PaymentId'", "PaymentDescriptions");
$InvoiceDate = FETCH("SELECT * FROM invoices where invoicesid='$PaidInvoiceId'", "InvoiceDate");
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
  <title>Payment Receipt #2022-2023-001</title>
  <?php include 'include/header_files.php'; ?>
  <style>
    html,
    body {
      font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    }

    section {
      width: 800px;
      padding: 0.6rem !important;
      box-shadow: 0px 0px 1px black;
    }

    .flex-space-between {
      display: flex;
      justify-content: space-between;
      width: 100%;
    }

    .flex-space-between .logo img {
      width: 80%;
    }

    .app-details {
      text-align: left;
      font-size: 0.9rem !important;
      line-height: 1rem;
      width: 100%;
    }

    .app-details h4 {
      text-align: left !important;
      font-size: 1.4rem !important;
      margin-bottom: 0px;
      color: black;
    }

    .app-details p {
      text-align: left !important;
      color: grey;
    }

    .p-title {
      text-align: center;
      font-weight: 700;
      margin-top: 1rem;
      margin-bottom: 1rem;
      text-transform: uppercase;
      font-size: 1.3rem;
      text-decoration: underline grey 1px;
    }

    hr {
      background-color: lightgray;
      margin-top: 2rem;
      margin-bottom: 2rem;
    }

    .p-details {
      width: 60%;
    }

    .p-details table {
      width: 100%;
      margin-top: 1rem;
    }

    .p-details table tr th {
      color: #afaeae;
      text-align: left;
      width: 35%;
    }

    .p-details table tr td {
      color: #000000c7;
      font-weight: 800;
      display: block;
      width: 100%;
      border-bottom-style: groove;
      border-width: thin;
      border-color: #ffffff63;
    }

    .p-details table tr th,
    .p-details table tr td {
      padding: 0.3rem;
      text-align: left;
    }

    .amount-details {
      background-color: greenyellow;
      padding: 1rem;
      width: 30%;
    }

    .price p {
      display: flex;
      justify-content: space-between;
      flex-direction: column;
      text-align: center;
    }

    .price-d {
      font-size: 1.7rem;
      font-weight: 700;
    }

    .r-text {
      color: grey;
      margin-bottom: 0px;
    }

    .m-t-0 {
      margin-top: 0px;
    }

    .m-b-0 {
      margin-bottom: 0px;
    }

    .payment-for {
      width: 100%;
    }

    .payment-for thead tr {
      background-color: #afaeae;
    }

    .payment-for th {
      background-color: #afaeae;
      color: black;
      text-align: left;
      border: none;
      padding: 0.4rem;
    }

    .payment-for tr td {
      border: none;
      padding: 0.4rem;
      font-size: 1rem;
      color: black;
    }

    .payment-for tr td i {
      font-size: 00.9rem;
      margin-right: 1px;
    }
  </style>
</head>

<body>
  <section>
    <div class="flex-space-between">
      <div class="logo">
        <img src="<?php echo MAIN_LOGO; ?>">
      </div>
      <div class="app-details">
        <h4><?php echo APP_NAME; ?></h4>
        <p>
          <span><?php echo SECURE(PRIMARY_ADDRESS, "d"); ?></span><br>
          <span><?php echo SECURE(PRIMARY_AREA, "d"); ?></span>, <?php echo SECURE(PRIMARY_CITY, "d"); ?><br>
          <span> <?php echo SECURE(PRIMARY_STATE, "d"); ?> - <?php echo SECURE(PRIMARY_PINCODE, "d"); ?></span><br>
          <span><?php echo PRIMARY_PHONE; ?></span><br>
          <span><?php echo PRIMARY_EMAIL; ?></span><br>
          <br>
          <span>GST No <?php echo GST_NO; ?></span><br>
          <span>TAX No <?php echo TAX_NO; ?></span><br>
        </p>
      </div>
    </div>
    <hr>
    <h4 class="p-title">Payment Receipt</h4>
    <div class="flex-space-between">
      <div class="p-details">
        <table>
          <tr>
            <th>
              Payment Date
            </th>
            <td>
              <?php echo $PaidDate; ?>
            </td>
          </tr>
          <tr>
            <th>
              Reference Number
            </th>
            <td>
              <?php echo $PaymentRefnumber; ?>
            </td>
          </tr>
          <tr>
            <th>
              Payment Mode
            </th>
            <td>
              <?php echo $PaymentMode; ?>
            </td>
          </tr>
          <tr>
            <th>
              Payment Note
            </th>
            <td>
              <?php echo SECURE($PaymentDescriptions, "d"); ?>
            </td>
          </tr>
        </table>
      </div>
      <div class="amount-details">
        <div class="price">
          <p>
            <span class="flex-space">Amount Received</span>
            <span class="price-d"><i class="fa fa-inr"></i><?php echo $PaidAmount; ?></span>
          </p>
        </div>
      </div>
    </div>
    <p><b class="r-text">Amount in words :</b> <b><span id="priceinwords"></span></b></p>
    <h4 class="r-text">Bill To</h4>
    <p class="m-t-0">
      <span><b><?php echo $CustomerDisplayName; ?></b></span><br>
      <?php echo $QuotationBillingAddress; ?>
    </p>
    <br><br>
    <hr>
    <h3>Payment For</h3>
    <table class="payment-for">
      <thead>
        <tr>
          <th>Invoice Number</th>
          <th>Invoice Date</th>
          <th>Invoice Amount</th>
          <th>Total Paid Amount</th>
          <th>Balance</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><?php echo $InvoiceNumber; ?></td>
          <td><?php echo $InvoiceDate; ?></td>
          <td><i class="fa fa-inr"></i><?php echo $QuotationAmount; ?></td>
          <td>
            <i class="fa fa-inr"></i>
            <?php
            $TotalPaidAmountQuery = SELECT("SELECT * FROM payments where PaidInvoiceId='$PaidInvoiceId'");
            $NetPaidAmount = 0;
            while ($TotalPaidAmount = mysqli_fetch_array($TotalPaidAmountQuery)) {
              $NetPaidAmount += $TotalPaidAmount['PaidAmount'];
            }
            echo $NetPaidAmount; ?>
          </td>
          <td>
            <i class="fa fa-inr"><?php echo $QuotationAmount - $NetPaidAmount; ?></i>
          </td>
        </tr>
      </tbody>
    </table>
  </section>
  <script>
    window.onload = function() {
      doConvert();
    };

    function doConvert() {
      var numberInput = <?php echo $PaidAmount; ?>;


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

      document.getElementById("priceinwords").innerHTML = outputText + "Only";
    }
  </script>
</body>

</html>