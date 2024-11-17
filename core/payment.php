<?php
//require modules files
require "../require/DBConnections.php";

//payments.
$payments = "CREATE TABLE IF NOT EXISTS `payments` (
  `PaymentId` int(100) NOT NULL AUTO_INCREMENT,
  `PaidCustomerId` int(100) NOT NULL,
  `PaidAmount` int(100) NOT NULL,
  `PaidDate` varchar(100) NOT NULL,
  `PaymentMode` varchar(100) NOT NULL,
  `PaymentDescriptions` varchar(1000) NOT NULL,
  `PaidInvoiceId` varchar(1000) NOT NULL,
  `PaymentRefnumber` varchar(1000) NOT NULL,
  PRIMARY KEY (`PaymentId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";

$save = mysqli_query($DBConnection, $payments);

if ($save == true) {
 echo "Payments DB Table is updated successfully!";
} else {
 echo "Unable to update payment table at the moment!";
}
