<?php

require_once "../../init.php";

$msg['error'] = ""; // variables for returning JSON
$msg['success'] = ""; // variables for returning JSON
$option = $_GET['option']; // GET param for action


//DELETING CATEGORY
if($option == "delete")
{
  if(isset($_POST['id']))
  {
    $id = $_POST['id'];
    if($category->delete($id)){
      $msg['success'] = "Successfuly delete category!";
    }
    else {
      $msg['error'] = "Error deleting";
    }
  }
  echo JSON_encode($msg, 256);

}


//Adding NEW CATEGORY
if($option == "add")
{
  $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

  if($_POST['name'] == ""){
    $msg['error'] = "You have to enter category";
  }

  $data = ['name' => trim($_POST['name'])];
  if($category->add($data)){
    $msg['success'] = "Successfuy added category!";
  }
  else {
    $msg['error'] = "Error adding category";
  }

  echo JSON_encode($msg, 256);
}


//UPDATE CATEGORY, edit
if($option == "edit")
{
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    $data = [
      'id' => $_POST['id'],
      'name' => $_POST['name']
    ];

    if(empty($data['name'])){
      $msg['error'] = "You have to enter category";
      return false;
    }
    elseif(!validStr($data['name'])){
      $msg['error'] = "Data is contains illegal characters";
    }

    if($category->edit($data)){
      $msg['success'] = "Successfuly changed category!";
    }
    echo JSON_encode($msg, 256);
}

 ?>
