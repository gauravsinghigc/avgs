<?php

//required files
$PageDirLevel = "../../../";
require $PageDirLevel . "require/auto/admin-auto-load.php";

//page variables
$PageName = "All Calls";
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
                  <?php include '../common.php'; ?>
                </div>
                <div class="col-md-12">
                  <h4 class="app-heading"><?php echo $PageName; ?></h4>
                </div>
                <div class="col-md-12">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>Type</th>
                        <th>PersonName</th>
                        <th>DateTime</th>
                        <th>EntryDate</th>
                        <th>CallingBy</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <?php
                    if (LOGIN_UserRoles == "Admin") {
                      $FetchTasks = FetchConvertIntoArray("SELECT * FROM calls where CallingType='4' ORDER BY CallsId DESC", true);
                    } else {
                      $FetchTasks = FetchConvertIntoArray("SELECT * FROM calls where CallingType='4' and CallingCreatedBy='" . LOGIN_UserId . "' ORDER BY CallsId DESC", true);
                    }
                    if ($FetchTasks != null) {
                      $Count = 0;
                      foreach ($FetchTasks as $Request) {
                        $Count++;
                        if ($Request->CallingType == 4) {
                          $CallReminder = "reminder blink-data";
                        } else {
                          $CallReminder = "";
                        } ?>
                        <tr>
                          <td class="<?php echo $CallReminder; ?>"><?php echo CallTypes($Request->CallingType); ?></td>
                          <td><a target="_blank" href="<?php echo DOMAIN; ?>/admin/customers/details/?viewdataid=<?php echo SECURE($Request->CallsRelatedTo, "e"); ?>" class="text-primary"><?php echo FETCH("SELECT * FROM customers where CustomerId='" . $Request->CallsRelatedTo . "'", "CustomerDisplayName"); ?></a></td>
                          <td><i class="fa fa-calendar text-primary"></i> <?php echo $Request->CallingDate; ?>, <?php echo $Request->CallingTime; ?></td>
                          <td><?php echo $Request->CallingCreatedAt; ?></td>
                          <td><?php echo FETCH("SELECT * FROM users where UserId='" . $Request->CallingCreatedBy . "'", "UserName"); ?>
                          </td>
                          <td>
                            <a target="_blank" href="update.php?viewid=<?php echo SECURE($Request->CallsId, "e"); ?>" class="btn btn-sm btn-info">Update Call</a>
                            <?php
                            if (LOGIN_UserRoles == "Admin") {
                              CONFIRM_DELETE_POPUP(
                                "calls_",
                                $Request = [
                                  "delete_calls_records" => true,
                                  "control_id" => $Request->CallsId,
                                ],
                                "callcontroller",
                                "Delete",
                                "btn btn-sm btn-danger"
                              );
                            } ?>
                          </td>
                        </tr>
                    <?php }
                    } ?>
                    <?php $FetchTasks = FetchConvertIntoArray("SELECT * FROM calls where CallingType!='4' ORDER BY CallsId DESC", true);
                    if ($FetchTasks != null) {
                      $Count = 0;
                      foreach ($FetchTasks as $Request) {
                        $Count++; ?>
                        <tr>
                          <td><?php echo CallTypes($Request->CallingType); ?></td>
                          <td><a href="<?php echo DOMAIN; ?>/admin/customers/details/?viewdataid=<?php echo SECURE($Request->CallsRelatedTo, "e"); ?>" class="text-primary"><?php echo FETCH("SELECT * FROM customers where CustomerId='" . $Request->CallsRelatedTo . "'", "CustomerDisplayName"); ?></a></td>
                          <td><i class="fa fa-calendar text-primary"></i> <?php echo $Request->CallingDate; ?>, <?php echo $Request->CallingTime; ?></td>
                          <td><?php echo $Request->CallingCreatedAt; ?></td>
                          <td><?php echo FETCH("SELECT * FROM users where UserId='" . $Request->CallingCreatedBy . "'", "UserName"); ?></td>
                          <td>
                            <?php
                            if (LOGIN_UserRoles == "Admin") {
                              CONFIRM_DELETE_POPUP(
                                "calls_",
                                $Request = [
                                  "delete_calls_records" => true,
                                  "control_id" => $Request->CallsId,
                                ],
                                "callcontroller",
                                "Delete",
                                "btn btn-sm btn-danger"
                              );
                            } ?>
                          </td>
                        </tr>
                    <?php }
                    } ?>
                  </table>
                </div>
              </div>
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