<?php session_start();
$errorrs = [];
require_once("../core/config.php");
require_once("../core/functions.php");
require_once("../core/validations.php");
require_once ROOT_PATH."data/db.php";

if(getMethod($_SERVER['REQUEST_METHOD'])){

  foreach ($_POST as $key => $value) {
    $$key = sanitizeInput($value);
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
if(empty($errorrs)){

  $data = array(
    "email" => $email,
    "password" => sha1($password)
  );
  $db = new Database();
  $data_check = $db->read("users");
  if(!empty($data_check)){
      foreach ($data_check as $key) {
        if ($data["email"] == $key["email"] && $data["password"] == $key["password"]) {
          $_SESSION['auth'] = [$key["name"], $key["email"], $key["type"]];
          redirect("../index.php");
          die;
        } else {
          $errorrs[] = "Invalid Email or Password";
          $_SESSION['errorrs'] = $errorrs;
          redirect("../inc/pages/user_pages/login.php");
          die();
        }
      }
  }else {
    $errorrs[] = "Invalid Email or Password";
    $_SESSION['errorrs'] = $errorrs;
    redirect("../inc/pages/user_pages/login.php");
    die();
  }
  

}
else{
  $_SESSION['errorrs'] = $errorrs;
  redirect("../inc/pages/user_pages/login.php");
  die;
}

}
else 
echo "Not Supported Method";
