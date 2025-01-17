<?php
//require main config.php file
require(__DIR__ . "/connections.php");
require(__DIR__ . "/module/crud.php");
require(__DIR__ . "/../config/config.php");

//require all modules;
$AllModules = array(
 "appback.php",
 "applogs.php",
 "bool.php",
 "url.php",
 "enc-dec.php",
 "ipaddress.php",
 "devicetypecheck.php",
 "deviceinfo.php",
 "form.php",
 "formate.php",
 "mail.php",
 "push-alerts.php",
 "request.php",
 "sms.php",
 "upload.php",
 "add-ons.php",
 "html-variables.php",
 "html-function.php",
 "e-commerce.php",
 "requestor.php",
 "invoice-config.php",
 "suggest-inputs.php"
);

foreach ($AllModules as $module) {
 include(__DIR__ . "/module/$module");
}

//require common, session variables
include(__DIR__ . "/commonvariables.php");
include(__DIR__ . "/strings.php");
