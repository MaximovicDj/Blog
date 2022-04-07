<?php require_once("includes/header.php"); ?>

<?php require_once("includes/navbar.php"); ?>

<?php require_once("includes/pano.php"); ?>

<section class="mt-5" id="main">
  <div class="container">

    <div class="row">

      <?php

        $posts = new Post();

        if(isset($_GET['category'])){
          $category = $_GET['category'];
          $posts = $posts->selectAllFromCategory($category);
          if(empty($posts)){
            echo "<p class='display-6 mb-5'>No post for category {$_GET['category']}..</p>";
          }
        }
        else{
          $posts = $posts->showAll();
        }

       ?>

      <div class="col-lg-8 me-5">
        <?php if(count($posts) < 1) echo "<p class='display-6'>No posts yet...</p>"; ?>
        <?php foreach($posts as $posts): ?>
          <div>
            <a href='post.php?id=<?php echo $posts->id ?>'><img src="admin/img/<?php echo $posts->image ?>" class="img-fluid rounded" alt="" style="width:900px; height:500px"></a>
          </div>
          <div class="p-3">
              <h2 class="my-1 display-6"><?php echo $posts->title ?></h2>
              <div class="row mt-3">
                <div class="col-lg-6">
                  <span>Created At: <i><?php echo $posts->time ?></i></span><br>
                  <span>Author: <i><b><?php echo $posts->first_name . " " . $posts->last_name ?></b></i></span><br>
                  <span>Viewed: <?php echo $posts->seen ?> times</span>
                </div>
                <div class="col-lg-6 text-end text-sm-end">
                  <span>Category: <i><a href='index.php?category=<?php echo $posts->name ?>'><?php echo $posts->name ?></i></a></span><br>
                  <span><i>Comments: <?php echo count($comment->showForOnePost($posts->id)) ?> </i></span><br>
                </div>
              </div>


              <span></span>
          </div>
          <hr class="my-4">
        <?php endforeach; ?>
      </div>

      <div class="col-lg-3 ms-4">
        <?php require_once "includes/mostViewed.php"; ?>
      </div>

    </div>

  </div><!--END CONTAINER-->
</section><!--END SECTION-->



<?php require_once("includes/footer.php") ?>
