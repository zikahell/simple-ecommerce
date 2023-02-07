<?php
session_start();
$errorrs = [];
require_once "../../core/config.php";
require_once ROOT_PATH."core/functions.php";
require_once ROOT_PATH."data/db.php";
require_once ROOT_PATH."core/validations.php";

if(getMethod($_SERVER['REQUEST_METHOD'])){

  foreach ($_POST as $key => $value) {
    $$key = sanitizeInput($value);
  }
  $idd = $_GET['id'];

if(valRequired($name)){
  $errorrs [] = "Name required";
}
elseif (valMin($name,3)) {
  $errorrs [] = "Name must be greater than 3 chars";
}
elseif (valMax($name,20)) {
  $errorrs [] = "Name must be smaller than 20 chars";
}

if(valRequired($email)){
  $errorrs [] = "Email required";
}
elseif(valEmail($email)){
  $errorrs [] = "Enter a valid email";
}

if(!empty($errorrs)){
  $_SESSION['errorrs'] = $errorrs;
  redirect("../../inc/pages/user_pages/edit.php?id=".$idd);
  die;
}
else {
  $db = new Database();
  if(!empty($password)){
    $newpassword = sha1($password);
    $sql = "UPDATE users SET `password` = '$newpassword' WHERE `id`='$idd'";
    $db->update($sql);
  }
  $sql = "UPDATE users SET `name`='$name',`email` = '$email' WHERE `id`='$idd'";
  $db->update($sql);
  $_SESSION['success'] = ["Updated Succefully"];
  redirect("../../inc/pages/user_pages/edit.php?id=".$idd);

}

}
else 
echo "Not Supported Method";