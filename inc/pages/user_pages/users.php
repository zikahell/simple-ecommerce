<?php 
require_once '../../../core/config.php';
require_once ROOT_PATH.'inc/pages/header.php';
require_once ROOT_PATH.'inc/pages/nav.php';
require_once ROOT_PATH.'data/db.php';
require_once ROOT_PATH.'core/functions.php';
$db = new Database();
?>
  <h2 class ="border p-2 my-2 text-center">Users Page</h2>
  <?php successMessage() ?>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">name</th>
          <th scope="col">email</th>
          <th scope="col">edit</th>
          <th scope="col">delete</th>
        </tr>
      </thead>
      <tbody>
        <?php  foreach($db->read("users") as $key): ?>
        <tr>
          <td><?php echo $key['id'];?></td>
          <td><?php echo $key['name'];?></td>
          <td><?php echo $key['email'];?></td>
          <td>
              <a class="btn btn-info" href="<?php echo URL."inc/pages/user_pages/edit.php?id=".$key['id'] ?>"> <i class="fa fa-edit">Edit</i> </a>
          </td>
          <td>
              <a class="btn btn-danger" href="<?php echo URL."handlers/users/delete.php?id=".$key['id'] ?>"> <i class="fa fa-close">Delete</i> </a>
          </td>
          </tr>
        <?php endforeach;?>
      </tbody>
    </table>





<?php require_once ROOT_PATH."inc/pages/footer.php";