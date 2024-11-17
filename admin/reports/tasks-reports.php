<?php
//require
require '../../require/modules.php';
require '../../require/admin/sessionvariables.php';

$PageName = "All Tasks";
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
            <th>#</th>
            <th>Name</th>
            <th>RelatedTo</th>
            <th>Priority</th>
            <th>TaskDueDate</th>
            <th>CreatedFor</th>
            <th>Desc</th>
          </tr>
        </thead>
        <?php $FetchTasks = FetchConvertIntoArray("SELECT * FROM tasks ORDER BY TasksId DESC", true);
        if ($FetchTasks != null) {
          foreach ($FetchTasks as $Request) { ?>
            <tr>
              <td><?php echo $Request->TasksId; ?></td>
              <td><?php echo $Request->TasksName; ?></td>
              <td><?php echo FETCH("SELECT * FROM customers where CustomerId='" . $Request->TaskRelatedTo . "'", "CustomerDisplayName"); ?></td>
              <td><?php echo $Request->TaskPriority; ?></td>
              <td><?php echo $Request->TaskDueDate; ?></td>
              <td><?php echo FETCH("SELECT * FROM users where UserId='" . $Request->TaskCreatedFor . "'", "UserName"); ?></td>
              <td><?php echo html_entity_decode(SECURE($Request->TaskDescriptions, "d")); ?></td>
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