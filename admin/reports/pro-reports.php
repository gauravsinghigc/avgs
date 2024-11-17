<?php
//require
require '../../require/modules.php';
require '../../require/admin/sessionvariables.php';

$PageName = "All Products";
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
            <th>Image</th>
            <th>Name</th>
            <th>Measure</th>
            <th>SellPrice</th>
            <th>CreatedAt</th>
            <th>Status</th>
          </tr>
        </thead>
        <?php
        $SQLproducts = SELECT("SELECT * FROM products, pro_categories, pro_sub_categories, pro_brands where products.ProductCategoryId=pro_categories.ProCategoriesId and products.ProductSubCategoryId=pro_sub_categories.ProSubCategoriesId and products.ProductBrandId=ProBrandId  ORDER BY products.ProductStatus DESC");
        $Count = 0;
        while ($fetchpro_brands = mysqli_fetch_array($SQLproducts)) {
          $Count++;
          $ProductName = $fetchpro_brands['ProductName'];
          $ProBrandName = $fetchpro_brands['ProBrandName'];
          $ProCategoryName = $fetchpro_brands['ProCategoryName'];
          $ProSubCategoryName = $fetchpro_brands['ProSubCategoryName'];
          $ProductRefernceCode = $fetchpro_brands['ProductRefernceCode'];
          $ProductImage = $fetchpro_brands['ProductImage'];
          $ProductCategoryId = $fetchpro_brands['ProductCategoryId'];
          $ProductSubCategoryId = $fetchpro_brands['ProductSubCategoryId'];
          $ProductBrandId = $fetchpro_brands['ProductBrandId'];
          $ProductSellPrice = $fetchpro_brands['ProductSellPrice'];
          $ProductMrpPrice = $fetchpro_brands['ProductMrpPrice'];
          $ProductDescriptions = SECURE($fetchpro_brands['ProductDescriptions'], "e");
          $ProductWeight = $fetchpro_brands['ProductWeight'];
          $ProductStatus = StatusViewWithText($fetchpro_brands['ProductStatus']);
          $ProductCreatedAt = $fetchpro_brands['ProductCreatedAt'];
          $ProductUpdatedAt = ReturnValue($fetchpro_brands['ProductUpdatedAt']);
          $ProductCreatedBy = $fetchpro_brands['ProductCreatedBy'];
          $ProductId = $fetchpro_brands['ProductId'];
          $ProductAvailibility = $fetchpro_brands['ProductStatus']; ?>
          <tr>
            <td><?php echo $Count; ?></td>
            <td>
              <img src="<?php echo STORAGE_URL; ?>/products/pro-img/<?php echo $ProductImage; ?>" alt="<?php echo $ProductName; ?>" title="<?php echo $ProductName; ?>" class="w-10 pro-img">
            </td>
            <td class="lh-1-1 p-t-2">
              <span class="text-primary"><?php echo $ProductName; ?></span><br>
              <span class="text-grey fs-12">
                <i class="fa fa-hashtag"></i> <?php echo $ProCategoryName; ?> |
                <?php echo $ProSubCategoryName; ?> |
                <?php echo $ProBrandName; ?>
              </span>
            </td>
            <td>
              <?php echo $ProductWeight; ?>
            </td>
            <td>
              <?php echo Price($ProductSellPrice); ?> / <?php echo MrpPrice($ProductMrpPrice); ?>
            </td>
            <td>
              <?php echo $ProductCreatedAt; ?>
            </td>
            <td>
              <?php echo $ProductStatus; ?>
            </td>
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