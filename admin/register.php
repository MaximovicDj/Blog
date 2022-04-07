<?php require_once "includes/header.php" ?>

<?php if($session->signed_in()) redirect("index.php"); ?>

<div class="container">

  <div class="w-50 mx-auto p-5 bg-light border my-5">

    <p><a href="../index.php" class="text-decoration-none"><i class="fa-solid fa-arrow-left me-1"> </i>Home Page</a> </p>

    <p class="display-6 mb-5">Register!</p>

    <form id="registerForm" onsubmit="return false">

      <div class="form-group mb-3">
        <label class="form-label mb-1">Name: *</label>
        <input type="text" name="first_name" id="first_name" class="form-control">
      </div>

      <div class="form-group mb-3">
        <label class="form-label mb-1">Last Name: *</label>
        <input type="text" name="last_name" id="last_name" class="form-control">
      </div>

      <div class="form-group mb-3">
        <label class="form-label mb-1">Email: *</label>
        <input type="email" name="email" id="email" class="form-control">
      </div>

      <div class="form-group mb-3">
        <label class="form-label mb-1">Password: *</label>
        <input type="password" name="password" id="password" class="form-control">
      </div>

      <div class="form-group">
        <label class="form-label mb-1">Retype password: *</label>
        <input type="password" name="confirm_password" id="confirm_password" class="form-control">
      </div>

      <div class="row mt-3">
        <div class="col">
          <button type="button" name="registerBtn" id="registerBtn" class="btn btn-primary w-100">Register!</button>
        </div>
        <div class="col">
          <a href="login.php" class="btn btn-light border w-100">Have an account? Login here!</a>
        </div>
      </div>

    </form>

    <p id="registerResponse" class="mt-3"></p>

  </div>

</div>

<script src='js/login.js'></script>
