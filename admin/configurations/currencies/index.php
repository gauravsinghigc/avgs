<?php

//required files
require "../../../require/auto/admin-auto-load.php";

//page variables
$PageName = "Currencies";
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
                    <table class="table table-striped" id="example">
                      <thead>
                        <tr>
                          <th>Code</th>
                          <th>Symbole</th>
                          <th>Name</th>
                          <th>DeciPoints</th>
                          <th>Formate</th>
                          <th>Default</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <?php
                      $DB_Fetch = FetchConvertIntoArray("SELECT * FROM currencies ORDER BY currenciesid  DESC", true);
                      if ($DB_Fetch == null) {
                        NoDataTableView("No Currencies Found", "7");
                      } else {
                        foreach ($DB_Fetch as $Data) { ?>
                          <tr>
                            <td class="text-primary"><?php echo $Data->currencycode; ?></td>
                            <td><?php echo $Data->currencysymbole; ?></td>
                            <td><?php echo $Data->currencyname; ?></td>
                            <td><?php echo $Data->currenciedecimalplaces; ?></td>
                            <td><?php echo $Data->currencyformates; ?></td>
                            <td><?php echo $Data->currencydefault; ?></td>
                            <td>
                              <div class="btn-group btn-group-sm">
                                <a href="edit.php?viewid=<?php echo SECURE($Data->currenciesid, "e"); ?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
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