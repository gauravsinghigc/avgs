<?php
//database variables
//for muliple database connections, connections will be declared here...
//DB_ENV can be DEV or PROD.
/*
 DEV -> for development
 PROD -> for production
 
 *** change DB_ENV mode as per your requirement *** 
*/

//set DB_ENV Database work environments
define("DB_ENV", "DEV");

//development
if (DB_ENV == "DEV") {
 define("CONTROL_DATABASE", true);
 define("CONTROL_DB_STATUS", false);
 define("DB_SERVER_HOST", "localhost");
 define("DB_SERVER_USER", "root");
 define("DB_SERVER_PASS", "");
 define("DB_SERVER_DB_NAME", "avgs");
 define("DB_SERVER_PORT", "3306");

 //production
} else if (DB_ENV == "PROD") {
 define("CONTROL_DATABASE", true);
 define("CONTROL_DB_STATUS", false);
 define("DB_SERVER_HOST", "localhost");
 define("DB_SERVER_USER", "admin_lms");
 define("DB_SERVER_PASS", "^NekO47cV5exrtse");
 define("DB_SERVER_DB_NAME", "admin_lms");
 define("DB_SERVER_PORT", "3306");

 //die if DB_ENV is not set
} else {
 die("<b>Error:</b> DB_ENV is not set. Please set DB_ENV as DEV or PROD in config/db.php file");
}
