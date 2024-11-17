<?php

//required files
$PageDirLevel = "../../../";
require $PageDirLevel . "require/auto/admin-auto-load.php";

//page variables
$PageName = "All Events";
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
                        <th>Sno</th>
                        <th>EventName</th>
                        <th>EventDate</th>
                        <th>EventTime</th>
                        <th>RelatedTo</th>
                        <th>CreatedAt</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      if (LOGIN_UserRoles == "Admin") {
                        $FetchEvents = FetchConvertIntoArray("SELECT * FROM events ORDER BY EventsId DESC", true);
                      } else {
                        $FetchEvents = FetchConvertIntoArray("SELECT * FROM events where EventCreatedBy='" . LOGIN_UserId . "' ORDER BY EventsId DESC", true);
                      }
                      if ($FetchEvents != null) {
                        $Sno = 0;
                        foreach ($FetchEvents as $Data) {
                          $Sno++; ?>
                          <tr>
                            <td><?php echo $Sno; ?></td>
                            <td><?php echo $Data->EventsName; ?></td>
                            <td><?php echo $Data->EventsDateFrom; ?></td>
                            <td><?php echo $Data->EventsTimeFrom; ?></td>
                            <td><?php echo FETCH("SELECT * FROM customers where CustomerId='" . $Data->EventRelatedTo . "'", "CustomerDisplayName"); ?></td>
                            <td><?php echo $Data->EventCreatedAt; ?></td>
                            <td>
                              <a target="_blank" href="update.php?viewid=<?php echo SECURE($Data->EventsId, "e"); ?>" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a>
                              <?php
                              if (LOGIN_UserRoles == "Admin") {
                                CONFIRM_DELETE_POPUP(
                                  "events",
                                  $Requests = [
                                    "delete_events_records" => true,
                                    "control_id" => $Data->EventsId
                                  ],
                                  "eventcontroller",
                                  "<i class='fa fa-trash'></i>",
                                  "btn btn-sm btn-danger"
                                );
                              } ?>
                            </td>
                          </tr>
                      <?php }
                      } ?>
                    </tbody>
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