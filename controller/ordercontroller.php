<?php
//add controller helper files
require 'helper.php';

//add aditional requirements
require '../require/admin/sessionvariables.php';

//create order 
if (isset($_POST['generateorder'])) {
 $QuotationId = SECURE($_POST['QuotationId'], "d");
 $InvoiceNumber = TOTAL("SELECT * FROM invoices where InvoiceStatus='Ordered'") + 1;
 $InvoiceNumber = strtoupper(strip_tags(html_entity_decode(SECURE(GetInvoiceFeilds("INVOICE_HEADER_PRE_TEXT"), "d")))) . "-" . $InvoiceNumber;
 $InvoiceDate = date("Y-m-d H:i:s");
 $quotationquotoid = $QuotationId;
 $InvoiceUpdateDate  = null;
 $InvoiceStatus = "Ordered";

 //create invoice requirements
 $SAVE = SAVE("invoices", ["quotationquotoid", "InvoiceUpdateDate", "InvoiceDate", "InvoiceNumber", "InvoiceStatus"]);
 RESPONSE($SAVE, "Invoice created successfully", "Invoice creation failed");

 //invoice send to mail
} elseif (isset($_POST['SendInvoiceMail'])) {
 $invoiceid = SECURE($_POST['invoiceid'], "d");
 $InvoiceNumber = FETCH("SELECT * FROM invoices where invoicesid='" . $invoiceid . "'", "InvoiceNumber");
 $InvoiceDate = FETCH("SELECT * FROM invoices where invoicesid='" . $invoiceid . "'", "InvoiceDate");
 $InvoiceStatus = FETCH("SELECT * FROM invoices where invoicesid='" . $invoiceid . "'", "InvoiceStatus");

 $quotationquotoid = FETCH("SELECT * FROM invoices where invoicesid='" . $invoiceid . "'", "quotationquotoid");
 $QuotationReceiver = FETCH("SELECT * from quotations where QuotationId='" . $quotationquotoid . "'", "QuotationReceiver");
 $CustomerName = FETCH("SELECT * from customers where CustomerId='" . $QuotationReceiver . "'", "CustomerDisplayName");


 $InvoiceLinks = "<a href='" . DOMAIN . "/invoice.php?id=" . SECURE($invoiceid, "e") . "'>View Invoice</a>";
 $mailbody = $_POST['mailbody'] . "<br><br>" . $InvoiceLinks;

 foreach ($_POST['emails'] as $key => $emails) {
  SENDMAILS("Invoice Generated : $InvoiceNumber @ $InvoiceDate : $InvoiceStatus", "Dear, $CustomerName<br><br>", $emails, $mailbody);
 }

 RESPONSE(true, "Invoice sent successfully", "Invoice sending failed");
}
