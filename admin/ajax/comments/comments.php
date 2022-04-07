<?php

require_once "../../init.php";

$option = $_GET['option']; // GET param for action
$msg['error'] = ""; // variables for returning JSON
$msg['success'] = ""; // variables for returning JSON

//adding new Comment
if($option == "add")
{
  $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
  $data = [
    'name' => trim($_POST['name']),
    'email' => trim($_POST['email']),
    'comment' => trim($_POST['comment']),
    'post_id' => trim($_POST['id'])
  ];

  if($data['name'] == ""){
    $msg['error'] = "Field name is required";
  }
  elseif($data['comment'] == ""){
    $msg['error'] = "Field comment is required";
  }
  else {
    if($comment->add($data)){
      $msg['success'] = "Successfuly added comment";
    }
    else $msg['error'] = "Error while adding comment";
  }
  echo JSON_encode($msg, 256);
}


//delete comment
if($option == "delete")
{
  $id = $_POST['id'];
  if($comment->deleteOneComment($id)){
    $msg['success'] = "Successfuly deleted comment";
  }
  else {
    $msg['error'] = "Error while deleteing comment";
  }

  echo JSON_encode($msg, 256);
}


 ?>
