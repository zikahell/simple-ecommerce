<?php require_once '../../../core/config.php'; ?>
<?php require_once ROOT_PATH.'inc/pages/header.php'; ?>
<?php require_once ROOT_PATH.'inc/pages/nav.php'; ?>
<?php require_once ROOT_PATH.'data/db.php'; ?>
<?php require_once ROOT_PATH.'core/functions.php'; ?>
<?php
    $db = new Database();
    $idd = $_GET['id'];
    $row = $db->find("products",$idd);
    ?>
    <h1>Edit Product</h1>

    <div class="container">
        <div class="row">
            <div class="col-8 mx-auto">
              <?php errMessage()?>
              <?php successMessage()?>
                <form action="<?php echo URL."handlers/products/edit.php?id=".$idd; ?>" method="POST">
                    <div class="mb-3">
                        <label for="">Product Name</label>
                        <input type="text" value="<?php echo  $row[0]['name']; ?>" name="name" class="form-control" >
                    </div>
                    <div class="mb-3">
                        <label for="">Product Price</label>
                        <input type="number" value="<?php echo  $row[0]['price']; ?>" name="price" class="form-control" >
                    </div>
                    
                    <div class="mb-3">
                        <input type="submit" class="form-control bg-success" >
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php require_once ROOT_PATH.'inc/pages/footer.php'; ?>

