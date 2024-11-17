<?php

//required files
$PageDirLevel = "../../../";
require $PageDirLevel . "require/auto/admin-auto-load.php";

//page variables
$PageName = "Create Events";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $PageName; ?> | <?php echo APP_NAME; ?></title>
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

              <form action="../../../controller/eventcontroller.php" method="POST">
                <?php echo FormPrimaryInputs(true); ?>
                <div class="row p-1">
                  <div class="col-md-4 col-lg-4 col-sm-5 col-12 col-xs-12">
                    <h4 class="text-right">Event Created By</h4>
                  </div>
                  <div class="col-md-5 col-lg-5 col-sm-5 col-12 col-xs-12">
                    <select name="EventCreatedBy" class="form-control-2" required="">
                      <?php
                      $Fetchusers = FetchConvertIntoArray("SELECT * FROM users ORDER BY UserName ASC", true);
                      if ($Fetchusers != null) {
                        foreach ($Fetchusers as $Request) {
                          $RunningUserid = $Request->UserId;
                          if ($RunningUserid == LOGIN_UserId) {
                            $selected = "selected";
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
                    <h4 class="text-right">Event Name</h4>
                  </div>
                  <div class="col-md-5 col-lg-5 col-sm-5 col-12 col-xs-12">
                    <input type="text" name="EventsName" value="" class="form-control-2" required="">
                  </div>
                </div>
                <div class="row p-1">
                  <div class="col-md-4 col-lg-4 col-sm-5 col-12 col-xs-12 form-group d-block">
                    <h4 class="text-right">Event Related To</h4>
                  </div>
                  <div class="col-md-5 col-lg-5 col-sm-5 col-12 col-xs-12">
                    <select name="EventRelatedTo" class="form-control-2" required="">
                      <?php
                      $FetchAllCustomers = FetchConvertIntoArray("SELECT * FROM customers ORDER BY CompanyName ASC", true);
                      if ($FetchAllCustomers != null) {
                        $Count = 0;
                        foreach ($FetchAllCustomers as $Request) {
                          $Count++;
                          if ($Count == 1) {
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
                    <h4 class="text-right">Event Start Date & Time</h4>
                  </div>
                  <div class="col-md-5 col-lg-5 col-sm-5 col-12 col-xs-12 flex-s-b">
                    <input type="date" name="EventsDateFrom" class="form-control-2">
                    <input type="time" name="EventsTimeFrom" class="form-control-2">
                  </div>
                </div>
                <div class="row p-1">
                  <div class="col-md-4 col-lg-4 col-sm-5 col-12 col-xs-12 form-group d-block">
                    <h4 class="text-right">Event End Date & Time</h4>
                  </div>
                  <div class="col-md-5 col-lg-5 col-sm-5 col-12 col-xs-12 flex-s-b">
                    <input type="date" name="EventsDateTo" class="form-control-2">
                    <input type="time" name="EventsTimeTo" class="form-control-2">
                  </div>
                </div>
                <div class="row p-1">
                  <div class="col-md-4 col-lg-4 col-sm-5 col-12 col-xs-12 form-group">
                    <h4 class="text-right">Event Address</h4>
                  </div>
                  <div class="col-md-5 col-lg-5 col-sm-5 col-12 col-xs-12">
                    <textarea name="EventsLocations" class="form-control-2" rows="4"></textarea>
                  </div>
                </div>
                <div class="row p-1">
                  <div class="col-md-4 col-lg-4 col-sm-5 col-12 col-xs-12 form-group">
                    <h4 class="text-right">Event Descriptions</h4>
                  </div>
                  <div class="col-md-5 col-lg-5 col-sm-5 col-12 col-xs-12">
                    <textarea name="EventsDescriptions" id="editor" class="form-control-2" rows="4"></textarea>
                  </div>
                </div>
                <div class="row p-1">
                  <div class="col-md-12 text-center">
                    <button class="btn app-btn" type="Submit" name="CreateNewEvents">Create Events</button>
                    <a target="_blank" href="<?php echo DOMAIN; ?>/admin/activity/" class="btn btn-lg btn-danger">Cancel & Back to All</a>
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