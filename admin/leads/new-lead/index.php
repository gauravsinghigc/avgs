<?php

//required files
$PageLevel = "../../../";
require $PageLevel . 'require/modules.php';
require $PageLevel . 'require/admin/access-control.php';
require $PageLevel . 'require/admin/sessionvariables.php';

//page variables
$PageName = "New Lead";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $PageName; ?> | <?php echo APP_NAME; ?></title>
  <?php include $PageLevel . 'include/admin/header_files.php'; ?>
</head>

<body>
  <div id="container" class="effect mainnav-lg navbar-fixed mainnav-fixed">
    <?php include $PageLevel . 'include/admin/header.php'; ?>

    <div class="boxed">
      <!--CONTENT CONTAINER-->
      <!--===================================================-->
      <div id="content-container">
        <div id="page-content">
          <div class="panel">
            <div class="panel-heading">
              <div class="flex-s-b">
                <?php include '../action-nav.php'; ?>
              </div>
            </div>
            <div class="panel-body">
              <div class="flex-s-b">
                <h3 class="m-b-0"><?php echo $PageName; ?></h4>
              </div>
              <div class="row">
                <?php include '../../../include/form/customer-add-form.php'; ?>
              </div>
            </div>
          </div>

          <!--End page content-->
        </div>

        <?php include $PageLevel . 'include/admin/sidebar.php'; ?>
      </div>
      <?php include $PageLevel . 'include/admin/footer.php'; ?>
    </div>

    <?php include $PageLevel . 'include/admin/footer_files.php'; ?>
</body>

</html>