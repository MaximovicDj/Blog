<?php require_once "includes/header.php" ?>

<?php require_once "includes/navbar.php" ?>

<?php require_once "includes/adminDashboard.php" ?>

<?php if(!$session->signed_in()) redirect("login.php"); ?>

<?php if($_SESSION['status'] != "Admin") redirect('posts.php'); ?>

<section class="mt-2 bg-light p-3">
  <div class="container">
    <div class="row">

<?php require_once "includes/leftBar.php" ?> <!-- First COL-->

      <div class="col-lg-10">
        <p class="display-6 my-3">Categories</p>

        <a href="#" class="btn btn-primary mb-2" data-bs-target="#add" data-bs-toggle="modal">Add Category</a>

        <table class="table table-hover">
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Created At</th>
              <th>Delete / Edit</th>
            </tr>
          </thead>

          <tbody>
          <?php foreach($category->show() as $category): ?>
            <tr id="<?php echo $category->id ?>">
              <td><?php echo $category->id ?></td>
              <td data-target="name"><?php echo $category->name ?></td>
              <td><?php echo $category->time ?></td>
              <td>
                  <span class="delete me-4" data-id="<?php echo $category->id ?>"><i class="fa-solid fa-trash text-danger me-3"> </i> </span>

                  <span class="editCategory" data-role="editCat" data-id="<?php echo $category->id ?>"><i class="fa-solid fa-pen-to-square text-primary"> </i> </span>
              </td>
            </tr>
          <?php endforeach ?>
          </tbody>

        </table>
      </div><!-- END SECOND COL-->


      <!-- MODAL FOR ADDING NEW CATEGORY-->
      <div class="modal fade" id="add">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="add">Add Category</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form id="categoryForm">
                <div class="form-group">
                  <label class="form-lable">Name</label>
                  <input type="text" name="name" id="name" class="form-control" value="">
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" id="add">Add Category</button>
            </div>
          </div>
        </div>
    </div>
    <!-- END MODAL FOR ADDING NEW CATEGORY-->



    <!-- MODAL FOR EDITING CATEGORY-->
    <div class="modal fade" id="editModal">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editModal">Edit Category</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="editCategoryForm">
              <div class="form-group">
                <label class="form-lable">Naziv</label>
                <input type="hidden" name="editId" id="editId" value="">
                <input type="text" name="editName" id="editName" class="form-control" value="">
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" id="edit">Edit Category</button>
          </div>
        </div>
      </div>
  </div>
  <!-- END MODAL FOR EDITING  CATEGORY-->




    </div><!-- END ROW-->
  </div><!-- END CONTAINER-->
</section><!-- END SECTION-->

<script src='js/category.js'></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
