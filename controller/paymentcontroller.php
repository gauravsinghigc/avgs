<?php
//add controller helper files
require 'helper.php';

//add aditional requirements
require '../require/admin/sessionvariables.php';

//receive payments
if (isset($_POST['PaymentReceived'])) {
  $PaidCustomerId = SECURE($_POST['PaidCustomerId'], "d");
  $PaidAmount = $_POST['PaidAmount'];
  $PaidDate = $_POST['PaidDate'];
  $PaymentMode = $_POST['PaymentMode'];
  $PaymentDescriptions = POST("PaymentDescriptions");
  $CustomerId = FETCH("SELECT * FROM customers where CustomerId='" . $PaidCustomerId . "'", "CustomerId");
  $CustomerDisplayName = FETCH("SELECT * FROM customers where CustomerId='" . $PaidCustomerId . "'", "CustomerDisplayName");
  $CustomerEmailId = FETCH("SELECT * FROM customers where CustomerId='" . $PaidCustomerId . "'", "CustomerEmailId");
  $CustomerSecondaryEmail = FETCH("SELECT * FROM customers where CustomerId='" . $PaidCustomerId . "'", "CustomerSecondaryEmail");
  $CustomerOtherEmail = FETCH("SELECT * FROM customers where CustomerId='" . $PaidCustomerId . "'", "CustomerOtherEmail");
  $ArrayEmail = array($CustomerEmailId, $CustomerSecondaryEmail, $CustomerOtherEmail);
  $PaidInvoiceId = $_POST['PaidInvoiceId'];
  $PaymentRefnumber = $_POST['PaymentRefnumber'];
  $PaymentDescriptions2 = "Payment is Received in favour of <b>$CustomerDisplayName</b> on $PaidDate having payment mode : <b>$PaymentMode</b>.<br>" . "
 <table>
          <tr>
            <th align='left'>
              Payment Date
            </th>
            <td align='left'>
              $PaidDate
            </td>
          </tr>
           <tr>
            <th align='left'>
              Amount Paid
            </th>
            <td align='left'>
              Rs.$PaidAmount Only
            </td>
          </tr>
          <tr>
            <th align='left'>
              Reference Number
            </th>
            <td align='left'>
              $PaymentRefnumber
            </td>
          </tr>
          <tr>
            <th align='left'>
              Payment Mode
            </th>
            <td align='left'>
              $PaymentMode
            </td>
          </tr>
          <tr>
            <th align='left'>
              Payment Note
            </th>
            <td align='left'>
              " . SECURE($PaymentDescriptions, "d") . "
            </td>
          </tr>
        </table>
 ";


  $Save = SAVE("payments", ["PaidCustomerId", "PaidAmount", "PaidDate", "PaymentMode", "PaymentDescriptions", "PaidInvoiceId", "PaymentRefnumber"]);
  $PaymentId = FETCH("SELECT * FROM payments ORDER BY PaymentId DESC LIMIT 1", "PaymentId");
  $PaymentDescriptions2 = $PaymentDescriptions2 . "<br><br><br>
 <a href='" . DOMAIN . "/pay-receipt.php?id=" . SECURE($PaymentId, 'e') . "' style='background-color:black;padding:1rem 3rem;color:white;text-decoration:none;'>View Payment Receipt</a>";
  if ($Save == true) {
    foreach ($ArrayEmail as $Email) {
      SENDMAILS("Payment Received : Rs.$PaidAmount @ $PaidDate : $PaymentMode", "Dear, $CustomerDisplayName<br><br>", $Email, $PaymentDescriptions2);
    }
  }

  RESPONSE($Save, "Payment received successfully", "Payment receiving failed");

  //delete payments 
} elseif (isset($_GET['delelte_payment_records'])) {
  $delelte_payment_records = SECURE($_GET['delelte_payment_records'], "d");
  $access_url = SECURE($_GET['access_url'], "d");

  if ($delelte_payment_records == true) {
    $control_id = SECURE($_GET['control_id'], "d");
    $Delete = DELETE_FROM("payments", "PaymentId='$control_id'");
    RESPONSE($Delete, "Payment Deleted Successfully!", "Unable to delete payment at the moment@");
  } else {
    RESPONSE(false, "Unable to delete payment at the moment!", "Payment Deleted Successfully!");
  }
}
