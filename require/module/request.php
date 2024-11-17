<?php
//POST DATA
function POST($data)
{
 $results = SECURE(htmlentities($_POST["$data"]), "e");
 if ($_POST["$data"] == null or $_POST["$data"] == "") {
  return null;
 } else {
  return $results;
 }
}


//GET DATA
function GET($data)
{
 $results = SECURE(htmlentities($_GET["$data"]), "e");
 if ($_GET["$data"] == null or $_GET["$data"] == "") {
  return null;
 } else {
  return $results;
 }
}

//Request DATA
function REQUEST($data)
{
 $results = SECURE(htmlentities($_REQUEST["$data"]), "e");
 if ($_REQUEST["$data"] == null or $_REQUEST["$data"] == "") {
  return null;
 } else {
  return $results;
 }
}

//if request
function IfRequested($method = "GET", $name, $sec = true)
{

 //check request and return values via get
 if ($method == "GET") {
  if (isset($_GET["$name"])) {
   $RequestedValue = $_GET["$name"];
  } else {
   $RequestedValue = null;
  }

  // check request and return values vai post
 } elseif ($method == "POST") {
  if (isset($_POST["$name"])) {
   $RequestedValue = $_POST["$name"];
  } else {
   $RequestedValue = null;
  }

  //check request and return values via any request
 } elseif ($method == "REQUEST") {
  if (isset($_POST["$name"])) {
   $RequestedValue = $_REQUEST["$name"];
  } else {
   $RequestedValue = null;
  }

  //with no request 
 } else {
  $RequestedValue = null;
 }

 //securiyt or enct
 if ($sec == true) {
  $RequestedValue = SECURE($RequestedValue, "e");
 } elseif ($sec == false) {
  $RequestedValue = $RequestedValue;
 } else {
  $RequestedValue = $RequestedValue;
 }

 return $RequestedValue;
}

//Request data or display default value
function RequestFor($method, $RequestedData, $ReturnDefault)
{
 if (IfRequested("$method", $RequestedData, false) == null) {
  return $ReturnDefault;
 } else {
  return IfRequested("$method", $RequestedData, false);
 }
}

//delete requests
function CheckRequestsAndDelete($Req_name, $tablename, $conditions)
{
 $Check_Requests = SECURE($_REQUEST["$Req_name"], "d");

 //check request and delete if valid
 if ($Check_Requests == true) {
  $Delete = DELETE_FROM("$tablename", "$conditions");

  //return request results
  if ($Delete == true) {
   return true;
  } else {
   return false;
  }

  //return null or invalid request
 } else {
  return null;
 }
}


//function for return value CheckRequestsAndDelete
function ReturnRequestResultsToSender($Req_Allowed, $Msg_Success, $Msg_Failed, $Msg_Null)
{

 //get global access url
 global $access_url;

 if ($Req_Allowed == true) {
  LOCATION("success", "$Msg_Success", $access_url);
 } else if ($Req_Allowed == false) {
  LOCATION("warning", "$Msg_Failed", $access_url);
 } else {
  LOCATION("warning", "$Msg_Null", $access_url);
 }
}

//function Query status 
function QueryStatus($QueryStatus, $type)
{
 if ($QueryStatus == true) {
  echo "--- Query $type-> <b>Completed </b> -> Status : <b>$QueryStatus</b><br>";
 } else {
  echo "--- Query $type-> <b>Failed</b> -> Status : <b>$QueryStatus</b><br>";
 }
}
