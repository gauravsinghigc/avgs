<?php
//require
require '../../require/modules.php';
require '../../require/admin/sessionvariables.php';

$PageName = "All Publications";
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
            <th>Name</th>
            <th>CreatedAt</th>
            <th>UpdatedAt</th>
            <th>Status</th>
            <th>Items</th>
          </tr>
        </thead>
        <?php
        $SQLpro_brands = SELECT("SELECT * FROM pro_brands ORDER BY ProBrandId ASC");
        $Count = 0;
        while ($fetchpro_brands = mysqli_fetch_array($SQLpro_brands)) {
          $Count++;
          $ProBrandId = $fetchpro_brands['ProBrandId'];
          $ProBrandName = $fetchpro_brands['ProBrandName'];
          $ProBrandStatus = $fetchpro_brands['ProBrandStatus'];
          $ProBrandImage = $fetchpro_brands['ProBrandImage'];
          $ProBrandCreatedAt = ReturnValue($fetchpro_brands['ProBrandCreatedAt']);
          $ProBrandUpdatedAt = ReturnValue($fetchpro_brands['ProBrandUpdatedAt']);
          $StatusView = StatusViewWithText($ProBrandStatus);
          $CountProducts = TOTAL("SELECT * FROM products where ProductBrandId='$ProBrandId'"); ?>
          <tr>
            <td><?php echo $Count; ?></td>
            <td>
              <img src="<?php echo STORAGE_URL; ?>/products/brands/<?php echo $ProBrandImage; ?>" class="pro-img">
              <?php echo $ProBrandName; ?>
            </td>
            <td><?php echo $ProBrandCreatedAt; ?></td>
            <td><?php echo $ProBrandUpdatedAt; ?></td>
            <td><?php echo $StatusView; ?></td>
            <td><?php echo $CountProducts; ?> Items</td>
          </tr>
        <?php } ?>
      </table>


      <?php include '../../include/admin/export-footer.php'; ?>
    </div>
    <?php
    require '../../include/admin/footer_files.php';
    ?>
  </center>
</body>

</html>