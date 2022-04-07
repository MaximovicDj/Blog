<?php

class Contact{

  private $db;

  public function __construct(){
    $this->db = new Database();
  }


  public function makeSeen($id){
    $this->db->query("UPDATE contact SET seen = 1 WHERE id = :id");
    $this->db->bind(":id", $id);

    if($this->db->execute()) return true;
    else return false;
  }

  public function showNotSeen(){
    $this->db->query("SELECT * FROM contact WHERE seen = 0 ORDER BY id DESC");
    $results = $this->db->resultSet();
    return $results;
  }

  public function create($data){
    $this->db->query("INSERT INTO contact (name, email, text) VALUES (:name, :email, :text)");
    $this->db->bind(":name", $data['user_name']);
    $this->db->bind(":email", $data['email']);
    $this->db->bind(":text", $data['text']);

    if($this->db->execute()) return true;
    else return false;
  }

}

$contact = new Contact();

 ?>
