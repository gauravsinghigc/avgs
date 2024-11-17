<?php
//require
require '../../require/modules.php';
require '../../require/admin/sessionvariables.php';

$PageName = "All Customers";
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
    if (LOGIN_UserRoles == "Admin") {
     $AllCustomers = FetchConvertIntoArray("SELECT * FROM customers", true);
    } else {
     $AllCustomers = FetchConvertIntoArray("SELECT * FROM customers where CustomerCreatedBy='" . LOGIN_UserId . "'", true);
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
       <td><?php echo $Customers->CustomerWebsite; ?></a>
       </td>
       <td><?php echo $Customers->CustomerCreatedAt; ?></td>
      </tr>
    <?php }
    } ?>
   </table>


   <?php include '../../include/admin/export-footer.php'; ?>
  </div>
  <?php
  require '../../include/admin/footer_files.php';
  ?>
 </center>
</body>

</html>