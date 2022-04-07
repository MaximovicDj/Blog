<?php require_once "includes/header.php" ?>

<?php if($session->signed_in()) redirect("index.php"); ?>

<div class="container">

  <div class="w-50 mx-auto p-5 bg-light border my-5">

    <p><a href="../index.php" class="text-decoration-none"><i class="fa-solid fa-arrow-left me-1"> </i>Home Page</a> </p>

    <p class="display-6 mb-5">Login!</p>

    <form id="loginForm" onsubmit="return false">

      <div class="form-group mb-3">
        <label class="form-label mb-1">Email: *</label>
        <input type="email" name="email" id="email" class="form-control">
      </div>

      <div class="form-group">
        <label class="form-label mb-1">Password: *</label>
        <input type="password" name="password" id="password" class="form-control">
      </div>

      <div class="row mt-3">
        <div class="col">
          <input type="submit" name="loginBtn" id="loginBtn" class="btn btn-primary w-100" value="Login">
        </div>
        <div class="col">
          <a href="register.php" class="btn btn-light border w-100">Have no an Accout? Register Here!</a>
        </div>
      </div>

    </form>

    <br><a href="newPassword.php">Forogot your password?</a>

    <p id="loginResponse" class="mt-3"></p>

    <?php
      if(isset($_SESSION['message'])){
        echo "<p class='alert alert-success'>{$_SESSION['message']}</p>";
        unset($_SESSION['message']);
      }
    ?>

  </div>

</div>
<script src="js/login.js"></script>
