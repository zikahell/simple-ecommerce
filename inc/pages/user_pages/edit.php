<?php 
require_once '../../../core/config.php';
require_once ROOT_PATH.'inc/pages/header.php';
require_once ROOT_PATH.'inc/pages/nav.php';
require_once ROOT_PATH.'data/db.php';
require_once ROOT_PATH.'core/functions.php';
$db = new Database();
?>
<h2 class ="border p-2 my-2 text-center">Edit User</h2>

<?php if(isset($_GET['id']) && is_numeric($_GET['id'])) :?>
<?php if($row = $db->find("users",$_GET['id'])): ?>
  <div class="container">
    <div class="row">
        <div class="col-8 mx-auto">
        <?php errMessage()  ?>
        <?php successMessage() ?>
        <form action="<?php echo URL."handlers/users/edit.php?id=".$_GET['id'];?>" method="POST" class="p-3 border" >
            <div class="mb-3">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" value="<?php echo $row[0]['name'];?>" class="form-control">
            </div>
            <div class="mb-3">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="<?php echo $row[0]['email']; ?>"class="form-control">
            </div>

            <div class="mb-3">
                <label for="password">Password</label>
                <input type="password" name="password" id="password"value="" class="form-control">
            </div>

            <div class="mb-3">
                <input type="submit" value="Update"  class="form-control bg-success">
            </div>
        </form>
        </div>
    </div>
  </div>













<?php endif; ?>
<?php endif; ?>
<?php require_once ROOT_PATH."inc/pages/footer.php"?>