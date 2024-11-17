<?php

//required files
require '../../require/modules.php';
require '../../require/admin/access-control.php';
require '../../require/admin/sessionvariables.php';

//page variables
$PageName = "All Products";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $PageName; ?> | <?php echo APP_NAME; ?></title>
  <?php include '../../include/admin/header_files.php'; ?>
  <script type="text/javascript">
    function SidebarActive() {
      document.getElementById("app_products").classList.add("active");
    }
    window.onload = SidebarActive;
  </script>
</head>

<body>
  <div id="container" class="effect mainnav-lg navbar-fixed mainnav-fixed">
    <?php include '../../include/admin/header.php'; ?>

    <div class="boxed">
      <!--CONTENT CONTAINER-->
      <!--===================================================-->
      <div id="content-container">
        <div id="page-content">
          <!--====start content===============================================-->

          <div class="panel">
            <div class="panel-body">
              <div class="row">
                <div class="col-md-12">
                  <h4 class="app-heading"> <?php echo $PageName; ?></h4>
                </div>
                <div class="col-md-12 m-t-5 text-right">
                  <a target="_blank" href="<?php echo DOMAIN; ?>/admin/products/add-products.php" class="btn btn-sm btn-danger"><i class="fa fa-plus"></i> Add Products</a>
                </div>
                <div class="col-md-12 m-t-5">
                  <table class="table table-striped" id="example">
                    <thead>
                      <tr>
                        <th>Sno</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>SellPrice</th>
                        <th>CreatedAt</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <?php
                    $SQLproducts = SELECT("SELECT * FROM products, pro_categories, pro_brands where products.ProductCategoryId=pro_categories.ProCategoriesId and products.ProductBrandId=pro_brands.ProBrandId ORDER BY products.ProductStatus DESC", false);
                    $Count = 0;
                    while ($fetchpro_brands = mysqli_fetch_array($SQLproducts)) {
                      $Count++;
                      $ProductName = $fetchpro_brands['ProductName'];
                      $ProBrandName = $fetchpro_brands['ProBrandName'];
                      $ProCategoryName = $fetchpro_brands['ProCategoryName'];
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
                      $ProductAvailibility = CHECK("SELECT * FROM deal_products where DealProductProductId='$ProductId'");
                      $CheckIfProductINQuotationorNot = CHECK("SELECT * from quotation_products where QuotationProId='$ProductId'");
                      if ($ProductAvailibility == null) {
                        $DeletebTN = null;
                      } else if ($CheckIfProductINQuotationorNot ==  null) {
                        $DeletebTN = null;
                      } else {
                        $DeletebTN = true;
                      }
                    ?>
                      <tr>
                        <td><?php echo $Count; ?></td>
                        <td>
                          <img src=" <?php echo STORAGE_URL; ?>/products/pro-img/<?php echo $ProductImage; ?>" alt="<?php echo $ProductName; ?>" title="<?php echo $ProductName; ?>" class="w-10 pro-img">
                        </td>
                        <td class="lh-1-1 p-t-2">
                          <a target="_blank" href="<?php echo DOMAIN; ?>/admin/products/edit-products.php?productid=<?php echo SECURE($ProductId, "e"); ?>" class="p-t-2"><span class="text-primary"><?php echo $ProductName; ?></span><br>
                            <span class="text-grey fs-12">
                              <i class="fa fa-hashtag"></i> <?php echo $ProCategoryName; ?> |
                              <?php echo $ProBrandName; ?>
                            </span>
                          </a>
                        </td>
                        <td>
                          <?php echo Price($ProductSellPrice); ?>
                        </td>
                        <td>
                          <?php echo $ProductCreatedAt; ?>
                        </td>
                        <td>
                          <?php echo $ProductStatus; ?>
                        </td>
                        <td>
                          <a target="_blank" href="<?php echo DOMAIN; ?>/admin/products/edit-products.php?productid=<?php echo SECURE($ProductId, "e"); ?>" class="btn btn-sm btn-info">
                            <i class="fa fa-edit"></i> Edit Details
                          </a>
                          <?php if ($ProductAvailibility == null) { ?>
                            <a href="<?php echo DOMAIN; ?>/controller/productscontroller.php?delete_products=<?php echo SECURE('true', 'e'); ?>&access_url=<?php echo SECURE(RUNNING_URL, "e"); ?>&control_id=<?php echo SECURE($ProductId, "e"); ?>" class="btn-danger btn-sm btn"><i class="fa fa-trash"></i> Delete</a>
                            <a href="<?php echo DOMAIN; ?>/controller/productscontroller.php?restore_products=<?php echo SECURE('true', 'e'); ?>&access_url=<?php echo SECURE(DOMAIN . "/admin/products", "e"); ?>&control_id=<?php echo SECURE($ProductId, "e"); ?>" class="btn-success btn-sm btn"><i class="fa fa-refresh"></i> Restore</a>
                          <?php }  ?>
                        </td>
                      </tr>
                    <?php } ?>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!--End page content-->
      </div>

      <?php include '../../include/admin/sidebar.php'; ?>
    </div>
    <?php include '../../include/admin/footer.php'; ?>
  </div>

  <?php include '../../include/admin/footer_files.php'; ?>
</body>

</html>