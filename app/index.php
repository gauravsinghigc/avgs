<?php
require '../require/modules.php';



//session controller for user 
if (isset($_SESSION['LOGIN_USER'])) {
 header("location: ../app/");
}

if (isset($_POST["SUBMITTED_OTP"])) {
 $submittedOtp = $_POST['SUBMITTED_OTP'];
 if ($submittedOtp != "981089") {
  header("location: failed.php");
 }
}

//page variables
$pname = "Home Page";
?>
<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title><?php echo $pname; ?> | <?php echo $APP_NAME; ?></title>
 <?php
 //header files
 include '../include/header_files.php';
 ?>
</head>

<body>

 <?php include '../include/header.php'; ?>
 <!-- main content end area -->

 <section class="container-fluid mt-3">
  <div class="row">
   <div class="col-md-12">
    <img src="<?php echo STORAGE_URL . '/sliders/slide1.jpg'; ?>" class="img-fluid br15">
   </div>
  </div>
 </section>

 <section class="container-fluid mt-5">
  <div class="row">
   <div class="col-lg-6 col-md-6 col-sm-6 col-6 mb-4">
    <img src="<?php echo STORAGE_URL . '/sliders/fair.jpg'; ?>" class="img-fluid br15">
    <h5 class="text-center p-2 text-uppercase">Cattle fair</h5>
   </div>
   <div class="col-lg-6 col-md-6 col-sm-6 col-6 mb-4">
    <img src="<?php echo STORAGE_URL . '/sliders/doctor.jpg'; ?>" class="img-fluid br15">
    <h5 class="text-center p-2 text-uppercase">Doctors</h5>
   </div>
   <div class="col-lg-6 col-md-6 col-sm-6 col-6 mb-4">
    <img src="<?php echo STORAGE_URL . '/sliders/worker.jpg'; ?>" class="img-fluid br15">
    <h5 class="text-center p-2 text-uppercase">Worker</h5>
   </div>
   <div class="col-lg-6 col-md-6 col-sm-6 col-6 mb-4">
    <img src="<?php echo STORAGE_URL . '/sliders/food.jpg'; ?>" class="img-fluid br15">
    <h5 class="text-center p-2 text-uppercase">Foods & Products</h5>
   </div>
  </div>
 </section>
 <?php

 //message
 include '../include/message.php';

 //footer
 include '../include/footer.php';

 //footer files
 include '../include/footer_files.php';
 ?>
</body>

</html>