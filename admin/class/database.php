<?php

class Database {

  private $host = "localhost";
  private $user = "root";
  private $pass = "";
  private $name = "news";

  private $stmt;
  private $error;
  private $dbh;

  public function __construct(){
    $dns = "mysql:host=".$this->host.";dbname=".$this->name;

    try{
      $this->dbh = new PDO($dns, $this->user, $this->pass);
    }catch(PDOException $e){
      $this->error = $e->getMessage();
      echo $this->error;
    }

  }// end __construct, conection to database;

  public function query($sql){
    return $this->stmt = $this->dbh->prepare($sql);
  }

  public function execute(){
    return $this->stmt->execute();
  }

  public function single(){
    $this->execute();
    return $this->stmt->fetch(PDO::FETCH_OBJ);
  }

  public function resultSet(){
    $this->execute();
    return $this->stmt->fetchAll(PDO::FETCH_OBJ);
  }

  public function bind($param, $value, $type = null){
    if(is_null($type)){
      switch(true)
      {
        case is_int($value):
          $type = PDO::PARAM_INT;
        break;
        case is_null($value):
          $type = PDO::PARAM_NULL;
        break;
        case is_bool($value):
          $type = PDO::PARAM_BOOL;
        break;
        default:
          $type = PDO::PARAM_STR;
      }
    }
    $this->stmt->bindValue($param, $value, $type);
  }

  public function lastInsertId(){
		return $this->dbh->lastInsertId();
	}

}//end database CLASS

 ?>
