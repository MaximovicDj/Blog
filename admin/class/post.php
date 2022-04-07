<?php

class Post {

  private $db;

  public function __construct(){
    $this->db = new Database();
  }

  public function add($data){
    $this->db->query("INSERT INTO posts (title, text, user_id, category_id, image) VALUES (:title, :text, :user_id, :category_id, :image)");
    $this->db->bind(":title", $data['title']);
    $this->db->bind(":text", $data['text']);
    $this->db->bind(":user_id", $data['user_id']);
    $this->db->bind(":category_id", $data['category_id']);
    $this->db->bind(":image", $data['mainImage']);

    if($this->db->execute()) return true;
    else return false;
  }

  public function edit($data){
    $this->db->query("UPDATE posts SET title = :title, text = :text, user_id = :user_id, category_id = :category_id, image = :image WHERE id = :id");
    $this->db->bind(":id", $data['id']);
    $this->db->bind(":title", $data['title']);
    $this->db->bind(":text", $data['text']);
    $this->db->bind(":user_id", $data['user_id']);
    $this->db->bind(":category_id", $data['category_id']);
    $this->db->bind(":image", $data['image']);

    if($this->db->execute()) return true;
    else return false;
  }

  public function delete($id){
    $this->db->query("DELETE FROM posts WHERE id = :id");
    $this->db->bind(":id", $id);

    if($this->db->execute()) return true;
    else return false;
  }

  public function last_id(){
    return $this->db->lastInsertId();
  }

  public function showId($id){
    $this->db->query("SELECT * FROM posts WHERE id = :id");
    $this->db->bind(":id", $id);
    $result = $this->db->single();
    return $result;
  }

  public function showAll(){
    $this->db->query("SELECT * FROM viewposts ORDER BY id DESC");
    $results = $this->db->resultSet();
    return $results;
  }

  public function showById($id){
    $this->db->query("SELECT * FROM viewposts WHERE id = :id");
    $this->db->bind(":id", $id);
    $result = $this->db->single();
    return $result;
  }

  public function increseSeen($id){
    $this->db->query("UPDATE posts SET seen = seen + 1 WHERE id = :id");
    $this->db->bind(":id", $id);
    if($this->db->execute()) return true;
    else return false;
  }

  public function mostViewed(){
    $this->db->query("SELECT * FROM viewposts ORDER BY seen DESC LIMIT 3");
    $results = $this->db->resultSet();
    return $results;
  }

  public function selectAllFromCategory($category){
    $this->db->query("SELECT * FROM viewposts WHERE name = :category ORDER BY id DESC");
    $this->db->bind(":category", $category);
    $results = $this->db->resultSet();
    return $results;
  }

  public function selectUserPosts($id){
    $this->db->query("SELECT * FROM viewposts WHERE user_id = :user_id ORDER BY id DESC");
    $this->db->bind(":user_id", $id);
    $results = $this->db->resultSet();
    return $results;
  }

}

$posts = new Post();

 ?>
