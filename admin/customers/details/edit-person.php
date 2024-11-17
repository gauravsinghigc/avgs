<?php

//required files
require '../../../require/modules.php';
require '../../../require/admin/access-control.php';
require '../../../require/admin/sessionvariables.php';

//page variables
$PageName = "Edit Person";

if (isset($_GET['personid'])) {
 $personid = SECURE($_GET['personid'], "d");
 $_SESSION['personid'] = $personid;
} else {
 $personid = $_SESSION['personid'];
}

//page activities
$PageSqls = "SELECT * FROM customer_contact_person WHERE CustomerContactPersons='$personid'";
?>

<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title> Edit Persons Details | <?php echo APP_NAME; ?></title>
 <?php include '../../../include/admin/header_files.php'; ?>
</head>

<body>
 <div id="container" class="effect mainnav-lg navbar-fixed mainnav-fixed">
  <?php include '../../../include/admin/header.php'; ?>

  <div class="boxed">
   <!--CONTENT CONTAINER-->
   <!--===================================================-->
   <div id="content-container">
    <div id="page-content">
     <!--====start content===============================================-->

     <div class="panel">
      <div class="panel-heading">
       <div class="row">
        <div class="col-md-12 m-b-5">
         <h4 class="m-b-0 app-heading"><?php echo $PageName; ?></h4>
        </div>
       </div>
      </div>
      <div class="panel-body">
       <div class="row">
        <div class="col-md-6 m-t-10">
         <form action="../../../controller/customercontroller.php" method="POST">
          <?php FormPrimaryInputs(true); ?>
          <div class="row">
           <div class="col-md-12">
            <h4>Contact Person</h4>
           </div>
           <div id="contactperson" class="border-bottom">
            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-6">
             <label>Person Name</label>
             <input name="CustomerContactPersonName" value="<?php echo GET_DATA('CustomerContactPersonName'); ?>" type="text" value="" class="form-control-2">
            </div>
            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-6">
             <label>Person Phone</label>
             <input name="CustomerContactPersonPhone" value="<?php echo GET_DATA('CustomerContactPersonPhone'); ?>" type="text" value="" class="form-control-2">
            </div>
            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-6">
             <label>Person Email</label>
             <input name="CustomerContactPersonEmailId" value="<?php echo GET_DATA('CustomerContactPersonEmailId'); ?>" type="email" value="" class="form-control-2">
            </div>
            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-6">
             <label>Person Work Email</label>
             <input name="CustomerContactPersonWorkEmailId" value="<?php echo GET_DATA('CustomerContactPersonWorkEmailId'); ?>" type="email" value="" class="form-control-2">
            </div>
            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-6">
             <label>Person Designation</label>
             <input name="CustomerContactPersonDesignation" value="<?php echo GET_DATA('CustomerContactPersonDesignation'); ?>" type="text" value="" class="form-control-2">
            </div>
            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-6">
             <label>Person Department</label>
             <input name="CustomerContactPersonDepartment" value='<?php echo GET_DATA('CustomerContactPersonDepartment'); ?>' type="text" value="" class="form-control-2">
            </div>
            <div class="col-md-12">
             <hr>
            </div>
            <div class="col-md-12">
             <button class="btn app-btn" type="submit" name="UpdateContactPersonDetails" value="<?php echo SECURE($personid, "e"); ?>">Update Details</button>
             <a href="index.php" class="btn btn-lg btn-default">Back to Profile</a>

             <?php
             CONFIRM_DELETE_POPUP(
              "del_persons",
              [
               "delete_contact_persons" => true,
               "control_id" => $personid
              ],
              "customercontroller",
              "<i class='fa fa-trash'></i> Delete Details",
              "pull-right btn-lg"
             ); ?>
            </div>
           </div>
          </div>
         </form>
        </div>

       </div>
      </div>
     </div>

     <!--End page content-->
    </div>

    <?php include '../../../include/admin/sidebar.php'; ?>
   </div>
   <?php include '../../../include/admin/footer.php'; ?>
  </div>

  <!-- end of add section -->

  <!-- confirmation pop up form-->
  <script>
   function CopyAddress() {
    if (document.getElementById("copyaddress").checked) {
     document.getElementById("Address11").value = document.getElementById("Address1").value;
     document.getElementById("Address22").value = document.getElementById("Address2").value;
     document.getElementById("Address33").value = document.getElementById("Address3").value;
     document.getElementById("Address44").value = document.getElementById("Address4").value;
     document.getElementById("Address55").value = document.getElementById("Address5").value;
    } else {
     document.getElementById("Address11").value = "";
     document.getElementById("Address22").value = "";
     document.getElementById("Address33").value = "";
     document.getElementById("Address44").value = "";
     document.getElementById("Address55").value = "";
    }
   }
  </script>

  <?php include '../../../include/admin/footer_files.php'; ?>
</body>

</html>