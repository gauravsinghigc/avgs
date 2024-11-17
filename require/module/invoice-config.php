<?php
//get invoice, quotation and all exportable or printable data fields value available in config modules via APP_DB
//invoice field 
//quotation fields
//exportable fields
//printable fields
//invoice fields
//receipts fields
//printable fields

function GetInvoiceFeilds($LocationName)
{

 //check filed is blank or not
 $Check = CHECK("SELECT * FROM config_invoices WHERE InvoiceConfigName='$LocationName'");

 //return if not null
 if ($Check != null) {
  $GetConfigFeildName = FETCH("SELECT * from config_invoices WHERE InvoiceConfigName='$LocationName'", "InvoiceConfigValue", true);

  //return data if field value is available or not 
  if ($GetConfigFeildName != null) {

   //return encrpted fileds value
   return $GetConfigFeildName;

   //return encrpted fileds value with null value;
  } else {
   return "null";
  }

  //return null in case of null value or
  //non avaibility of data for the particular entry
  //return null;
 } else {
  return "null";
 }
}
