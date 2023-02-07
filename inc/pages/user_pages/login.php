<?php 
require_once '../../../core/config.php';
require_once ROOT_PATH.'core/functions.php';
require_once ROOT_PATH.'inc/pages/header.php';
require_once ROOT_PATH.'inc/pages/nav.php';
if(isset($_SESSION['auth'])){
  header("location:profile.php");
  die;
}?>
<div class="container">
    <div class="row">
        <div class="col-8 mx-auto">
        <h2 class="border p-2 my-2 text-center">Login Page</h2>
        <?php errMessage()?>
        <form action="<?php echo URL ?>handlers/handlelogin.php" method="post" class="p-3 border" >
            <div class="mb-3">
                <label for="email">Email</label>
                <input type="email" name="email"placeholder="Enter your Email" id="email" class="form-control">
            </div>

            <div class="mb-3">
                <label for="password">Password</label>
                <input type="password" name="password" placeholder="Enter your Password"id="password" class="form-control">
            </div>

            <div class="mb-3">
                <input type="submit" value="Login"  class="form-control bg-secondary">
            </div>
        </form>
        </div>
    </div>
  </div>
<?php require_once ROOT_PATH.'inc/pages/footer.php';?>
