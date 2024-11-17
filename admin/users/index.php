<?php

//required files
$PageDirLevel = "../../";
require $PageDirLevel . 'require/modules.php';
require $PageDirLevel . 'require/admin/access-control.php';
require $PageDirLevel . 'require/admin/sessionvariables.php';

//page variables
$PageName = "All Users";
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
      document.getElementById("app_users").classList.add("active");
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
                  <h4 class="app-heading">All Users</h4>
                  <a href="add-user.php" target="_blank" class="btn btn-sm btn-danger float-right"><i class="fa fa-plus"></i> ADD User</a>
                </div>
                <div class="col-md-12">
                  <table class="table table-striped" id="example">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>PhoneNumber</th>
                        <th>EmailId</th>
                        <th>UserRole</th>
                        <th>CreatedAt</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <?php $FetchTasks = FetchConvertIntoArray("SELECT * FROM users ORDER BY UserId DESC", true);
                    if ($FetchTasks != null) {
                      $Sno = 0;
                      foreach ($FetchTasks as $Request) {
                        $Sno++; ?>
                        <tr>
                          <td><?php echo $Sno; ?></td>
                          <td><?php echo $Request->UserName; ?></td>
                          <td><?php echo $Request->UserPhone; ?></td>
                          <td><?php echo $Request->UserEmailId; ?></td>
                          <td><?php echo $Request->UserRoles; ?></td>
                          <td><?php echo $Request->UserCreatedAt; ?></td>
                          <td>
                            <a target="_blank" href="edit-user.php?userid=<?php echo SECURE($Request->UserId, "e"); ?>" class="btn btn-sm btn-primary">Edit Details</a>
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