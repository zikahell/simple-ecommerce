<?php require_once '../../../core/config.php'; ?>
<?php require_once ROOT_PATH.'inc/pages/header.php'; ?>
<?php require_once ROOT_PATH.'core/functions.php'; ?>
<?php require_once ROOT_PATH.'inc/pages/nav.php'; ?>

    

<h1>Add Category</h1>
    <div class="container">
        <div class="row">
            <div class="col-8 mx-auto">
              <?php successMessage()?>
              <?php errMessage()?>
                <form action="<?php echo URL."handlers/categories/store.php" ?>" method="POST">
                    <div class="mb-3">
                        <label for="">Category Name</label>
                        <input type="text" name="name" class="form-control" >
                    </div>
                    <div class="mb-3">
                        <input type="submit" class="form-control bg-success" >
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php require_once ROOT_PATH.'inc/pages/footer.php'; ?>

