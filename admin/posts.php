<?php require_once "includes/header.php" ?>
<script src='js/tiny.js'></script>

<?php require_once "includes/navbar.php" ?>

<?php if(!$session->signed_in()) redirect("login.php"); ?>

<?php if($_SESSION['status'] == "Admin") require_once "includes/adminDashboard.php"  ?><!-- First COl-->


<section class="mt-2 bg-light p-3">
  <div class="container">
    <div class="row">


<?php if($_SESSION['status'] == "Admin") require_once "includes/leftBar.php"; ?><!-- First COl-->

      <div class="col-lg-10">

      <?php if($_SESSION['status'] == "Admin"): ?>
          <p class="display-6 my-3">Posts</p>
      <?php else: ?>
          <p class="display-6 my-3">My Posts</p>
      <?php endif ?>

        <a href="#" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#addPostModal">Add Post</a>

        <table class="table table-hover">
          <thead>
            <tr>
              <th>ID</th>
              <th>Title</th>
              <th>Author</th>
              <th>Created At</th>
              <th>Comments</th>
              <th>Delete / Edit / View</th>
            </tr>
          </thead>

          <tbody>

            <?php
              if($_SESSION['status'] == "Admin")
                $posts = $posts->showAll();
              else
                $posts = $posts->selectUserPosts($_SESSION['user_id']);
             ?>

            <?php if(count($posts) < 1) echo "<p class=''>No posts yet..</p>"; ?>

            <?php foreach($posts as $posts): ?>
              <tr>
                <td><?php echo $posts->id ?></td>
                <td><?php echo $posts->title ?></td>
                <td><?php echo $posts->first_name . " " . $posts->last_name. "(" . $posts->email . ")" ?></td>
                <td><?php echo $posts->time ?></td>
                <td><?php echo count($comment->showForOnePost($posts->id)) ?></td>
                <td>
                  <span class="deletePost" data-id="<?php echo $posts->id ?>"><i class="fa-solid fa-trash text-danger ms-3"> </i></span>

                  <a href='editPost.php?id=<?php echo $posts->id ?>'><span class="ms-5 me-5"><i class="fa-solid fa-pen-to-square text-primary"> </i></span></a>

                  <span><a href="../post.php?id=<?php echo $posts->id ?>"> <i class="fa-solid fa-eye text-info"></i> </a></span>
                </td>
              </tr>
            <?php endforeach; ?>

          </tbody>

        </table>
      </div><!-- END SECOND COL-->


      <!--  MODAL FOR ADDING NEW POST-->
      <div class="modal fade" id="addPostModal">
        <div class="modal-dialog  modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Add Post</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

              <form name="addPostForm" id="addPostForm" enctype="multipart/form-data" method="post">
                <div class="form-group mb-3">
                  <label class="form-label mb-1">Title: *</label>
                  <input type="text" name="title" id="title" class="form-control">
                </div>
                <div class="form-group mb-3">
                  <label class="form-label mb-1">Text: *</label>
                  <textarea id="text" name="text" class="form-control" rows="8" cols="80"></textarea>
                </div>
                <div class="form-group mb-3">
                  <label class="form-label mb-1">Category: *</label>
                  <select class="form-select" name="category_id" id="category_id">
                    <option value="0">--Izaberite kategoriju--</option>
                  <?php foreach($category->show() as $category): ?>
                    <option value="<?php echo $category->id ?>"><?php echo $category->name ?></option>
                  <?php endforeach ?>
                  </select>
                </div>
                <div class="form-group mb-3">
                  <label class="form-label mb-1">Main Image</label>
                  <input type="file" name="mainImage" id="mainImage" class="form-control" value="">
                </div>
                <div class="form-group">
                  <label class="form-label mb-1">More Images</label>
                  <input type="file" name="images[]" id="images" class="form-control" multiple>
                </div>
              </form>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" id="add">Add Post</button>
            </div>
          </div>
        </div>
      </div>
      <!-- END  MODAL FOR ADDING NEW POST-->




    </div><!-- END ROW-->
  </div> <!--END CONTAINER-->
</section><!-- END SECTION-->

<script src='js/posts.js'></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
