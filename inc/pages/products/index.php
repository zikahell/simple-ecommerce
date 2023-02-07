<?php require_once '../../../core/config.php'; ?>
<?php require_once ROOT_PATH.'inc/pages/header.php'; ?>
<?php require_once ROOT_PATH.'inc/pages/nav.php';?>
<?php require_once ROOT_PATH.'data/db.php';
 require_once ROOT_PATH.'core/functions.php';
$db = new Database();
$row = $db->read("products");

?>

    <h1>Products</h1>

    <div class="container">
        <div class="row">
            <div class="col-12">
              <?php successMessage() ?>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>name</th>
                            <th>price</th>
                            <th>Product Category</th>
                            <th>Product Description</th>
                            <th>edit</th>
                            <th>delete</th>
                        </tr>
                    </thead>

                    <tbody>

                    <?php foreach ($row as $key) :?>
                        <tr>
                            <td><?php echo $key['id']; ?></td>
                            <td><?php echo $key['name']; ?></td>
                            <td><?php echo $key['price']; ?></td>
                            <td><?php echo $key['category_id']; ?></td>
                            <td><?php echo $key['description']; ?></td>
                            
                            <td>
                              <?php if($_SESSION['auth'][2]==0):?>
                                <a href="<?php echo URL."inc/pages/products/edit.php?id=".$key['id']; ?>" class="btn btn-info">Edit</a>
                            </td>
                            <td>
                                <a href="<?php echo URL."handlers/products/delete.php?id=".$key['id']; ?>" class="btn btn-danger">Delete</a>
                            </td>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<?php require_once ROOT_PATH.'inc/pages/footer.php'; ?>