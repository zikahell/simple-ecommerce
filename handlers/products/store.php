<?php 
session_start();
$errorrs =[];
require_once '../../core/config.php';
require_once ROOT_PATH.'data/db.php';
require_once ROOT_PATH.'core/functions.php';
require_once ROOT_PATH.'core/validations.php';


if($_SERVER['REQUEST_METHOD'] == "POST"){

  foreach ($_POST as $key => $value) {
    $$key = sanitizeInput($value);
  }


if(valRequired($name)){
  $errorrs [] = "Name required";
}
if(valRequired($price)){
  $errorrs [] = "Price required";
}
if(!empty($errorrs)){
  $_SESSION['errorrs'] = $errorrs;
  redirect("../../inc/pages/products/create.php");
  die;
}
else {


     // store 
    $sql = "INSERT INTO products (`name`,`price`,`category_id`,`description`) 
    VALUES('$name','$price','$category_id','$description') ";
    $db = new Database();
    $db->insert($sql);
    $_SESSION['success'] = ["Product added successfully"];
    redirect("../../inc/pages/products/create.php");
 }
}

