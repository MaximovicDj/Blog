<?php

class Session {

  private $signed_in = false;

  public function __construct(){
    session_start();
    $this->check_login();
  }

  public function signed_in(){
    return $this->signed_in;
  }

  public function check_login(){
    if(isset($_SESSION['user_id'])){
      $this->signed_in = true;
    }
    else {
      $this->signed_in = false;
    }
  }


  public function createSession($user){
    $_SESSION['user_id'] = $user->id;
    $_SESSION['first_name'] = $user->first_name;
    $_SESSION['last_name'] = $user->last_name;
    $_SESSION['email'] = $user->email;
    $_SESSION['password'] = $user->password;
    $_SESSION['status'] = $user->status;
  }


  public function logout(){
    session_start();
    session_destroy();
    session_unset();
    redirect("../index.php");
  }

}

$session = new Session();

 ?>
