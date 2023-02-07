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
if(!empty($errorrs)){
  $_SESSION['errorrs'] = $errorrs;
  redirect("../../inc/pages/categories/create.php");
  die;
}
else {


    // store 
    $sql = "INSERT INTO categories (`name`) VALUES('$name') ";
    $db = new Database();
    $db->insert($sql);
    $_SESSION['success'] = ["Category added successfully"];
    redirect("../../inc/pages/categories/create.php");
}
}

