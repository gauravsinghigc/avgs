<?php
//add controller helper files
require 'helper.php';

//add aditional requirements
require '../require/admin/sessionvariables.php';


//create new branch
if (isset($_POST['createbranch'])) {
 $BrancheName = $_POST['BrancheName'];
 $BrancheStreetAddress = SECURE($_POST['BrancheStreetAddress'], "e");
 $BrancheStreetAddress2 = SECURE($_POST['BrancheStreetAddress2'], "e");
 $BrancheCity = $_POST['BrancheCity'];
 $BrancheState = $_POST['BrancheState'];
 $BranchePincode = $_POST['BranchePincode'];
 $BrancheContactPerson = $_POST['BrancheContactPerson'];
 $BranchePhone = $_POST['BranchePhone'];
 $BrancheFaxNumber = $_POST['BrancheFaxNumber'];
 $BrancheEmailid = $_POST['BrancheEmailid'];
 $BrancheGSTNO = $_POST['BrancheGSTNO'];
 $Brancheisdefault = $_POST['Brancheisdefault'];
 $BrancheCreatedAt = date("d-m-Y h:m a");
 $BrancheUpdatedAt = date("d-m-Y h:m");
 $BrancheStatus = 1;
 $BranchCode = $_POST['BranchCode'];
 $BrancheWebsite = $_POST['BrancheWebsite'];

 $Save = SAVE("branches", ["BranchCode", "BrancheEmailid", "BrancheName", "BrancheStreetAddress", "BrancheStreetAddress2", "BrancheCity", "BrancheState", "BranchePincode", "BranchePhone", "BrancheFaxNumber", "BrancheWebsite", "BrancheContactPerson", "BrancheGSTNO", "BrancheStatus", "BrancheCreatedAt", "Brancheisdefault"]);
 RESPONSE($Save, "New Branche Saved Succesfully!", "Unable to create new branche");

 //udpate branch
} else if (isset($_POST['updatebranch'])) {
 $BrancheName = $_POST['BrancheName'];
 $BrancheStreetAddress = SECURE($_POST['BrancheStreetAddress'], "e");
 $BrancheStreetAddress2 = SECURE($_POST['BrancheStreetAddress2'], "e");
 $BrancheCity = $_POST['BrancheCity'];
 $BrancheState = $_POST['BrancheState'];
 $BranchePincode = $_POST['BranchePincode'];
 $BrancheContactPerson = $_POST['BrancheContactPerson'];
 $BranchePhone = $_POST['BranchePhone'];
 $BrancheFaxNumber = $_POST['BrancheFaxNumber'];
 $BrancheEmailid = $_POST['BrancheEmailid'];
 $BrancheGSTNO = $_POST['BrancheGSTNO'];
 $Brancheisdefault = $_POST['Brancheisdefault'];
 $BrancheUpdatedAt = date("d-m-Y h:m");
 $BrancheStatus = 1;
 $BranchCode = $_POST['BranchCode'];
 $BrancheWebsite = $_POST['BrancheWebsite'];
 $ViewBranchId = $_SESSION['BRANCH_VIEW_ID'];

 $Update = UPDATE("UPDATE branches SET BrancheName='$BrancheName', BrancheStreetAddress='$BrancheStreetAddress',BrancheStreetAddress2='$BrancheStreetAddress2', BrancheCity='$BrancheCity', BrancheState='$BrancheState'
 , BranchePincode='$BranchePincode', BrancheContactPerson='$BrancheContactPerson', BranchePhone='$BranchePhone', BrancheFaxNumber='$BrancheFaxNumber', BrancheEmailid='$BrancheEmailid', BrancheGSTNO='$BrancheGSTNO', Brancheisdefault='$Brancheisdefault',
 BranchCode='$BranchCode', BrancheWebsite='$BrancheWebsite' where BranchesId='$ViewBranchId'");
 RESPONSE($Update, "Branch Having Branch Code: $BranchCode is updated successfully!", "Unable to update branch details");
}
