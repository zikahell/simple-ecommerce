<?php 
require_once '../../../core/config.php';
require_once ROOT_PATH.'core/functions.php';
require_once ROOT_PATH.'inc/pages/header.php';
require_once ROOT_PATH.'inc/pages/nav.php';
if(!isset($_SESSION['auth'])){
  redirect(URL."inc/pages/user_pages/login.php");
  die;
}
?>
<h2 class ="border p-2 my-2 text-left">Profile Page</h2>
<div class="container">
  <div class="row">
    <div class="col-12">
      <h3 class = "border p-3 my-2 text-center">Name: <?php echo $_SESSION['auth'][0]; ?></h3>
      <h3 class = "border p-3 my-2 text-center">Email: <?php echo $_SESSION['auth'][1]; ?></h3>
      <h3 class = "border p-3 my-2 text-center">Type: <?php echo typeMeaning(); ?></h3>
    </div>
  </div>
</div>
<?php require_once ROOT_PATH."inc/pages/footer.php";?>