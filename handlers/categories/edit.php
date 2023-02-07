<?php 
require_once '../../core/config.php';
require_once ROOT_PATH.'data/db.php';
require_once ROOT_PATH.'core/functions.php';
require_once ROOT_PATH.'core/validations.php';
session_start();


if($_SERVER['REQUEST_METHOD'] == "POST"){
$errorrs = [];
  foreach ($_POST as $key => $value) {
    $$key = sanitizeInput($value);
  }
  $idd = $_GET['id'];

if(valRequired($name)){
  $errorrs [] = "Name required";
}
if(!empty($errorrs)){
  $_SESSION['errorrs'] = $errorrs;
  redirect("../../inc/pages/categories/edit.php?id=".$idd);
  die;
}
else {
    // store 
    $db = new Database();
    $sql = "UPDATE categories SET `name`='$name' WHERE `id`='$idd' ";
    $db->update($sql);
    $_SESSION['success'] = ["Category updated successfully"];
    redirect("../../inc/pages/categories/edit.php?id=".$idd);
  }

}