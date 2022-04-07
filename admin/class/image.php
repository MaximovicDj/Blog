<?php

class Image {

  private $db;

  public function __construct(){
    $this->db = new Database();
  }

  public function insertImages($post_id, $imgName){
    $this->db->query("INSERT INTO images (name, post_id) VALUES (:name, :post_id)");
    $this->db->bind(":name", $imgName);
    $this->db->bind(":post_id", $post_id);

    if($this->db->execute()) return true;
    else return false;
  }

  public function showImages($id){
    $this->db->query("SELECT * FROM images WHERE post_id = :id");
    $this->db->bind(":id", $id);
    $results = $this->db->resultSet();
    return $results;
  }


  public function deleteImages($post_id){
    $this->db->query("DELETE FROM images WHERE post_id = :post_id");
    $this->db->bind(":post_id", $post_id);

    if($this->db->execute()) return true;
    else return false;

  }

  public function deleteOneImg($id){
    $this->db->query("DELETE FROM images WHERE id = :id");
    $this->db->bind(":id", $id);

    if($this->db->execute()) return true;
    else return false;
  }

  public function unlinkImages($post_id){
    $this->db->query("SELECT * FROM images WHERE post_id = :post_id");
    $this->db->bind(":post_id", $post_id);
    $results = $this->db->resultSet();
    foreach($results as $img){
      unlink("../../img/".$img->name);
    }
  }


  public function checkOneImg($file){
    $valid = ['jpg', 'jpeg', 'png', 'webp', 'bmp', 'jfif'];
    if(in_array(pathinfo($_FILES['mainImage']['name'], PATHINFO_EXTENSION), $valid))
      return true;
  }

  public function checkOneIfImage($file){
    if(getimagesize($_FILES['mainImage']['tmp_name']))
      return true;
  }

  public function checkExt($file){
    $valid = ['jpg', 'jpeg', 'png', 'webp', 'bmp', 'jfif'];
    for($i=0; $i<count($_FILES['images']['name']); $i++){
      if(in_array(pathinfo($_FILES['images']['name'][$i], PATHINFO_EXTENSION), $valid)){
        return true;
      }
    }
  }

  public function checkImg($file){
    for($i=0; $i<count($_FILES['images']['tmp_name']); $i++){
      if(getimagesize($_FILES['images']['tmp_name'][$i])){
        return true;
      }
    }
  }

}

$image = new Image();

 ?>
