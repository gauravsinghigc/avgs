<?php

//required files
require "../../../require/auto/admin-auto-load.php";

//page variables
$PageName = "Edit Branches";

//page request
if (isset($_GET['branchid'])) {
 $ViewBranchId = SECURE($_GET['branchid'], "d");
 $_SESSION['BRANCH_VIEW_ID'] = $ViewBranchId;
} else {
 $ViewBranchId = $_SESSION['BRANCH_VIEW_ID'];
}

//page sql
$PageSqls = "SELECT * FROM branches where BranchesId='$ViewBranchId'";
?>
<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title><?php echo GET_DATA("BrancheName"); ?> | <?php echo APP_NAME; ?></title>
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
       <div class="flex-s-b">
        <?php include 'common.php'; ?>
       </div>
      </div>
      <div class="panel-body">
       <h4><?php echo $PageName; ?></h4>
       <form action="../../../controller/branchcontroller.php" method="POST">
        <?php FormPrimaryInputs(true); ?>
        <div class="row">
         <div class="col-lg-4 col-md-4 col-sm-4 col-12">
          <label>Branch Name</label>
          <input type="text" name="BrancheName" value="<?php echo GET_DATA("BrancheName"); ?>" class="form-control-2" required="">
         </div>
         <div class="col-lg-4 col-md-4 col-sm-4 col-12">
          <label>Branch Code</label>
          <input type="text" name="BranchCode" value="<?php echo GET_DATA("BranchCode"); ?>" class="form-control-2" required="">
         </div>
        </div>
        <div class="row">
         <div class="col-lg-6 col-md-6 col-sm-6 col-12">
          <label>Address line 1</label>
          <textarea name="BrancheStreetAddress" rows="2" class="form-control-2 height-auto" required=""><?php echo SECURE(GET_DATA("BrancheStreetAddress"), "d"); ?></textarea>
         </div>
         <div class="col-lg-6 col-md-6 col-sm-6 col-12">
          <label>Address line 2</label>
          <textarea name="BrancheStreetAddress2" rows="2" class="form-control-2 height-auto" required=""><?php echo SECURE(GET_DATA("BrancheStreetAddress2"), "d"); ?></textarea>
         </div>
         <div class="col-lg-4 col-md-4 col-sm-4 col-12">
          <label>Branch City</label>
          <input type="text" name="BrancheCity" value="<?php echo GET_DATA("BrancheCity"); ?>" class="form-control-2" required="">
         </div>
         <div class="col-lg-4 col-md-4 col-sm-4 col-12">
          <label>Branch State</label>
          <input type="text" name="BrancheState" value="<?php echo GET_DATA("BrancheState"); ?>" class="form-control-2" required="">
         </div>
         <div class="col-lg-4 col-md-4 col-sm-4 col-12">
          <label>Branch Pincode</label>
          <input type="text" name="BranchePincode" value="<?php echo GET_DATA("BranchePincode"); ?>" class="form-control-2" required="">
         </div>
         <div class="col-md-12">
          <h4>Contact Information</h4>
         </div>
         <div class="col-lg-4 col-md-4 col-sm-4 col-12">
          <label>Contact Person</label>
          <input type="text" name="BrancheContactPerson" value="<?php echo GET_DATA("BrancheContactPerson"); ?>" class="form-control-2" required="">
         </div>
         <div class="col-lg-4 col-md-4 col-sm-4 col-12">
          <label>Branch Phone Number</label>
          <input type="text" name="BranchePhone" value="<?php echo GET_DATA("BranchePhone"); ?>" class="form-control-2" required="">
         </div>
         <div class="col-lg-4 col-md-4 col-sm-4 col-12">
          <label>Branch Fax Number</label>
          <input type="text" name="BrancheFaxNumber" value="<?php echo GET_DATA("BrancheFaxNumber"); ?>" class="form-control-2" required="">
         </div>
         <div class="col-lg-4 col-md-4 col-sm-4 col-12">
          <label>Branch Email ID</label>
          <input type="text" name="BrancheEmailid" value="<?php echo GET_DATA("BrancheEmailid"); ?>" class="form-control-2" required="">
         </div>
         <div class="col-lg-8 col-md-8 col-sm-8 col-12">
          <label>Branch Website</label>
          <input type="text" name="BrancheWebsite" value="<?php echo GET_DATA("BrancheWebsite"); ?>" class="form-control-2" required="">
         </div>
         <div class="col-md-12">
          <h4>Taxation Details</h4>
         </div>
         <div class="col-lg-4 col-md-4 col-sm-4 col-12">
          <label>Branch GST No</label>
          <input type="text" name="BrancheGSTNO" value="<?php echo GET_DATA("BrancheGSTNO"); ?>" class="form-control-2" value="">
         </div>
         <div class="col-lg-4 col-md-4 col-sm-4 col-12">
          <label>Make Default</label><br>
          <input type="checkbox" name="Brancheisdefault" value="true" <?php
                                                                      $branshsttaus = GET_DATA("Brancheisdefault");
                                                                      if ($branshsttaus == "true") {
                                                                       echo "checked=''";
                                                                      } else {
                                                                       echo "";
                                                                      } ?>> tick to make default
         </div>

         <div class="col-md-12 m-t-20">
          <button class="btn btn-lg app-bg" name="updatebranch">Update Branch</button>
         </div>
        </div>
       </form>
      </div>
     </div>
    </div>
    <!--End page content-->
   </div>

   <?php include '../../../include/admin/sidebar.php'; ?>
  </div>
  <?php include '../../../include/admin/footer.php'; ?>
 </div>

 <?php include '../../../include/admin/footer_files.php'; ?>
</body>

</html>