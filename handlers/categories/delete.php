<?php
session_start();
require_once "../../core/config.php";
require_once ROOT_PATH."core/functions.php";
require_once ROOT_PATH."data/db.php";
require_once ROOT_PATH."core/validations.php";?>
<?php $db = new Database();
if(isset($_GET['id']) && is_numeric($_GET['id'])) :?>
<?php if($row = $db->find("categories",$_GET['id'])): ?>
<?php
$db->delete("categories",$_GET['id']);
$_SESSION['success'] = ["Deleted Successfully"];
redirect("../../inc/pages/categories/index.php");
?>




<?php endif;?>
<?php endif;?>

