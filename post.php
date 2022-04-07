<?php require_once("includes/header.php"); ?>

<?php require_once("includes/navbar.php"); ?>

  <?php
    //checking if id exists and if is same as post id, if is not, redirect
    if(isset($_GET['id']))
    {
      $id = (int)$_GET['id'];
      $id = filter_var($id, FILTER_SANITIZE_URL);
      //setting seen +1
      $posts->increseSeen($id);
    }
    if($posts->showById($id)->id != $id){
      redirect("index.php");
    }
  ?>

<section class="my-5">

  <div class="container">

    <div class="w-75">

      <p class="display-3 mb-5"><?php echo $posts->showById($id)->title ?></p>

      <img src="admin/img/<?php echo $posts->showById($id)->image ?>" class="img-fluid rounded" alt="img" style="width:1000px; height:600px;">

      <p class="my-4"><?php echo $posts->showById($id)->text ?></p>


      <div class="row">

      <?php foreach($image->showImages($id) as $image): ?>
        <div class="col-lg-6 my-2 my-lg-2">
          <div class="mb-3">
            <img src="admin/img/<?php echo $image->name ?>" class="img-fluid rounded mb-2 mb-sm-0" style='height:280px; width:450px;' alt="">
          </div>
        </div>
      <?php endforeach ?>

      </div>

      <p>Added By: &nbsp; <i> <a href=''><?php echo $posts->showById($id)->first_name . " " . $posts->showById($id)->last_name ?> (<?php echo $posts->showById($id)->email ?>)</a></i></p>
      <p>Created At:  <i><?php echo $posts->showById($id)->time ?></i></p>
      <p>Category:  <i><a href='index.php?category=<?php echo $posts->showById($id)->name ?>'><?php echo $posts->showById($id)->name ?></a></i></p>
    </div>

  </div><!--END CONTAINER-->
</section><!-- END SECIOTN-->


<?php require_once "includes/commentForm.php"; ?>

  <script src='admin/js/comments.js'></script>

<?php require_once("includes/comments.php"); ?>

<?php require_once("includes/footer.php") ?>
