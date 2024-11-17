<?php
//add controller helper files
require 'helper.php';

//add aditional requirements
require '../require/admin/sessionvariables.php';

//start activity here
//login request
if (isset($_POST['LoginRequest'])) {
 $UserPassword = $_POST['UserPassword'];
 $UserEmailId = $_POST['UserEmailId'];
 $AuthToken = VALIDATOR_REQ;
 //TOKEN Checking
 //valid token
 if ($AuthToken == SECURE($_POST['AuthToken'], "d")) {

  $CheckUsername = CHECK("SELECT * FROM users where UserEmailId='$UserEmailId' and UserPassword='$UserPassword'");

  if ($CheckUsername == true) {

   //get user details
   $FetchUsers = FETCH_DATA("SELECT * FROM users where UserEmailId='$UserEmailId' and UserStatus='1'");
   $UserId = $FetchUsers['UserId'];
   $UserName = $FetchUsers['UserName'];
   $_SESSION['LOGIN_USER_ID'] = $UserId;

   //generate sessiona and cookiable data for user in the system after successfully login...
   setcookie("LOGIN_USER_ID", $UserId, time() + 60 * 60 * 365);
   APP_LOGS("CP_IN_SUCCESS", "New Login Received @ User : " . $UserEmailId . ", Pass : " . SECURE($UserPassword, "d",), "LOGIN");
   LOCATION("success", "Welcome $UserName, Login Successful!", DOMAIN . "/admin/dashboard");
  } else {
   APP_LOGS("CP_IN_BLOCK", "New Login Received @ User : " . $UserEmailId . ", Pass : " . SECURE($UserPassword, "d"), "LOGIN");
   LOCATION("warning", "Username & Password do not matched to any user account!", "$access_url");
  }

  //invalid token
 } else {
  APP_LOGS("CP_IN_FAILED", "New Login Received @ User : " . $UserEmailId . ", Pass : " . SECURE($UserPassword, "d"), "LOGIN");
  LOCATION("warning", "Invalid Access Token", "$access_url");
 }

 //update profile details
} elseif (isset($_POST['UpdateProfile'])) {
 $UserName = $_POST['UserName'];
 $UserPhone = $_POST['UserPhone'];
 $UserEmailId = $_POST['UserEmailId'];
 $UserUpdatedAt = date("Y-m-d H:i:s");
 APP_LOGS("PROFILE_UPDATED", "User Profile Updated @ $UserName, $UserPhone, $UserEmailId having UID:" . LOGIN_UserId . "", "USER_UPDATE");
 $Update = UPDATE("UPDATE users SET UserUpdatedAt='$UserUpdatedAt', UserName='$UserName', UserPhone='$UserPhone', UserEmailId='$UserEmailId' where UserId='" . LOGIN_UserId . "' ");
 RESPONSE($Update, "Profile Updated!", "Unable to Update Profile!");

 //update password 
} elseif (isset($_POST['UpdatePassword'])) {
 $UserPassword = $_POST['UserPassword'];
 $UserPassword_2 = $_POST['UserPassword_2'];
 if ($UserPassword != $UserPassword_2) {
  LOCATION("warning", "Unable to Update password!", "$access_url");
 } else {
  APP_LOGS("PASSWORD_UPDATED", "Password changed for UserID: " . LOGIN_UserId . "", "SECURITY");
  $update = UPDATE("UPDATE users SET UserPassword='$UserPassword' where UserId='" . LOGIN_UserId . "'");
  RESPONSE($update, "Password Updated Successfully!", "Unable to Update Password!");
 }

 //check user account for password reset option
} elseif (isset($_POST['SearchAccountForPasswordReset'])) {
 $UserEmailId = $_POST['UserEmailId'];
 $UserExits = CHECK("SELECT * FROM users where UserEmailId='$UserEmailId'");
 if ($UserExits != null) {
  $CREATED_OTP = rand(111111, 999999);
  $_SESSION['CREATED_OTP'] = $CREATED_OTP;
  $_SESSION['REQUESTED_EMAIL'] = $UserEmailId;
  $Mail = SENDMAILS("OTP FOR PASSWORD RESET", "Verify Your Account!", $UserEmailId, "Please verify your account by entering the OTP below. <br> <span style='font-size:3rem;background-color:white;border-radius:1rem;'>$CREATED_OTP</span>.<br> <br> <span style='font-size:1rem;'>This OTP is valid for only 30 minutes.</span> <br><br> If This is not sent by you, Please ignore this email. <br> <br> Thank You.");
  if ($Mail == true) {
   $access_url = DOMAIN . "/auth/admin/verify/";
   LOCATION("success", "OTP Sent to your Email!", "$access_url");
  } else {
   LOCATION("warning", "Unable to send OTP!", "$access_url");
  }
 } else {
  LOCATION("warning", "No any user is listed with $UserEmailId. Please check entered email id", "$access_url");
 }

 //check account verification request
} else if (isset($_POST['RequestAccountVerifications'])) {
 $SubmittedOTP = $_POST['SubmittedOTP'];
 if ($SubmittedOTP == $_SESSION['CREATED_OTP']) {
  $_SESSION['ACCOUNT_VERIFICATION_REQUEST'] = true;
  $_SESSION['ACCOUNT_VERIFICATION_REQUEST_EMAIL'] = $_SESSION['REQUESTED_EMAIL'];
  $access_url = DOMAIN . "/auth/admin/reset/";
  LOCATION("success", "Account Verification Completed! Please change your password!", "$access_url");
 } else {
  LOCATION("warning", "Invalid OTP!", "$access_url");
 }

 //request for password change with requested otp
} elseif (isset($_POST['RequestForPasswordChange'])) {
 $Password1 = $_POST['Password1'];
 $Password2 = $_POST['Password2'];
 if ($Password1 != $Password2) {
  LOCATION("warning", "Password Mismatch!", "$access_url");
 } else {
  $UserEmailId = $_SESSION['ACCOUNT_VERIFICATION_REQUEST_EMAIL'];
  $UserExits = CHECK("SELECT * FROM users where UserEmailId='$UserEmailId'");
  if ($UserExits != null) {
   $update = UPDATE("UPDATE users SET UserPassword='$Password1' where UserEmailId='$UserEmailId'");
   if ($update == true) {
    SENDMAILS("PASSWORD CHANGED", "Your Password has been changed!", $UserEmailId, "Your Password has been changed successfully. <br> <br> Thank You.");
    $_SESSION['ACCOUNT_VERIFICATION_REQUEST'] = false;
    $_SESSION['ACCOUNT_VERIFICATION_REQUEST_EMAIL'] = null;
    $access_url = DOMAIN . "/auth/admin/login/";
    LOCATION("success", "Password Changed Successfully!", "$access_url");
   } else {
    LOCATION("warning", "Unable to change password!", "$access_url");
   }
  } else {
   LOCATION("warning", "User Not Found at the time of Password Change Request, Please try again...", "$access_url");
  }
 }
}
