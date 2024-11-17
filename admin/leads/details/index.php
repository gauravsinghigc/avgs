<?php

//required files
$PageLevel = "../../../";
require $PageLevel . 'require/modules.php';
require $PageLevel . 'require/admin/access-control.php';
require $PageLevel . 'require/admin/sessionvariables.php';

//page variables
$PageName = "Call Details";
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
        <div class="pageheader hidden-xs">
          <h3><i class="fa fa-refresh"></i> <?php echo $PageName; ?> </h3>
          <div class="breadcrumb-wrapper">
            <span class="label">You are here:</span>
            <ol class="breadcrumb">
              <li> <a href="<?php echo DOMAIN; ?>/admin"> Home </a> </li>
              <li class="active"> <?php echo $PageName; ?> </li>
            </ol>
          </div>
        </div>
        <div id="page-content">
          <!--====start content===============================================-->

          <div class="panel">
            <div class="panel-heading">
              <div class="flex-s-b">
                <?php include '../action-nav.php'; ?>
              </div>
            </div>
            <div class="panel-body">
              <div class="flex-s-b">
                <h4 class="m-b-0"><?php echo $PageName; ?></h4>
              </div>
              <div class="row m-t-10">

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