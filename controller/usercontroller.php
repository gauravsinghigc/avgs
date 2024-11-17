<?php
//add controller helper files
require 'helper.php';

//add aditional requirements
require '../require/admin/sessionvariables.php';

//update profile image 
if (isset($_POST['updateprofileimage'])) {
 $UserId  = LOGIN_UserId;
 $current_img = SECURE($_POST['current_img'], "d");
 $UserProfileImage = UPLOAD_FILES("../storage/users/img/profile", "$current_img", LOGIN_UserName . "_UID_" . $UserId, "Profile", "UserProfileImage");
 $Update = UPDATE("UPDATE users SET UserProfileImage='$UserProfileImage' where UserId='$UserId'");
 RESPONSE($Update, "Profile Image Updated!", "Unable to update profile image!");

 //create new user 
} elseif (isset($_POST['CreateUsers'])) {
 $UserName = $_POST['UserName'];
 $UserEmailId = $_POST['UserEmailId'];
 $UserPhone = $_POST['UserPhone'];
 $UserPassword = rand(99999, 999999);
 $UserRoles = $_POST['UserRoles'];
 $UserStatus = $_POST['UserStatus'];
 $UserCreatedAt = date("Y-m-d H:i:s");
 $UserUpdatedAt = date("Y-m-d H:i:s");

 $Save = SAVE("users", ["UserName", "UserEmailId", "UserPhone", "UserPassword", "UserRoles", "UserStatus", "UserCreatedAt", "UserUpdatedAt"]);
 RESPONSE($Save, "New User created successfully!", "Unable to create new user at the moment!");

 //update users
} elseif (isset($_POST['UpdateUsers'])) {
 $userid = $_SESSION['userid'];
 $UserName = $_POST['UserName'];
 $UserEmailId = $_POST['UserEmailId'];
 $UserPhone = $_POST['UserPhone'];
 $UserPassword = rand(99999, 999999);
 $UserRoles = $_POST['UserRoles'];
 $UserStatus = $_POST['UserStatus'];
 $UserUpdatedAt = date("Y-m-d H:i:s");
 $UserPassword = $_POST['UserPassword'];

 $update = UPDATE_TABLE("users", ["UserName", "UserPassword", "UserEmailId", "UserPhone", "UserPassword", "UserRoles", "UserStatus", "UserUpdatedAt"], "UserId='$userid'");
 RESPONSE($update, "User Details are updated successfully!", "Unable to update user at the moment!");
}
