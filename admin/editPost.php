<?php require_once "includes/header.php"; ?>
<script src='js/tiny.js'></script>

<?php require_once "includes/navbar.php"; ?>

<?php if(!$session->signed_in()) redirect("../index.php"); ?>

<?php if($_SESSION['user_id'] != $posts->showById($_GET['id'])->user_id) redirect("posts.php") ?>

<?php
  if(isset($_GET['id'])){
    $id = (int)$_GET['id'];
    $id = filter_var($id, FILTER_SANITIZE_URL);
    if($posts->showById($_GET['id'])->id != $id){
       redirect("posts.php");
    }
  }
 ?>

 <?php $posts = $posts->showById($_GET['id']); ?>

<div class="container my-5">

  <div class="row">


    <!-- Start First Col COL-->
      <div class="col-lg-7 me-5">

        <form id="editFormPost" enctype="multipart/form-data">

          <div class="form-group">
            <input type="hidden" name="post_id" id="post_id" value="<?php echo $posts->id ?>">
            <label class="form-label mb-1">Title: </label>
            <input type="text" name="title" id="title" class="form-control" value="<?php echo $posts->title ?>">
          </div>

          <div class="form-group">
            <label class="form-label mb-1 mt-4">Text: *</label>
            <textarea id="text" name="text" class="form-control" rows="8" cols="80"><?php echo $posts->text ?></textarea>
          </div>

          <div class="form-group">
            <label class="form-label mb-1 mt-4">Categoty: *</label>
            <select class="form-select" id="category_id" name="category_id">
              <option value="<?php echo $posts->category_id ?>"><?php echo $posts->name ?></option>
              <?php foreach($category->show() as $category): ?>
                <option value="<?php echo $category->id ?>"><?php echo $category->name ?></option>
              <?php endforeach ?>
            </select>
          </div>

      </div>
    <!-- END First COL-->

    <!-- Start Seciond Col COL-->
      <div class="col-lg-4">

          <div class="form-group">
            <label class="form-label mb-1">Main image:</label><br>
            <img src="img/<?php echo $posts->image ?>" class="img-fluid rounded" style='height:200px; width:300px'>
            <input type="hidden" name="oldImg" id="oldImg" value="<?php echo $posts->image ?>">
          </div>

          <div class="form-group my-3">
            <label class="form-label mb-1 mt-4">Choose new main image: </label>
            <input type="file" name="mainImage" id="mainImage" class="form-control" value="">
          </div>

          <div class="form-group">
            <label class="form-label">All images:</label><br>
            <label class="form-label bg-danger p-3 text-light">On doubleclick delete image..</label>
            <?php foreach($image->showImages($id) as $image): ?>
              <img src="img/<?php echo $image->name ?>" alt="" data-name="<?php echo $image->name ?>" data-id="<?php echo $image->id ?>" data-role="deleteMultiple" class="img-fluid rounded mb-2" style='height:200px; width:300px'>
            <?php endforeach ?>
          </div>

          <div class="form-group">
            <label class="form-label mb-1 mt-4">Add more images</label><br>
            <input type="file" name="images[]" id="images" class="form-control" multiple value="">
          </div>

    </form><!-- END FORM-->

      </div>
    <!-- END SECOND COL-->



    <input type="submit" name="editBtn" id="editBtn" value="Edit Post" class="btn btn-primary mt-2">




  </div><!-- END ROW-->
</div><!-- END CONTAINER-->

<script src='js/posts.js'></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
