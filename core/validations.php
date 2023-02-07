<?php
function valRequired($input){
  if(empty($input)){
    return true;
  }
  return false;
}

function valMin($input,$length){
  if(strlen($input)<$length){
    return true;
  }
  return false;
}
function valMax($input,$length){
  if(strlen($input)>$length){
    return true;
  }
  return false;
}

function valEmail($input){
  if(!filter_var($input,FILTER_VALIDATE_EMAIL)){
    return true;
  }
  return false;
}
function valType($input){
  if($input ===0 || $input ===1){
    return true;
  }
  return false;
}