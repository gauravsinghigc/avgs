<?php
//require
require '../../require/modules.php';
require '../../require/admin/sessionvariables.php';

$PageName = "All Sub Categories";
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
            <th>Category</th>
            <th>CreatedAt</th>
            <th>UpdatedAt</th>
            <th>Status</th>
            <th>Items</th>
            <th>Action</th>
          </tr>
        </thead>
        <?php
        $SqlProCategories = SELECT("SELECT * FROM pro_categories, pro_sub_categories where pro_categories.ProCategoriesId=pro_sub_categories.ProSubCategoryId ORDER BY pro_sub_categories.ProSubCategoriesId  ASC");
        $count = 0;
        while ($FetchProCategories = mysqli_fetch_array($SqlProCategories)) {
          $count++;
          $ProCategoriesId = $FetchProCategories['ProCategoriesId'];
          $ProCategoryName = $FetchProCategories['ProCategoryName'];
          $ProSubCategoryName = $FetchProCategories['ProSubCategoryName'];
          $ProSubCategoryImage = $FetchProCategories['ProSubCategoryImage'];
          $ProSubCategoryStatus = $FetchProCategories['ProSubCategoryStatus'];
          $ProCategoryImage = $FetchProCategories['ProCategoryImage'];
          $ProCategoryStatus = $FetchProCategories['ProCategoryStatus'];
          $ProCategoryCreatedAt = ReturnValue($FetchProCategories['ProSubCategoryCreatedAt']);
          $ProCategoryUpdatedAt = ReturnValue($FetchProCategories['ProSubCategoryUpdatedAt']);
          $StatusView = StatusViewWithText($ProSubCategoryStatus);
          $ProSubCategoriesId = $FetchProCategories['ProSubCategoriesId'];

          $CountProducts = TOTAL("SELECT * FROM products where ProductSubCategoryId='$ProSubCategoriesId'"); ?>
          <tr>
            <td><?php echo $count; ?></td>
            <td>
              <img src="<?php echo STORAGE_URL; ?>/products/subcategory/<?php echo $ProSubCategoryImage; ?>" class="pro-img">
              <?php echo $ProSubCategoryName; ?>
            </td>
            <td><?php echo $ProCategoryName; ?></td>
            <td><?php echo $ProCategoryCreatedAt; ?></td>
            <td><?php echo $ProCategoryUpdatedAt; ?></td>
            <td><?php echo $StatusView; ?></td>
            <td><?php echo $CountProducts; ?> Item</td>
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