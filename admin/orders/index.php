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
      document.getElementById("app_orders").classList.add("active");
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
            <div class="panel-heading">
              <div class="flex-s-b">
                <div class="btn-group btn-group-sm">
                  <a target="_blank" href="<?php echo DOMAIN; ?>/admin/products/index.php" class="btn btn-sm btn-success square">All Products</a>
                  <a href="<?php echo DOMAIN; ?>/admin/configurations/products/index.php" class="btn btn-sm btn-primary square">Categories</a>
                  <a href="<?php echo DOMAIN; ?>/admin/configurations/products/sub-categories.php" class="btn btn-sm btn-warning square">Subcategories</a>
                  <a href="<?php echo DOMAIN; ?>/admin/configurations/products/brands.php" class="btn btn-sm btn-danger square">Brands</a>
                </div>
              </div>
            </div>
            <div class="panel-body">
              <div class="flex-s-b">
                <h4 class="m-b-0">All Products</h4>
                <a href="#" onclick="Databar('Addbrands')" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Products</a>
              </div>
              <div class="row m-t-10">
                <?php
                $SQLproducts = SELECT("SELECT * FROM products, pro_categories, pro_sub_categories, pro_brands where products.ProductCategoryId=pro_categories.ProCategoriesId and products.ProductSubCategoryId=pro_sub_categories.ProSubCategoriesId and products.ProductBrandId=ProBrandId ORDER BY products.ProductId ASC");
                while ($fetchpro_brands = mysqli_fetch_array($SQLproducts)) {
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
                  $ProductStatus = StatusView($fetchpro_brands['ProductStatus']);
                  $ProductCreatedAt = $fetchpro_brands['ProductCreatedAt'];
                  $ProductUpdatedAt = ReturnValue($fetchpro_brands['ProductUpdatedAt']);
                  $ProductCreatedBy = $fetchpro_brands['ProductCreatedBy']; ?>
                  <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                    <div class="shadow-lg br10">
                      <div class="flex-s-b">
                        <div class="img-section">
                          <img src="<?php echo STORAGE_URL; ?>/products/pro-img/<?php echo $ProductImage; ?>" alt="<?php echo $ProductName; ?>" title="<?php echo $ProductName; ?>" class="w-100">
                        </div>
                        <div class="item-details p-1">
                          <p class="lh-1-2 m-b-2">
                            <span class="fs-14 bold"><?php echo $ProductName; ?></span><br>
                            <span class="fs-12 text-grey">
                              <span>
                                <span><?php echo $ProCategoryName; ?></span> |
                                <span><?php echo $ProSubCategoryName; ?></span>
                              </span><br>
                              <span><b>Brand: </b><?php echo $ProBrandName; ?></span><br>
                              <span class="flex-s-b">
                                <span><?php echo $ProductStatus; ?></span>
                                <span class="text-primary"><?php echo $ProductRefernceCode; ?></span>
                              </span>
                              <span><i class='fa fa-calendar text-primary'></i> <?php echo $ProductCreatedAt; ?></span><br>
                              <span><i class="fa fa-edit text-warning"></i> <?php echo $ProductUpdatedAt; ?></span><br>
                            </span>
                            <span class="flex-s-b m-t-1">
                              <span class="m-unit"><?php echo $ProductWeight; ?></span>
                              <span class="prices">
                                <span class="mrp"><strike>Rs.<?php echo $ProductMrpPrice; ?></strike></span>
                                <span class="sell">Rs.<?php echo $ProductSellPrice; ?></span>
                              </span>
                            </span>
                          </p>
                          <a href="#" class="btn-sm text-primary"><i class="fa fa-edit"></i> Edit</a>
                          <a href="#" class="btn-sm text-danger"><i class="fa fa-trash"></i> Delete</a>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php } ?>
              </div>
            </div>
          </div>

          <!--End page content-->
        </div>

        <?php include '../../include/admin/sidebar.php'; ?>
      </div>
      <?php include '../../include/admin/footer.php'; ?>
    </div>

    <!-- add section -->
    <section class="add-section" id="Addbrands">
      <div class="add-data-form">
        <form class="data-form" action="../../controller/productscontroller.php" method="POST" enctype="multipart/form-data">
          <?php FormPrimaryInputs(true); ?>
          <div class="main-data">
            <div class="main-data-header app-bg">
              <div class="flex-s-b">
                <h4 class="mt-0 mb-0">Add New Products</h4>
                <a class="btn btn-sm btn-danger sqaure" onclick="Databar('Addbrands')"><i class="fa fa-times fs-17"></i></a>
              </div>
            </div>
            <div class="main-data-body p-2">
              <div class="row">
                <div class="form-group col-lg-6 col-md-6 col-ms-6 col-12">
                  <label>Enter Product Name</label>
                  <input type="text" name="ProductName" class="form-control-2" required="" />
                </div>
                <div class="form-group col-lg-6 col-md-6 col-ms-6 col-12">
                  <label>Select category</label>
                  <select name="ProductCategoryId" class="form-control-2" required="">
                    <?php
                    $SqlProCategories2 = SELECT("SELECT * FROM pro_categories ORDER BY ProCategoryName ASC");
                    while ($FetchProCategories2 = mysqli_fetch_array($SqlProCategories2)) { ?>
                      <option value="<?php echo $FetchProCategories2['ProCategoriesId']; ?>"><?php echo $FetchProCategories2['ProCategoryName']; ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group col-lg-6 col-md-6 col-ms-6 col-12">
                  <label>Select Sub Category</label>
                  <select name="ProductSubCategoryId" class="form-control-2" required="">
                    <?php
                    $SqlSubcategory = SELECT("SELECT * FROM pro_sub_categories ORDER BY ProSubCategoryName ASC");
                    while ($fetchsubcategory = mysqli_fetch_array($SqlSubcategory)) { ?>
                      <option value="<?php echo $fetchsubcategory['ProSubCategoriesId']; ?>"><?php echo $fetchsubcategory['ProSubCategoryName']; ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group col-lg-6 col-md-6 col-ms-6 col-12">
                  <label>Select Brands</label>
                  <select name="ProductBrandId" class="form-control-2" required="">
                    <?php
                    $Sqlbrands = SELECT("SELECT * FROM pro_brands ORDER BY ProBrandName ASC");
                    while ($fetchbrands = mysqli_fetch_array($Sqlbrands)) { ?>
                      <option value="<?php echo $fetchbrands['ProBrandId']; ?>"><?php echo $fetchbrands['ProBrandName']; ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group col-lg-6 col-md-6 col-ms-6 col-12">
                  <label>Enter Refrence No/HSN/ProductId/Barcode</label>
                  <input type="text" name="ProductRefernceCode" class="form-control-2" required="" />
                </div>
                <div class="form-group col-lg-6 col-md-6 col-ms-6 col-12">
                  <label>Enter Sell Price</label>
                  <input type="text" name="ProductSellPrice" class="form-control-2" required="" />
                </div>
                <div class="form-group col-lg-6 col-md-6 col-ms-6 col-12">
                  <label>Enter MRP</label>
                  <input type="text" name="ProductMrpPrice" class="form-control-2" required="" />
                </div>
                <div class="form-group col-lg-6 col-md-6 col-ms-6 col-12">
                  <label>Enter Weight/Measurement Unit</label>
                  <input type="text" name="ProductWeight" class="form-control-2" required="" />
                </div>
                <div class="form-group col-lg-12 col-md-12 col-ms-12 col-12">
                  <label>Enter Product Descriptions</label>
                  <textarea type="text" id="editor" name="ProductDescriptions" style="height:100% !important;" row="3" class="form-control-2" required=""></textarea>
                </div>
                <div class="form-group col-lg-6 col-md-6 col-ms-6 col-12">
                  <label>Upload Primary Image</label>
                  <input type="FILE" name="ProductImage" id="uploadimage" accept="image/png, image/gif, image/jpeg" class="form-control-2" required="" />
                </div>
                <div class="col-md-12">
                  <div class="flex-c mb-2-pr">
                    <img src="" id="ImgPreview">
                  </div>
                </div>
              </div>
              <br><br><br><br><br><br>
            </div>
            <div class="main-data-footer">
              <button type="Submit" onclick="form.submit()" value="null" name="CreateProducts" class="btn btn-md app-bg">Save Products</button>
              <a onclick="Databar('Addbrands')" class="btn btn-md btn-danger">Cancel</a>
            </div>

          </div>
        </form>
      </div>
    </section>
    <!-- end of add section -->

    <?php include '../../include/admin/footer_files.php'; ?>
</body>

</html>