<?php

//required files
require "../../require/auto/admin-auto-load.php";

//page variables
$PageName = "All Activities";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $PageName; ?> | <?php echo APP_NAME; ?></title>
  <?php include '../../include/admin/header_files.php'; ?>
  <script type="text/javascript">
    function SidebarActive() {
      document.getElementById("act_logs").classList.add("active");
    }
    window.onload = SidebarActive;
  </script>
</head>

<body>
  <div id="container" class="effect mainnav-lg navbar-fixed mainnav-fixed">
    <?php include '../../include/admin/header.php'; ?>

    <div class="boxed">
      <!--CONTENT CONTAINER-->
      <!--===================================================-->
      <div id="content-container">
        <div id="page-content">
          <!--====start content===============================================-->

          <div class="panel">
            <div class="panel-heading">
              <div class="btn-group-sm btn-group">
                <a href="export.php" class="btn btn-sm btn-primary square btn-labeled fa fa-file-pdf-o" target="_blank">Export</a>
                <?php CONFIRM_DELETE_POPUP(
                  "deleteall",
                  $Requests = [
                    "delete_activity_logs" => "true",
                    "control_id" => "All"
                  ],
                  "logscontroller"
                ); ?>
              </div>
            </div>
            <div class="panel-body">
              <table class="table table-striped display">
                <thead>
                  <tr>
                    <th>SNo</th>
                    <th>logTitle</th>
                    <th>Details</th>
                    <th>created_at</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $count = 0;
                  $SqlLogs = SELECT("SELECT * FROM systemlogs ORDER by LogsId ASC");
                  while ($FetchLogs =  mysqli_fetch_assoc($SqlLogs)) {
                    $logTitle = SECURE($FetchLogs['logTitle'], "d");
                    $logdesc = SECURE($FetchLogs['logdesc'], "d");
                    $created_at = date("d M, Y h:m:s A", strtotime($FetchLogs['created_at']));
                    $systeminfo = SECURE($FetchLogs['systeminfo'], "d");
                    $count++; ?>
                    <tr>
                      <td><?php echo $count; ?></td>
                      <td><?php echo $logTitle; ?></td>
                      <td><?php echo $logdesc; ?></td>
                      <td><?php echo $created_at; ?></td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>

          <!--End page content-->
        </div>

        <?php include '../../include/admin/sidebar.php'; ?>
      </div>
      <?php include '../../include/admin/footer.php'; ?>
    </div>

    <?php include '../../include/admin/footer_files.php'; ?>
</body>

</html>