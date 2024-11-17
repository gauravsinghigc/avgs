<?php
//add controller helper files
require 'helper.php';

//add aditional requirements
require '../require/admin/sessionvariables.php';

//create calls
if (isset($_POST['CreateNewCalls'])) {
 $CallsRelatedTo = $_POST['CallsRelatedTo'];
 $CallingCreatedBy = $_POST['CallingCreatedBy'];
 $CallingDate = date("Y-m-d", strtotime($_POST['CallingDate']));
 $CallingTime = date("h:m A", strtotime($_POST['CallingTime']));
 $CallingType = $_POST['CallingType'];
 $CallingNotes = POST("CallingNotes");
 $CallingCreatedAt = date("Y-m-d H:i:s");
 $CallUpdatedAt = date("Y-m-d h:m A");

 //save calls
 $SaveCalls = SAVE("calls", ["CallingNotes", "CallUpdatedAt", "CallingCreatedBy", "CallingCreatedAt", "CallsRelatedTo", "CallingDate", "CallingTime", "CallingType"]);

 RESPONSE($SaveCalls, "Call Record Saved Successfully", "Call Record Not Saved Successfully");

 //update calls
} elseif (isset($_POST['UpdateCallStatus'])) {
 $CallsId = SECURE($_POST['UpdateCallStatus'], "d");
 $CallingCreatedBy = $_POST['CallingCreatedBy'];
 $CallingDate = $_POST['CallingDate'];
 $CallingTime = $_POST['CallingTime'];
 $CallingNotes = POST("CallingNotes");
 $CallUpdatedAt = date("Y-m-d h:m A");
 $CallsRelatedTo = $_POST['CallsRelatedTo'];
 $CallingType = $_POST['CallingType'];

 $Update = UPDATE_TABLE("calls", ["CallingNotes", "CallingCreatedBy", "CallUpdatedAt", "CallsRelatedTo", "CallingDate", "CallingTime", "CallingType"], "CallsId='$CallsId'");
 RESPONSE($Update, "Call Details are updated successfully!", "Unable to update calls details at the moment!");

 //delete calls
} elseif (isset($_GET['delete_calls_records'])) {
 $delete_calls_records = SECURE($_GET['delete_calls_records'], "d");
 $access_url = SECURE($_GET['access_url'], "d");

 if ($delete_calls_records == true) {
  $control_id = SECURE($_GET['control_id'], "d");
  $delete_calls_records = DELETE_FROM("calls", "CallsId='$control_id'");
  RESPONSE($delete_calls_records, "Call Record Deleted Successfully", "Call Record Not Deleted Successfully");
 } else {
  RESPONSE(false, "Call Record Not Deleted Successfully", "Call Record Deleted Successfully");
 }
}
