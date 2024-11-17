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

<body class="container-fluid">
 <table class="table table-responsive table-striped">
  <thead>
   <tr>
    <th>#</th>
    <th>Name</th>
    <th>Company Name</th>
    <th>Phone</th>
    <th>Emailid</th>
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
      <?php echo $Customers->CustomerDisplayName; ?>
     </td>
     <td><?php echo $Customers->CompanyName; ?></td>
     <td><?php echo $Customers->CustomerMobilePhone; ?></td>
     <td><?php echo $Customers->CustomerEmailId; ?></td>
     <td><?php echo $Customers->CustomerWebsite; ?>
     </td>
     <td><?php echo $Customers->CustomerCreatedAt; ?></td>
    </tr>
  <?php }
  } ?>
 </table>

 <?php include '../../include/admin/footer_files.php'; ?>
</body>

</html>