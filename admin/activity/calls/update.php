<?php

//required files
$PageDirLevel = "../../../";
require $PageDirLevel . "require/auto/admin-auto-load.php";

//page variables
$PageName = "Update Call";

//page variables
if (isset($_GET['viewid'])) {
   $CallsId = SECURE($_GET['viewid'], "d");
   $_SESSION['CallsId'] = $CallsId;
} else {
   $CallsId = $_SESSION['CallsId'];
}

$PageSqls = "SELECT * FROM calls where CallsId='$CallsId'";
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title><?php echo $PageName; ?> : Call @ <?php echo GET_DATA("CallsId"); ?> | <?php echo APP_NAME; ?></title>
   <?php include $PageDirLevel . 'include/admin/header_files.php'; ?>
   <script type="text/javascript">
      function SidebarActive() {
         document.getElementById("app_activity").classList.add("active");
      }
      window.onload = SidebarActive;
   </script>
</head>

<body>
   <div id="container" class="effect mainnav-lg navbar-fixed mainnav-fixed">
      <?php include $PageDirLevel . 'include/admin/header.php'; ?>

      <div class="boxed">
         <!--CONTENT CONTAINER-->
         <!--===================================================-->
         <div id="content-container">
            <div id="page-content">
               <!--====start content===============================================-->

               <div class="panel">
                  <div class="panel-body">
                     <div class="row">
                        <div class="col-md-12">
                           <h4 class="app-heading"><?php echo $PageName; ?></h4>
                        </div>
                     </div>

                     <form action="../../../controller/callcontroller.php" method="POST">
                        <?php echo FormPrimaryInputs(true); ?>
                        <div class="row p-1">
                           <div class="col-md-4 col-lg-4 col-sm-5 col-12 col-xs-12 form-group d-block">
                              <h4 class="text-right">Calling To</h4>
                           </div>
                           <div class="col-md-5 col-lg-5 col-sm-5 col-12 col-xs-12">
                              <select name="CallsRelatedTo" class="form-control-2" required="">
                                 <?php
                                 $FetchAllCustomers = FetchConvertIntoArray("SELECT * FROM customers ORDER BY CompanyName ASC", true);
                                 if ($FetchAllCustomers != null) {
                                    foreach ($FetchAllCustomers as $Request) {
                                       if (GET_DATA("CallsRelatedTo") == $Request->CustomerId) {
                                          $selected = "selected";
                                       } else {
                                          $selected = "";
                                       } ?>
                                       <option value="<?php echo $Request->CustomerId; ?>" <?php echo $selected; ?>><?php echo $Request->CustomerDisplayName; ?></option>
                                 <?php }
                                 } ?>
                              </select>
                           </div>
                        </div>
                        <div class="row p-1">
                           <div class="col-md-4 col-lg-4 col-sm-5 col-12 col-xs-12 form-group d-block">
                              <h4 class="text-right">Call Type</h4>
                           </div>
                           <div class="col-md-5 col-lg-5 col-sm-5 col-12 col-xs-12">
                              <select name="CallingType" class="form-control-2" required="">
                                 <?php OptionWithPreSelected(
                                    $option = [
                                       "1" => "Incoming Call",
                                       "2" => "Outgoing Call",
                                       "3" => "Missed Call",
                                       "4" => "Schedule Call"
                                    ],
                                    "" . GET_DATA("CallingType") . ""
                                 ); ?>
                              </select>
                           </div>
                        </div>
                        <div class="row p-1">
                           <div class="col-md-4 col-lg-4 col-sm-5 col-12 col-xs-12">
                              <h4 class="text-right">Calling By</h4>
                           </div>
                           <div class="col-md-5 col-lg-5 col-sm-5 col-12 col-xs-12">
                              <select name="CallingCreatedBy" class="form-control-2" required="">
                                 <?php
                                 $Fetchusers = FetchConvertIntoArray("SELECT * FROM users ORDER BY UserName ASC", true);
                                 if ($Fetchusers != null) {
                                    foreach ($Fetchusers as $Request) {
                                       $RunningUserid = $Request->UserId;
                                       if ($RunningUserid == LOGIN_UserId) {
                                          $selected = "selected=''";
                                       } else {
                                          $selected = "";
                                       } ?>
                                       <option value="<?php echo $Request->UserId ?>" <?php echo $selected; ?>><?php echo $Request->UserName; ?> (<?php echo $Request->UserEmailId; ?>)</option>
                                 <?php }
                                 } ?>
                              </select>
                           </div>
                        </div>
                        <div class="row p-1">
                           <div class="col-md-4 col-lg-4 col-sm-5 col-12 col-xs-12">
                              <h4 class="text-right">Call Date</h4>
                           </div>
                           <div class="col-md-5 col-lg-5 col-sm-5 col-12 col-xs-12">
                              <input type="date" name="CallingDate" value="<?php echo GET_DATA("CallingDate"); ?>" class="form-control-2" required="">
                           </div>
                        </div>
                        <div class="row p-1">
                           <div class="col-md-4 col-lg-4 col-sm-5 col-12 col-xs-12">
                              <h4 class="text-right">Call Time</h4>
                           </div>
                           <div class="col-md-5 col-lg-5 col-sm-5 col-12 col-xs-12">
                              <input type="time" name="CallingTime" value="<?php echo GET_DATA("CallingTime"); ?>" class="form-control-2" required="">
                           </div>
                        </div>
                        <div class="row p-1">
                           <div class="col-md-4 col-lg-4 col-sm-5 col-12 col-xs-12 form-group">
                              <h4 class="text-right">Call Notes</h4>
                           </div>
                           <div class="col-md-5 col-lg-5 col-sm-5 col-12 col-xs-12">
                              <textarea name="CallingNotes" id="editor" class="form-control-2" rows="4"><?php echo SECURE("CallingNotes", "d"); ?></textarea>
                           </div>
                        </div>
                        <div class="row p-1">
                           <div class="col-md-12 text-center">
                              <button class="btn app-btn" type="Submit" name="UpdateCallStatus" value="<?php echo SECURE("$CallsId", "e"); ?>">Update Call</button>
                              <a href="<?php echo DOMAIN; ?>/admin/activity/calls/" target="_blank" class="btn btn-lg btn-danger">Cancel & Back to All</a>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>

               <!--End page content-->
            </div>

            <?php include $PageDirLevel . 'include/admin/sidebar.php'; ?>
         </div>
         <?php include $PageDirLevel . 'include/admin/footer.php'; ?>
      </div>

      <?php include $PageDirLevel . 'include/admin/footer_files.php'; ?>
</body>

</html>