<?php

//required files
require "../../../require/auto/admin-auto-load.php";

//page variables
$PageName = "Branches";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $PageName; ?> | <?php echo APP_NAME; ?></title>
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
              <h4 class="app-heading"><?php echo $PageName; ?></h4>
              <div class="row">
                <div class="col-md-12">
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>BranchCode</th>
                          <th>BranchName</th>
                          <th>Phone</th>
                          <th>BrancheEmailid</th>
                          <th>BrancheGSTNO</th>
                          <th>Status</th>
                          <th>CreatedAt</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <?php
                      $DB_Fetch = FetchConvertIntoArray("SELECT * FROM branches ORDER BY BranchesId DESC", true);
                      if ($DB_Fetch == null) {
                        NoDataTableView("No Branches Found", "3");
                      } else {
                        foreach ($DB_Fetch as $Data) { ?>
                          <tr>
                            <td class="text-primary">
                              <a href="<?php echo DOMAIN; ?>/admin/configurations/branches/edit-branches.php?branchid=<?php echo SECURE($Data->BranchesId, "e"); ?>" class='text-primary'><i class="fa fa-map-marker text-success"></i> <?php echo $Data->BranchCode; ?></a>
                            </td>
                            <td><?php echo $Data->BrancheName; ?></td>
                            <td><?php echo $Data->BranchePhone; ?></td>
                            <td><?php echo $Data->BrancheEmailid; ?></td>
                            <td><?php echo $Data->BrancheGSTNO; ?></td>
                            <td><?php echo StatusViewWithText($Data->BrancheStatus); ?></td>
                            <td><?php echo $Data->BrancheCreatedAt; ?></td>
                            <td>
                              <div class="btn-group btn-group-sm">
                                <a href="<?php echo DOMAIN; ?>/admin/configurations/branches/edit-branches.php?branchid=<?php echo SECURE($Data->BranchesId, "e"); ?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                              </div>
                            </td>
                          </tr>
                      <?php }
                      } ?>
                    </table>
                  </div>
                </div>
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

  <?php include '../../../include/admin/footer_files.php'; ?>
</body>

</html>