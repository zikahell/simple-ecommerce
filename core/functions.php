<?php 

function getMethod($method){
  if($_SERVER['REQUEST_METHOD']==$method){
    return true;
  }
  
  return false;
}
function getPostInput($input){

  if(isset($_POST[$input])){
    return true;
  }
  return false;
}

function sanitizeInput($input){
  return trim(htmlspecialchars(htmlentities($input)));
}

function redirect($path){
  header("location:$path");
}
function errMessage(){
   if(isset($_SESSION['errorrs'])):
      foreach ($_SESSION['errorrs'] as $errors) :?>
      <div class="alert alert-danger">
        <?php echo $errors;?>
      </div>
      <?php endforeach;?>
      <?php unset($_SESSION['errorrs']);?>
      <?php endif;
}
function successMessage(){
   if(isset($_SESSION['success'])):
      foreach ($_SESSION['success'] as $succes) :?>
      <div class="alert alert-success">
        <?php echo $succes;?>
      </div>
      <?php endforeach;?>
      <?php unset($_SESSION['success']);?>
      <?php endif;
}
function typeMeaning(){
  if($_SESSION['auth'][2]==0){
  return "admin";
  }
  else
  return "user";

}
