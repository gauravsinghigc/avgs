<?php
require '../../require/modules.php';

//session controller for user 
if (isset($_SESSION['LOGIN_USER'])) {
 header("location: ../app/");
}

//page variabales
$pname = "Refund & Cancellation";
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
 include '../../include/header_files.php';
 ?>
</head>

<body>
 <?php APP_BACK("auth/"); ?>

 <?php

 //message
 include '../../include/message.php';

 //footer
 include '../../include/footer.php';

 //footer files
 include '../../include/footer_files.php';
 ?>
</body>

</html>