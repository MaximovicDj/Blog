<?php

require_once "../../init.php";

$option = $_GET['option']; // GET param for action
$msg['error'] = ""; // variables for returning JSON
$msg['success'] = ""; // variables for returning JSON

//SENDING message to admin, createing contact
if($option == "addContact")
{
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    $data = [
      'user_name' => trim($_POST['user_name']),
      'email' => trim($_POST['email']),
      'text' => trim($_POST['text']),
    ];

    empty($data['user_name']) ? $msg['error'] = "Field name is required" : $msg['error'] = "";
    empty($data['email']) ? $msg['error'] = "Field email is required" : $msg['error'] = "";
    empty($data['text']) ? $msg['error'] = "Field text is required" : $msg['error'] = "";

    if($contact->create($data)){
      $msg['success'] = "Successfully sent a message to the Administrator of the site, you will be answered as soon as possible, thank you for your patience!";
    }
    else {
      $msg['error'] = "Error while sending message";
    }
    echo JSON_encode($msg, 256);
}

//Markking comment as read
if($option == "markAsRead")
{
  $id = $_POST['id'];
  if($contact->makeSeen($id)){
    $msg['success'] = "Success";
  }
  else{
    $msg['error'] = "Error!";
  }
  echo JSON_encode($msg, 256);
}

 ?>
