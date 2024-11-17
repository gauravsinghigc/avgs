<?php

//required files
$PageLevel = "../../../";
require $PageLevel . 'require/modules.php';
require $PageLevel . 'require/admin/access-control.php';
require $PageLevel . 'require/admin/sessionvariables.php';

//page variables
$PageName = "New Call";
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
              <form action="" method="">
                <div class="row">
                  <div class="form-group col-md-4 col-lg-4 col-sm-4 col-12">
                    <label>Customer Name</label>
                    <input type="text" name="" class="form-control-2" required="">
                  </div>
                  <div class="form-group col-md-4 col-lg-4 col-sm-4 col-12">
                    <label>Phone Number</label>
                    <input type="text" name="" class="form-control-2" required="">
                  </div>
                  <div class="form-group col-md-4 col-lg-4 col-sm-4 col-12">
                    <label>Call Status</label>
                    <select name="" class="form-control-2">
                      <?php InputOptions(["Fresh", "Lead", "FollowUp", "Not Answered", "Switch Off", "Not Interested"]); ?>
                    </select>
                  </div>
                  <div class="form-group col-md-4 col-lg-4 col-sm-4 col-12">
                    <label>Follow Up date</label>
                    <input type="date" name="" class="form-control-2" required="">
                  </div>
                  <div class="form-group col-md-12">
                    <label>Notes</label>
                    <textarea name="" class="form-control-2" rows="4"></textarea>
                  </div>
                  <div class="col-md-12">
                    <button class="btn btn-md btn-success">Save Call</button>
                  </div>
                </div>
              </form>
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