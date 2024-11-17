<?php
//add controller helper files
require 'helper.php';

//add aditional requirements
require '../require/admin/sessionvariables.php';

//update primary details
if (isset($_POST['UpdatePrimaryConfigurations'])) {
 $APP_NAME = $_POST['APP_NAME'];
 $TAGLINE = $_POST['TAGLINE'];
 $PRIMARY_PHONE = $_POST['PRIMARY_PHONE'];
 $PRIMARY_EMAIL = $_POST['PRIMARY_EMAIL'];
 $SHORT_DESCRIPTION = SECURE($_POST['SHORT_DESCRIPTION'], "e");
 $PRIMARY_ADDRESS = SECURE($_POST['PRIMARY_ADDRESS'], "e");
 $PRIMARY_AREA = SECURE($_POST['PRIMARY_AREA'], "e");
 $PRIMARY_CITY = SECURE($_POST['PRIMARY_CITY'], "e");
 $PRIMARY_STATE = SECURE($_POST['PRIMARY_STATE'], "e");
 $PRIMARY_PINCODE = SECURE($_POST['PRIMARY_PINCODE'], "e");
 $PRIMARY_COUNTRY = SECURE($_POST['PRIMARY_COUNTRY'], "e");
 $COMPANY_TYPE = $_POST['COMPANY_TYPE'];
 $FINANCIAL_YEAR = $_POST['FINANCIAL_YEAR'];
 $GST_NO = $_POST['GST_NO'];
 $TAX_NO = $_POST['TAX_NO'];
 $GOC_CONFIG_DATE = $_POST['GOC_CONFIG_DATE'];

 $Update = UPDATE("UPDATE configurations SET configurationvalue='$APP_NAME' where configurationname='APP_NAME'");
 $Update = UPDATE("UPDATE configurations SET configurationvalue='$TAGLINE' where configurationname='TAGLINE'");
 $Update = UPDATE("UPDATE configurations SET configurationvalue='$PRIMARY_PHONE' where configurationname='PRIMARY_PHONE'");
 $Update = UPDATE("UPDATE configurations SET configurationvalue='$PRIMARY_EMAIL' where configurationname='PRIMARY_EMAIL'");
 $Update = UPDATE("UPDATE configurations SET configurationvalue='$SHORT_DESCRIPTION' where configurationname='SHORT_DESCRIPTION'");
 $Update = UPDATE("UPDATE configurations SET configurationvalue='$PRIMARY_ADDRESS' where configurationname='PRIMARY_ADDRESS'");
 $Update = UPDATE("UPDATE configurations SET configurationvalue='$PRIMARY_AREA' where configurationname='PRIMARY_AREA'");
 $Update = UPDATE("UPDATE configurations SET configurationvalue='$PRIMARY_CITY' where configurationname='PRIMARY_CITY'");
 $Update = UPDATE("UPDATE configurations SET configurationvalue='$PRIMARY_STATE' where configurationname='PRIMARY_STATE'");
 $Update = UPDATE("UPDATE configurations SET configurationvalue='$PRIMARY_PINCODE' where configurationname='PRIMARY_PINCODE'");
 $Update = UPDATE("UPDATE configurations SET configurationvalue='$PRIMARY_COUNTRY' where configurationname='PRIMARY_COUNTRY'");
 $Update = UPDATE("UPDATE configurations SET configurationvalue='$COMPANY_TYPE' where configurationname='COMPANY_TYPE'");
 $Update = UPDATE("UPDATE configurations SET configurationvalue='$FINANCIAL_YEAR' where configurationname='FINANCIAL_YEAR'");
 $Update = UPDATE("UPDATE configurations SET configurationvalue='$GST_NO' where configurationname='GST_NO'");
 $Update = UPDATE("UPDATE configurations SET configurationvalue='$TAX_NO' where configurationname='TAX_NO'");
 $Update = UPDATE("UPDATE configurations SET configurationvalue='$GOC_CONFIG_DATE' WHERE configurationname='GOC_CONFIG_DATE'");

 APP_LOGS("C_PROFILE_UPDATED", "Company Profile Updated", "UPDATE");
 RESPONSE($Update, "Company Profile Updated!", "Unable to Update Company profile!");

 //update api & key
} elseif (isset($_POST['UpdateApi&Keys'])) {
 $SMS_SENDER_ID = $_POST['SMS_SENDER_ID'];
 $SMS_API_KEY = $_POST['SMS_API_KEY'];
 $SMS_OTP_TEMP_ID_VALUE = $_POST['SMS_OTP_TEMP_ID_VALUE'];
 $SMS_OTP_TEMP_ID_SUPPORTIVE_TEXT = $_POST['SMS_OTP_TEMP_ID_SUPPORTIVE_TEXT'];
 $PASS_RESET_OTP_TEMP_VALUE = $_POST['PASS_RESET_OTP_TEMP_VALUE'];
 $PASS_RESET_OTP_TEMP_SUPPORTIVE_TEXT = $_POST['PASS_RESET_OTP_TEMP_SUPPORTIVE_TEXT'];
 $CONTROL_SMS = $_POST['CONTROL_SMS'];

 $Update = UPDATE("UPDATE configurations SET configurationvalue='$CONTROL_SMS' where configurationname='CONTROL_SMS'");
 $Update = UPDATE("UPDATE configurations SET configurationvalue='$SMS_SENDER_ID' where configurationname='SMS_SENDER_ID'");
 $Update = UPDATE("UPDATE configurations SET configurationvalue='$SMS_API_KEY' where configurationname='SMS_API_KEY'");
 $Update = UPDATE("UPDATE configurations SET configurationvalue='$SMS_OTP_TEMP_ID_VALUE', configurationsupportivetext='$SMS_OTP_TEMP_ID_SUPPORTIVE_TEXT' where configurationname='SMS_OTP_TEMP_ID'");
 $Update = UPDATE("UPDATE configurations SET configurationvalue='$PASS_RESET_OTP_TEMP_VALUE', configurationsupportivetext='$PASS_RESET_OTP_TEMP_SUPPORTIVE_TEXT' where configurationname='PASS_RESET_OTP_TEMP'");

 APP_LOGS("SMS_API_KEY", "SMS api & key are $CONTROL_SMS", "API_KEY");
 RESPONSE($Update, "SMS & API are Updated Successfully!", "Unable to Update SMS & API Keys Details");

 //update mail configs
} elseif (isset($_POST['UpdateMailConfigs'])) {
 $CONTROL_MAILS = $_POST['CONTROL_MAILS'];
 $SENDER_MAIL_ID = $_POST['SENDER_MAIL_ID'];
 $RECEIVER_MAIL = $_POST['RECEIVER_MAIL'];
 $SUPPORT_MAIL = $_POST['SUPPORT_MAIL'];
 $ENQUIRY_MAIL = $_POST['ENQUIRY_MAIL'];
 $ADMIN_MAIL = $_POST['ADMIN_MAIL'];

 $Update = UPDATE("UPDATE configurations SET configurationvalue='$CONTROL_MAILS' where configurationname='CONTROL_MAILS'");
 $Update = UPDATE("UPDATE configurations SET configurationvalue='$SENDER_MAIL_ID' where configurationname='SENDER_MAIL_ID'");
 $Update = UPDATE("UPDATE configurations SET configurationvalue='$RECEIVER_MAIL' where configurationname='RECEIVER_MAIL'");
 $Update = UPDATE("UPDATE configurations SET configurationvalue='$SUPPORT_MAIL' where configurationname='SUPPORT_MAIL'");
 $Update = UPDATE("UPDATE configurations SET configurationvalue='$ENQUIRY_MAIL' where configurationname='ENQUIRY_MAIL'");
 $Update = UPDATE("UPDATE configurations SET configurationvalue='$ADMIN_MAIL' where configurationname='ADMIN_MAIL'");

 APP_LOGS("MAIL_CONFIGS", "Mail Configurations Updated & Status: $CONTROL_MAILS", "MAIL_SETTINGS");
 RESPONSE($Update, "Mailing Configurations are Updated Successfully!", "Unable to update Mailing configurations");

 //update pg details
} elseif (isset($_POST['UpdatePgDetails'])) {
 $ONLINE_PAYMENT_OPTION = $_POST['ONLINE_PAYMENT_OPTION'];
 $PG_PROVIDER = $_POST['PG_PROVIDER'];
 $PG_MODE = $_POST['PG_MODE'];
 $MERCHENT_ID = $_POST['MERCHENT_ID'];
 $MERCHANT_KEY = $_POST['MERCHANT_KEY'];

 $Update = UPDATE("UPDATE configurations SET configurationvalue='$ONLINE_PAYMENT_OPTION' where configurationname='ONLINE_PAYMENT_OPTION'");
 $Update = UPDATE("UPDATE configurations SET configurationvalue='$PG_PROVIDER' where configurationname='PG_PROVIDER'");
 $Update = UPDATE("UPDATE configurations SET configurationvalue='$PG_MODE' where configurationname='PG_MODE'");
 $Update = UPDATE("UPDATE configurations SET configurationvalue='$MERCHENT_ID' where configurationname='MERCHENT_ID'");
 $Update = UPDATE("UPDATE configurations SET configurationvalue='$MERCHANT_KEY' where configurationname='MERCHANT_KEY'");

 APP_LOGS("PAYMENT_GATEWAY_UPDATED", "Payment Gateway Updated & Status : $ONLINE_PAYMENT_OPTION & Provider : $PG_PROVIDER", "PG_SETTINGS");
 RESPONSE($Update, "Payment Gateway Details are updated successfully!", "Unable to Update Payment Gateway Details!");

 //enable features
} elseif (isset($_POST['UpdateFeatures'])) {
 $CONTROL_WORK_ENV = $_POST['CONTROL_WORK_ENV'];
 $CONTROL_NOTIFICATION = $_POST['CONTROL_NOTIFICATION'];
 $CONTROL_MSG_DISPLAY_TIME = $_POST['CONTROL_MSG_DISPLAY_TIME'];
 $CONTROL_APP_LOGS = $_POST['CONTROL_APP_LOGS'];
 $CONTROL_NOTIFICATION_SOUND = $_POST['CONTROL_NOTIFICATION_SOUND'];

 $Update = UPDATE("UPDATE configurations SET configurationvalue='$CONTROL_WORK_ENV' where configurationname='CONTROL_WORK_ENV'");
 $Update = UPDATE("UPDATE configurations SET configurationvalue='$CONTROL_NOTIFICATION' where configurationname='CONTROL_NOTIFICATION'");
 $Update = UPDATE("UPDATE configurations SET configurationvalue='$CONTROL_MSG_DISPLAY_TIME' where configurationname='CONTROL_MSG_DISPLAY_TIME'");
 $Update = UPDATE("UPDATE configurations SET configurationvalue='$CONTROL_APP_LOGS' where configurationname='CONTROL_APP_LOGS'");
 $Update = UPDATE("UPDATE configurations SET configurationvalue='$CONTROL_NOTIFICATION_SOUND' where configurationname='CONTROL_NOTIFICATION_SOUND'");

 APP_LOGS("FEATURE_UPDATED", "WORK_ENV: $CONTROL_WORK_ENV, ALERT: $CONTROL_NOTIFICATION, ALERT_TIME: $CONTROL_MSG_DISPLAY_TIME, LOGS: $CONTROL_APP_LOGS", "FEATURE_UPDATED");
 RESPONSE($Update, "Selected features are Updated successfully!", "Unable to Update selected features!");

 //update logo 
} elseif (isset($_POST['updatelogo'])) {
 $CurrentFile = SECURE($_POST['CurrentFile'], "d");
 $APP_LOGO = UPLOAD_FILES("../storage/company/img/logo", false, APP_NAME . "", "Logo", "APP_LOGO");
 $Update = UPDATE("UPDATE configurations SET configurationvalue='$APP_LOGO' where configurationname='APP_LOGO'");
 APP_LOGS("LOGO_CHANGED", "$APP_LOGO", "LOGO_UPDATED");
 RESPONSE($Update, "Logo Updated Successfully!", "Unable to Update Logo!");

 //update login bg
} elseif (isset($_POST['Update_LOGIN_BG_IMAGE'])) {
 $CurrentFile = SECURE($_POST['CurrentFile'], "d");
 $LOGIN_BG_IMAGE = UPLOAD_FILES("../storage/default/bg", false, APP_NAME . "", "Logo", "LOGIN_BG_IMAGE");
 $Update = UPDATE("UPDATE configurations SET configurationvalue='$LOGIN_BG_IMAGE' where configurationname='LOGIN_BG_IMAGE'");
 APP_LOGS("LOGIN_BG_CHANGED", "$LOGIN_BG_IMAGE", "IMG_UPDATED");
 RESPONSE($Update, "Log in Bg Updated Successfully! Updated Successfully!", "Unable to Update Login Background Image!");

 //update delivery charges
} elseif (isset($_POST['UpdateInvoicefieldsDetails'])) {
 $ConfigInvoiceId = SECURE($_POST['UpdateInvoicefieldsDetails'], "d");
 $InvoiceConfigValue = POST("InvoiceConfigValue");
 $update = UPDATE_TABLE("config_invoices", ["InvoiceConfigValue"], "ConfigInvoiceId='$ConfigInvoiceId'");
 RESPONSE($update, "Invoice Config Updated", "Unable to update details");

 //save rate configurations
} else if (isset($_POST['SaveNewRateConfigs'])) {
 $RateConfigCurrentId = $_POST['RateConfigCurrentId'];
 $RateConfigType = $_POST['RateConfigType'];
 $RateConfigValue = $_POST['RateConfigValue'];
 $RateConfigDate = $_POST['RateConfigDate'];
 $RateConfigCreatedAt = date("Y-m-d H:i:s");
 $RateConfigCreatedBy = LOGIN_UserId;
 $RateConfigStatus = $_POST['RateConfigStatus'];

 $SaveRateConfigs = SAVE("configs_rates", ["RateConfigCreatedAt", "RateConfigCreatedBy", "RateConfigStatus", "RateConfigCurrentId", "RateConfigType", "RateConfigDate", "RateConfigValue"]);
 RESPONSE($SaveRateConfigs, "New Rate Configurations is Saved Successfully", "Unable to save new configurations");

 //update rate configurations
} elseif (isset($_POST['UpdateRateConfigs'])) {
 $RateConfigCurrentId = $_POST['RateConfigCurrentId'];
 $RateConfigType = $_POST['RateConfigType'];
 $RateConfigValue = $_POST['RateConfigValue'];
 $RateConfigDate = $_POST['RateConfigDate'];
 $RateConfigCreatedAt = date("Y-m-d H:i:s");
 $RateConfigCreatedBy = LOGIN_UserId;
 $RateConfigStatus = $_POST['RateConfigStatus'];
 $RateConfigId  = SECURE($_POST['UpdateRateConfigs'], "d");

 $SaveRateConfigs = UPDATE_TABLE("configs_rates", ["RateConfigCreatedAt", "RateConfigCreatedBy", "RateConfigStatus", "RateConfigCurrentId", "RateConfigType", "RateConfigDate", "RateConfigValue"], "RateConfigId='$RateConfigId'");
 RESPONSE($SaveRateConfigs, "Rate Configurations is Updated Successfully", "Unable to Update Rate configurations");

 //delete
} elseif (isset($_GET['delete_rate_configs'])) {
 $access_url = SECURE($_GET['access_url'], "d");
 $delete_rate_configs = SECURE($_GET['delete_rate_configs'], "d");

 if ($delete_rate_configs == true) {
  $control_id = SECURE($_GET['control_id'], "d");
  $Delete = DELETE_FROM("configs_rates", "RateConfigId='$control_id'");
 } else {
  $Delete = false;
 }

 RESPONSE($Delete, "Rate Configurations Deleted Successfully!", "Unable to delete Rate configurations!");
}
