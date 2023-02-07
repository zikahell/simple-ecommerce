<?php
session_start();
$errorrs = [];
require_once "../core/functions.php";
require_once "../data/db.php";
require_once "../core/validations.php";

if(getMethod($_SERVER['REQUEST_METHOD'])){

  foreach ($_POST as $key => $value) {
    $$key = sanitizeInput($value);
  }


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

if(valRequired($password)){
  $errorrs [] = "Password required";
}
elseif (valMin($password,6)) {
  $errorrs [] = "Password must be greater than 3 chars";
}
elseif (valMax($password,20)) {
  $errorrs [] = "password must be smaller than 20 chars";
}
if(valType($type)){
  $errorrs [] = "Enter a valid type";
}
if(!empty($errorrs)){
  $_SESSION['errorrs'] = $errorrs;
  redirect("../inc/pages/user_pages/register.php");
  die;
}
else {
  $db = new Database();
  $new_pass = sha1($password);
  $sql = "INSERT INTO users (`name`,`email`,`password`,`type`) 
  VALUES ('$name','$email','$new_pass','$type')";
  $db->insert($sql);
  $_SESSION['auth']= [$name,$email,$type];
  redirect("../index.php");
  die;
}

}
else 
echo "Not Supported Method";