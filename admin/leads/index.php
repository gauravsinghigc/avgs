<?php

//required files
require '../../require/modules.php';
require '../../require/admin/access-control.php';
require '../../require/admin/sessionvariables.php';

//page variables
$PageName = "All Calls";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $PageName; ?> | <?php echo APP_NAME; ?></title>
  <?php include '../../include/admin/header_files.php'; ?>
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
                <?php include 'action-nav.php'; ?>
              </div>
            </div>
            <div class="panel-body">
              <div class="flex-s-b">
                <h4 class="m-b-0"><?php echo $PageName; ?></h4>
                <form action="" method="" class="flex-s-b">
                  <button class="btn btn-success btn-sm m-l-3">Today</button>
                  <button class="btn btn-info btn-sm m-l-3">Yesterday</button>
                  <input type="date" class="form-control-2 fs-25 m-b-0 m-l-3" value="<?php echo date("Y-m-d"); ?>">
                </form>
              </div>
              <div class="row m-t-10">
                <div class="col-md-12">
                  <table class="table table-striped table-responsive">
                    <tr>
                      <th>#</th>
                      <th></th>
                    </tr>
                  </table>
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