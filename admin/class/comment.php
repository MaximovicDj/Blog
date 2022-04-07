<?php

class Comment {

  private $db;

  public function __construct(){
    $this->db = new Database();
  }

  public function add($data){
    $this->db->query("INSERT INTO comments (name, email, comment, post_id) VALUES (:name, :email, :comment, :post_id)");
    $this->db->bind(":name", $data['name']);
    $this->db->bind(":email", $data['email']);
    $this->db->bind(":comment", $data['comment']);
    $this->db->bind(":post_id", $data['post_id']);

    if($this->db->execute()) return true;
    else return false;
  }

  public function showForOnePost($post_id){
    $this->db->query("SELECT * FROM comments WHERE post_id = :post_id ORDER BY time DESC");
    $this->db->bind(":post_id", $post_id);
    $results = $this->db->resultSet();
    return $results;
  }

  public function showAllComment(){
    $this->db->query("SELECT * FROM comments ORDER BY id DESC");
    $results = $this->db->resultSet();
    return $results;
  }

  public function delete($post_id){
    $this->db->query("DELETE FROM comments WHERE post_id = :post_id");
    $this->db->bind(":post_id", $post_id);
    if($this->db->execute()) return true;
    else return false;
  }

  public function deleteOneComment($id){
    $this->db->query("DELETE FROM comments WHERE id = :id");
    $this->db->bind(":id", $id);
    if($this->db->execute()) return true;
    else return false;
  }

}

$comment = new Comment();

 ?>
