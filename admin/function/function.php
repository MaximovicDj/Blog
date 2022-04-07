<?php

function redirect($location){
  header("location:{$location}");
}

function validStr($str){
  $inValid = ["!", "#", "$", "%", "^", "&", "*", "3", "4", "_", "+", "=", "-"];
  foreach($inValid as $inValid){
    if(strpos($str, $inValid) !==false) return false;
  }
  return true;
}


 ?>
