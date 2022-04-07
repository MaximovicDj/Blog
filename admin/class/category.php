<?php

class Category {

  private $db;

  public function __construct(){
    $this->db = new Database();
  }

  public function show(){
    $this->db->query("SELECT * FROM category ORDER BY id DESC");
    $results = $this->db->resultSet();
    return $results;
  }

  public function add($data){
    $this->db->query("INSERT INTO category (name) VALUES (:name)");
    $this->db->bind(":name", $data['name']);

    if($this->db->execute()) return true;
    else return false;
  }

  public function edit($data){
    $this->db->query("UPDATE category SET name = :name WHERE id = :id");
    $this->db->bind(":name", $data['name']);
    $this->db->bind(":id", $data['id']);

    if($this->db->execute()) return true;
    else return false;
  }

  public function delete($id){
    $this->db->query("DELETE FROM category WHERE id = :id");
    $this->db->bind(":id", $id);

    if($this->db->execute()) return true;
    else return false;
  }

}

$category = new Category();
 ?>
