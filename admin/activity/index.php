<?php

//required files
$PageDirLevel = "../../";
require $PageDirLevel . "require/auto/admin-auto-load.php";

//page variables
$PageName = "All Tasks";
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
                  <?php include 'common.php'; ?>
                </div>
                <div class="col-md-12">
                  <h4 class="app-heading"><?php echo $PageName; ?></h4>
                </div>
                <div class="col-md-12">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>RelatedTo</th>
                        <th>Priority</th>
                        <th>TaskDueDate</th>
                        <th>CreatedFor</th>
                        <th>
                          Action
                        </th>
                      </tr>
                    </thead>
                    <?php
                    if (LOGIN_UserRoles == "Admin") {
                      $FetchTasks = FetchConvertIntoArray("SELECT * FROM tasks ORDER BY TasksId DESC", true);
                    } else {
                      $FetchTasks = FetchConvertIntoArray("SELECT * FROM tasks where TaskCreatedFor='" . LOGIN_UserId . "' ORDER BY TasksId DESC", true);
                    }
                    if ($FetchTasks != null) {
                      $SNo = 0;
                      foreach ($FetchTasks as $Request) {
                        $SNo++; ?>
                        <tr>
                          <td><?php echo $SNo; ?></td>
                          <td><?php echo $Request->TasksName; ?></td>
                          <td><?php echo FETCH("SELECT * FROM customers where CustomerId='" . $Request->TaskRelatedTo . "'", "CustomerDisplayName"); ?></td>
                          <td><?php echo $Request->TaskPriority; ?></td>
                          <td><?php echo $Request->TaskDueDate; ?></td>
                          <td><?php echo FETCH("SELECT * FROM users where UserId='" . $Request->TaskCreatedFor . "'", "UserName"); ?></td>
                          <td>
                            <a target="_blank" href="update.php?viewid=<?php echo SECURE($Request->TasksId, "e"); ?>" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a>
                            <?php
                            if (LOGIN_UserRoles == "Admin") {
                              CONFIRM_DELETE_POPUP(
                                "delete_tasks",
                                $Requests = [
                                  "delete_tasks_records" => true,
                                  "control_id" => $Request->TasksId,
                                ],
                                "taskcontroller",
                                "<i class='fa fa-trash'></i>",
                                "btn-sm btn-danger btn"
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