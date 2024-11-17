<?php
//add controller helper files
require 'helper.php';

//add aditional requirements
require '../require/admin/sessionvariables.php';

//create new events
if (isset($_POST['CreateNewEvents'])) {
 $EventsName = $_POST['EventsName'];
 $EventsDateFrom = date("Y-m-d", strtotime($_POST['EventsDateFrom']));
 $EventsTimeFrom = $_POST['EventsTimeFrom'];
 $EventsDateTo = date("Y-m-d", strtotime($_POST['EventsDateTo']));
 $EventsTimeTo = $_POST['EventsTimeTo'];
 $EventsLocations = POST("EventsLocations");
 $EventsDescriptions = POST("EventsDescriptions");
 $EventCreatedAt = date("d-m-Y h:m A");
 $EventUpdatdAt = date("Y-m-d h:m A");
 $EventCreatedBy = LOGIN_UserId;
 $EventRelatedTo = $_POST['EventRelatedTo'];

 $Save = SAVE("events", ["EventsName", "EventUpdatdAt", "EventRelatedTo", "EventsDateFrom", "EventsTimeFrom", "EventsDateTo", "EventsTimeTo", "EventsLocations", "EventsDescriptions", "EventCreatedAt", "EventCreatedBy"]);
 RESPONSE($Save, "Events has been created successfully", "Events has not been created successfully");

 //update events
} elseif (isset($_POST['UpdateEvents'])) {
 $EventsId = SECURE($_POST['UpdateEvents'], "d");
 $EventsName = $_POST['EventsName'];
 $EventsDateFrom = $_POST['EventsDateFrom'] != "" ? date("Y-m-d", strtotime($_POST['EventsDateFrom'])) : "";
 $EventsTimeFrom = $_POST['EventsTimeFrom'];
 $EventsDateTo = $_POST['EventsDateTo'] != "" ? date("Y-m-d", strtotime($_POST['EventsDateTo'])) : "";
 $EventsTimeTo = $_POST['EventsTimeTo'];
 $EventsLocations = POST("EventsLocations");
 $EventsDescriptions = POST("EventsDescriptions");
 $EventCreatedBy = $_POST['EventCreatedBy'];
 $EventRelatedTo = $_POST['EventRelatedTo'];
 $EventUpdatdAt = date("Y-m-d h:m A");

 $Update = UPDATE_TABLE("events", ["EventsName", "EventRelatedTo", "EventsDateFrom", "EventsTimeFrom", "EventsDateTo", "EventsTimeTo", "EventsLocations", "EventsDescriptions", "EventUpdatdAt", "EventCreatedBy"], "EventsId='$EventsId'");
 RESPONSE($Update, "Events Details are updated successfully", "Events Details are not updated successfully");

 //delete events 
} elseif (isset($_GET['delete_events_records'])) {
 $delete_events_records = SECURE($_GET['delete_events_records'], "d");
 $access_url = SECURE($_GET['access_url'], "d");

 if ($delete_events_records == true) {
  $control_id = SECURE($_GET['control_id'], "d");
  $delete_events_records = DELETE_FROM("events", "EventsId='$control_id'");
  RESPONSE($delete_events_records, "Events Record Deleted Successfully", "Events Record Not Deleted Successfully");
 } else {
  RESPONSE(false, "Events Record Not Deleted Successfully", "Events Record Deleted Successfully");
 }
}
