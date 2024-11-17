<?php
//add controller helper files
require 'helper.php';

//add aditional requirements
require '../require/admin/sessionvariables.php';

//save files
if (isset($_POST['SaveCustomer'])) {

 //customer details
 $CustomerType = $_POST['CustomerType'];
 $CustomerFirstname = $_POST['CustomerFirstname'];
 $Customerlastname = $_POST['Customerlastname'];
 $CompanyName = $_POST['CompanyName'];
 $CustomerDisplayName = $_POST['CustomerDisplayName'];
 $CustomerWorkPhone = $_POST['CustomerWorkPhone'];
 $CustomerMobilePhone = $_POST['CustomerMobilePhone'];
 $CustomerEmailId = $_POST['CustomerEmailId'];
 $CustomerWebsite = $_POST['CustomerWebsite'];
 $CustomerCreatedAt = date("Y-m-d H:i:s");
 $CustomerUpdatedAt = null;
 $CustomerRemarks = SECURE($_POST['CustomerRemarks'], "e");
 $CustomerCreatedBy = LOGIN_UserId;
 $CustomerProfileImage = "user.png";
 $CustomerSecondaryEmail = $_POST['CustomerSecondaryEmail'];
 $CustomerOtherEmail = $_POST['CustomerOtherEmail'];
 $CustomerSalutation = $_POST['CustomerSalutation'];

 $SaveCustomer = SAVE("customers", ["CustomerType", "CustomerCreatedAt", "CustomerUpdatedAt", "CustomerSalutation", "CustomerFirstname", "Customerlastname", "CompanyName", "CustomerDisplayName", "CustomerWorkPhone", "CustomerMobilePhone", "CustomerEmailId", "CustomerWebsite", "CustomerCreatedBy", "CustomerRemarks", "CustomerSecondaryEmail", "CustomerOtherEmail"]);
 $FetchCustomers = SELECT("SELECT * FROM customers where CustomerWorkPhone='$CustomerWorkPhone' and CustomerMobilePhone='$CustomerMobilePhone' and CustomerEmailId='$CustomerEmailId'");
 $fetchdata = mysqli_fetch_array($FetchCustomers);
 $CustomerId = $fetchdata['CustomerId'];

 //save shipping address
 $CustomerStreetAddress1 = SECURE($_POST['CustomerStreetAddress1'], "e");
 $CustomerCity1 = $_POST['CustomerCity1'];
 $CustomerState1 = $_POST['CustomerState1'];
 $CustomerCountry1 = $_POST['CustomerCountry1'];
 $CustomerPincode1 = $_POST['CustomerPincode1'];

 $SaveCustomerShippingAddress = SAVE("customer_shipping_address", ["CustomerId", "CustomerStreetAddress1", "CustomerCity1", "CustomerState1", "CustomerCountry1", "CustomerPincode1"]);

 //save billing address
 $CustomerStreetAddress = SECURE($_POST['CustomerStreetAddress'], "e");
 $CustomerCity = $_POST['CustomerCity'];
 $CustomerState = $_POST['CustomerState'];
 $CustomerCountry = $_POST['CustomerCountry'];
 $CustomerPincode = $_POST['CustomerPincode'];

 $SaveCustomerBillingAddress = SAVE("customer_billing_address", ["CustomerId", "CustomerStreetAddress", "CustomerCity", "CustomerState", "CustomerCountry", "CustomerPincode"]);


 //customer contact person
 foreach ($_POST['CustomerContactPersonName'] as $key => $value) {
  $CustomerContactPersonName = $_POST['CustomerContactPersonName'][$key];
  $CustomerContactPersonPhone = $_POST['CustomerContactPersonPhone'][$key];
  $CustomerContactPersonEmailId = $_POST['CustomerContactPersonEmailId'][$key];
  $CustomerContactPersonDesignation = $_POST['CustomerContactPersonDesignation'][$key];
  $CustomerContactPersonDepartment = $_POST['CustomerContactPersonDepartment'][$key];
  $CustomerContactPersonWorkEmailId = $_POST['CustomerContactPersonWorkEmailId'][$key];
  $Save = SAVE("customer_contact_person", ["CustomerContactPersonName", "CustomerContactPersonWorkEmailId", "CustomerId", "CustomerContactPersonPhone", "CustomerContactPersonEmailId", "CustomerContactPersonDesignation", "CustomerContactPersonDepartment"]);
 }

 RESPONSE($Save, "Customer Saved Succesfully!", "Unable to save customer!");

 //delete customers
} elseif (isset($_GET['delete_customers'])) {
 $delete_customers = SECURE($_GET['delete_customers'], "d");
 $access_url = SECURE($_GET['access_url'], "d");

 if ($delete_customers == true) {
  $control_id = SECURE($_GET['control_id'], "d");
  $delete = DELETE_FROM("customers", "CustomerId='$control_id'");
  $delete = DELETE_FROM("customer_shipping_address", "CustomerId='$control_id'");
  $delete = DELETE_FROM("customer_billing_address", "CustomerId='$control_id'");
  $delete = DELETE_FROM("customer_contact_person", "CustomerId='$control_id'");
  RESPONSE($delete, "Customer Deleted Succesfully!", "Unable to delete customer!");
 } else {
  LOCATiON("warning", "Invalid Request!", $access_url);
 }

 //update customer details 
} elseif (isset($_POST['UpdateCustomerDetails'])) {
 $CustomerId = SECURE($_POST['UpdateCustomerDetails'], "d");
 $CustomerType = $_POST['CustomerType'];
 $CustomerFirstname = $_POST['CustomerFirstname'];
 $Customerlastname = $_POST['Customerlastname'];
 $CompanyName = $_POST['CompanyName'];
 $CustomerDisplayName = $_POST['CustomerDisplayName'];
 $CustomerWorkPhone = $_POST['CustomerWorkPhone'];
 $CustomerMobilePhone = $_POST['CustomerMobilePhone'];
 $CustomerEmailId = $_POST['CustomerEmailId'];
 $CustomerWebsite = $_POST['CustomerWebsite'];
 $CustomerUpdatedAt = date("Y-m-d H:i:s");
 $CustomerRemarks = SECURE($_POST['CustomerRemarks'], "e");
 $CustomerCreatedBy = LOGIN_UserId;
 $CustomerProfileImage = "user.png";
 $CustomerSecondaryEmail = $_POST['CustomerSecondaryEmail'];
 $CustomerOtherEmail = $_POST['CustomerOtherEmail'];
 $CustomerSalutation = $_POST['CustomerSalutation'];

 $UpdateCustomer = UPDATE_TABLE("customers", ["CustomerType", "CustomerUpdatedAt", "CustomerSalutation", "CustomerFirstname", "Customerlastname", "CompanyName", "CustomerDisplayName", "CustomerWorkPhone", "CustomerMobilePhone", "CustomerEmailId", "CustomerWebsite", "CustomerCreatedBy", "CustomerRemarks", "CustomerSecondaryEmail", "CustomerOtherEmail"], "CustomerId='$CustomerId'");
 RESPONSE($UpdateCustomer, "Customer Updated Succesfully!", "Unable to update customer!");

 //add new address
} elseif (isset($_POST['AddNewAddress'])) {
 $CustomerId = SECURE($_POST['AddNewAddress'], "d");

 //save shipping address
 $CustomerStreetAddress1 = SECURE($_POST['CustomerStreetAddress1'], "e");
 $CustomerCity1 = $_POST['CustomerCity1'];
 $CustomerState1 = $_POST['CustomerState1'];
 $CustomerCountry1 = $_POST['CustomerCountry1'];
 $CustomerPincode1 = $_POST['CustomerPincode1'];

 $SaveCustomerShippingAddress = SAVE("customer_shipping_address", ["CustomerId", "CustomerStreetAddress1", "CustomerCity1", "CustomerState1", "CustomerCountry1", "CustomerPincode1"]);

 //save billing address
 $CustomerStreetAddress = SECURE($_POST['CustomerStreetAddress'], "e");
 $CustomerCity = $_POST['CustomerCity'];
 $CustomerState = $_POST['CustomerState'];
 $CustomerCountry = $_POST['CustomerCountry'];
 $CustomerPincode = $_POST['CustomerPincode'];

 $SaveCustomerBillingAddress = SAVE("customer_billing_address", ["CustomerId", "CustomerStreetAddress", "CustomerCity", "CustomerState", "CustomerCountry", "CustomerPincode"]);
 RESPONSE($SaveCustomerBillingAddress, "Customer New Address Added Successfully!", "Unable to add new address");

 //add new contact person
} elseif (isset($_POST['SaveNewPerson'])) {
 $CustomerId = SECURE($_POST['SaveNewPerson'], "d");
 $CustomerContactPersonName = $_POST['CustomerContactPersonName'];
 $CustomerContactPersonPhone = $_POST['CustomerContactPersonPhone'];
 $CustomerContactPersonEmailId = $_POST['CustomerContactPersonEmailId'];
 $CustomerContactPersonWorkEmailId = $_POST['CustomerContactPersonWorkEmailId'];
 $CustomerContactPersonDesignation = $_POST['CustomerContactPersonDesignation'];
 $CustomerContactPersonDepartment = $_POST['CustomerContactPersonDepartment'];
 $Save = SAVE("customer_contact_person", ["CustomerContactPersonName", "CustomerContactPersonWorkEmailId", "CustomerId", "CustomerContactPersonPhone", "CustomerContactPersonEmailId", "CustomerContactPersonDesignation", "CustomerContactPersonDepartment"]);
 RESPONSE($Save, "Customer Contact Person Added Successfully!", "Unable to add new contact person");

 //update custoemr address billing address
} elseif (isset($_POST['UpdateAddress'])) {
 $CustomerBillingAddress = SECURE($_POST['UpdateAddress'], "d");
 $CustomerStreetAddress = SECURE($_POST['CustomerStreetAddress'], "e");
 $CustomerCity = $_POST['CustomerCity'];
 $CustomerState = $_POST['CustomerState'];
 $CustomerCountry = $_POST['CustomerCountry'];
 $CustomerPincode = $_POST['CustomerPincode'];

 $SaveCustomerBillingAddress = UPDATE_TABLE("customer_billing_address", ["CustomerStreetAddress", "CustomerCity", "CustomerState", "CustomerCountry", "CustomerPincode"], "CustomerBillingAddress='$CustomerBillingAddress'");
 RESPONSE($SaveCustomerBillingAddress, "Customer Address Updated Successfully!", "Unable to update address");

 //delete billing address
} elseif (isset($_GET['delete_billing_Address'])) {
 $CustomerBillingAddress = SECURE($_GET['control_id'], "d");
 $access_url = SECURE($_GET['access_url'], "d");

 $CheckRequestAndDelete = CheckRequestsAndDelete("delete_billing_Address", "customer_billing_address", "CustomerBillingAddress='$CustomerBillingAddress'");
 if ($CheckRequestAndDelete == true) {
  $access_url = DOMAIN . "/admin/customers/details/";
 } else {
  $access_url = $access_url;
 }

 ReturnRequestResultsToSender($CheckRequestAndDelete, "Address Deleted Successfully!", "Unable to delete address", "Delete Request is not valid");

 //update shipping address
} elseif (isset($_POST['UpdateShippingAddress'])) {
 $CustomerShippingAddress = SECURE($_POST['UpdateShippingAddress'], "d");
 $CustomerStreetAddress1 = SECURE($_POST['CustomerStreetAddress1'], "e");
 $CustomerCity1 = $_POST['CustomerCity1'];
 $CustomerState1 = $_POST['CustomerState1'];
 $CustomerCountry1 = $_POST['CustomerCountry1'];
 $CustomerPincode1 = $_POST['CustomerPincode1'];

 $SaveCustomerShippingAddress = UPDATE_TABLE("customer_shipping_address", ["CustomerStreetAddress1", "CustomerCity1", "CustomerState1", "CustomerCountry1", "CustomerPincode1"], "CustomerShippingAddress='$CustomerShippingAddress'");
 RESPONSE($SaveCustomerShippingAddress, "Customer Shipping Address Updated Successfully!", "Unable to update shipping address");

 //delete shipping address
} elseif (isset($_GET['delete_shipping_Address'])) {
 $CustomerShippingAddress = SECURE($_GET['control_id'], "d");
 $access_url = SECURE($_GET['access_url'], "d");

 $CheckRequestAndDelete = CheckRequestsAndDelete("delete_shipping_Address", "customer_shipping_address", "CustomerShippingAddress='$CustomerShippingAddress'");

 if ($CheckRequestAndDelete == true) {
  $access_url = DOMAIN . "/admin/customers/details";
 } else {
  $access_url = $access_url;
 }

 ReturnRequestResultsToSender($CheckRequestAndDelete, "Shipping Address deleted Successfully!", "Umable to delete shipping address", "Delete request is not valid!");

 //update contact persons
} elseif (isset($_POST['UpdateContactPersonDetails'])) {
 $CustomerContactPersons = SECURE($_POST['UpdateContactPersonDetails'], "d");
 $CustomerContactPersonName = $_POST['CustomerContactPersonName'];
 $CustomerContactPersonPhone = $_POST['CustomerContactPersonPhone'];
 $CustomerContactPersonEmailId = $_POST['CustomerContactPersonEmailId'];
 $CustomerContactPersonWorkEmailId = $_POST['CustomerContactPersonWorkEmailId'];
 $CustomerContactPersonDesignation = $_POST['CustomerContactPersonDesignation'];
 $CustomerContactPersonDepartment = $_POST['CustomerContactPersonDepartment'];

 $Update = UPDATE_TABLE("customer_contact_person", ["CustomerContactPersonName", "CustomerContactPersonWorkEmailId", "CustomerContactPersonPhone", "CustomerContactPersonEmailId", "CustomerContactPersonDesignation", "CustomerContactPersonDepartment"], "CustomerContactPersons='$CustomerContactPersons'");
 RESPONSE($Update, "Contact Person Details are updated successfully! ", "Unable to update contact person details!");

 //delete contact person 
} elseif (isset($_GET['delete_contact_persons'])) {
 $CustomerContactPersons = SECURE($_GET['control_id'], "d");
 $access_url = SECURE($_GET['access_url'], "d");

 //check request and delete
 $CheckRequestAndDelete = CheckRequestsAndDelete("delete_contact_persons", "customer_contact_person", "CustomerContactPersons='$CustomerContactPersons'");

 if ($CheckRequestAndDelete == true) {
  $access_url = DOMAIN . "/admin/customers/details";
 } else {
  $access_url = $access_url;
 }

 ReturnRequestResultsToSender($CheckRequestAndDelete, "Contact Person Details deleted successfully!", "Unable to delete Contact Person Details", "invalid request for contact person details");

 //add new shipping address
} elseif (isset($_POST['AddNewShippingAddress'])) {
 $CustomerId = SECURE($_POST['AddNewShippingAddress'], "d");

 //save shipping address
 $CustomerStreetAddress1 = SECURE($_POST['CustomerStreetAddress1'], "e");
 $CustomerCity1 = $_POST['CustomerCity1'];
 $CustomerState1 = $_POST['CustomerState1'];
 $CustomerCountry1 = $_POST['CustomerCountry1'];
 $CustomerPincode1 = $_POST['CustomerPincode1'];

 $SaveCustomerShippingAddress = SAVE("customer_shipping_address", ["CustomerId", "CustomerStreetAddress1", "CustomerCity1", "CustomerState1", "CustomerCountry1", "CustomerPincode1"]);
 RESPONSE($SaveCustomerShippingAddress, "Shipping Address Details Saved Successfully!", "Unable to save shipping address details");

 //add new billing address
} elseif (isset($_POST['AddNewBillingAddress'])) {
 $CustomerId = SECURE($_POST['AddNewBillingAddress'], "d");

 //save billing address
 $CustomerStreetAddress = SECURE($_POST['CustomerStreetAddress1'], "e");
 $CustomerCity = $_POST['CustomerCity1'];
 $CustomerState = $_POST['CustomerState1'];
 $CustomerCountry = $_POST['CustomerCountry1'];
 $CustomerPincode = $_POST['CustomerPincode1'];

 $SaveCustomerBillingAddress = SAVE("customer_billing_address", ["CustomerId", "CustomerStreetAddress", "CustomerCity", "CustomerState", "CustomerCountry", "CustomerPincode"]);
 RESPONSE($SaveCustomerBillingAddress, "New Billing Address is saved Successfully!", "Unable to save new billing address at the moment");
}
