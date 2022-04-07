<?php

require_once "../../init.php";

$option = $_GET['option'];// GET param for Chosing action
$msg['error'] = ""; // variables for returning JSON
$msg['success'] = ""; // variables for returning JSON


//add Post Action
if($option == "add")
{

    $data = [
      'title' => trim($_POST['title']),
      'text' => trim($_POST['text']),
      'user_id' => $_SESSION['user_id'],
      'category_id' => trim($_POST['category_id']),
      'mainImage' => $_FILES['mainImage']['name']
    ];

    if($data['title'] == ""){
      $msg['error'] = "Field title is required";
    }
    elseif($data['text'] == ""){
      $msg['error'] = "Field text is required";
    }
    elseif($data['category_id'] == "0"){
      $msg['error'] = "You need to choose category!";
    }
    elseif(empty($_FILES['mainImage'])){
      $msg['error'] = "You need to choose main image";
    }
    elseif(!$image->checkOneImg($_FILES['mainImage']['name'])){ // Checking if image has invalid ext or is really image
      $msg['error'] = "Invalid main image";
    }
    elseif(!$image->checkOneIfImage($_FILES['mainImage']['tmp_name'])){ // Checking if image has invalid ext or is really image
      $msg['error'] = "This is not an image!!";
    }
    elseif($_FILES['images']['name'][0] == ""){
      $msg['error'] = "You need to choose more images!";
    }
    elseif(!$image->checkExt($_FILES['images'])){ // Checking if image has invalid ext or is really image
      $msg['error'] = "Invalid images";
    }
    elseif(!$image->checkImg($_FILES['images'])){ // Checking if image has invalid ext or is really image
      $msg['error'] = "This is not image!";
    }

    if($msg['error'] == ""){
      $data['mainImage'] = microtime(true).".".pathinfo($_FILES['mainImage']['name'], PATHINFO_EXTENSION); // assigning new name to image
      if($posts->add($data)){
        move_uploaded_file($_FILES['mainImage']['tmp_name'], "../../img/".$data['mainImage']);
        $id = $posts->last_id();
        for($i=0; $i<count($_FILES['images']['name']); $i++){
          $imgName = microtime(true).".".pathinfo($_FILES['images']['name'][$i], PATHINFO_EXTENSION);
          $tmp_name = $_FILES['images']['tmp_name'][$i];
          if(move_uploaded_file($tmp_name, "../../img/".$imgName)){
            $image->insertImages($id, $imgName);
          }
        }
        $msg['error'] = "Successfuly added Post";
      }
    }
    echo JSON_encode($msg, 256);
}

//DELETE post Action, unlink images to the server folder
if($option == "delete")
{
    if(isset($_POST['id']))
    {
      $id = $_POST['id'];
      unlink("../../img/".$posts->showId($id)->image);
      $comment->delete($id);
      $image->unlinkImages($id); // unlink method
      $image->deleteImages($id);
      if($posts->delete($id)){
        $msg['success'] = "Successfuly deleted post";
      }
      else $msg['error'] = "Error while deleing";
    }
    echo JSON_encode($msg, 256);
}


//DELETING MULTIPLE IAMGE ON DBL CLICK ACTION PHP
if($option == "deleteMultiple")
{
  $id = $_POST['id'];
  $name = $_POST['name'];

  unlink("../../img/{$name}");
  if($image->deleteOneImg($id)){
    $msg['success'] = "Successfuly delete image!";
  }
  else {
    $msg['error'] = "Error deleing multiple images";
  }
  echo JSON_encode($msg, 256);
}
//END DELETING MULTIPLE IAMGE ON DBL CLICK ACTION PHPP


//Edit Post Action
if($option == "edit")
{
  $data = [
    'id' => $_POST['post_id'],
    'title' => $_POST['title'],
    'text' => $_POST['text'],
    'user_id' => $_SESSION['user_id'],
    'category_id' => $_POST['category_id'],
    'image' => $_POST['oldImg']
  ];

  empty($data['title']) ? $msg['error'] = "Filed title is required" : $msg['error'] = "";
  empty($data['text']) ? $msg['error'] = "Filed text is requred" : $msg['error'] = "";

  if($msg['error'] == "")
  {

    if(isset($_FILES['mainImage']['name']) && $_FILES['mainImage']['name'] != "")
    {
      $data['image'] = $_FILES['mainImage']['name'];
      if(!$image->checkOneImg($data['image'])){
        $msg['error'] = "Invalid image";
      }
      else{
        $data['image'] = microtime(true).$data['image'];
        $posts->edit($data);
        move_uploaded_file($_FILES['mainImage']['tmp_name'], "../../img/{$data['image']}");
        unlink("../../img/{$_POST['oldImg']}");
        $msg['success'] = "Successfuly changed post";
      }

    }
    else
    {
      $data['image'] = $_POST['oldImg'];
      $posts->edit($data);
      $msg['success'] = "Successfuly changed post";
    }

  }

  if($_FILES['images']['name'][0])
  {
    for($i=0; $i<count($_FILES['images']['name']); $i++)
    {
        $imgName = microtime(true).".".pathinfo($_FILES['images']['name'][$i], PATHINFO_EXTENSION);
        $image->insertImages($_POST['post_id'], $imgName);
        move_uploaded_file($_FILES['images']['tmp_name'][$i], "../../img/{$imgName}");
    }
  }
  echo JSON_encode($msg, 256);
}

 ?>
