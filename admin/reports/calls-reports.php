<?php
//require
require '../../require/modules.php';
require '../../require/admin/sessionvariables.php';

$PageName = "All Customers";
?>
<html>

<head>
  <title><?php echo $PageName; ?>@<?php echo date("d_M_Y"); ?></title>
  <?php require '../../include/admin/header_files.php'; ?>
  <style>
    table.table .table-striped,
    table.table .table-striped tr,
    table.table .table-striped th,
    table.table .table-striped td {
      font-size: 10px !important;
      padding: 0px !important;
    }
  </style>
</head>

<body onload="window.print()">
  <center>
    <div class="printable-area m-t-3" style="box-shadow:0px 0px 2px grey !important;width:1300px !important;">
      <?php
      include '../../include/admin/export-header.php'; ?>
      <h4 class="text-center m-t-0 bg-dark p-1" style="background-color:black !important;color:white !important;padding:5px !important;"><?php echo $PageName; ?></h4>


      <table class="table table-striped">
        <thead>
          <tr>
            <th>Type</th>
            <th>PersonName</th>
            <th>DateTime</th>
            <th>EnteredDate</th>
            <th>CallingBy</th>
          </tr>
        </thead>
        <?php $FetchTasks = FetchConvertIntoArray("SELECT * FROM calls ORDER BY CallsId DESC", true);
        if ($FetchTasks != null) {
          $Count = 0;
          foreach ($FetchTasks as $Request) {
            $Count++; ?>
            <tr>
              <td><?php echo CallTypes($Request->CallingType); ?></td>
              <td><?php echo FETCH("SELECT * FROM customers where CustomerId='" . $Request->CallsRelatedTo . "'", "CustomerDisplayName"); ?></td>
              <td><i class="fa fa-calendar text-primary"></i> <?php echo $Request->CallingDate; ?>, <?php echo $Request->CallingTime; ?></td>
              <td><?php echo $Request->CallingCreatedAt; ?></td>
              <td><?php echo FETCH("SELECT * FROM users where UserId='" . $Request->CallingCreatedBy . "'", "UserName"); ?></td>
            </tr>
        <?php }
        } ?>
      </table>


      <?php include '../../include/admin/export-footer.php'; ?>
    </div>
    <?php
    require '../../include/admin/footer_files.php';
    ?>
  </center>
</body>

</html>