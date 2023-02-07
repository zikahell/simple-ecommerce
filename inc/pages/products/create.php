<?php require_once '../../../core/config.php'; ?>
<?php require_once ROOT_PATH.'inc/pages/header.php'; ?>
<?php require_once ROOT_PATH.'core/functions.php'; ?>
<?php require_once ROOT_PATH.'inc/pages/nav.php';
require_once ROOT_PATH.'data/db.php';
$db = new Database();
$row = $db->read("categories");
 ?>

    

<h1>Add Product</h1>
    <div class="container">
        <div class="row">
            <div class="col-8 mx-auto">
              <?php successMessage()?>
              <?php errMessage()?>
                <form action="<?php echo URL."handlers/products/store.php" ?>" method="POST">
                    <div class="mb-3">
                        <label for="">Product Name</label>
                        <input type="text" name="name" class="form-control" >
                    </div>
                    <div class="mb-3">
                        <label for="">Product Price</label>
                        <input type="number" name="price" class="form-control" >
                    </div>
                    <div class="mb-3">
                        <label for="">Product Category</label>
                        <select name="category_id" id ="category_id" class="form-control">
                        <?php foreach ($row as $key):?>
                        <option value="<?php echo $key['id']; ?>"><?php echo $key['name']; ?></option>
                        <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="">Product description</label>
                        <textarea name="description" class="form-control" rows="5"></textarea>
                    </div>
                    <div class="mb-3">
                        <input type="submit" class="form-control bg-success" >
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php require_once ROOT_PATH.'inc/pages/footer.php'; ?>

