<?php
//require
require '../../require/modules.php';
require '../../require/admin/sessionvariables.php';

$PageName = "All Categories";
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
        $SqlProCategories = SELECT("SELECT * FROM pro_categories ORDER BY ProCategoriesId ASC");
        $Count = 0;
        while ($FetchProCategories = mysqli_fetch_array($SqlProCategories)) {
          $Count++;
          $ProCategoriesId = $FetchProCategories['ProCategoriesId'];
          $ProCategoryName = $FetchProCategories['ProCategoryName'];
          $ProCategoryImage = $FetchProCategories['ProCategoryImage'];
          $ProCategoryStatus = $FetchProCategories['ProCategoryStatus'];
          $ProCategoryCreatedAt = ReturnValue($FetchProCategories['ProCategoryCreatedAt']);
          $ProCategoryUpdatedAt = ReturnValue($FetchProCategories['ProCategoryUpdatedAt']);
          $StatusView = StatusViewWithText($ProCategoryStatus);

          $Countproducts  = TOTAL("SELECT * FROM products where ProductCategoryId='$ProCategoriesId'"); ?>
          <tr>
            <td><?php echo $Count; ?></td>
            <td>
              <a onclick="Databar('edit_<?php echo $ProCategoriesId; ?>')" class="text-primary">
                <img src="<?php echo STORAGE_URL; ?>/products/category/<?php echo $ProCategoryImage; ?>" class="list-icon">
                <?php echo $ProCategoryName; ?>
              </a>
            </td>
            <td><?php echo $ProCategoryCreatedAt; ?></td>
            <td><?php echo $ProCategoryUpdatedAt; ?></td>
            <td><?php echo $StatusView; ?></td>
            <td><?php echo $Countproducts; ?> Item</td>
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