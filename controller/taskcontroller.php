<?php
//add controller helper files
require 'helper.php';

//add aditional requirements
require '../require/admin/sessionvariables.php';

//create new task 
if (isset($_POST['CreateNewTasks'])) {
 $TasksName = $_POST['TasksName'];
 $TaskDueDate = $_POST['TaskDueDate'] != "" ? date("Y-m-d", strtotime($_POST['TaskDueDate'])) : "";
 $TaskRelatedTo = $_POST['TaskRelatedTo'];
 $TaskPriority = $_POST['TaskPriority'];
 $TaskCreatedAt = date("Y-m-d H:i:s");
 $TaskCreatedBy = LOGIN_UserId;
 $TaskCreatedFor = $_POST['TaskCreatedFor'];
 $TaskDescriptions = POST("TaskDescriptions");
 $TaskUpdatedAt = date("Y-m-d h:m A");

 $Save = SAVE("tasks", ["TasksName", "TaskDescriptions", "TaskUpdatedAt", "TaskDueDate", "TaskRelatedTo", "TaskPriority", "TaskCreatedFor", "TaskCreatedAt", "TaskCreatedBy"]);
 RESPONSE($Save, "New Task Created Successfully!", "Unable to create new tasks at the moment!");

 //update tasks details 
} elseif (isset($_POST['UpdateTasks'])) {
 $TasksId = SECURE($_POST['UpdateTasks'], "d");
 $TasksName = $_POST['TasksName'];
 $TaskDueDate = $_POST['TaskDueDate'] != "" ? date("Y-m-d", strtotime($_POST['TaskDueDate'])) : "";
 $TaskRelatedTo = $_POST['TaskRelatedTo'];
 $TaskPriority = $_POST['TaskPriority'];
 $TaskCreatedAt = date("Y-m-d H:i:s");
 $TaskCreatedBy = $_POST['TaskCreatedBy'];
 $TaskCreatedFor = $_POST['TaskCreatedFor'];
 $TaskDescriptions = POST("TaskDescriptions");
 $TaskUpdatedAt = date("Y-m-d h:m A");

 $Update = UPDATE_TABLE("tasks", ["TasksName", "TaskDescriptions", "TaskDueDate", "TaskRelatedTo", "TaskPriority", "TaskCreatedFor", "TaskUpdatedAt", "TaskCreatedBy"], "TasksId='$TasksId'");
 RESPONSE($Update, "Task Details are updated successfully!", "Unable to update tasks details at the moment!");

 //delete tasks 
} elseif (isset($_GET['delete_tasks_records'])) {
 $delete_tasks_records = SECURE($_GET['delete_tasks_records'], "d");
 $access_url = SECURE($_GET['access_url'], "d");

 if ($delete_tasks_records == true) {
  $control_id = SECURE($_GET['control_id'], "d");
  $delete_tasks_records = DELETE_FROM("tasks", "TasksId='$control_id'");
  RESPONSE($delete_tasks_records, "Task Record Deleted Successfully", "Task Record Not Deleted Successfully");
 } else {
  RESPONSE(false, "Task Record Not Deleted Successfully", "Task Record Deleted Successfully");
 }
}
