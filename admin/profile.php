<?php require_once "includes/header.php" ?>

<?php require_once "includes/navbar.php" ?>

<?php if(!$session->signed_in()) redirect("../index.php"); ?>

<?php $id = $_SESSION['user_id']; ?>

<div class="container my-5">

  <div class="w-50 mx-auto p-2 text-center">

    <div class="">
      <img src="img/user-avatar.png" class="img-fluid rounded-circle mb-3" alt="userimage" style="height:308px; width:308px;">
      <p class="display-6 mt-3"><?php echo $user->showById($id)->first_name . " " . $user->showById($id)->last_name ?></p>
      <span><?php echo $user->showById($id)->email ?> </span><br>
      <span><?php echo $user->showById($id)->status ?> </span><br>

      <button type="button" data-role="editUserProfile"
              data-id="<?php echo $user->showById($id)->id ?>"
              data-name="<?php echo $user->showById($id)->first_name ?>"
              data-last_name="<?php echo $user->showById($id)->last_name ?>"
              data-email="<?php echo $user->showById($id)->email ?>"
              data-password="<?php echo $user->showById($id)->password ?>"
              class="btn btn-secondary w-50 mt-3" data-bs-toggle="modal" data-bs-target="#editProfile">Edt Profile
      </button>
    </div>

  </div>
</div>


<!--  MODAL FOR ADDING NEW POST-->
<div class="modal fade" id="editProfile">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit profil</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group mb-3">
            <label class="form-label mb-1">Name: </label>
            <input type="text" name="first_name" id="first_name" class="form-control" value="">
          </div>
          <div class="form-group mb-3">
            <label class="form-label mb-1">Last Name: </label>
            <input type="text" name="last_name" id="last_name" class="form-control" value="">
          </div>
          <div class="form-group mb-3">
            <label class="form-label mb-1">Email: </label>
            <input type="email" name="email" id="email" class="form-control" value="">
          </div>
          <div class="form-group mb-3">
            <label class="form-label mb-1">Password: </label>
            <input type="password" name="password" id="password" class="form-control" value="">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="edit">Edit profile</button>
      </div>
    </div>
  </div>
</div>
<!-- END  MODAL FOR ADDING NEW POST-->

<script src="js/profile.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
