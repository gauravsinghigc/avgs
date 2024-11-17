<?php
//add controller helper files
require 'helper.php';

//add aditional requirements
require '../require/admin/sessionvariables.php';

//remove invoice requirements
if (isset($_GET['delete_invoices_records'])) {
 $delete_invoices_records = SECURE($_GET['delete_invoices_records'], "d");
 $access_url = SECURE($_GET['access_url'], "d");

 if ($delete_invoices_records == true) {
  $control_id = SECURE($_GET['control_id'], "d");
  $Delete = DELETE_FROM("invoices", "invoicesid='$control_id'");
  RESPONSE($Delete, "Invoice Deleted Successfully!", "Unable to delete invoice at the moment@");
 } else {
  RESPONSE(false, "Unable to delete invoice at the moment!", "Invoice Deleted Successfully!");
 }
}
