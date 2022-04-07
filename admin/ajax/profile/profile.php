<?php

require_once "../../init.php";

$option = $_GET['option'];
$msg['error'] = "";
$msg['success'] = "";

if($option == "edit")
{

  // $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
  $data = [
    'id' => $_POST['id'],
    'first_name' => trim($_POST['first_name']),
    'last_name' => trim($_POST['last_name']),
    'email' => trim($_POST['email']),
    'password' => trim($_POST['password']),
  ];

  if($data['first_name'] == ""){
    $msg['error'] = "Filed name is required";
  }
  elseif($data['last_name'] == ""){
    $msg['error'] = "Filed last name is required";
  }
  elseif($data['email'] == ""){
    $msg['error'] = "Filed email is required";
  }
  elseif($data['password'] == ""){
    $msg['error'] = "Filed password is required";
  }
  else{
    if($msg['error'] == ""){
      if($user->edit($data)){
        $msg['success'] = "Successfuly changed prpfile";
      }
      else $msg['error'] = "Error chacnged profile";
    }
    }
  echo JSON_encode($msg, 256);
}

 ?>
