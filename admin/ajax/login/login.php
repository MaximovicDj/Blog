<?php

require_once "../../init.php";

$option = $_GET['option'];// GET param for chosing action
$msg['error'] = ""; // variables for returning JSON
$msg['success'] = ""; // variables for returning JSON


//register Action
if($option == "register")
{
  $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

  $data = [
    'first_name' => trim($_POST['first_name']),
    'last_name' => trim($_POST['last_name']),
    'email' => trim($_POST['email']),
    'password' => trim($_POST['password']),
    'confirm_password' => trim($_POST['confirm_password'])
  ];

  if(empty($data['first_name']) && empty($data['last_name']) && empty($data['email']) && empty($data['password']) && empty($data['confirm_password']))
  {
    $msg['error'] = "Data are required!";
  }
  elseif($user->findUserByEmail($data['email'])){ // Checking if user exists
    $msg['error'] = "User already exitst!";
  }
  elseif(strlen($data['password']) < 6){
    $msg['error'] = "Password need to be at least 6 characters!";
  }
  elseif(!validStr($data['first_name']) || !validStr($data['last_name']) || !validStr($data['email'])){ // Checking if data contains invalid characters
    $msg['error'] = "Data are cointans illegal characters!";
  }
  elseif($data['password'] != $data['confirm_password']){
    $msg['error'] = "Passwords don't match!";
  }

  if(empty($msg['error'])){
    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT); // Hashing password
    if($user->register($data)){
      $msg['success'] = "login.php";
      $_SESSION['message'] = "Successfuly registered, you can logiu now!"; // session message for anotger message page
    }
  }

  echo JSON_encode($msg, 256);
}


//login function
if($option == "login")
{
  $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
  $data = [
    'email' => trim($_POST['email']),
    'password' => trim($_POST['password'])
  ];

  if($data['email'] == "" && $data['password'] == ""){
    $msg['error'] = "All data are required!";
  }
  elseif(!$user->findUserByEmail($data['email'])){ // checking if user exists
    $msg['error'] = "User doesn't exists!";
  }
  else
  {
    if($msg['error'] == ""){
      $loggedUser = $user->login($data['email'], $data['password']);
      if($loggedUser){
        $session->createSession($loggedUser);
        if($_SESSION['status'] == "Admin")
          $msg['success'] = "index.php";
        else
          $msg['success'] = "posts.php";
      }
      else {
        $msg['error'] = "Wrong password";
      }
    }
  }

  echo JSON_encode($msg, 256);
}


//new Password Action
if($option == "newPass")
{
  $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
  $data = [
    'email' => trim($_POST['email']),
    'password' => trim($_POST['password']),
    'confirm_password' => trim($_POST['confirm_password']),
  ];

  if($data['email'] == ""){
    $msg['error'] = "Field email is required";
  }
  elseif(!$user->findUserByEmail($data['email'])){
    $msg['error'] = "User doesn't exitst!";
  }
  elseif($data['password'] == ""){
    $msg['error'] = "Field password doesn't exists";
  }
  elseif(strlen($data['password']) < 6){
    $msg['error'] = "Password need to be at least 6 characters";
  }
  elseif($data['confirm_password'] == ""){
    $msg['error'] = "You need to retype password!";
  }
  elseif($data['password'] != $data['confirm_password']){
    $msg['error'] = "Password don't match!";
  }
  else {
    if($msg['error'] == ""){
      $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
      if($user->newPassword($data['email'], $data['password'])){
        $msg['success'] = "login.php";
        $_SESSION['message'] = "Successfuly changed password";
      }
    }
  }
  echo JSON_encode($msg, 256);
}

 ?>
