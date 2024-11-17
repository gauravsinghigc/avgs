<?php
//add controller helper files
require 'helper.php';

//add aditional requirements
require '../require/admin/sessionvariables.php';

if (isset($_GET['delete_logs'])) {
 $delete_logs = SECURE($_GET['delete_logs'], "d");
 $access_url = SECURE($_GET['access_url'], "d");

 //check action status  and delete logs
 if ($delete_logs == "true") {
  $SqlDeleteLogs = DELETE("DELETE FROM systemlogs WHERE logtype='LOGIN'");
  RESPONSE($SqlDeleteLogs, "Logs Deleted Successfully", "Logs Deletion Failed");
 } else {
  LOCATION("danger", "Logs Deletion Failed", $access_url);
 }

 //delete logs excluding login logs 
} elseif (isset($_GET['delete_activity_logs'])) {
 $delete_activity_logs = SECURE($_GET['delete_activity_logs'], "d");
 $access_url = SECURE($_GET['access_url'], "d");

 //check action status  and delete logs
 if ($delete_activity_logs == "true") {
  $SqlDeleteLogs = DELETE("DELETE FROM systemlogs WHERE logtype!='LOGIN'");
  RESPONSE($SqlDeleteLogs, "Logs Deleted Successfully", "Logs Deletion Failed");
 } else {
  LOCATION("danger", "Logs Deletion Failed", $access_url);
 }
 //unknown request will be throw unknown request on same requested page
} else {
 LOCATION("warning", "Invalid Request is provider to system controllers", $access_url);
}
