<?php

class User {

  private $db;

  public function __construct(){
    $this->db = new Database();
  }


  public function register($data){
    $this->db->query("INSERT INTO users (first_name, last_name, email, password) VALUES (:first_name, :last_name, :email, :password)");
    $this->db->bind(":first_name", $data['first_name']);
    $this->db->bind(":last_name", $data['last_name']);
    $this->db->bind(":email", $data['email']);
    $this->db->bind(":password", $data['password']);

    if($this->db->execute()) return true;
    else return false;
  }


  public function login($email, $password){
    $this->db->query("SELECT * FROM users WHERE email = :email");
    $this->db->bind(":email", $email);

    $row = $this->db->single();
    $hash_password = $row->password;

    if(password_verify($password, $hash_password)) return $row;
    else return false;
  }


  public function findUserByEmail($email){
    $this->db->query("SELECT * FROM users WHERE email = :email");
    $this->db->bind(":email", $email);
    $row = $this->db->single();
    return $row;
  }


  public function showAll(){
    $this->db->query("SELECT * FROM users ORDER BY id DESC");
    $result = $this->db->resultSet();
    return $result;
  }


  public function showById($id){
    $this->db->query("SELECT * FROM users WHERE id = :id");
    $this->db->bind(":id", $id);
    $result = $this->db->single();
    return $result;
  }


  public function add($data){
    $this->db->query("INSERT INTO users (first_name, last_name, email, password) VALUES (:first_name, :last_name, :email, :password)");
    $this->db->bind(":first_name", $data['first_name']);
    $this->db->bind(":last_name", $data['last_name']);
    $this->db->bind(":email", $data['email']);
    $this->db->bind(":password", $data['password']);

    if($this->db->execute()) return true;
    else return false;
  }


  public function edit($data){
    $this->db->query("UPDATE users SET first_name = :first_name, last_name = :last_name, email = :email, password = :password WHERE id = :id");
    $this->db->bind(":id", $data['id']);
    $this->db->bind(":first_name", $data['first_name']);
    $this->db->bind(":last_name", $data['last_name']);
    $this->db->bind(":email", $data['email']);
    $this->db->bind(":password", $data['password']);

    if($this->db->execute()) return true;
    else return false;
  }


  public function delete($id){
    $this->db->query("DELETE FROM users WHERE id = :id");
    $this->db->bind(":id", $id);

    if($this->db->execute()) return true;
    else return false;
  }

  public function newPassword($email, $password){
    $this->db->query("UPDATE users SET password = :password WHERE email = :email");
    $this->db->bind(":password", $password);
    $this->db->bind(":email", $email);

    if($this->db->execute()) return true;
    else return false;
  }

}

$user = new User();

 ?>
