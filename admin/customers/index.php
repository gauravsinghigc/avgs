<?php

//required files
require '../../require/modules.php';
require '../../require/admin/access-control.php';
require '../../require/admin/sessionvariables.php';

//page variables
$PageName = "All Customer";

//page activities
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
      document.getElementById("app_customers").classList.add("active");
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
              <div class="row">
                <div class="col-md-12 m-b-5">
                  <h4 class="m-b-0 app-heading"><?php echo $PageName; ?></h4>
                </div>
              </div>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="flex-s-b">
                    <div>
                      <a href="<?php echo DOMAIN; ?>/admin/customers/add-customer.php" class="btn btn-sm btn-danger square m-r-20">Add Customer</a>
                      <a href="export.php" target="_blank" class="btn btn-sm btn-info square">Export All</a>
                    </div>
                    <div>
                      <form action="" method="get">
                        <div class="flex-s-b p-0 m-b-0">
                          <input type="text" name="search" value="true" hidden="">
                          <select name="search_type" class="form-control m-b-0" style="margin-bottom:0px !important;" id="searchoptions" onchange="CheckSearchOptions()">
                            <option value="Customer Display Name" selected>Customer Display Name</option>
                            <option value="Customer First name">Customer First name</option>
                            <option value="Company Name">Company Name</option>
                            <option value="Customer Mobile Phone">Customer Mobile Phone</option>
                          </select>
                          <input type="text" class="form-control w-75 m-b-0" style="margin-bottom:0px !important;" id="searchplaceholder" placeholder="Search By Display Name" onchange="form.submit()" list="available_details" name="search_value">
                          <datalist id="available_details">
                            <?php SelectOptions("SELECT * FROM customers", "CustomerDisplayName", "CustomerDisplayName", "ASC", false); ?>
                            <?php SelectOptions("SELECT * FROM customers", "CustomerFirstname", "CustomerFirstname", "ASC", false); ?>
                            <?php SelectOptions("SELECT * FROM customers", "CustomerMobilePhone", "CustomerMobilePhone", "ASC", false); ?>
                            <?php SelectOptions("SELECT * FROM customers", "CustomerEmailId", "CustomerEmailId", "ASC", false); ?>
                            <?php SelectOptions("SELECT * FROM customers", "CompanyName", "CompanyName", "ASC", false); ?>
                          </datalist>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <script>
                  function CheckSearchOptions() {
                    var searchoptions = document.getElementById("searchoptions");
                    var searchplaceholder = document.getElementById("searchplaceholder");
                    searchplaceholder.placeholder = "Search By " + searchoptions.value;
                  }
                </script>
                <?php CLEAR_SEARCH(); ?>
                <div class="col-md-12 m-t-10">
                  <table class="table table-responsive table-striped">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Company Name</th>
                        <th>Phone</th>
                        <th>Emailid</th>
                        <th>Deals</th>
                        <th>Website</th>
                        <th>CreatedAt</th>
                      </tr>
                    </thead>
                    <?php
                    if (isset($_GET['search'])) {
                      $searchvalue = $_GET['search_value'];
                      $search_type = $_GET['search_type'];
                      $search_type = str_replace(" ", "", $search_type);
                      if (LOGIN_UserRoles == "Admin") {
                        $AllCustomers = FetchConvertIntoArray("SELECT * FROM customers where customers.$search_type='$searchvalue' ORDER BY CustomerId DESC", true);
                      } else {
                        $AllCustomers = FetchConvertIntoArray("SELECT * FROM customers where customers.$search_type='$searchvalue' and CustomerCreatedBy='" . LOGIN_UserId . "' ORDER BY CustomerId DESC", true);
                      }
                    } else {
                      if (LOGIN_UserRoles == "Admin") {
                        $AllCustomers = FetchConvertIntoArray("SELECT * FROM customers ORDER BY CustomerId DESC", true);
                      } else {
                        $AllCustomers = FetchConvertIntoArray("SELECT * FROM customers where CustomerCreatedBy='" . LOGIN_UserId . "' ORDER BY CustomerId DESC", true);
                      }
                    }
                    if ($AllCustomers != null) {
                      $Count = 0;
                      foreach ($AllCustomers as $Customers) {
                        $Count++;
                    ?>
                        <tr>
                          <td><?php echo $Count; ?></td>
                          <td>
                            <a href="<?php echo DOMAIN; ?>/admin/customers/details/?viewdataid=<?php echo SECURE($Customers->CustomerId, "e"); ?>" class="text-primary">
                              <i class="fa fa-user"></i> <?php echo $Customers->CustomerDisplayName; ?>
                            </a>
                          </td>
                          <td><?php echo $Customers->CompanyName; ?></td>
                          <td><?php echo $Customers->CustomerMobilePhone; ?></td>
                          <td><?php echo $Customers->CustomerEmailId; ?></td>
                          <td><?php echo TOTAL("SELECT * FROM deals where DealCustomerId='" . $Customers->CustomerId . "'"); ?></td>
                          <td><a href=" <?php echo $Customers->CustomerWebsite; ?>" class="text-primary">View Website</a>
                          </td>
                          <td><?php echo $Customers->CustomerCreatedAt; ?></td>
                        </tr>
                    <?php }
                    } ?>
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
            <a target="_blank" onclick="Databar('Addbrands')" class="btn btn-md btn-danger">Cancel</a>
          </div>

        </div>
      </form>
    </div>
  </section>
  <!-- end of add section -->

  <!-- confirmation pop up form-->

  <?php include '../../include/admin/footer_files.php'; ?>
</body>

</html>