<?php require_once "includes/header.php" ?>

<?php require_once "includes/navbar.php" ?>

<?php require_once  "includes/adminDashboard.php"; ?>

<?php if(!$session->signed_in()) redirect("login.php"); ?>

<?php if($_SESSION['status'] != "Admin") redirect('posts.php'); ?>

<section class="mt-2 bg-light p-3">
  <div class="container">
    <div class="row">

<?php require_once "includes/leftBar.php"; ?><!-- First Col-->

      <div class="col-lg-10">
        <p class="display-6 my-3">Users</p>

      <button type="button" class="btn btn-primary my-3" data-bs-toggle="modal" data-bs-target="#addUserModal">Dodaj korisnika</button>

        <table class="table table-hover">
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Last Name</th>
              <th>Email</th>
              <th>Status</th>
              <th>Created At</th>
              <th>Delete / Edit</th>
            </tr>
          </thead>

          <tbody>

        <?php foreach($user->showAll() as $user): ?>
            <tr id="<?php echo $user->id ?>">
              <td><?php echo $user->id ?></td>
              <td><?php echo $user->first_name ?></td>
              <td><?php echo $user->last_name ?></td>
              <td><?php echo $user->email ?></td>
              <td><?php echo $user->status ?></td>
              <td><?php echo $user->time ?></td>
              <td>
                <span class="deleteUser" data-id="<?php echo $user->id ?>"> <i class="fa-solid fa-trash text-danger me-5 ms-3"> </i></span>

                <span class="editUser" data-id="<?php echo $user->id ?>" data-first_name="<?php echo $user->first_name ?>" data-last_name="<?php echo $user->last_name ?>" data-email="<?php echo $user->email ?>" data-password="<?php echo $user->password ?>" data-status="<?php echo $user->status ?>"> <i class="fa-solid fa-pen-to-square text-primary"> </i></span>
              </td>
            </tr>
        <?php endforeach ?>

          </tbody>

        </table>
      </div><!-- END SECOND COL-->

      <!-- MODAL FOR ADDING  NEW USER-->
        <div class="modal fade" id="addUserModal">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Add user</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form id="addUserForm">
                  <div class="form-group">
                    <label class="form-label">Name: *</label>
                    <input type="text" name="first_name" id="first_name" class="form-control">
                  </div>
                  <div class="form-group">
                    <label class="form-label">Last Name: *</label>
                    <input type="text" name="last_name" id="last_name" class="form-control">
                  </div>
                  <div class="form-group">
                    <label class="form-label">Email: *</label>
                    <input type="email" name="email" id="email" class="form-control">
                  </div>
                  <div class="form-group">
                    <label class="form-label">Password: *</label>
                    <input type="password" name="password" id="password" class="form-control">
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="add">Add User</button>
              </div>
            </div>
          </div>
        </div>
        <!-- END MODAL FOR ADDING NEW USER-->



        <!-- MODAL FOR EDITING    USER-->
          <div class="modal fade" id="editUserModal">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Edit User</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form id="editUserForm">
                    <div class="form-group">
                      <label class="form-label">Name: *</label>
                      <input type="hidden" name="id_edit" id="id_edit" value="">
                      <input type="text" name="first_name_edit" id="first_name_edit" class="form-control">
                    </div>
                    <div class="form-group">
                      <label class="form-label">Last Name: *</label>
                      <input type="text" name="last_name_edit" id="last_name_edit" class="form-control">
                    </div>
                    <div class="form-group">
                      <label class="form-label">Email: *</label>
                      <input type="email" name="email_edit" id="email_edit" class="form-control">
                    </div>
                    <div class="form-group">
                      <label class="form-label">Password: *</label>
                      <input type="password" name="password_edit" id="password_edit" class="form-control">
                    </div>
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary" id="edit">Edit User</button>
                </div>
              </div>
            </div>
          </div>
          <!-- END MODAL FOR EDITING   USER-->





    </div><!-- END ROW-->
  </div><!-- END CONTAINER-->
</section><!-- END SECTION-->

<script src="js/users.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
