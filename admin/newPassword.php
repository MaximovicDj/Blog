<?php require_once "includes/header.php" ?>

<?php if($session->signed_in()) redirect("index.php"); ?>

<div class="container">

  <div class="w-50 mx-auto p-5 bg-light border my-5">

    <p><a href="../index.php" class="text-decoration-none"><i class="fa-solid fa-arrow-left me-1"> </i>Home Page</a> </p>

    <p class="display-6 mb-5">Change your Password!</p>

    <form id="newPasswordForm" onsubmit="return false">

      <div class="form-group">
        <label class="form-label mb-1">Email: *</label>
        <input type="email" name="email" id="email" class="form-control" value="">
      </div>

      <div class="form-group my-3">
        <label class="form-label mb-1">New Password: *</label>
        <input type="password" name="password" id="password" class="form-control" value="">
      </div>

      <div class="form-group">
        <label class="form-label mb-1">Retype Password: *</label>
        <input type="password" name="confirm_password" id="confirm_password" class="form-control" value="">
      </div>

      <input type="submit" name="newPass" id="newPass" class="btn btn-primary mt-3" value="Change">

    </form>

    <p id="newPasswordRep" class="mt-3"></p>



  </div>

</div>
<script src="js/login.js"></script>
