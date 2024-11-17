<?php

//required files
require '../../require/modules.php';
require '../../require/admin/access-control.php';
require '../../require/admin/sessionvariables.php';

//page variables
$PageName = "ADD Products";
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
                  <h4 class="app-heading"><?php echo $PageName; ?></h4>
                </div>
              </div>
              <form class="data-form" action="../../controller/productscontroller.php" method="POST" enctype="multipart/form-data">
                <?php FormPrimaryInputs(true); ?>
                <div class="row">
                  <div class="col-md-4">
                    <h4 class="text-right">Product Type</h4>
                  </div>
                  <div class="col-md-8 p-1r">
                    <span class="m-r-10">
                      <input type="radio" name="ProductType" onclick="Goods()" value="Goods" checked="" required=""> Goods
                    </span>
                    <span>
                      <input type="radio" name="ProductType" onclick="Services()" value="Services"> Services
                    </span>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-lg-6 col-md-6 col-ms-6 col-12">
                    <label>Enter Product Name</label>
                    <input type="text" name="ProductName" class="form-control-2" />
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-lg-3 col-md-3 col-ms-3 col-12">
                    <label>Select category</label>
                    <select name="ProductCategoryId" id="catvalue" onchange="Newcat()" class="form-control-2">
                      <?php
                      $SqlProCategories2 = SELECT("SELECT * FROM pro_categories ORDER BY ProCategoryName ASC");
                      $Count = 0;
                      while ($FetchProCategories2 = mysqli_fetch_array($SqlProCategories2)) {
                        $Count++;
                        if ($Count == 1) {
                          $selected = "selected";
                        } else {
                          $selected = "";
                        } ?>
                        <option <?php echo $selected; ?> value="<?php echo $FetchProCategories2['ProCategoriesId']; ?>"><?php echo $FetchProCategories2['ProCategoryName']; ?></option>
                      <?php } ?>
                      <option value="new">Create New</option>
                    </select>
                  </div>
                  <div id="cats" style="display:none;">
                    <div class="form-group col-lg-3 col-md-3 col-ms-3 col-12">
                      <label>Create New Category</label>
                      <input type="text" name="NewCategory" class="form-control-2">
                    </div>
                  </div>
                  <div class="form-group col-lg-3 col-md-3 col-ms-3 col-12">
                    <label>Select Publisher</label>
                    <select name="ProductBrandId" id="pubvalue" onchange="NewPub()" class="form-control-2">
                      <?php
                      $Sqlbrands = SELECT("SELECT * FROM pro_brands ORDER BY ProBrandName ASC");
                      $Count = 0;
                      while ($fetchbrands = mysqli_fetch_array($Sqlbrands)) {
                        $Count++;
                        if ($Count == 1) {
                          $selected = "selected";
                        } else {
                          $selected = "";
                        } ?>
                        <option <?php echo $selected; ?> value="<?php echo $fetchbrands['ProBrandId']; ?>">
                          <?php echo $fetchbrands['ProBrandName']; ?></option>
                      <?php
                      } ?>
                      <option value="new">Create New</option>
                    </select>
                  </div>
                  <div id="publisher" style="display:none;">
                    <div class="form-group col-lg-3 col-md-3 col-ms-3 col-12">
                      <label>Create New Publisher</label>
                      <input type="text" name="NewPublisher" class="form-control-2">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-lg-6 col-md-6 col-ms-6 col-12">
                    <label>Enter <span id="type">HSN Code</span></label>
                    <input type="text" name="ProductRefernceCode" class="form-control-2" />
                  </div>
                  <div class="form-group col-lg-6 col-md-6 col-ms-6 col-12">
                    <label>Enter Sell Price</label>
                    <input type="text" name="ProductSellPrice" class="form-control-2" required="" />
                  </div>
                  <div class="form-group col-lg-6 col-md-6 col-ms-6 col-12">
                    <label>Enter Publisher Price</label>
                    <input type="text" name="ProducPublisherPrice" class="form-control-2" required="" />
                  </div>
                  <div class="form-group col-lg-12 col-md-12 col-ms-12 col-12">
                    <label>Enter Product Descriptions</label>
                    <textarea type="text" id="editor" name="ProductDescriptions" style="height:100% !important;" row="3" class="form-control-2"></textarea>
                  </div>
                  <div class="form-group col-lg-6 col-md-6 col-ms-6 col-12">
                    <label>Upload Primary Image</label>
                    <input type="FILE" name="ProductImage" value="null" id="uploadimage" accept="image/png, image/gif, image/jpeg" class="form-control-2" />
                  </div>
                  <div class="col-md-12">
                    <div class="flex-c mb-2-pr">
                      <img src="" id="ImgPreview">
                    </div>
                  </div>
                  <div class="col-md-12  m-t-20">
                    <h4 class="app-sub-heading">More Details</h4>
                  </div>
                  <div class="form-group col-lg-6 col-md-6 col-ms-6 col-12">
                    <label>Taxable Status</label>
                    <select name="ProductTaxOptions" onchange="taxstatus()" id="taxvalues" class="form-control-2" required="">
                      <option value="Taxable">Taxable</option>
                      <option value="Non Taxable">Non Taxable</option>
                    </select>
                  </div>
                  <div id="taxper">
                    <div class="form-group col-lg-6 col-md-6 col-ms-6 col-12">
                      <label>Tax Percentage</label>
                      <select name="ProductTaxPercentage" class="form-control-2">
                        <option value="0"> 0</option>
                        <option value="5"> 5 %</option>
                        <option value="8"> 8 %</option>
                        <option value="10"> 10 %</option>
                        <option value="12">12 %</option>
                        <option value="15">15 %</option>
                        <option value="18">18 %</option>
                        <option value="28">28 %</option>
                        <option value="30">30 %</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-12 m-t-20">
                    <button type="Submit" name="CreateProducts" class="btn btn-md app-btn">Save Products</button>
                    <a target="_blank" href="index.php" class="btn btn-md btn-danger">Cancel</a>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!--End page content-->
      </div>

      <?php include '../../include/admin/sidebar.php'; ?>
    </div>
    <?php include '../../include/admin/footer.php'; ?>
  </div>
  <script>
    function Newcat() {
      var catvalue = document.getElementById("catvalue");
      if (catvalue.value == "new") {
        document.getElementById("cats").style.display = "block";
      } else {
        document.getElementById("cats").style.display = "none";
      }
    }

    function NewPub() {
      var pubvalue = document.getElementById("pubvalue");

      if (pubvalue.value == "new") {
        document.getElementById("publisher").style.display = "block";
      } else {
        document.getElementById("publisher").style.display = "none";
      }
    }

    function Goods() {
      document.getElementById("type").innerHTML = "HSN Code";
    }

    function Services() {
      document.getElementById("type").innerHTML = "SAC Code";
    }

    function taxstatus() {
      var taxvalues = document.getElementById("taxvalues");
      if (taxvalues.value == "Taxable") {
        document.getElementById("taxper").style.display = "block";
      } else {
        document.getElementById("taxper").style.display = "none";
      }
    }
  </script>

  <?php include '../../include/admin/footer_files.php'; ?>
</body>

</html>