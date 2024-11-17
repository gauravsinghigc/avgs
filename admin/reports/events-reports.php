<?php
//require
require '../../require/modules.php';
require '../../require/admin/sessionvariables.php';

$PageName = "All Events";
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
            <th>Sno</th>
            <th>EventName</th>
            <th>EventDate</th>
            <th>EventTime</th>
            <th>RelatedTo</th>
            <th>CreatedAt</th>
            <th>Desc</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $FetchEvents = FetchConvertIntoArray("SELECT * FROM events ORDER BY EventsId DESC", true);
          if ($FetchEvents != null) {
            $Sno = 0;
            foreach ($FetchEvents as $Data) {
              $Sno++; ?>
              <tr>
                <td><?php echo $Sno; ?></td>
                <td><?php echo $Data->EventsName; ?></td>
                <td><?php echo $Data->EventsDateFrom; ?></td>
                <td><?php echo $Data->EventsTimeFrom; ?></td>
                <td><?php echo FETCH("SELECT * FROM customers where CustomerId='" . $Data->EventRelatedTo . "'", "CustomerDisplayName"); ?></td>
                <td><?php echo $Data->EventCreatedAt; ?></td>
                <td>
                  <?php echo html_entity_decode(SECURE($Data->EventsDescriptions, "d")); ?>
                </td>
              </tr>
          <?php }
          } ?>
        </tbody>
      </table>


      <?php include '../../include/admin/export-footer.php'; ?>
    </div>
    <?php
    require '../../include/admin/footer_files.php';
    ?>
  </center>
</body>

</html>