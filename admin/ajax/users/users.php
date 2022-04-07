<?php

require_once "../../init.php";

$option = $_GET['option'];
$msg['error'] = "";
$msg['success'] = "";

if($option == "delete")
{
    if(isset($_POST['id']))
    {
      $id = $_POST['id'];
      if($user->delete($id)){
        $msg['success'] = "Successfuly delete user";
      }
      else {
        $msg['error'] = "Error while delete user!";
      }
    }
    echo JSON_encode($msg, 256);
}



if($option == "add")
{
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    $data = [
      'first_name' => trim($_POST['first_name']),
      'last_name' => trim($_POST['last_name']),
      'email' => trim($_POST['email']),
      'password' => trim($_POST['password']),
      'status' => 'User',
    ];

    if($data['first_name'] == ""){
      $msg['error'] = "Field name is required";
    }
    elseif($data['last_name'] == ""){
      $msg['error'] = "Field last name is required";
    }
    elseif($data['email'] == ""){
      $msg['error'] = "Field email is required";
    }
    elseif($data['password'] == ""){
      $msg['error'] = "Field password is required";
    }
    elseif($user->findUserByEmail($data['email'])){
      $msg['error'] = "User already exists";
    }
    elseif(strlen($data['password']) < 6){
      $msg['error'] = "Password need to be at least 6 characters";
    }
    elseif(!validStr($data['first_name']) || !validStr($data['last_name'])){
      $msg['error'] = "Data contains illegal characters";
    }
    else{
      if(empty($msg['error'])){
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        if($user->add($data)){
          $msg['success'] = "Successfuly added user";
        }
      }
      else $msg['error'] = "Error";
    }


  echo JSON_encode($msg, 256);
}


if($option == "edit")
{
  $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
  $data = [
    'id' => $_POST['id_edit'],
    'first_name' => trim($_POST['first_name_edit']),
    'last_name' => trim($_POST['last_name_edit']),
    'email' => trim($_POST['email_edit']),
    'password' => trim($_POST['password_edit']),
  ];

  if($data['first_name'] == ""){
    $msg['error'] = "Field name is required";
  }
  elseif($data['last_name'] == ""){
    $msg['error'] = "Field last name is required";
  }
  elseif($data['email'] == ""){
    $msg['error'] = "Field last email is required";
  }
  elseif($data['password'] == ""){
    $msg['error'] = "Field last password is required";
  }
  elseif(strlen($data['password']) < 6){
    $msg['error'] = "Password need to be at least 6 characters";
  }
  elseif(!validStr($data['first_name']) || !validStr($data['last_name'])){
    $msg['error'] = "Data contains illegal characters";
  }
  else{
    if(empty($msg['error'])){
      $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
      if($user->edit($data)){
        $msg['success'] = "Successfuly changed user";
      }
    }
    else $msg['error'] = "ERROR!";
  }
  echo JSON_encode($msg, 256);
}

 ?>
