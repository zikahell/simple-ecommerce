<nav class="navbar navbar-expand-lg bg-secondary p-3">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">PHP PROJECT</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?php echo URL?>index.php">Home</a>
        </li>
        <?php if(isset($_SESSION['auth'])):?>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo URL?>inc/pages/user_pages/profile.php">Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo URL?>inc/pages/categories/index.php">Categories</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo URL?>inc/pages/products/index.php">Products</a>
        </li>
        
        <?php if($_SESSION['auth'][2]==0):?>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo URL?>inc/pages/user_pages/users.php">All Users</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo URL?>inc/pages/categories/create.php">Add Categories</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo URL?>inc/pages/products/create.php">Add Products</a>
        </li>
        <?php endif;?>
        <?php endif;?>
        <?php if(!isset($_SESSION['auth'])):?>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo URL?>inc/pages/user_pages/login.php">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo URL?>inc/pages/user_pages/register.php">Register</a>
        </li>
        <?php endif;?>
        
        
        
        
      </ul>
      <?php if(isset($_SESSION['auth'])):?>
      <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
      <li class="nav-item">
          <a class="nav-link" href="<?php echo URL?>inc/pages/user_pages/logout.php">Logout</a>
        </li>
      </ul>
      <?php endif;?>
      
    </div>
  </div>
</nav>